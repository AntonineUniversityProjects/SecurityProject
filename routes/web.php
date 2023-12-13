<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\PatientsController;

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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// routes/web.php

// , 'role:Admin'

Route::middleware(['auth ', 'role:Admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

   

    Route::get('/admin/patients/create', [PatientsController::class, 'create'])->name('patients.create');
    Route::post('/admin/patients/store', [PatientsController::class, 'store'])->name('patients.store');
});
Route::middleware(['auth ', 'role:Doctor'])->group(function () {

Route::get('/admin/doctors/create', [DoctorsController::class, 'create'])->name('doctors.create');
    Route::post('/admin/doctors/store', [DoctorsController::class, 'store'])->name('doctors.store');
});


require __DIR__.'/auth.php';
