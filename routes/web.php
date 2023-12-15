<?php
namespace App\Http\Controllers;

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\FileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
   Route::get('/admin/dashboard', [AdminController::class, 'admindashboard'])->name('admin.dashboard');
    
    Route::get('/admin/patients/create', [PatientsController::class, 'create'])->name('patients.create');
    Route::post('/admin/patients/store', [PatientsController::class, 'store'])->name('patients.store');
    Route::get('/admin/doctors/create', [DoctorsController::class, 'create'])->name('doctors.create');
    Route::post('/admin/doctors/store', [DoctorsController::class, 'store'])->name('doctors.store');
 ;
});

 Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// Handling ModelNotFoundException
Route::fallback(function (Request $request) {
    abort(404, "The resource at '{$request->url()}' could not be found.");
});


Route::middleware(['auth', 'doctor'])->group(function () {
    
    // only accessible with doctor route
    Route::get('/doctor/dashboard', [DoctorControllerRoute::class, 'dashboard'])->name('admin.doctor.dashboard');
    
});


// Handling other types of exceptions globally
Route::fallback(function () {
    abort(500, 'Oops! Something went wrong.');
});
 Route::get('/upload', [FileController::class, 'showUploadForm'])->name('upload.form');
    Route::post('/uploadfile', [FileController::class, 'upload'])->name('upload.post');

require __DIR__.'/auth.php';
