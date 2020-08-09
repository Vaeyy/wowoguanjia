<?php
/**
 * Created by PhpStorm.
 * User: Vae
 * Date: 2020/7/24
 * Time: 15:56
 */

namespace app\controller;

use app\model\User;
use think\Controller;
use think\Db;
use think\db\Where;

class DataTest extends Controller
{
    public function index()
    {
        $user = Db::name('user');
        $data1 = $user->where('id', 27)->order('id', 'desc')->find();
        $data = $user->removeOption('where')->removeOption('order')->select();
        return Db::getLastSql();
        //return json($data1);
    }

    public function insert()
    {
        $data = [
            'username' => '辉夜',
            'password' => 123456,
            'gender' => '女',
            'email' => '13124532@qq.com',
            'price' => 90,
            'details' => '123',
            'create_time' => date('Y-m-d H:i:s')
        ];
        return Db::name('user')->insertGetId($data);
    }

    public function insertAll()
    {

        $dataAll = [
            [
                'username' => '辉夜1',
                'password' => 123456,
                'gender' => '女',
                'email' => '13124532@qq.com',
                'price' => 90,
                'details' => '123',
                'create_time' => date('Y-m-d H:i:s')
            ],
            [
                'username' => '辉夜2',
                'password' => 123456,
                'gender' => '女',
                'email' => '13124532@qq.com',
                'price' => 90,
                'details' => '123',
                'create_time' => date('Y-m-d H:i:s')

            ],
            [
                'username' => '辉夜3',
                'password' => 123456,
                'gender' => '女',
                'email' => '13124532@qq.com',
                'price' => 90,
                'details' => '123',
                'create_time' => date('Y-m-d H:i:s')
            ]
        ];

        return Db::name('user')->insertAll($dataAll);

    }


    public function update()
    {

        $data = [
            'username' => '李白',

        ];
        Db::name('user')->where('id', 245)->inc('price')->update($data);
    }

    public function delete()
    {
        Db::name('user')->delete(246);//直接删除的是这个ID的数据
    }

    public function getNoModelData()
    {
        //$data = Db::name('user')->select();
        //$data = Db::table('tp_user')->select();

    }

    public function getModelData()
    {
        $data = User::select();
        return json($data);
    }
}