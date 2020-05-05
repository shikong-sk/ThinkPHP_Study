<?php
namespace app\test2\controller;

use think\Request;

class Error{
    public function index(Request $request){
        return "{$request->controller()} 控制器不存在";
    }
}