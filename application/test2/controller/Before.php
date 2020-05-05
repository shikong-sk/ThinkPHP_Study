<?php
namespace app\test2\controller;

use think\Controller;

class Before extends Controller {

    public function _empty($name){
        return "$name 方法不存在";
    }

    protected $beforeActionList = [
        'first',
        'second' => ['except'=>'one'],
        'third' => ['only'=>'three']
    ];

    protected function first(){
        echo 'first <br>';
    }

    protected function second(){
        echo 'second <br>';
    }

    protected function third(){
        echo 'third <br>';
    }

    protected $flag = false;

    public function index(){
        if($this->flag)
        {
            $this->success('成功','../');
        }
        else{
            $this->error('失败');
        }
        return 'index';
    }

    public function one(){
        return 'one';
    }

    public function two(){
        return 'two';
    }

    public function three(){
        return 'three';
    }
}