<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailsDoctor; // Import the DetailsDoctor model
use App\Models\User; 
use App\Models\FormDoctor; 




use \PDF;

class DoctorController extends Controller
{
    public function addDetails()
    {
        return view('doctordashboard');
    }

    public function insertDetails(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:details_doctors,email',
            // Add more validation rules for other fields
        ]);

        // Create a new DetailsDoctor instance
        $detailsDoctor = new DetailsDoctor([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $request->phone,
            'specialization' => $request->specialization,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'postal_code' => $request->postal_code,
        ]);

        // Associate the DetailsDoctor with the authenticated user
        $detailsDoctor->user_id = auth()->id();

        // Save the DetailsDoctor to the database
        $detailsDoctor->save();

        // Redirect the user
        return redirect()->route('doctordashboard');
    }

    public function index()
    {
        // Fetch patients and doctors separately
        $patients = User::whereHas('roles', function ($query) {
            $query->where('name', 'patient');
        })->get();
    
        // Ensure $patients and $doctors are initialized even if there are no results
        $patients = $patients ?: [];
    
        return view('doctordashboard', compact('patients'));
    }
    
    public function addForm($patientId)
    {
        // Check if the selected patient exists
        $patient = User::findOrFail($patientId);
    
        // Fetch all patients
        $patients = User::whereHas('roles', function ($query) {
            $query->where('name', 'patient');
        })->get();
    
        return view('doctordashboard', ['patient' => $patient, 'patients' => $patients]);
    }
    
    
 
    
    public function insertForm(Request $request)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:users,id',
            'symptoms' => 'required|string',
            'diagnosis' => 'required|string',
            'treatment_plan' => 'required|string',
            'prescription' => 'nullable|string',
        ]);
    
        // Create a new MedicalForm instance
        $medicalForm = new FormDoctor([
            'patient_id' => $validatedData['patient_id'],
            'symptoms' => $validatedData['symptoms'],
            'diagnosis' => $validatedData['diagnosis'],
            'treatment_plan' => $validatedData['treatment_plan'],
            'prescription' => $validatedData['prescription'],
        ]);
    
        // Save the MedicalForm to the database
        $medicalForm->save();
    
        // Generate the PDF using the newly created medical form
        $pdf = $this->generatePDF($medicalForm->id);
    
        // Return the PDF as a downloadable file or inline display
        return $pdf->download('medical_form.pdf');
    }
    
    public function generatePDF($formId)
    {
        // Retrieve the medical form data from the database
        $medicalForm = FormDoctor::findOrFail($formId);

        // Pass the medical form data to the PDF view
        $data = [
            'medicalForm' => $medicalForm,
        ];

        // Generate the PDF using the populated template
        $pdf = PDF::loadView('medical_form_pdf', $data);

        return $pdf->stream('medical_form.pdf');


    }
}    