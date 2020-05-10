<?php


namespace app\upload\controller;


use think\Controller;
use think\facade\Request;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch('index');
    }

    public function upload()
    {
        // 单文件上传

        $data = Request::file('image');

//        $info = $data->move('../application/upload/Storage');

        // 默认情况下 文件名使用 md5 + date(精确到微秒) 生成
        $info = $data->validate(
            [
                "size" => 1024 * 5,         // 单位 k
                "ext" => "jpg,gif,png",     // 限制文件后缀
            ]
        )
//            ->rule('date')                // 时间 + md5 默认
//            ->rule('md5')                 // md5
//            ->rule('rand')                // 随机数
            ->rule('uniqid')                // 根据毫秒数生成 的 唯一id
//            ->move('../application/upload/Storage');              // 会覆盖原有文件
//            ->move('../application/upload/Storage', '');          // 按原文件名存储 会覆盖原有文件
            ->move('../application/upload/Storage', true, false);   // 不会覆盖已有文件

        if ($info) {
            dump($info);

            echo $info->getExtension();
            echo "<br> \n\r";
            echo $info->getFileName();
            echo "<br> \n\r";
            echo $info->getSaveName();
        } else {
            echo $data->getError();

            dump($info);
        }

        dump($data);

    }

    public function uploads()
    {
        // 多文件上传

        $datas = Request::file('image');

        foreach ($datas as $data) {

            $info = $data->move('../application/upload/Storage');

            if ($info) {
                dump($info);

                echo $info->getExtension();
                echo "<br> \n\r";
                echo $info->getFileName();
                echo "<br> \n\r";
                echo $info->getSaveName();
            } else {
                echo $data->getError();
            }

            dump($data);
        }

    }
}