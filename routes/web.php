<?php

use Illuminate\Support\Facades\Route;
use App\Controllers\ItemController;

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

// 商品一覧画面の表示
Route::get('/item',[App\Http\Controllers\ItemController::class,'main']);

// 商品登録画面の表示
Route::get('/item/create',[App\Http\Controllers\ItemController::class,'create']);

// 商品登録を保存して商品一覧画面へ遷移
Route::post('/item/register',[App\Http\Controllers\ItemController::class,'register']);

// 商品一覧画面の編集を押下したら商品編集画面を表示
Route::get('/item/edit/{id}',[App\Http\Controllers\ItemController::class,'edit']);

// データを編集して会員一覧画面へ
Route::post('/item/update',[App\Http\Controllers\ItemController::class,'update']);

// 削除して会員一覧画面へ
Route::get('/item/delete/{id}',[App\Http\Controllers\ItemController::class,'delete']);