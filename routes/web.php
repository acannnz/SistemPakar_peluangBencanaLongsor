<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FormLongsorController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DataController::class, 'index']);
Route::get('/main/formKeadaan', [DataController::class, 'formTampilanKeadaan']);
Route::get('/main/tambahKeadaan', [DataController::class, 'formTambahKeadaan']);
Route::get('/main/{id}/editKeadaan', [DataController::class, 'formEditKeadaan']);

Route::post('/main/tambahKeadaan', [DataController::class, 'fungsiTambahKeadaan']);
Route::post('/main/{id}/editKeadaan', [DataController::class, 'fungsiEditKeadaan']);

Route::resource('main', DataController::class);

//form
Route::get('/main/{id}/form1', [DataController::class, 'form1Pengecekan']);
//fungsi
Route::post('/main/{id}/form1', [DataController::class, 'fungsiPengecekan1']);

Route::get('/main/hasil/hasilTinggi', [DataController::class, 'formHasilTinggi']);
Route::get('/main/hasil/hasilSedang', [DataController::class, 'formHasilSedang']);
Route::get('/main/hasil/hasilRendah', [DataController::class, 'formHasilRendah']);
