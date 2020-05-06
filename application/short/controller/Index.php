<?php


namespace app\short\controller;


use think\Controller;

class Index extends Controller
{
    public function index(){
        return "index";
    }

    // 快捷路由 GET 方式 访问 info
    public function getInfo(){
        return "getInfo";
    }
    // 快捷路由 POST 方式 访问 info
    public function postInfo(){
        return "postInfo";
    }
}