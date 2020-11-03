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

// ホームページ
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

// インデックス
Route::get('/projects/tasks', 'App\Http\Controllers\TaskController@index')->name('tasks.index');
// プロジェクト作成
Route::get('/projects/create','App\Http\Controllers\ProjectController@showCreateForm')->name('projects.create');
Route::post('/projects/create', 'App\Http\Controllers\ProjectController@create');

// タスク作成
Route::get('/tasks/create', 'App\Http\Controllers\TaskController@showCreateForm')->name('tasks.create');
Route::post('/tasks/create', 'App\Http\Controllers\TaskController@create');

// タスク編集
Route::get('/tasks/{id}/edit', 'App\Http\Controllers\TaskController@showEditForm')->name('tasks.edit');
Route::post('/tasks/{id}/edit', 'App\Http\Controllers\TaskController@edit');

// タスク実行
Route::get('/tasks/{id}/run', 'App\Http\Controllers\TaskController@showRunForm')->name('tasks.run');
Route::post('/tasks/{id}/run', 'App\Http\Controllers\TaskController@run');
