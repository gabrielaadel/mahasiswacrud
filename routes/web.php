<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

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

Route::get('/mahasiswa',[MahasiswaController::class, 'index'])->name('mahasiswa');

Route::get('/tambahmahasiswa',[MahasiswaController::class, 'tambahmahasiswa'])->name('tambahmahasiswa');
Route::post('/insertdata',[MahasiswaController::class, 'insertdata'])->name('insertdata');

Route::get('/tampilkandata/{id}',[MahasiswaController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}',[MahasiswaController::class, 'updatedata'])->name('updatedata');

Route::get('/delete/{id}',[MahasiswaController::class, 'delete'])->name('delete');

//export PDF
Route::get('/exportpdf',[MahasiswaController::class, 'exportpdf'])->name('exportpdf');

//export Excel
Route::get('/exportexcel',[MahasiswaController::class, 'exportexcel'])->name('exportexcel');


Route::post('/importexcel',[MahasiswaController::class, 'importexcel'])->name('importexcel');
