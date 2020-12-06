<?php

use think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP6!';
});

Route::get('/', 'Index/index');

//用户模块
Route::resource('user', 'User');
Route::post('user', 'User/save');

//产品模块
Route::resource('product', 'Product');

//产品图片
Route::get('product/:id/pic', 'Product/pic');

//用户登陆
Route::post('login', 'User/login');
