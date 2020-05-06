<?php


namespace app\rely\controller;

// 方法 1
//use think\Controller;
//
//class Index extends Controller
//{
//    public function index(){
//        return $this->request->param('name');
//    }
//}

// 方法 2
//use think\Request;
//
//class Index
//{
//    public function index(Request $request)
//    {
//        return $request->param('name');
//    }
//}

// 方法 3
//use think\Request;
//
//class Index
//{
//    protected $request;
//
//    public function __construct(Request $request)
//    {
//        $this->request = $request;
//    }
//
//    public function index()
//    {
//        return $this->request->param("name");
//    }
//}

// 方法 4
use think\facade\Request;

class Index
{
    public function index()
    {
        return Request::url(true);
//        return Request::param("name");
    }
}

//方法 5
//class Index
//{
//    public function index()
//    {
//        return request()->param("name");
//    }
//}