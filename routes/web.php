<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PinjamBarangController;
use App\Http\Controllers\ReportController;

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


Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/asset',[HomeController::class, 'halaman_barang'])->name('barang');
    Route::resource('/asset/admin', BarangController::class)->middleware('userAkses:admin')->except('show');
    Route::get('/asset/admin/{admin}', [BarangController::class, 'show'])->name('asset.admin.show');
    Route::resource('/report', ReportController::class);
    Route::resource('/pinjam', PinjamBarangController::class);
});

