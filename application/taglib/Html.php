<?php


namespace app\taglib;


use think\template\TagLib;

class Html extends TagLib
{
    protected $tags = [
        'font'     => ['attr' => 'color,size', 'close' => 1],
    ];

    public function tagFont($tag, $content)
    {
        $parseStr = "<span style='color: {$tag["color"]};font-size: {$tag["size"]}px'>{$content}</span>";
        return $parseStr;
    }

}