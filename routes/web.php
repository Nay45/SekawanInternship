<?php

use App\Http\Controllers\ApproveController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LogActivityController;
use App\Http\Controllers\PemesananController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
})->middleware('guest');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('manage', PemesananController::class)->except('show');
    Route::resource('kendaraan', KendaraanController::class)->except('show');
    Route::get('list', [ApproveController::class, 'list'])->name('list');
    Route::post('approve/{id}', [ApproveController::class, 'setStatus'])->name('setStatus');
    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::resource('activity', LogActivityController::class)->except('show');
    Route::get('export', [PemesananController::class, 'export'])->name('export');
});
