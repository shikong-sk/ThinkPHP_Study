<?php


namespace app\sundry\controller;


use think\facade\Cookie;
use think\facade\Lang;
use think\facade\Request;
use think\facade\Session;


class Index
{
    public function index(){

    }

    public function session(){
        // session 功能 支持二维数组

        // 初始化
        Session::init([
            // SESSION 前缀
            'prefix'         => 'shikong',
            // 是否自动开启 SESSION
            'auto_start'     => true,
        ]);

        dump(Session::prefix());

        Session::set('test','时空旅行者');

        echo Session::get('test','shikong');

//        return dump(Session::get());
        dump(Request::session());

        dump(Session::has('test','think'));
        dump(Session::has('test','shikong'));

        dump($_SESSION);

//        Session::delete('test','shikong');

        echo Session::pull('test','shikong'); // get + delete

        Session::flash('flush',time()); // 只能请求一次的数据 使用后自动删除

        dump($_SESSION);

        Session::flush();   // 清空缓存

        dump($_SESSION);

        Session::clear('shikong');

        dump($_SESSION);
    }

    public function cookie(){
        Cookie::init([
            // cookie 名称前缀
            'prefix'    => 'sk_',
            // cookie 保存时间
            'expire'    => 120,
            // cookie 保存路径
            'path'      => '/',
        ]);

        Cookie::set('test',"测试");
        Cookie::set('testArr',[1,2,3]);

//        Cookie::set('test',"测试",60 * 60 * 24 * 7);

        Cookie::set('testOption',"Shikong",[
            "expire" => 60 * 60 * 24 * 7,           // 过期时间
            "prefix" => "test_",                    // 前缀
        ]);

        // 永久 Cookie (10年)
//        Cookie::forever('testForever','Shikong');

        dump(Cookie::has('test'));

        dump(Cookie::get('testArr'),'sk_');

        dump(Cookie::has('testOption','test_'));

        dump(Cookie::get('',''));

        Cookie::delete('test','sk_');

        dump(Cookie::get('',''));

        Cookie::clear('sk_');
        Cookie::clear('test_');

        dump(Cookie::get('',''));

    }

    public function error(){

        // lang 默认目录 applacition/lang
        // 若不在默认目录下可用 Load 加载语言文件
        echo Lang::get('require_name');
        echo "<br> \n";
        echo Lang::get('email_error');
    }
}