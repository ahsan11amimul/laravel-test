<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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
    return view('test.index');
});
Route::get('/register', [TestController::class, 'create']);
Route::post('/register', [TestController::class, 'store']);
Route::get('/login', [TestController::class, 'login_create'])->name('login');
Route::post('/login', [TestController::class, 'login_store']);
Route::get('/license', [TestController::class, 'license_create']);
Route::get('/dashboard',[TestController::class,'get_dashboard'])->middleware('auth');
Route::get('/logout',[TestController::class,'logout'])->middleware('auth');
Route::get('/get_info/{id}',[TestController::class,'get_info']);
Route::get('/get_key/{id}',[TestController::class,'get_key']);
Route::post('/update',[TestController::class,'update_key']);
