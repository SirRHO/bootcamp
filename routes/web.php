<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::get('/dashboard', [DashboardController::class, 'main'])->name('dashboard');

Route::get('/tampil-sertifikat', [SertifikatController::class, 'main'])->name('tampil-sertifikat');
Route::get('/sertifikat/certificate/{id_sertifikat}', [SertifikatController::class, 'certificate'])->name('sertifikat.certificate');
Route::get('/sertifikat/formAdd', [SertifikatController::class, 'formAdd'])->name('sertifikat.formAdd');
Route::post('/tampil-sertifikat', [SertifikatController::class, 'doformAdd'])->name('sertifikat.doformAdd');
Route::get('/sertifikat/{id_sertifikat}/formEdit', [SertifikatController::class, 'formEdit'])->name('sertifikat.formEdit');
Route::post('/sertifikat/formEdit/{id_sertifikat}', [SertifikatController::class, 'doformEdit'])->name('sertifikat.doformEdit');
Route::post('/sertifikat/delete/{id_sertifikat}', [SertifikatController::class, 'deleteSertifikat'])->name('sertifikat.delete');
// Route::get('/sertifikat/search', [SertifikatController::class, 'search'])->name('sertifikat.search');

Route::get('/sertifikat/card/{id_sertifikat}', [CardController::class, 'main'])->name('card.main');

Route::get('/login', [AuthController::class, 'mainLogin'])->name('login.login');
Route::post('/login/submit', [AuthController::class, 'login'])->name('login.submit');

Route::get('/registrasi', [AuthController::class, 'mainRegistrasi'])->name('login.registrasi');
Route::post('/registrasi/submit', [AuthController::class, 'formAddRegistrasi'])->name('login.RegistrasiSubmit');

Route::get('/kategori', [KategoriController::class, 'main'])->name('kategori');
Route::get('/kategori/formAdd', [KategoriController::class, 'formAdd'])->name('kategori.formAdd');
Route::post('/kategori', [KategoriController::class, 'doformAdd'])->name('kategori.doformAdd');
Route::get('/kategori/{id_kategori}/formEdit', [KategoriController::class, 'formEdit'])->name('kategori.formEdit');
Route::post('/kategori/formEdit/{id_kategori}', [KategoriController::class, 'doformEdit'])->name('kategori.doformEdit');
Route::post('/kategori/delete/{id_kategori}', [KategoriController::class, 'delete'])->name('kategori.delete');


