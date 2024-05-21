<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;

class AppointmentController extends Controller
{
    public function create(Doctor $doctor)
    {
        return view('/patient/appointment', compact('doctor'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:users,id',
            'appointment_time' => 'required|date|after:now',
            'purpose' => 'nullable|string|max:255',
        ]);

        // Check if the appointment time is already booked for the doctor
        $exists = Appointment::where('doctor_id', $request->doctor_id)
                             ->where('appointment_time', $request->appointment_time)
                             ->exists();

        if ($exists) {
            return back()->withErrors(['appointment_time' => 'This time is already booked for the selected doctor.']);
        }

        Appointment::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'appointment_time' => $request->appointment_time,
            'purpose' => $request->purpose,
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment booked successfully.');
    }
}
