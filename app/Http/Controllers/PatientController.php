<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicament;
use App\Models\Prescription;
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
            'uri' => 'required|string|max:255', // corrected the validation rule
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

        // Redirect back to the medicament page after adding prescription
        return redirect()->route('medicament');
    }

    public function getPrescribedMedicines()
    {
        $userId = auth()->id();
        $prescribedMedicines = Prescription::where('idUser', $userId)->get();
        $prescribedMedicineIds = $prescribedMedicines->pluck('idMedicament')->toArray();

        if (empty($prescribedMedicineIds)) {
            return [];
        }

        $medicines = Medicament::whereIn('idMedicine', $prescribedMedicineIds)->get();
        return $medicines;
    }
}
