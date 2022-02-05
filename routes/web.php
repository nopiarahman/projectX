<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

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

Route::group(['middleware'=>['auth','role:admin']],function(){
    Route::get('/barang',[ BarangController::class,'index'])->name('barang');
    Route::get('/cariJenisBarang',[ BarangController::class,'cariJenisBarang']);
    Route::post('/barang',[ BarangController::class,'store'])->name('barangSimpan');
    Route::patch('/barang/{id}',[ BarangController::class,'update']);
    Route::delete('/barang/{id}',[ BarangController::class,'destroy']);
});