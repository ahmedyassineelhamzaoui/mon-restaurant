<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
    return view('index');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/menu',function(){
    return view('menu');
});
Route::get('/about',function(){
    return view('about');
});
Route::get('/gallerie',function(){
    return view('gallerie');
});
Route::get('/dashboard',function(){
   return view('dashboard');
});
Route::get('/DashboardMenu',function(){
    return view('DashboardMenu');
 });
Route::controller(App\Http\Controllers\ImageController::class)->group(function () {
Route::post('/dashboard', 'upload')->name('dashboard');
Route::get('/dashboard','index')->name('dashboard');
Route::delete('/dashboard/{id}', 'destroy')->name('dashboard.destroy');
Route::get('/editPlat/{id}','edit');
Route::put('/dashboard/{id}','update')->name('dashboard.update');
Route::get('/gallerie','display');
});
Route::controller(App\Http\Controllers\AuthController::class)->group(function () {
    Route::post('/login','login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});
Route::get('/login',function(){
    return view('login');
});

Route::controller(App\Http\Controllers\MenuController::class)->group(function () {
    Route::post('/DashboardMenu', 'uploadMenu')->name('DashboardMenu');
    Route::get('/DashboardMenu','indexMenu')->name('DashboardMenu');
    Route::delete('/DashboardMenu/{id}', 'destroyMenu')->name('DashboardMenu.destroy');
    Route::get('/editMenu/{id}','editMenu');
    Route::put('/DashboardMenu/{id}','updateMenu')->name('DashboardMenu.update');
    Route::get('/menu','displayMenu');
});