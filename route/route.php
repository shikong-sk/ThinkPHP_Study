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

return [

];
