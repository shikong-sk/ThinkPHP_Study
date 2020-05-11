<?php


namespace app\image\controller;


use think\Image;

class Index
{
    public function index(){
        $image = Image::open('image/logo.png');

        echo $image->width();
        echo "<br> \n\r";
        echo $image->height();
        echo "<br> \n\r";
        echo $image->type();
        echo "<br> \n\r";
        echo $image->mime();
        echo "<br> \n\r";
        echo dump($image->size());

        dump($image);

        // 图片裁剪
//        $image->crop($image->width()/2,$image->height()/2)->save('image/logo_crop.png');
        // 裁剪区域宽,高,起始x坐标,y坐标,保存图片宽,高
//        $image->crop($image->width()/2,$image->height()/2,20,20,100,50)->save('image/logo_crop_2.png');

        // 缩略图
        // 默认按等比例缩放
        // 宽,高,缩放类型
        // 缩放类型 type：
        //  1   等比例缩放
        //  2   缩放后填充空白
        //  3   居中裁剪
        //  4   左上角裁剪
        //  5   右下角裁剪
        //  6   固定尺寸缩放
//        $image->thumb($image->width()/2,$image->height()/2,1)->save('image/logo_thumb.png');

        // 图片旋转
//        $image->rotate(180)->save("image/logo_rotate.png");

        // 图片保存
        // 文件名,文件类型,图像质量,是否对JPG、JPEG类型设置隔行扫描
//        $image->save("image/logo_save.jpg",'jpg',50,true);

        // 图片水印
        // 水印图片路径,水印位置,透明度
        // 水印位置参数：
        //  1 标识左上角水印
        //  2 标识上居中水印
        //  3 标识右上角水印
        //  4 标识左居中水印
        //  5 标识居中水印
        //  6 标识右居中水印
        //  7 标识左下角水印
        //  8 标识下居中水印
        //  9 标识右下角水印   默认
//        $image->water('image/logo_thumb.png',9,30)->save('image/logo_water.png');

        // 文本水印
        // 文本,字体路径,字体大小,颜色,水印位置,偏移量,倾斜角度
        // 水印位置参数：
        //  1 标识左上角水印
        //  2 标识上居中水印
        //  3 标识右上角水印
        //  4 标识左居中水印
        //  5 标识居中水印
        //  6 标识右居中水印
        //  7 标识左下角水印
        //  8 标识下居中水印
        //  9 标识右下角水印   默认
//        $image->text('Test',getcwd().'/font/2.ttf',20,'#0099ff',9,-10,-15)->save('image/logo_text.png');

        return ;
    }
}