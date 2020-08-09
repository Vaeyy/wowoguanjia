<?php
/**
 * Created by PhpStorm.
 * User: Vae
 * Date: 2020/7/24
 * Time: 12:53
 */

namespace app\controller;


use think\Controller;

class Before extends Controller
{
    protected $beforeActionList = [
        'first',
        //one方法执行不调用 second前置
        'second' => ['except' => 'one'],
        //third 前置只能通过调用one和 two方法触发
        'third' => ['only' => 'one,two'],
    ];
    protected $flag = false;

    protected function first()
    {
        echo 'first</br>';
    }

    protected function second()
    {
        echo 'second</br>';
    }

    protected function third()
    {
        echo 'third</br>';
    }

    //空方法拦截
    public function _empty($name)
    {
        return '此' . $name . '方法不存在';
    }

    public function index()
    {
        if ($this->flag) {
            //如果不指定url，则返回$_SERVER['HTTP_REFERER']
            $this->success('注册成功', './');
        } else {
            //自动返回前一页
            $this->error('注册失败');
        }
        return 'index';
    }

    public function one()
    {
        return 'one';
    }

    public function two()
    {
        return 'two';
    }

}