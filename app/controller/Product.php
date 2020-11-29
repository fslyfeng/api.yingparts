<?php

declare(strict_types=1);

namespace app\controller;

use think\Request;
use app\model\Product as ProductModel;
class Product extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //获取数据列表
        $data = ProductModel::field('id,lbid,spmc')->select();
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
        //
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
