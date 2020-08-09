<?php
/**
 * Created by PhpStorm.
 * User: Vae
 * Date: 2020/7/27
 * Time: 15:38
 */

namespace app\controller;


use think\Db;

class Search
{
    public function index()
    {
//        //$result =   Db::name('user')->where('id',245)->select();
//
//        $result = Db::name('user')->where('id', '<', 245)->select();
//        //return Db::GetlastSql();
//        return json($result);
//        $result = Db::name('user')->where('create_time', '> time', '2020-1-1')->select();
//        $result = Db::name('user')->where('create_time', 'between time', ['2016-8-27','2020-1-1'])->select();
//        return Db::getlastSql();
//        $result = Db::name('user')->whereTime('create_time','-2 min')->select(); 这个是查询这个时间内的数据
//          $result = Db::name('user')->whereBetweenTimeField('create_time', 'create_time')->select();
//        return Db::getlastSql();
//        $result = Db::name('user')->count('uid');
//               $result = Db::name('user')->max('price',false);  查询最大值
//          $subQuer = Db::name('user')->fetchSql()->select();  子查询
//        $subQuer = Db::name('two')->field('uid')->where('gender','男')->buildSql();
//        $result = Db::name('one')->where('id','exp','in'.$subQuer)->select();
//        $result = Db::name('one')->where('id', 'in', function($query) {
////            $query->name('two')->field('uid')->where('gender', '男');
////        })->select();
///
        $result = Db::name('one')->where('id', 'in', function ($query)
        { $query->name('two')->where('gender', '男')->field('uid'); })->select();


        return Db::getLastSql();
        return json($result);

    }
}