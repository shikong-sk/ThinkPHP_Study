<?php

// 全局配置文件

return [
    //            "codeSet" => "",                  // 验证码字符集合
//            "expire" => 1,                    // 验证码过期时间
//            "useZh" => true,                  // 使用中文验证码
//            "zhSet" => "时空",                // 中文验证码字符串
//            "useImgBg" => true,               // 使用背景图片
    "fontSize" =>  30,                  // 字体大小 (单位 px)
    "useCurve"  => true,                // 使用混淆曲线
    "useNoise" => true,                 // 使用混淆杂点
    "imageH" => 0,                      // 验证码图片高度 0为自动
    "imageW" => 0,                      // 验证码图片宽度 0为自动
    "length" => 4,                      // 验证码位数
    "fontttf" => "",                    // 验证码字体 空为随机
    "bg" => [243,251,254],              // 背景颜色 RGB数组
    "reset" => true                     // 验证成功后是否重置
];