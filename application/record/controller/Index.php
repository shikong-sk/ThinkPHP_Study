<?php


namespace app\record\controller;


use think\facade\Log;

class Index
{
    public function index(){
        // 关闭写入日志信息
//        Log::close();

//        echo env('runtime_path');
//        return ;

        // 写入日志信息
        // 系统提供 debug info(默认) notice warning error critical alert emergenct 级别
        // 也可自定义级别
//        Log::record("日志测试");
//        Log::record("日志测试","error");
//        Log::record("日志测试","test");
        trace("日志测试",'test');

        // 清理 在内存中(还未写入) 的 日志
//        Log::clear();

        $logs = Log::getLog();
        dump($logs);
    }

    public function get(){
        $logs = Log::getLog();
        dump($logs);
    }
}