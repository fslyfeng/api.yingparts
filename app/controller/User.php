<?php

declare(strict_types=1);

namespace app\controller;

use think\Request;
use app\model\User as UserModel;
use think\facade\Validate;
use think\facade\Lang;

class User extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //获取数据列表
        $data = UserModel::select();
        //判断是否有数据
        if ($data->isEmpty()) {
            return $this->create(
                $data,
                '数据不存在',
                400
            );
        } else {
            return $this->create(
                $data,
                '数据请求成功',
                201
            );
        }
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        $data = UserModel::field('id,username,password,email')->find($id);

        //判断id是否整型
        if (!Validate::isInteger($id)) {
            return $this->create(
                [],
                Lang::get('Bad Request'),
                400
            );
        }

        //判断是否有数据
        if (empty($data)) {
            return $this->create(
                [],
                Lang::get('No Content'),
                204
            );
        } else {
            return $this->create(
                $data,
                Lang::get('OK'),
                200
            );
        }
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
