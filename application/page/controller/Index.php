<?php


namespace app\page\controller;


use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index(){

        // 每页获取数量
        $data = Db::name('student')->field('password,sale',true)->paginate(2);

        // 限制可获取的总条目数
//        $data = Db::name('student')->field('password,sale',true)->paginate(2,3)
//            ->each(function ($item,$key){   // 修改字段值
//                $item['gender'] = strlen($item['gender']) == 0 ? '' : $item['gender']."性";
//
//                return $item;
//            });

        // 简洁分页 无法获取 数据总数 等分页信息
//        $data = Db::name('student')->field('password,sale',true)->paginate(2,true);

//        return json($data);

        dump(json($data));

        // 单独的分页功能
        $page = $data->render();
        $this->assign('page',$page);

        // 获取总条目数
        $total = $data->total();
        echo "总记录数： $total";

        echo "<br> \n\r";

        // 获取当前页码
        $currentPage = $data->currentPage();
        echo "当前页码：$currentPage";

        echo "<br> \n\r";

        // 每页获取条目数
        $count = $data->count();
        echo "每页获取条目数：$count";

        $this->assign('data',$data);
        return $this->fetch('index');
    }
}