<?php


namespace app\behavior;


class Test
{
    public function run($params)
    {
        echo "触发就执行 $params <br> \n ";
    }

    public function appInit()
    {
        echo "初始化触发 <br> \n ";
    }

    public function test($params)
    {
        echo "test 触发 $params <br> \n ";
    }

}