<?php


namespace app\cache\controller;


use think\facade\Cache;

class Index
{
    public function index(){
        Cache::init([
            // 驱动方式
            'type'   => 'File',
            // 缓存保存目录
            'path'   => '',
            // 缓存前缀
            'prefix' => '',
            // 缓存有效期 0表示永久缓存
            'expire' => 0,
        ]);

        Cache::set('test','test');
//        Cache::set('test2','test2',10); // 过期时间

        dump(Cache::get('test'));
//        dump(Cache::get('test2'));

        dump(Cache::has('test'));

        Cache::inc('num');
        dump(Cache::has('num'));
        dump(Cache::get('num'));


        Cache::tag('tag',['test','num']);   // 设置缓存标签

//        Cache::rm('num'); // 删除缓存
        dump(Cache::pull('num')); // get + rm

        dump(Cache::get('test',''));

//        Cache::clear(); // 清空所有缓存
        Cache::clear('tag'); // 清空缓存标签内的缓存

        dump(Cache::get('test'));

    }
}