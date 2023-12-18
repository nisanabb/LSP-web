<?php

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\Controller;
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

Route::get('/', [\App\Http\Controllers\Auth\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/', [\App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login.post');
Route::post('logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');
Route::get('register', [\App\Http\Controllers\Auth\AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register/create', [\App\Http\Controllers\Auth\AuthController::class, 'register'])->name('register.post');
    Route::get('/home', [\App\Http\Controllers\CalonMahasiswaController::class, 'create'])->name('calon_mahasiswa.create');
    Route::post('/home', [\App\Http\Controllers\CalonMahasiswaController::class, 'store'])->name('calon_mahasiswa.store');
    Route::get('/home/status', [\App\Http\Controllers\CalonMahasiswaController::class, 'index'])->name('calon_mahasiswa.show');
    Route::get('calon_mahasiswa/index', [\App\Http\Controllers\CalonMahasiswaController::class, 'index'])->name('calon_mahasiswa.index');

Route::get('/calon_mahasiswa/pdf', 'PdfController@generatePdf')->name('calon_mahasiswa.pdf');

    

Route::middleware(['auth', 'checkadmin'])->group(function () {
    Route::get('admin/students', [AdminController::class, 'index'])->name('admin.students.index');
    Route::get('admin/students/{id}', [AdminController::class, 'show'])->name('admin.students.show');
    Route::post('admin/students/{id}/status', [AdminController::class, 'updateStatus'])->name('admin.students.updateStatus');
    Route::delete('admin/students/delete/{id}', [AdminController::class, 'destroy'])->name('admin.students.destroy');
    Route::get('admin/mystudent', [AdminController::class, 'myStudent'])->name('admin.mystudent');
    Route::get('admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('admin/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    Route::group(['middleware' => 'pdf'], function () {
        // Routes for PDF generation
    });
    Route::get('generate-pdf', [CalonMahasiswaController::class, 'generatePdf'])->name('pdf.student_list');

});


