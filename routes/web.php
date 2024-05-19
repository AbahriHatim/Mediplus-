<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admindashboard', function () {
    return view('admindashboard');
})->middleware(['auth', 'role:admin'])->name('admindashboard');

Route::get('/patientdashboard', function () {
    return view('patientdashboard');
})->middleware(['auth', 'role:patient'])->name('patientdashboard');

Route::get('/doctordashboard', function () {
    return view('doctordashboard');
})->middleware(['auth', 'role:doctore'])->name('doctordashboard');
Route::get('/doc', function () {
    return view('doc');
})->middleware(['auth', 'role:doctore'])->name('doc');

require __DIR__.'/auth.php';
Route::get('/admin/addDoc', [AdminController::class, 'addDoctor'])->name('admin.addDoctor');
Route::post('/admin/addDoc', [AdminController::class, 'insertDoctor'])->name('admin.insertDoctor');
Route::get('/admin/Patientlist', [AdminController::class, 'index'])->name('PatientList');
Route::get('/admin/Doctorlist', [AdminController::class, 'doctorList'])->name('DoctorList');
Route::get('/edit/{id}', [AdminController::class, 'editUser'])->name('editUser');
Route::post('/update/{id}', [AdminController::class, 'updateUser'])->name('updateUser');
Route::delete('/delete/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');
Route::get('/admin/addDoc', [AdminController::class, 'addDoctor'])->name('addDoctor');
Route::get('/admin/search', [AdminController::class, 'searchBarDoctor'])->name('searchBarDoctor');
Route::get('/admin/search', [AdminController::class, 'searchBarPatient'])->name('searchBarPatient');

/*Doctor*/
Route::get('/doctor/details', [DoctorController::class, 'addDetails'])->name('addDetails');
Route::post('/doctor/details', [DoctorController::class, 'insertDetails'])->name('insertDetails');
Route::get('/doctor/list', [DoctorController::class, 'index'])->name('PatientListDo');
Route::get('/doctor/form/{patientId}', [DoctorController::class, 'addForm'])->name('addForm');
Route::get('/doctor/form', [DoctorController::class, 'searchBarPatient'])->name('searchBarPatientDoc');


// Route to handle the insertion of a medical form
// Route to handle the insertion of a medical form
Route::post('/doctor/form/formTab/{patientId}', [DoctorController::class, 'insertForm'])->name('insertMedicalForm');
Route::get('/doctor/form/{formId}/generate-pdf', [DoctorController::class, 'generatePDF']);

Route::post('/send', [EmailController::class, 'send'])->name('send-email');
Route::post('/send', [EmailController::class, 'sendEmailWithAttachment'])->name('sendEmailWithAttachment');
   
//Patient
Route::post('/patient/medicament', [PatientController::class, 'addPrescription'])->name('addMed')->middleware('auth');

Route::get('/patient/medicament', [PatientController::class, 'getPrescribedMedicines'])->name('patient.medicines');

Route::get('/patient/medicament', [PatientController::class, 'medicament'])->name('medicament');
