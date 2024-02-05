<?php

use App\Http\Controllers\ProdukController;
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

Route::get('/', [ProdukController::class, 'index'])->name('tampil');
Route::get('tambah', [ProdukController::class, 'create'])->name('tambah-data');
Route::post('tambah/submit', [ProdukController::class, 'store'])->name('submit-data');