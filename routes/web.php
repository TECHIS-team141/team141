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
    return view('welcome');
});

Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('item.search');
//「/search」にアクセスしたときにSearchControllerのindexメソッドが使われる

Route::get('/detail', [App\Http\Controllers\SearchController::class, 'detail'])->name('item.detail');
//「/search」にアクセスしたときにSearchControllerのindexメソッドが使われる