<?php

namespace app\controller;

class Error extends Base
{
  //404
  public function index()
  {
    return $this->create([], '资源不存在', 404);
  }
}

