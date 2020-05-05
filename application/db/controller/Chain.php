<?php


namespace app\db\controller;


use think\Db;

class Chain
{
    public function index()
    {
//        $data = Db::name('student')->where([
//            'departmentId' => '05',
//            'majorId' => '02',
//            'gender' => ['', '男', '女'],
//            'active' => '1'
//        ])->select();

        $data = Db::name('student')->where([
            ['departmentId', '=', '05'],
            ['majorId', '=', '02'],
            ['gender', 'in', ['', '男', '女']],
            ['active', '=', '1']
        ])->field(['studentId' => 'id', 'studentName'])->select();

        $data = Db::name('student')->where([
            ['departmentId', '=', '05'],
            ['majorId', '=', '02'],
            ['gender', 'in', ['', '男', '女']],
            ['active', '=', '1']
        ])->field(['salt', 'password'], true)->select();


        $data = Db::name('student')->limit(0, 2)->select();
        $data = Db::name('student')->page(1, 2)->select();

        $data = Db::name('student')->page(1, 2)->order('studentId', 'desc')->select();
        $data = Db::name('student')->page(1, 2)->order([
            'departmentId' => 'asc',
            'majorId' => 'asc',
            'studentId' => 'desc',
        ])->select();

        $data = Db::name('student')->field(['departmentId','departmentName','COUNT(*) num'])->group(['departmentId'])->select();

//        return Db::getLastSql();
        return json($data);
    }
}