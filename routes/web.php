<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TblProdiController;
use App\Http\Controllers\ThnAjaranController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\KirimEmailController;
use App\Http\Controllers\TblListJudulController;
use App\Http\Controllers\TblPengajuanController;

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
    return view('welcome');
});

// Get By Id
Route::get('edit-tahun-ajaran/{id}', [ThnAjaranController::class, 'edit'])->name('edit-tahun-ajaran');
Route::get('edit-listjudul/{id}', [TblListJudulController::class, 'edit'])->name('edit-listjudul');
Route::get('edit-pengaju/{id}', [TblPengajuanController::class, 'edit'])->name('edit-pengaju');
Route::get('download/pdf', [TblPengajuanController::class, 'generatePDF'])->name('download-pdf');

// Get All
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('login', [CustomAuthController::class, 'index']);
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::get('prodi', [TblProdiController::class, 'index'])->name('prodi');
Route::get('landingPage', [TblPengajuanController::class, 'index'])->name('landingPage');

Route::get('list_judul', [TblListJudulController::class, 'index'])->name('list-judul');
Route::get('add/list-judul', [TblListJudulController::class, 'show'])->name('add-list');
Route::get('add/prodi', [TblProdiController::class, 'show'])->name('add-prodi');
Route::get('search', [TblPengajuanController::class, 'show'])->name('search');

Route::get('pengaju/diterima', [TblPengajuanController::class, 'diterima'])->name('pengaju-diterima');
Route::get('pengaju/diproses', [TblPengajuanController::class, 'diproses'])->name('pengaju-diproses');
Route::get('pengaju/ditolak', [TblPengajuanController::class, 'ditolak'])->name('pengaju-ditolak');

// Post
Route::post('dashboard/tahun-ajaran', [ThnAjaranController::class, 'store'])->name('tahun-ajaran');
Route::post('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::post('search', [TblPengajuanController::class, 'show'])->name('search');
Route::post('generate-pdf', [TblPengajuanController::class, 'generatePDF'])->name('generate-pdf');

// Create
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::post('list-judul/process', [TblListJudulController::class, 'create'])->name('add-process');
Route::post('prodi/process', [TblProdiController::class, 'create'])->name('prodi-process');
Route::post('pengajuan/process', [TblPengajuanController::class, 'create'])->name('pengajuan-process');

// Update
Route::post('dashboard/process/{id}', [ThnAjaranController::class, 'update'])->name('thn-ajaran.process');
Route::post('listjudul/process/{id}', [TblListJudulController::class, 'update'])->name('listjudul.process');
Route::post('pengaju/process/{id}', [TblPengajuanController::class, 'update'])->name('pengaju.process');

// Delete / Destroy
Route::post('destroy-ajaran/{id}', [ThnAjaranController::class, 'destroy'])->name('ajaran.destroy');
Route::post('destroy-listjudul/{id}', [TblListJudulController::class, 'destroy'])->name('listjudul.destroy');