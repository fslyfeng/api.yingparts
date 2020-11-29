<?php

namespace app\controller;

use think\facade\Config;
use think\facade\Request;
use think\Response;

abstract class Base
{
  protected $pageSize;
  public function __construct()
  {
    //获取每分页条数
    $this->pageSize = (int)Request::param('page_size', Config::get('app.page_size'));
  }

  protected function create($data, $msg = '', $code = 200, $type = 'json')
  {
    //标准api结构生成

    $result = [
      //状态码
      'code' => $code,
      //消息
      'msg' => $msg,
      //数据
      'data' => $data

    ];
    //返回api接口
    return Response::create($result, $type);
  }
}
