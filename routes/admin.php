<?php
/**
 * Created by PhpStorm.
 * User: weishanyun
 * Date: 2020/4/18
 * Time: 21:02
 */


Route::any('/login','LoginController@login');

Route::get('/','IndexController@index');
Route::get('/index','IndexController@index');
Route::get('/main','IndexController@main');
Route::get('/menu','IndexController@menu');

Route::prefix('adminuser')->group(function () {
    Route::get('index','System\AdminUserController@index');
    Route::any('add','System\AdminUserController@add');
});
