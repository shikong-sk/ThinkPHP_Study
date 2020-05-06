<?php


namespace app\collect\controller;


use think\Controller;
use think\facade\Url;

/**
 * Class Index
 * @package app\collect\controller
 * @route("col")
 */
class Index extends Controller
{
    public function index(){
//        return "index";
//        return Url::build("index/Blog/create");
//        return Url::build("index/Blog/read","id=5");
//        return Url::build("index/Blog/read",["id"=>5]);
//        return Url::build("index/Blog/read",["id"=>5],"");

//        指定根路径
//        Url::root('/public/index.php');

        return Url::build("index/Blog/read",["id"=>5],"");
    }


    // 注解路由
    /**
     * @param $id
     * @return string
     * @route('col/:id','get')
     * ->ext("")
     * ->pattern([
     *  "id" => "\d+$"
     * ])
     *
     */
    public function read($id){
        dump("flag = ".$this->request->param("flag"));

        return "read id : {$id}";
    }

    public function who($name){
        return "who is {$name}";
    }

    public function miss()
    {
        return "col miss";
    }

    public function edit($id){
        return "col edit $id";
    }
}