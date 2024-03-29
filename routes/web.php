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

//ログイン無しでアクセスできる
Route::group(['middleware'=>['guest']],function(){
Route::get('/account/signup',[App\Http\Controllers\AccountController::class,'showSignup'])->name('showSignup');
Route::post('/account/usercreate',[App\Http\Controllers\AccountController::class,'usercreate'])->name('userCreate');
Route::post('/account/userlogin',[App\Http\Controllers\AccountController::class,'userlogin'])->name('userlogin');
});

//ログインすればアクセス可
Route::group(['middleware'=>['auth']],function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('item.search');
    Route::get('/detail', [App\Http\Controllers\SearchController::class, 'detail'])->name('item.detail');

    Route::get('/userslists', [UserslistController::class, 'index'])->name('userslists');
    Route::get('/userslists/forms', [UserslistController::class, 'form'])->name('userslistsforms');
    Route::get('/userslists/edit{id}', [UserslistController::class, 'edit'])->name('userslistsedit');
    Route::post('delete/{id}', [UserslistController::class, 'delete'])->name('userslistsdelete');
    Route::post('update/{id}', [UserslistController::class, 'update'])->name('userslistsupdate');
});

//管理者でログインすればアクセス可
Route::group(['middleware' => ['auth', 'can:admin']], function () {
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
     Route::get('/item/delete',[App\Http\Controllers\ItemController::class,'delete']);
});

Route::get('/logout',[App\Http\Controllers\AccountController::class,'userlogout'])->name('userlogout');

Route::get('/', function () {
    return view('account.login');
})->name('login');
?>
