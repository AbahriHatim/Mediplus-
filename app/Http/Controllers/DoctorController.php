<?php

namespace App\Http\Controllers;

use App\Notifications\NewBillWasWritten;
use Illuminate\Http\Request;
use App\Models\DetailsDoctor;
use App\Models\User;
use App\Models\FormDoctor;
use App\Models\PdfFile;
use App\Models\Appointment;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Models\Prescription;
use Illuminate\Support\Facades\Auth;
use PDF;

class DoctorController extends Controller
{
    public function addDetails()
    {
        return view('doctordashboard');
    }

    public function insertDetails(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:details_doctors,email',
            'phone' => 'required|string|max:15',
            'specialization' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
        ]);
    
    
    
        // Create a new DetailsDoctor instance
        $detailsDoctor = new DetailsDoctor([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'specialization' => $validatedData['specialization'],
            'address' => $validatedData['address'],
            'city' => $validatedData['city'],
            'state' => $validatedData['state'],
            'country' => $validatedData['country'],
            'postal_code' => $validatedData['postal_code'],
         // Store the image path in the 'image' column
        ]);
    
        // Associate the DetailsDoctor with the authenticated user
        $detailsDoctor->user_id = auth()->id();
    
        // Save DetailsDoctor instance
        $detailsDoctor->save();
    
        // Update first_time_login to false for the authenticated user
        $user = auth()->user();
        $user->first_time_login = false;
        $user->save();
    
        // Redirect the user
        return redirect()->route('doctordashboard')->with('success', 'Details added successfully');
    }
    

    public function index()
    {
        // Fetch patients separately
        $patients = User::whereHas('roles', function ($query) {
            $query->where('name', 'patient');
        })->get();

        return view('doctor.form', compact('patients'));
    }

    public function addForm($patientId)
    {
        $patient = User::findOrFail($patientId);

        // Fetch patients to pass to the view
        $patients = User::whereHas('roles', function ($query) {
            $query->where('name', 'patient');
        })->get();

        // Pass $patients variable to the view
        return view('doctor.formTab', ['patientId' => $patientId, 'patients' => $patients]);
    }

    public function insertForm(Request $request, $patientId)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:users,id',
            'patient_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'symptoms' => 'required|string',
            'diagnosis' => 'required|string',
            'treatment_plan' => 'required|string',
            'prescription' => 'nullable|string',
        ]);
    
        $doctorId = auth()->id();
      
        $medicalForm = new FormDoctor([
            'patient_id' => $validatedData['patient_id'],
            'patient_name' => $validatedData['patient_name'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'gender' => $validatedData['gender'],
            'address' => $validatedData['address'],
            'symptoms' => $validatedData['symptoms'],
            'diagnosis' => $validatedData['diagnosis'],
            'treatment_plan' => $validatedData['treatment_plan'],
            'prescription' => $validatedData['prescription'],
            'doctor_id' => auth()->id(),
        ]);
   
        $medicalForm->save();
    
        // Generate the PDF using the newly created medical form
        $pdfData = $this->generatePDF($medicalForm);
    
        $pdfFileName = 'medical_form_' . $medicalForm->id . '.pdf';
        Storage::put('pdf/' . $pdfFileName, $pdfData);
    
        $pdfFile = new PdfFile([
            'file_name' => $pdfFileName,
            'file_data' => $pdfData,
            'doctor_id' => $doctorId,
            'patient_id' => $validatedData['patient_id'],
        ]);
    
        $pdfFile->save();
    
        $user = User::find($patientId);
        $user->notify(new NewBillWasWritten($patientId));
    
        $this->sendEmailWithAttachment($pdfFileName, $pdfData, 'hatimabahri9@gmail.com');
    
        return response()->streamDownload(function () use ($pdfData) {
            echo $pdfData;
        }, $pdfFileName);
    }
    
    public function generatePDF($medicalForm)
    {
        
        // Pass the medical form data to the PDF view
        $medicalForm->load('doctor');
        $data = [
            'medicalForm' => $medicalForm,
        ];

        $pdf = PDF::loadView('medical_form_pdf', $data);
        return $pdf->output(); // Output the binary data of the PDF
    }

    public function sendEmailWithAttachment($fileName, $fileData, $recipientEmail)
    {
        $mailData = [
            'fromEmail' => 'hatimabahri9@gmail.com', // Set your email here
            'fromName' => 'Your Name', // Set your name here
            'subject' => 'Medical Form',
            'body' => 'Please find attached the medical form.', // You can customize the email body here
            'recipientEmail' => $recipientEmail,
            'fileName' => $fileName,
            'fileData' => $fileData,
        ];

        Mail::send('email-template', $mailData, function ($message) use ($mailData) {
            $message->from($mailData['fromEmail'], $mailData['fromName']);
            $message->to($mailData['recipientEmail']);
            $message->subject($mailData['subject']);
            $message->setBody($mailData['body']); // Set email body
            $message->attachData($mailData['fileData'], $mailData['fileName'], [
                'mime' => 'application/pdf',
            ]);
        });

        // Log any errors that occur during email sending
        if (count(Mail::failures()) > 0) {
            foreach (Mail::failures() as $failure) {
                \Log::error('Failed to send email to: ' . $failure);
            }
        }

        return redirect()->back()->with('success', 'Email sent!');
    }

    public function searchBarPatient(Request $request)
    {
        $search = $request->input('search');

        // Perform your search logic here
        $patients = User::where('name', 'like', '%' . $search . '%')
            ->whereHas('roles', function ($query) {
                $query->where('name', 'patient');
            })
            ->get();

        // Pass the search results to the view
        return view('doctor.form', compact('patients'));
    }
    public function getTreatmentDetails($patientId)
    {
        // Fetch prescriptions for the specified patient
        $prescriptions = Prescription::where('idUser', $patientId)->with('medicine')->get();
    
        // Map the prescriptions to the desired format for treatment details
        $treatmentDetails = $prescriptions->map(function ($prescription) {
            return [
                'idMedicament' => $prescription->medicine->idMedicine,
                'name' => $prescription->medicine->name,
                'dosage' => $prescription->dosage,
                'startDate' => $prescription->startDate instanceof \DateTime ? $prescription->startDate->format('Y-m-d') : $prescription->startDate,
                'endDate' => $prescription->endDate instanceof \DateTime ? $prescription->endDate->format('Y-m-d') : $prescription->endDate,
            ];
        });
    
        // Pass the $treatmentDetails variable to the view
        return view('doctor.traitment', ['treatmentDetails' => $treatmentDetails]);
    }
    
    
    
    //profil
    public function profile()
    {
        $doctor = DetailsDoctor::where('user_id', auth()->id())->first();
        return view('doctor.profile', compact('doctor'));
    }
  
    public function editProfile()
    {
        $doctor = DetailsDoctor::where('user_id', auth()->id())->first();
        return view('doctor.edite', compact('doctor'));
    }
    public function updateProfile(Request $request)
    {
        // Validate input data
        $request->validate([
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'postal_code' => 'required|string|max:10',
        ]);

        $doctor = DetailsDoctor::where('user_id', auth()->id())->first();
        $doctor->update([
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'postal_code' => $request->postal_code,
        ]);

        return redirect()->route('doctor.profile')->with('success', 'Profile updated successfully');
    }    

    public function showSchedule(Request $request)
    {
        $doctor_id = Auth::id();
    
        // Retrieve all appointments for the doctor
        $appointments = Appointment::where('doctor_id', $doctor_id)
            ->with('patient:id,name') 
            ->get();
    
    
        $events = [];
        foreach ($appointments as $appointment) {
            $events[] = [
                'title' => $appointment->patient->name . ' (ID: ' . $appointment->patient_id . ')',
                'start' => $appointment->appointment_time->format('Y-m-d H:i:s'), // Format start time
            ];
        }
    
    
        return view('doctor.schedule', compact('events'));
    }
    
}