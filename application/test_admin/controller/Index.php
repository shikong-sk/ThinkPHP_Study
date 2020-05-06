<?php


namespace app\test_admin\controller;


class Index
{
    public function index(){
        return "testAdmin index";
    }

    public function read($id){
        return "read id : $id";
    }
}