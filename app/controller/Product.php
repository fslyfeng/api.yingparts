<?php
declare(strict_types = 1);

namespace app\controller;

use think\Request;
// use app\model\User as ProductModel;
use think\facade\Db;
class Product
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $query = Db::connect('read_sql') -> table('spxx') -> select();
        return json($query);
        // phpinfo();
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
