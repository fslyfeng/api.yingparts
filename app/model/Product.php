<?php

namespace app\model;

use think\Model;

class Product extends Model
{
  // 设置当前模型对应的完整数据表名称
  protected $table = 'spxx';

  // 设置当前模型的数据库连接
  protected $connection = 'read_sql';

  public function pic()
  /***
  * @ description:与pic表连接
  * @ param {*}
  * @ return \think\model\relation\HasMany
  */
  {
    return $this->hasMany(Pic::class, 'product_id', 'id');
  }
}
