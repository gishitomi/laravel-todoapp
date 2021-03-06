<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// ホームページ
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

// 会員登録・ログイン・ログアウト・パスワード再設定の各機能で必要なルーティング設定をすべて定義
Auth::routes();

// ゲストログイン
ROute::get('/login/guest', 'App\Http\Controllers\Auth\LoginController@guestLogin')->name('guest.login');



// ページ認証...ログインしていないとアクセスできないようにする
Route::group(['middleware' => 'auth'], function () {
    // インデックス
    Route::get('/projects/tasks', 'App\Http\Controllers\TaskController@index')->name('tasks.index');
    // プロジェクト作成
    Route::get('/projects/create', 'App\Http\Controllers\ProjectController@showCreateForm')->name('projects.create');
    Route::post('/projects/create', 'App\Http\Controllers\ProjectController@create');

    // タスク作成
    Route::get('/tasks/create', 'App\Http\Controllers\TaskController@showCreateForm')->name('tasks.create');
    Route::post('/tasks/create', 'App\Http\Controllers\TaskController@create');
    // タスク編集
    Route::get('projects/tasks/{id}/edit', 'App\Http\Controllers\TaskController@showEditForm')->name('tasks.edit');
    Route::post('projects/tasks/{id}/edit', 'App\Http\Controllers\TaskController@edit');

    // タスク実行
    Route::get('projects/tasks/{id}/run', 'App\Http\Controllers\TaskController@showRunForm')->name('tasks.run');
    Route::post('projects/tasks/{id}/run', 'App\Http\Controllers\TaskController@run');
});
