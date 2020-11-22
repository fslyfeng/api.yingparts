<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;
use think\route\Rule;

Route::get('think', function () {
    return 'hello,ThinkPHP6!';
});

Route::get('hello/:name', 'index/hello');

//用户模块
Route::resource('user', 'User');
//一对多用户地址

Route::get('user/:id/access', 'user/access');
