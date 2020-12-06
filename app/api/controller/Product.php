<?php

declare(strict_types=1);

namespace app\api\controller;

use app\model\Product as ProductModel;
use think\facade\Validate;
use think\facade\Lang;
use think\Request;

class Product extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($page = 1)
    {
        //获取数据列表
        $data = ProductModel::paginate([
            'list_rows' => $this->pageSize,
            'page' => $page,
        ]);
        //判断是否有数据
        if ($data->isEmpty()) {
            return $this->create(
                [],
                Lang::get('code.No Content'),
                204
            );
        } else {
            return $this->create(
                $data,
                Lang::get('code.OK'),
                200
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
        $data = ProductModel::field('id,lbid,spmc,sj')->find($id);

        //判断id是否整型
        if (!Validate::isInteger($id)) {
            return $this->create(
                [],
                Lang::get('code.Bad Request'),
                400
            );
        }

        //判断是否有数据
        if (empty($data)) {
            return $this->create(
                [],
                Lang::get('code.No Content'),
                204
            );
        } else {
            return $this->create(
                $data,
                Lang::get('code.OK'),
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
    public function pic($id)
    {
        //判断id是否整型
        if (!Validate::isInteger($id)) {
            return $this->create(
                [],
                Lang::get('code.Bad Request'),
                400
            );
        }

        //按id查询图片地址id
        $pic_id = ProductModel::find($id);

        //判断是否有数据
        if (empty($pic_id)) {
            return $this->create(
                [],
                Lang::get('code.No Content'),
                204
            );
        } else {
            //再用id查出相应pic表的数据
            $data = ProductModel::find($id)->pic()->field('id,product_id,product_url')->select();
            return $this->create(
                $data,
                Lang::get('code.OK'),
                200
            );
        }
    }
}
