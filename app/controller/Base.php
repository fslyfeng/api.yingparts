<?php

namespace app\controller;

use think\Response;

abstract class Base
{
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
