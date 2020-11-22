<?php

namespace app\model;

use think\Model;

class User extends Model
{
  public function access()
  {
    return $this->hasMany(Access::class, 'user_id', 'id');
  }
}
