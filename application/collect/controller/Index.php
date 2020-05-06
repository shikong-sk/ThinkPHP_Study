<?php


namespace app\collect\controller;


use think\Controller;

/**
 * Class Index
 * @package app\collect\controller
 * @route("col")
 */
class Index extends Controller
{
    public function index(){
        return "index";
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
}