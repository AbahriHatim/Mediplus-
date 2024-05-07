<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
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
Route::get('/doctordashboard', [DoctorController::class, 'index'])->name('PatientList');
Route::get('/doctor/{patientId}/', [DoctorController::class, 'addForm'])->name('addMedicalForm');

// Route to handle the insertion of a medical form
// Route to handle the insertion of a medical form
Route::post('/doctordashboard', [DoctorController::class, 'insertForm'])->name('insertMedicalForm');
Route::get('/doctor/{formId}/generate-pdf', [DoctorController::class, 'generatePDF']);


