<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JenisKontakController;

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



// Route::get('/admin', function () {
//     return view('layout.admin');
// });

//mastersiswa
Route::middleware('auth')->group(function(){
    Route::resource('/dashboard',DashboardController::class);

    Route::get('mastersiswa/{id_siswa}/hapus',[SiswaController::class,'hapus'])->name('mastersiswa.hapus');
    Route::resource('/mastersiswa',SiswaController::class);

    Route::get('masterproject/create/{id_siswa}',[ProjectController::class,'tambah'])->name('masterproject.tambah');
    Route::get('masterproject/{id_siswa}/hapus',[ProjectController::class,'hapus'])->name('masterproject.hapus');
    Route::resource('/masterproject',ProjectController::class);

    Route::resource('/masterkontak',KontakController::class);

    Route::resource('/tambahjeniskontak',JenisKontakController::class);
    
    Route::post('logout',[LoginController::class,'logout']);

});

Route::middleware('guest')->group(function(){
    Route::get('login',[LoginController::class,'index'])->name('login');
    Route::post('login',[LoginController::class,'authenticate']);
    Route::get('/', function () { return view('welcome');});
    Route::get('/about', function () { return view('about');});
    Route::get('/contact', function () { return view('contact');});
    Route::get('/project', function () { return view(' project');});
});








//masterproject

//masterkontak

