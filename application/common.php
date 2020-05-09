<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

use think\Facade;

//error_reporting(0);

// 单一绑定
//Facade::bind('app\facade\Test','app\common\Test');

// 批量绑定
Facade::bind([
    'app\facade\Test' => 'app\common\Test'
]);



// 允许使用的语言列表
\think\facade\Lang::setAllowLangList([
    'zh-cn',
    'en-us',
]);

// 通过 Cookie 切换语言
//\think\facade\Cookie::prefix('think_');
//\think\facade\Cookie::set('var','zh-cn');