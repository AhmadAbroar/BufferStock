<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminCrudController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BarangCrudController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BufferStockController;
use App\Http\Controllers\PegawaiAuthController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PegawaiDashboardController;

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


Route::group(['prefix' => 'admin', 'middleware' => 'web'], function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('/admin', AdminCrudController::class);
        Route::resource('/barang', BarangCrudController::class);
        Route::resource('pegawais', PegawaiController::class);
        Route::resource('buffer', BufferStockController::class);
        Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
        Route::get('/laporan_masuk', [AdminDashboardController::class, 'barang_masuk'])->name('laporan.masuk');
        Route::get('/laporan_keluar', [AdminDashboardController::class, 'barang_keluar'])->name('laporan.keluar');
    });
});

// Pegawai Routes
Route::group(['prefix' => 'pegawai', 'middleware' => 'web'], function () {
    // Pegawai Authentication
    Route::get('/login', [PegawaiAuthController::class, 'showLoginForm'])->name('pegawai.login');
    Route::post('/login', [PegawaiAuthController::class, 'login'])->name('pegawai.login.submit');
    Route::post('/logout', [PegawaiAuthController::class, 'logout'])->name('pegawai.logout');

    // Pegawai Dashboard (Protected)
    Route::middleware(['pegawai'])->group(function () {
        Route::get('/', [PegawaiDashboardController::class, 'index'])->name('pegawai.dashboard');
        Route::resource('barangkeluar', BarangKeluarController::class);
        Route::resource('barang_masuk', BarangMasukController::class);
        // Add other pegawai routes here
    });
});

