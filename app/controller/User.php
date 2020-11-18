<?php

declare(strict_types=1);

namespace app\controller;

use think\Request;

use  app\model\User as UserModel;


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
        $data = UserModel::field('id,username')->select();
        //判是是否有值
        return $this->create($data,$data->isEmpty()?'数据不存在':'数据请求成功');
        // if ($data->isEmpty()) {
        //     return $this->create($data, '数据不存在');
        // } else {
        //     return $this->create($data, '数据请求成功');
        // }
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        echo 'read';
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
