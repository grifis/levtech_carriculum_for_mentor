<?php

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

Route::get('/', 'ThemeController@index'); //一覧画面

Route::get('/themes/{theme}/make', 'ThemeController@make');
Route::get("/rainy", "ThemeController@rainy");
Route::get('/themes/create', 'ThemeController@create'); //投稿作成画面
Route::get('/themes/{theme}/edit', 'ThemeController@edit'); //投稿編集画面
Route::put('/themes/{theme}', 'ThemeController@update'); //編集操作
Route::get('/themes/{theme}', 'ThemeController@show'); //投稿詳細画面
Route::post('/themes', 'ThemeController@store'); //投稿保存操作
Route::delete('/themes/{theme}', 'ThemeController@delete'); //投稿削除
//Route::get('/categories/{category}', 'CategoryController@index'); //カテゴリー一覧画面
