<?php
/* ########################################
*     Author: netren
*     Date: 2020-11-29 16:29:58
*     Description:返回错误页
######################################## */


namespace app\controller;

use think\facade\Lang;

class Error extends Base
{
  /**
   * @description:找不到控制器
   * @return {404 Not Found}
   */
  public function index()
  {
    return $this->create([], Lang::get('Not Found'), 404);
  }
}
