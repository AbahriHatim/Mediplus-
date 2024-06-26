<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Appointment;
use App\Models\PdfFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function addDoctor()
    {
        return view('admin/addDoc');
    }

    public function insertDoctor(Request $request)
    {
        // Create a new user instance
        $user = new User([
            'name' => trim($request->name),
            'email' => trim($request->email),
            'password' => Hash::make($request->password),
        ]);
    
        // Save the user to the database
        $user->save();
    
        // Fetch the role instance using its name
        $doctorRole = Role::where('name', 'doctore')->first();
    
        if ($doctorRole) {
            // Attach the role to the user
            $user->roles()->attach($doctorRole);
        } else {
            // Handle the case where the role doesn't exist
        }
    
        return redirect()->route('addDoctor');
    }
    public function index()
    {
        // Fetch patients and doctors separately
        $patients = User::whereHas('roles', function ($query) {
            $query->where('name', 'patient');
        })->paginate(10);
    
       
    
        // Ensure $patients and $doctors are initialized even if there are no results
        $patients = $patients ?: [];
       
    
        return view('admin/PatientList', compact('patients'));
    }
    public function doctorList()
{
        $doctors = User::whereHas('roles', function ($query) {
        $query->where('name', 'doctore');
    })->paginate(7);
    $doctors = $doctors ?: [];
    return view('admin/Doctorlist', compact('doctors'));
}
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin/edit', compact('user'));
    }
    
    public function updateUser($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        // You might want to validate and handle password updates separately
        $user->password = Hash::make($request->password);
        $user->save();
        
        return redirect()->route('DoctorListAd');
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admindashboard')->with('success', 'User deleted successfully');
    }
    public function searchBarDoctor(Request $request)
    {
        $search = $request->input('search');
    
        // Perform your search logic here
        $doctors = User::where('name', 'like', '%'.$search.'%')
                       ->whereHas('roles', function ($query) {
                           $query->where('name', 'doctore');
                       })
                       ->get();
    
        // Pass the search results to the view
        return view('admin/doctorList', compact('doctors'));
    }
    
    
    public function searchBarPatient(Request $request)
    {
        $search = $request->input('search');
    
        // Perform your search logic here
        $patients = User::where('name', 'like', '%'.$search.'%')
                       ->whereHas('roles', function ($query) {
                           $query->where('name', 'patient');
                       })
                       ->get();
    
        // Pass the search results to the view
        return view('admin/PatientList', compact('patients'));
    }   


    public function listInvoice(){
        $listInvoice = PdfFile::paginate(15);
        return view('admin/Invoice', compact('listInvoice'));
    }


public function download($id) {
    $invoice = PdfFile::findOrFail($id);
    $filename = $invoice->file_name;
    $fileData = $invoice->file_data;

    return response()->streamDownload(function () use ($fileData) {
        echo $fileData;
    }, $filename);
}
public function view($id) {
    $invoice = PdfFile::findOrFail($id);
    $filename = $invoice->file_name;
    $fileData = $invoice->file_data;

    return response($fileData)->header('Content-Type', 'application/pdf');
}

}
