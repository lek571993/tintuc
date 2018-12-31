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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin' , 'namespace'=>'backend', 'middleware'=>'admin'], function () {

    Route::group(['prefix'=>'cate'], function () {
        Route::get('list', ['as'=>'admin.cate.getList', 'uses'=>'CateController@getList']);
        Route::get('add', ['as'=>'admin.cate.getAdd', 'uses'=>'CateController@getAdd']);
        Route::post('add', ['as'=>'admin.cate.postAdd', 'uses'=>'CateController@postAdd']);
        Route::get('del/{id}',['as'=>'admin.cate.getDelete', 'uses'=>'CateController@getDelete']);
        Route::get('edit/{id}',['as'=>'admin.cate.getEdit', 'uses'=>'CateController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.cate.postEdit', 'uses'=>'CateController@postEdit']);
    });

    Route::group(['prefix'=>'user'], function () {
        Route::get('index', ['as'=>'admin.index', 'uses'=>'UserController@getIndex']);
        Route::get('list', ['as'=>'admin.user.getList', 'uses'=>'UserController@getList']);
        Route::get('add', ['as'=>'admin.user.getAdd', 'uses'=>'UserController@getAdd']);
        Route::post('add', ['as'=>'admin.user.postAdd', 'uses'=>'UserController@postAdd']);
        Route::get('del/{id}',['as'=>'admin.user.getDelete', 'uses'=>'UserController@getDelete']);
        Route::get('edit/{id}',['as'=>'admin.user.getEdit', 'uses'=>'UserController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.user.postEdit', 'uses'=>'UserController@postEdit']);
    });

    Route::group(['prefix'=>'news'], function () {
        Route::get('list', ['as'=>'admin.news.getList', 'uses'=>'NewsController@getList']);
        Route::get('add', ['as'=>'admin.news.getAdd', 'uses'=>'NewsController@getAdd']);
        Route::post('add', ['as'=>'admin.news.postAdd', 'uses'=>'NewsController@postAdd']);
        Route::get('del/{id}',['as'=>'admin.news.getDelete', 'uses'=>'NewsController@getDelete']);
        Route::get('edit/{id}',['as'=>'admin.news.getEdit', 'uses'=>'NewsController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.news.postEdit', 'uses'=>'NewsController@postEdit']);
    });
});
Route::get('login', ['as'=>'admin.getLogin', 'uses'=>'backend\LoginController@getLogin']);
Route::post('login', ['as'=>'admin.postLogin', 'uses'=>'backend\LoginController@postLogin']);
Route::get('logout', ['as'=>'admin.getLogout', 'uses'=>'backend\LoginController@getLogout']);

Route::group(['prefix'=>'user', 'namespace'=>'frontend'], function() {
   Route::get('index', ['as'=>'user.getIndex', 'uses'=>'MainController@getIndex']);
   Route::get('detail/{id}', ['as'=>'user.getDetail', 'uses'=>'MainController@getDetail']);
   Route::get('cateNew/{id}', ['as'=>'user.getCateNew', 'uses'=>'MainController@getCateNew']);
});