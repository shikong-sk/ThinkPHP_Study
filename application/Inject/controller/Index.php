<?php


namespace app\Inject\controller;

// 依赖注入
//class Index
//{
//    protected $inject;
//
//    public function __construct(Inject $inject)
//    {
//        $this->inject = $inject;
//    }
//
//    public function index(){
//        return $this->inject->name;
//    }
//}

// 容器
//use app\common\Test;

use app\facade\Test;
use think\Controller;
use think\facade\Hook;

class Index extends Controller
{

//    控制器中间件
//    protected $middleware = ['Check']; // 对所有方法生效
    protected $middleware = [
        "Check:controller" => [     // 传值
//            "only" => ["index"], // 只对指定方法生效
            "except" => ["read"], // 只对指定方法不生效
        ],
    ];

    public function index()
    {
//        bind('inject',"app\Inject\controller\inject");
//        return app("inject")->name;

//        批量绑定
//        bind([
//            'one' => "app\Inject\controller\inject",
//            "two" => "app\Inject\controller\inject"
//        ]);
//        bind([
//            'one' => \app\Inject\controller\inject::class,
//            "two" => \app\Inject\controller\inject::class
//        ]);
//        return app("two")->name;

        // 重新实例化
//        $inject = app("inject",true);
//        return $inject->name;

        // 直接实例化
        echo app('request')->param("name");
        echo "<br>\n";
        $inject = app("app\Inject\controller\inject");
        return $inject->name;
    }

    public function test()
    {
//        $test = new Test();
//        return $test->hello("shikong");

        return Test::hello("shikong");
    }

    public function behavior()
    {
        Hook::listen("test", "test 钩子");
    }

    public function read($id)
    {
        return "read $id";
    }
}
