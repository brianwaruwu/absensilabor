<?php

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
    return view('auth.login');
});
Route::get('/labor', function () {
    return view('labor');
});



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/user', 'userController')->middleware('auth');
Route::resource('/studentlabor', 'studentlaborController')->middleware('auth');
Route::resource('/absensi', 'absensiController')->middleware('auth');
Route::resource('/laporan', 'laporanController')->middleware('auth');





route::group(['middleware' => ['auth', 'checkrole:admin']], function () {
    Route::resource('/user', 'userController');
    Route::resource('/studentlabor', 'studentlaborController');
    Route::resource('/laporan', 'laporanController');
    Route::resource('/absensi', 'absensiController');

});

    Route::resource('/laporan', 'laporanController');
    Route::resource('/absensi', 'absensiController');