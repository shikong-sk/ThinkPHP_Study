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
use think\facade\Url;

class Index
{
    public function index()
    {
//        /public/rely/index/index?name=123>132&id=12O3

//        return Request::url(true);
//        return Request::param("name");

        // 默认值
        dump(Request::param('test', 'test'));

        dump(Request::has("id"));
        dump(Request::has("name", "get"));
        dump(Request::has("name", "post"));

        // 获取请求中 name 的值
        dump(Request::param("name"));
        // 获取所有请求的变量 (数组)
        dump(Request::param());
        // 获取所有请求的变量(原始数据) 不含上传的数据 不过滤字符串
        dump(Request::param(false));
        // 获取上传的数据(multipart/form-data) 会过滤字符串
        dump(Request::param(true));

        // 指定过滤器
        dump(Request::param("name", '', 'htmlspecialchars'));

//        // 只获取指定变量
//        dump(Request::only(["id"=>"id","name"=>"name"],'get'));

        // 不获取指定变量
//        dump(Request::except(["id"],'get'));

        // 类型转换
        // /s 字符串(默认)  /d 整数  /b 布尔  /a 数组  /f 浮点
        dump(Request::param("id/d"));

        dump(input("?get.id")); // 判断 GET 请求是否存在 变量 id
        dump(input("?post.name")); // 判断 POST 请求是否存在 变量 name
        dump(input("?param.id")); // 判断 所有类型 请求是否存在 变量 id
        dump(input("param.id", "test")); // 获取 变量 id 的值
        dump(input("param.test", "test")); // 默认值
        dump(input("param.name", "", "htmlspecialchars")); // 过滤器
        dump(input("param.id/d")); // 类型转换

    }

    public function read(\think\Request $request)
    {
        return $request->name;
    }

    public function edit($id)
    {

        dump(Request::param("id"));
        dump(Request::get("id"));   // get请求变量
        dump(Request::route("id")); // 路由请求变量
        return $id;
    }

    public function method()
    {

        echo "请求类型 " . Request::method();  // 可获取请求类型 可伪装 _method 为 POST GET 等
        echo "<br> \n";
        echo Request::method(true); // 原始请求

        dump(Request::isGet());
        dump(Request::isPost());
        dump(Request::isAjax()); // 只能用此方法判断是否 ajax 可伪装 _ajax=1
        dump(Request::isPjax()); // 只能用此方法判断是否 pjax 可伪装 _pjax=1

        // 获取 http 头信息
        dump(Request::header());
        dump(Request::header("host"));
    }

    public function url()
    {
//        return Request::url();

        // 获取访问成功的 伪静态后缀
        echo Request::ext();
        echo "<br> \n";
        return Url::build();
    }

    public function get($id, $name)
    {
        return "get $id,$name";
    }

    public function res()
    {
        $data = "Hacker-Shikong";

        // 相应状态码
//        return response($data,200);
        return response($data)
            ->code(202)
            ->header([
                'token'=>mt_rand(99999+1,999999),
                "Cache-controll" => "no-cache must-revalidate"
            ])
            ;
    }

    public function redirect(){
        // 重定向
//        网址
//        return redirect("http://baidu.com");
//        路由 、 相对地址
//        return redirect("edit/5");
//        return redirect("/public/details/5.html");

        // 传参
//        return redirect('rely\edit',["id"=>"5"]);
        return redirect('read')->params(["name"=>"sk"]);
    }

    public function down(){
        // 文件下载
//        默认 根/public 下的路径
//        return download("static/css/test.css","t");
        $data = "一段文本数据";
        return download($data,"t.txt",true);
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