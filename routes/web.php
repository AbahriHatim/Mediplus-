<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\NotificationController;

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
})->name('homePage');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admindashboard', function () {
    return view('admindashboard');
})->middleware(['auth', 'role:admin'])->name('admindashboard');

Route::get('/patientdashboard', function () {
    return view('patientdashboard');
})->middleware(['auth', 'role:patient'])->name('patientdashboard');
Route::get('/patientFirstLog', function () {
    return view('patientFirstLog');
})->middleware(['auth', 'role:patient'])->name('patientFirstLog');

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
Route::get('/admin/Doctorlist', [AdminController::class, 'doctorList'])->name('DoctorListAd');
Route::get('/edit/{id}', [AdminController::class, 'editUser'])->name('editUser');
Route::post('/update/{id}', [AdminController::class, 'updateUser'])->name('updateUser');
Route::delete('/delete/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');
Route::get('/admin/addDoc', [AdminController::class, 'addDoctor'])->name('addDoctor');
Route::get('/admin/Invoice', [AdminController::class, 'listInvoice'])->name('listInvoice');
Route::get('download/invoice/{id}', [AdminController::class, 'download'])->name('download.invoice');
Route::get('view/invoice/{id}', [AdminController::class, 'view'])->name('view.invoice');


/*Doctor*/
Route::get('/doctor/details', [DoctorController::class, 'addDetails'])->name('addDetails');
Route::post('/doctor/details', [DoctorController::class, 'insertDetails'])->name('insertDetails');
Route::get('/doctor/list', [DoctorController::class, 'index'])->name('PatientListDo');
Route::get('/doctor/form/{patientId}', [DoctorController::class, 'addForm'])->name('addForm');
Route::get('/doctor/form', [DoctorController::class, 'searchBarPatient'])->name('searchBarPatientDoc');

Route::get('/doctor/traitment/{patientId}', [DoctorController::class, 'getTreatmentDetails'])->name('treatmentDetails');
Route::get('/doctor/profile', [DoctorController::class, 'profile'])->name('profile');
Route::get('/doctor/edit', [DoctorController::class, 'editProfile'])->name('editProfile');
Route::post('/doctor/update', [DoctorController::class, 'updateProfile'])->name('updateProfile');
Route::get('/doctor/schedule', [DoctorController::class, 'showSchedule'])->name('showSchedule');


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
Route::delete('/patient/medicament/{idMedicament}', [PatientController::class, 'deleteMedi'])->name('deleteMedi');



Route::get('/notifications/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
Route::get('/patient/doctorList', [PatientController::class, 'doctorList'])->name('DoctorListPa');
Route::get('/patient/searchDoctors', [PatientController::class, 'searchDoctors'])->name('searchDoctors');
Route::get('/patient/doctorProfile/{id}', [PatientController::class, 'profileDoctor'])->name('doctorProfile');
Route::post('/patient/details', [PatientController::class, 'insertDetails'])->name('insertDetailsPa');
Route::get('/doctor/details', [PatientController::class, 'addDetails'])->name('addDetailsPa');
Route::get('/patient/profile', [PatientController::class, 'profile'])->name('profilePa');

Route::get('/patient/edite', [PatientController::class, 'editProfile'])->name('editProfilePa');
Route::post('/patient/update', [PatientController::class, 'updateProfile'])->name('updateProfilePa');
Route::get('/patient/appointment/{doctor_id}', [PatientController::class, 'appointment'])->name('appointmentPa');
Route::post('/patient/appointment/{doctor_id}', [PatientController::class, 'store'])->name('appointmentsStore');
