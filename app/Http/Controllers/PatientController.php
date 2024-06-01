<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicament;
use App\Models\Prescription;
use App\Models\User;
use App\Models\DetailsDoctor;
use App\Models\DetailPatient;
use App\Models\Appointment;
use App\Notifications\AppointmentBooked;
use Illuminate\Support\Facades\Auth;
class PatientController extends Controller
{
    public function medicament()
    {
        $medicines = $this->getPrescribedMedicines();
        return view('patient.medicament', ['medicines' => $medicines]);
    }

    public function addPrescription(Request $request)
    {
        $request->validate([
            'uri' => 'required|string|max:255',
            'dosage' => 'required|string|max:45',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
        ]);

        $medicine = Medicament::where('URI', $request->input('uri'))->first();

        if (!$medicine) {
            return response()->json(['message' => 'Medicine not found'], 404);
        }

        $userId = auth()->id();
        $prescription = new Prescription();
        $prescription->idMedicament = $medicine->idMedicine;
        $prescription->idUser = $userId;
        $prescription->dosage = $request->input('dosage');
        $prescription->startDate = $request->input('startDate');
        $prescription->endDate = $request->input('endDate');
        $prescription->save();

        return redirect()->route('medicament');
    }

    public function getPrescribedMedicines()
    {
        $userId = auth()->id();
    
        // Fetch prescriptions for the logged-in user and include related medicine details
        $prescriptions = Prescription::where('idUser', $userId)
            ->with('medicine')
            ->get();
    
        // Map the prescriptions to the desired format for treatment details
        $prescribedMedicines = $prescriptions->map(function ($prescription) {
            return [
                'idMedicament' => $prescription->idMedicament,
                'name' => $prescription->medicine->name,
                'dosage' => $prescription->dosage,
                'startDate' => $prescription->startDate instanceof \DateTime ? $prescription->startDate->format('Y-m-d') : $prescription->startDate,
                'endDate' => $prescription->endDate instanceof \DateTime ? $prescription->endDate->format('Y-m-d') : $prescription->endDate,
            ];
        });
    
        return $prescribedMedicines;
    }
    
    public function doctorList()
    {
        $doctors = DetailsDoctor::paginate(10);
        return view('patient.doctorList', compact('doctors'));
    }
    

    public function searchDoctors(Request $request)
    {
        $query = DetailsDoctor::query();
    
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('specialization', 'LIKE', "%{$search}%");
            });
        }
    
        $doctors = $query->get();
    
        if ($request->ajax()) {
            return response()->json($doctors);
        }
    
        return view('patient.doctorList', compact('doctors'));
    }
    
    public function profileDoctor($id)
    {
        $doctor = DetailsDoctor::findOrFail($id);
        return view('patient.doctorProfile', compact('doctor'));
    }
    
    public function addDetails()
    {
        return view('patientdashboard');
    }

    public function insertDetails(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:details_patients,email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
        ]);

        // Create a new DetailPatient instance
        $detailPatient = new DetailPatient([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'city' => $validatedData['city'],
            'state' => $validatedData['state'],
            'country' => $validatedData['country'],
            'postal_code' => $validatedData['postal_code'],
        ]);

        // Associate the DetailPatient with the authenticated user
        $detailPatient->user_id = auth()->id();

        // Save DetailPatient instance
        $detailPatient->save();

        // Update first_time_login to false for the authenticated user
        $user = auth()->user();
        $user->first_time_login = false;
        $user->save();

        // Redirect the user
        return redirect()->route('patientdashboard')->with('success', 'Details added successfully');
    }
    public function profile()
    {
        $patient = DetailPatient::where('user_id', auth()->id())->first();
        return view('patient.profile', compact('patient'));
    }
    public function editProfile()
    {
        $patient = DetailPatient::where('user_id', auth()->id())->first();
        return view('patient.edite', compact('patient'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'postal_code' => 'required|string|max:10',
        ]);

        $patient = DetailPatient::where('user_id', auth()->id())->first();

        $patient->update([
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'postal_code' => $request->postal_code,
        ]);

        return redirect()->route('profilePa')->with('success', 'Profile updated successfully.');
    }
    public function deleteMedi($idMedicament)
    {
        $medcine = Prescription::find($idMedicament)->delete();
        return redirect()->route('medicament')->with('success', 'User deleted successfully');
    }
  
  
    public function appointment($doctor_id){
        return view('patient.appointment', ['doctor_id' => $doctor_id]);
    }


    public function store(Request $request, $doctor_id)
    {
        $request->validate([
            'appointment_date' => 'required|date|after:today',
            'appointment_time' => 'required|date_format:H:i',
            'purpose' => 'nullable|string|max:255',
        ]);
    
        $appointmentDateTime = \DateTime::createFromFormat('Y-m-d H:i', $request->appointment_date . ' ' . $request->appointment_time);
    
        if (!$appointmentDateTime) {
            return redirect()->back()->withErrors(['appointment_time' => 'The appointment time is not a valid date.']);
        }
    
        $existingAppointmentsCount = Appointment::where('doctor_id', $doctor_id)
            ->where('appointment_time', $appointmentDateTime->format('Y-m-d H:i:s'))
            ->count();
    
        if ($existingAppointmentsCount > 0) {
            return redirect()->back()->withErrors(['appointment_time' => 'This time is already booked for the selected doctor.']);
        }
    
        $appointment = new Appointment([
            'patient_id' => auth()->id(),
            'doctor_id' => $doctor_id,
            'appointment_time' => $appointmentDateTime->format('Y-m-d H:i:s'),
            'purpose' => $request->purpose,
        ]);
    $user = User::find($doctor_id);
        $user->notify(new AppointmentBooked($doctor_id));
        $appointment->save();
    
        
    
        return redirect()->route('DoctorListPa')->with('success', 'Appointment booked successfully');
    }
    
    
    
    
    
   
}