<?php


namespace app\address\controller;


use app\db\model\Student;

class Index
{
    public function index(){
        return "路由功能测试";
    }

    public function details($id){
        return "details 获取的id值为 ： {$id}";
    }

    public function search($id,$uid){
        return "search 调用的 id : {$id} , uid : {$uid}";
    }

    public function find($id,$content = null){
        return "find 调用的 id : {$id} , content : {$content}";
    }

    public function url(){
//        return url('Address/details',["id"=>10]);
        return url("detail",["id"=>10]);
    }

    function getStudent(Student $student){
        return json($student);
    }

}