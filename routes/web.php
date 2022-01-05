<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MypageController;




// 飲食店検索機能
Route::get('/', [ShopController::class, "index"])->name('index');
Route::get('/search', [ShopController::class, "search"])->name('search');
Route::post('/detail/{shop_id}', [ShopController::class, "detail"])->name('detail');

// ユーザー登録機能
Route::get('/register', [UserController::class, "register"])->name('register');
Route::post('/register', [UserController::class, "create"])->name('create');
Route::get('/thanks', [UserController::class, "thanks"])->name('thanks');

// 予約機能
Route::get('/done', [ReserveController::class, "done"])->name('done');

// ログイン前のみ可能な処理
Route::middleware(['guest'])->group(function () {
  // ログイン画面表示
  Route::get('/showLogin', [AuthController::class, "showLogin"])->name('showLogin');
  // ログイン機能
  Route::get('/login', [AuthController::class, "login"])->name('login');
  Route::post('/login', [AuthController::class, "login"])->name('login');
});

// ログイン後のみ可能な処理
Route::middleware(['auth'])->group(function () {
  // マイページ画面を表示
  Route::get('/mypage', [MypageController::class, "mypage"])->name('mypage');
  // ログアウト機能
  Route::post('/logout', [AuthController::class, "logout"])->name('logout');
  // 予約登録機能
  Route::post('/reserve', [ReserveController::class, "reserve"])->name('reserve');
  // 予約削除機能
  Route::post('/delete', [ReserveController::class, "delete"])->name('delete');
  // お気に入り登録機能
  Route::post('/favorite', [FavoriteController::class, "favorite"])->name('favorite');
  // お気に入り解除機能
  Route::post('/unfavorite', [FavoriteController::class, "unfavorite"])->name('unfavorite');
});
