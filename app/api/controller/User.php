<?php

declare(strict_types=1);

namespace app\api\controller;

use think\Request;
use app\model\User as UserModel;
use think\exception\ValidateException;
use think\facade\Validate;
use app\validate\User as UserValidate;
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
                [],
                Lang::get('code.Bad Request'),
                400
            );
        } else {
            return $this->create(
                $data,
                Lang::get('code.OK'),
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
        //获取数据
        $data = $request->param();
        //验证返回
        try {
            //验证
            validate(UserValidate::class)->check($data);
        } catch (ValidateException $exception) {
            //错误返回
            return $this->create(
                [],
                $exception->getError(),
                400
            );
        }
        // 密码加密,采用sha1算法
        $data['password'] =  hash('sha256', $data['password']);
        //写入用户信息并返回id
        $id = UserModel::create($data)->getData('id');
        //判断是否有id数据，注册成攻
        if (empty($id)) {
            return $this->create(
                [],
                Lang::get('code.fail to register'),
                400
            );
        } else {
            return $this->create(
                $data,
                Lang::get('code.registration success'),
                200
            );
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //判断id是否整型
        if (!Validate::isInteger($id)) {
            return $this->create(
                [],
                Lang::get('code.Bad Request'),
                400
            );
        }

        $data = UserModel::field('id,username,password,email')->find($id);

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
        //获取数据

        $data = $request->param();
        //验证返回
        try {
            //验证
            validate(UserValidate::class)->scene('edit')->check($data);
        } catch (ValidateException $exception) {
            //错误返回
            return $this->create(
                [],
                $exception->getError(),
                400
            );
        }
        //获取数据
        $updataData = UserModel::find($id);

        //如果修改数据与之前的相同则
        //邮箱
        if ($updataData->email === $data['email']) {
            return $this->create([], Lang::get('validate.Same email'), 400);
        }
        //修改数据
        $id = UserModel::update($data)->getData('id');
        //判断是否有数据
        if (empty($id)) {
            return $this->create(
                [],
                Lang::get('info.Changes failed'),
                204
            );
        } else {
            return $this->create(
                "(" . $id . ")",
                Lang::get('info.Update successfully'),
                200
            );
        }
    }



    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {

        //判断id是否整型
        if (!Validate::isInteger($id)) {
            return $this->create(
                [],
                Lang::get('code.Bad Request'),
                400
            );
        }
        // 删除数据
        try {
            UserModel::find($id)->delete();
            return $this->create(
                [],
                Lang::get('code.OK'),
                200
            );
        } catch (\Error $e) {
            return $this->create(
                [],
                Lang::get('code.Not Found'),
                400
            );
        }
    }
    public function login(Request $request)
    {
        $data = $request->param();
        //验证用户名和密码
        $result = Validate::rule([
            'username' => 'unique:user,username^password'
        ])->check([
            'username' => $data['username'],
            'password' => hash('sha256', $data['password']),
        ]);
        //判断用户数据与填入数据是否一致，结果为反值
        if ($result) {
            return $this->create(
                false,
                Lang::get('info.Login failed'),
                400
            );
        } else {
            return $this->create(
                true,
                Lang::get('info.Login successfully'),
                200
            );
        };
    }
}
