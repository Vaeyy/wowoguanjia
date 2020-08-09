<?php
/**
 * Created by PhpStorm.
 * User: Vae
 * Date: 2020/7/24
 * Time: 14:18
 */

namespace app\controller;

use think\Request;

class Error
{
    public function index(Request $r)
    {
        return '此控制器不存在' . $r->controller();
    }
}