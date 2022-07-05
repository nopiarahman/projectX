<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LogistikController;
use App\Http\Controllers\PengepulController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ManualOrderController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware'=>['role:Super-Admin']],function(){

    /* Barang */
    Route::get('/barang',[ BarangController::class,'index'])->name('barang');
    Route::get('/cariJenisBarang',[ BarangController::class,'cariJenisBarang']);
    Route::post('/barang',[ BarangController::class,'store'])->name('barangSimpan');
    Route::patch('/barang/{id}',[ BarangController::class,'update']);
    Route::delete('/barang/{id}',[ BarangController::class,'destroy']);
    /* Pelanggan */
    Route::get('/reguler',[ PelangganController::class,'reguler'])->name('reguler');
    /* Logistik */
    Route::get('/logistik',[ LogistikController::class,'index'])->name('logistik');
    Route::post('/logistik',[ LogistikController::class,'store'])->name('logistikSimpan');
    Route::patch('/logistik/{id}',[ LogistikController::class,'update']);
    Route::delete('/logistik/{id}',[ LogistikController::class,'destroy']);
    /* Pengepul */
    Route::get('/pengepul',[ PengepulController::class,'index'])->name('pengepul');
    Route::post('/pengepul',[ PengepulController::class,'store'])->name('pengepulSimpan');
    Route::patch('/pengepul/{id}',[ PengepulController::class,'update']);
    Route::delete('/pengepul/{id}',[ PengepulController::class,'destroy']);

    /* Order */
    Route::controller(ManualOrderController::class)->group(function () {
        Route::get('/manualorders/ongoing', 'indexOnGoing');
        Route::get('/manualorders/create', 'create');
        Route::get('/manualorders/{id}', 'show');
        Route::get('/manualorders/edit/{id}', 'edit');
        Route::delete('/manualorders/{id}', 'destroy');
        Route::post('/manualorders/update/{id}', 'update')->name('manualOrdersUpdate');
        Route::post('/manualorders', 'store')->name('manualOrdersSimpan');
    });
});
Route::group(['middleware'=>['role:logistik']],function(){

    /* Logistik */
    Route::get('/logistik',[ LogistikController::class,'index'])->name('logistik');
    Route::post('/logistik',[ LogistikController::class,'store'])->name('logistikSimpan');
    Route::patch('/logistik/{id}',[ LogistikController::class,'update']);
    Route::delete('/logistik/{id}',[ LogistikController::class,'destroy']);
});