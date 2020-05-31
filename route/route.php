<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', function ($name) {
    return "hello,{$name}";
});

//\think\facade\Route::get('details/:id','address/Index/details');


// 全局参数配置 默认 [\w\-]+
//\think\facade\Route::pattern(
//    [
//        "id" => "\d+",
//        "uid" => "(\d|[a-z]|[A-Z])+",
//    ]
//);

// 全局默认配置
Route::option("https",false);

\think\facade\Route::get('/', 'Index'); // Index 相当于默认的 index/Index

\think\facade\Route::get('ad', 'Address/Index/index');

//\think\facade\Route::rule('details/:id','Address/Index/details','GET|POST')
//    ->name("detail")
//    ->pattern("id",'\d+');

// 多参数  完全匹配后面添加$
\think\facade\Route::rule('search/:id/:uid$', 'address/Index/search', 'GET|POST')
    ->pattern([
        "id" => "\d+",
        "uid" => "(\d|[a-z]|[A-Z])+",
    ]);

// 可选参数
\think\facade\Route::rule('find/:id/[:content]', 'address/Index/find', 'GET|POST');


\think\facade\Route::get('url', 'address/Index/url');

// 组合式变量
\think\facade\Route::get('hello_world/<name>', ':name/hello');

// 多级控制器
\think\facade\Route::get('add', 'address/test.Index/index');

\think\facade\Route::get('details2/:id', 'address/test.Index/details?flag=1')->pattern("id", '\d+');

// 调用静态方法
\think\facade\Route::get('stat/:id', 'app\address\controller\test\Index@stat');

// 外部跳转
//\think\facade\Route::get('goto/baidu','http://baidu.com')->status(302);
\think\facade\Route::redirect('goto/baidu', 'http://baidu.com', 302);

// 模板传值
\think\facade\Route::view('look/:name', 'view/Index/test');


// 强制后缀、https
//\think\facade\Route::rule('details/:id','Address/Index/details','GET|POST',["ext"=>"html|shtml","https"=>false])
//    ->name("detail")
//    ->pattern("id",'\d+');

\think\facade\Route::rule('details/:id', 'Address/Index/details', 'GET|POST')
    ->name("detail")
    ->pattern("id", '\d+')
    ->https(false)
//    ->filter(["id" => 10]) // 额外参数
    ->ext("html|shtml")
    ->denyExt("py|pyc|php5|php"); // 禁用后缀

// 模型绑定
Route::get("student/:studentId","address/Index/getStudent")
    ->model("studentId","\app\db\model\Student")
;

Route::get("s","short/Index/index");

// 快捷路由
Route::controller("sh","short/Index");

// 分组路由
//Route::group(
//    'col',
//    [
//        ":id" => "collect/Index/read",
//        ":name" => "collect/Index/who"
//    ]
//)
//    ->pattern(["id"=>"\d+$","name"=>"\w+$"])
//    ->ext("");
//
// 闭包形式
//Route::group(
//    'col',
//    function (){
//        Route::get(":id","collect/Index/read");
//        Route::get(":name","collect/Index/who");
//    }
//)
//    ->pattern(["id"=>"\d+$","name"=>"\w+$"])
//    ->ext("");
//
// 简化前缀
//Route::group(
//    'col',
//    function (){
//        Route::get(":id","read");
//        Route::get(":name","who");
//    }
//)
//    ->prefix("collect/Index/")
//    ->pattern(["id"=>"\d+$","name"=>"\w+$"])
//    ->ext("")
//    ->append(
//        [
//            "flag" => 1
//        ]
//    ) // 额外参数
//;

// MISS 路由
// 全局
//Route::miss('error/miss');

// 分组 路由
Route::group(
    'col2',
    function (){
        Route::get(":id","read");
        Route::miss("miss");
    }
)
    ->prefix("collect/Index/")
    ->pattern(["id"=>"\d+$","name"=>"\w+$"])
    ->ext("")
    // 添加额外参数
    ->append(
        [
            "flag" => 1
        ]
    )
    // 跨域请求
    ->header("Access-Control-Allow-Origin", "http://localhost")
    ->allowCrossDomain()
;


// 路由绑定
//Route::bind("testAdmin");
//Route::bind('\app\test_admin\controller\Index');
//Route::bind(':\app\test_admin\controller');

// 别名路由 (TP6已废弃)
Route::alias("admin","test_admin/Index"); // 访问路径 admin/read/?id=1

// 资源路由
// 自动提供以下方法
// GET      : blog(index) blog/create blog/read/:id(blog/read) edit/:id/edit(blog/edit)
// POST     : blog(blog/save)
// PUT      : blog/:id(blog/update)
// DELETE   : blog/:id(blog/delete)

//Route::rest(["create" => ["GET","/add/:id","create"]]);

Route::resource("blog",'index/Blog')
//    ->vars(["blog"=>"blog_id"]) // 默认传值为id,可使用 vars 更改,方法中的变量名需一致
//    ->only(["index","save","create"]) // 限定可使用的资源方法
//    ->except(["index","save","create"]) // 限定不可被使用的资源方法
//        修改系统默认方法
//    ->rest('create',["GET","/add/:id","create"]) // 单个
    ->rest(["create" => ["GET","/add/:id","create"]]) // 多个
;

// 嵌套路由
// 默认生成规则 blog/:blog_id/comment/:id
Route::resource("blog.comment","index/Comment")
    ->vars(['blog'=>"blog_id"]) // 可通过 vars 更改默认传入变量名,方法中的变量名需一致
;

// 域名路由
// 数组形式
//Route::domain('news.localhost',["edit/:id"=>"collect/Index/edit"]);
// 闭包形式
Route::domain(['news.localhost','www.localhost','localhost'],function(){
    Route::get("edit/:id","collect/Index/edit");
});
// 链式调用
//Route::get("edit/:id","collect/Index/edit")
//    ->domain('news.localhost')
//    ->option("domain",'www.localhost')
;


//Route::get("bc","index/Blog/create");
Route::get("br/:id","index/Blog/read");

// 局部缓存
Route::get("rely/edit/:id","rely/Index/edit")
    ->cache(3600)
;

// 局部 路由中间件
// 中间件所在目录 application/http/middlewlare/
//Route::get("read/:id","inject/index/read")
////    ->middleware(app\http\middleware\Check::class)
////    ->middleware('app\http\middleware\Check')
////    ->middleware('Check')
////    ->middleware(['Check',]) // 调用多个
////    ->middleware(['Check:from route',]) // 传值
//    ->middleware([
//        ['Check','array route']
//    ]) // 数组传值
//;

// 路由验证
//Route::get('vRead/:id','verify/Index/read')
//    ->validate(\app\common\validate\Test2::class,'insert')
////    ->validate(\app\common\validate\Test2::class,'update')
//;
Route::get('vRead/:id','verify/Index/read')
    ->validate([
        'id' => 'number|between:1,10',
        'email' => 'email'
    ],
        'update',  // 场景
        [                 // 错误信息
        'id.number' => 'id 必须为数字'
    ],
    true) // 批量验证
;

Route::get('response403',response()->code(403));

return [

];
