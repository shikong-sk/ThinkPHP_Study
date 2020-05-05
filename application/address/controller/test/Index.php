<?php


namespace app\address\controller\test;

// 多级控制器访问方法 /address/test.控制器/方法

class Index
{
    public function index(){
        return "多级控制器 路由功能测试";
    }

    public function details($id){
        return "多级控制器 details 获取的id值为 ： {$id}";
    }

    public function search($id,$uid){
        return "多级控制器 search 调用的 id : {$id} , uid : {$uid}";
    }

    public function find($id,$content = null){
        return "多级控制器 find 调用的 id : {$id} , content : {$content}";
    }

    public function url(){
//        return url('Address/details',["id"=>10]);
        return url("detail",["id"=>10]);
    }

    public static function stat($id){
        return "stat 调用的 id : {$id}";
    }
}