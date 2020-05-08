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
use think\exception\ErrorException;
use think\exception\HttpException;
use think\facade\Hook;
use think\facade\Log;

class Index extends Controller
{

//    控制器中间件
//    protected $middleware = ['Check']; // 对所有方法生效
    protected $middleware = [
        "Check:controller" => [     // 传值
            "only" => ["index"], // 只对指定方法生效
//            "except" => ["read"], // 只对指定方法不生效
        ],
    ];

    public function expection()
    {
//        echo env("think_path");
//        echo env("app_path");

//        return 0/0;

//        throw new \Exception('测试异常',10086);

        try {
            return 0 / 0;
        } catch (ErrorException $e) {
            echo $e->getMessage();

//            Log::record($e->getMessage() . " : 被除数不能为0",'error');
            trace($e->getMessage() . " : 被除数不能为0",'error');
        }

//        throw new HttpException(500,"HTTP 异常测试");
        abort(500,"Http 异常测试");


    }

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
