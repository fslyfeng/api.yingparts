<?php

use think\facade\Route;
//主路由
Route::get('/', 'Index/index');
//用户模块
Route::resource('user', 'User');
//一对多用户地址
Route::get('user/:id/access', 'user/access');
//用户登录
Route::post('login', 'user/login');
