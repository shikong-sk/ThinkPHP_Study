<?php


namespace app\db\controller;

use app\db\model\ClassModel;
use think\Db;
use think\facade\Config;

class Search
{
    public function index()
    {
        $data = Db::name("student")->where('departmentId', '<>', '05')->select();
        $data = Db::name("student")->where('studentName', 'like', ['%彬', '%锋'], 'or')->select();
        $data = Db::name("student")->whereLike('studentName', '%彬')->select();
        $data = Db::name("student")->whereBetween('studentId', ['1730502101', '1730502127'])->select();
        $data = Db::name("student")->whereIn('studentId', ['1730502127', '1730502122'])->select();
        $data = Db::name("student")->whereNull('gender')->select();
        $data = Db::name("student")->where('gender', '')->select();
        $data = Db::name("student")->where('gender', 'exp', 'in(null,"")')->select();
        $data = Db::name("student")->whereExp('gender', 'in(null,"")')->select();

        $data = Db::name("student")->where('both', '>= time', '1999-07')->select();
        $data = Db::name("student")->where('both', 'between time', ['1999-01', '1999-07-31'])->select();
        $data = Db::name("student")->whereTime('both', '>=', '1999-07')->select();
        $data = Db::name("student")->whereBetween('both', ['1999-01', '1999-07-31'])->select();
        $data = Db::name("student")->whereBetweenTime('both', '1999-01', '1999-07-31')->select();
        $data = Db::name("student")->whereTime('both', date(mktime(0, 0, 0, date('m'), date('d'), date('Y') - 21)))->select();

        $data = Db::name('student')->count('*');
        $data = Db::name('student')->max('studentId');
        $data = Db::name('student')->min('studentId');

        $data = Db::name('score')->whereExp('studentId', 'IN ' . Db::name('student')->field('studentId')->where('gender', '男')->buildSql())->select();
        $data = Db::name('score')->where('studentId', 'in', function ($q) {
            $q->table(Config::get('database.prefix') . 'student')->field('studentId')->where('gender', '男');
        })->select();

        $data = ClassModel::select();

//        return Db::getLastSql();
        return json($data);
    }
}