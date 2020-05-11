<?php

namespace app\db\controller;

use app\db\model\Student;
use think\Controller;
use think\Db;
use think\exception\PDOException;

class Index extends Controller {
    public function index(){
//        return 'db';
//        $data = Db::name('student')->find();
//
//        $data = Db::name('student')->where('studentId','173050212')->findOrEmpty();
//
//        $data = Db::name('student')->select();
//
//        $data = \db('student')->value('studentName');
//
//        $data = \db('student')->column('studentName');
//        $data = \db('student')->column('studentName','studentId');
//        return json($data);
//        return Db::getLastSql();

        $student = new Student();

        $data1 = $student::where('studentName','郑晓彬')->select();

        $data2 = $student::removeOption('where')->select();

        return json($data2);
    }

    public function insert(){
        $data = [
            "studentId"         =>      "1730502222",
            "studentName"       =>      "郑晓彬",
            "gender"            =>      "男",
            "both"              =>      "1999-07-10",
            "salt"              =>      "248328",
            "password"          =>      "0c628d9014bb12512c9c47045bc44b110dc09a0a",
            "contact"           =>      "13600000000",
            "grade"             =>      "17",
            "years"             =>      "3",
            "departmentId"      =>      "05",
            "departmentName"    =>      "计算机系",
            "majorId"           =>      "02",
            "majorName"         =>      "计算机应用技术",
            "class"             =>      "2",
            "classId"           =>      "17305022",
            "seat"              =>      "22",
            "active"            =>      1,
            "idCard"            =>      "44000019990710291x",
            "address"           =>      "",
            "studentImg"        =>      "./Storage/User/Student/1730502127_郑晓彬_35B99372-1B99-52BB-5C76-12B2E9D90ECF.jpeg"
        ];

        try{
            Db::name('student')->insert($data);
            $this->success("数据添加成功",'../');
        }catch (PDOException $exception)
        {
            $this->error("数据添加失败".$exception->getMessage());
        }

    }

    public function update(){
        $data = [
            "studentName" => "邱伟发",
            "idCard" => Db::raw('UPPER(idCard)'),
        ];

        try{
            \db('student')->where('studentId','1730502222')->update($data);
            $this->success("数据更新成功",'../');
        }catch (PDOException $exception)
        {
            $this->error("数据更新失败".$exception->getMessage());
        }

    }

    public function delete(){


        try{
            Db::name('student')->where('studentId','1730502222')->delete();
            $this->success("数据删除成功",'../');
        }catch (PDOException $exception)
        {
            $this->error("数据删除失败".$exception->getMessage());
        }
    }

    public function getNoModelData(){
//        $data = Db::table('ms_student')->select();
        $data = Db::name('student')->select();
        return json($data);
    }

    public function getModelData(){
        $data = Student::select();
//        return json($data);
        return $data;
    }

    public function event(){
        $data = Db::name('student')->select();
        dump($data);

        $data = Db::name('student')->find();
        dump($data);

        // 模型事件
        $data = [
            "studentName" => "时空",
            "idCard" => Db::raw('UPPER(idCard)'),
        ];
        Student::update($data,['studentId'=>'1730502127']);

    }

    // 数据库事件
    protected function initialize()
    {
        // event 事件参数
        // before_select    select  查询前回调
        // before_find      find    查询前回调
        // after_insert     insert  操作成功回调
        // after_update     update  操作成功回调
        // after_delete     delete  操作成功回调

        Db::event('before_select',function ($query){
            echo '批量查询操作触发';
        });

        Db::event('before_find',function ($query){
            echo '单记录查询操作触发';
        });


    }
}