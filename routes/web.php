<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserslistController;

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

Route::get('/userslists', [UserslistController::class, 'index'])->name('userslists');
Route::get('/userslists/forms', [UserslistController::class, 'form'])->name('userslistsforms');
Route::get('/userslists/edit{id}', [UserslistController::class, 'edit'])->name('userslistsedit');
Route::post('delete/{id}', [UserslistController::class, 'delete'])->name('userslistsdelete');
Route::post('update/{id}', [UserslistController::class, 'update'])->name('userslistsupdate');