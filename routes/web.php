<?php

use App\Http\Controllers\ErrorController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PeralatanController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\UserController;

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

Route::fallback([ErrorController::class, 'ErrorRoute']);

Route::get('/pdf/{slug}', [PdfController::class, 'PdfReader'])->name('pdf_reader');

Route::get('/inspeksi/hasil/{slug}', [PdfController::class, 'viewPdf'])->name('pdf_view');

Route::post('/inspeksi/hasil/{slug}', [PdfController::class, 'pdfDownload'])->name('pdfDownload');

Route::middleware('auth')->group(function () {
    Route::get('/', [ProfileController::class, 'home'])->name('home');

    Route::get('/dashboard', [ProfileController::class, 'home'])->name('dashboard');

    Route::get('/panduan', [ProfileController::class, 'panduan'])->name('panduan');
    //user
    Route::middleware('role:admin')->prefix('user/')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('user');

        Route::get('/cari_user', [UserController::class, 'search'])->name('search_user');

        Route::post('create_user', [UserController::class, 'store'])->name('create_user');

        Route::get('/edit/{id}', [UserController::class, 'show'])->name('show_user');

        Route::post('/edit/{id}', [UserController::class, 'update'])->name('update_user');

        Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('delete_user');
    });

    Route::prefix('/profile')->group(function() {
        Route::get('/', [ProfileController::class, 'index'])->name('profile');

        Route::post('/update_password/{id}', [ProfileController::class, 'update'])->name('profile_update');

        Route::post('/upload_ttd/{id}', [ProfileController::class, 'uplaodTTD'])->middleware('role:safety', 'role:mekanik')->name('upload_ttd');
    });

    //inspeksi
    Route::prefix('inspeksi/')->group(function() {

        Route::get('/cari_data', [PertanyaanController::class, 'searchData'])->name('cari_data');

        Route::get('/', [PertanyaanController::class, 'inspeksi'])->name('inspeksi');

        Route::post('/tambah_data', [PeralatanController::class, 'store'])->name('tambah_data');

        Route::post('/hapus_data/{id}', [PeralatanController::class, 'destroy'])->name('hapus_data');

        Route::get('/{slug}', [PertanyaanController::class, 'index'])->name('pertanyaan');

        Route::post('/save_jawaban', [PertanyaanController::class, 'store'])->name('simpan');

        Route::get('/sign-generator/{slug}', [PertanyaanController::class, 'signGenerator'])->name('signGenerator');

        Route::post('/sign-generator/{slug}', [PertanyaanController::class, 'saveSign'])->name('saveSign');

        Route::post('/active/{id}', [MainController::class, 'active'])->name('active');
    });
});

require __DIR__.'/auth.php';
