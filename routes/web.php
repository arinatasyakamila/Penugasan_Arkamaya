<?php

use App\Models\Client;
use App\Models\Project;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;

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
Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login-proses', [LoginController::class, 'authenticate']);


Route::middleware(['auth'])->group(function () {

    // Semua route dalam grup ini akan menggunakan middleware 'auth'
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/',[DashboardController::class,'index']);
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::resource('/project', ProjectController::class);
    Route::resource('/client', ClientController::class);
    Route::resource('/users', UsersController::class);
    Route::post('/project/deleteSelected', [ProjectController::class, 'deleteSelected'])->name('project.deleteSelected');
    Route::post('/proses-form', [ClientController::class, 'deleteSelected'])->name('client.deleteSelected');




});
