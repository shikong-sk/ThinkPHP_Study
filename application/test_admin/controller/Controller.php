<?php


namespace app\test_admin\controller;


class Controller
{
    public function index(){
        return "testAdmin Controller index";
    }

    public function read($id){
        return "app\\test_admin\\controller Controller read id : $id";
    }
}