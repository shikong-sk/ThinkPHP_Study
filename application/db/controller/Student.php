<?php


namespace app\db\controller;

use app\db\model\Student as StudentModel;
use think\Controller;
use think\Db;

class Student extends Controller
{

    public function update(){
        $db = new StudentModel();

//        $student = StudentModel::get("1730502222");
//
//        $student->studentName = '时空旅行者';
//        $student->active = 0;
//
//        $student->save();

        echo $db->isUpdate(true)->save(["studentName"=>"时空",'idCard'=>"44000019990710291x"],['studentId'=>"1730502222"]);

//        echo StudentModel::update(['studentId'=>"1730502222","studentName"=>"时空"]);

//        echo StudentModel::where(['studentId'=>"1730502222"])->update(["studentName"=>"时空"]);


        return Db::getLastSql();
//        return json($data);
    }

    public function delete()
    {
        $db = new StudentModel();

//        $data = $db->get('1730502222');
//        $data->delete();

//        StudentModel::destroy(['1730502222']);

//        StudentModel::where([
//            ['studentId','=','1730502222']
//        ])->delete();

        StudentModel::destroy(function ($q) {
            $q->where([
                ['studentId', '=', '1730502222']
            ]);
        });

        return Db::getLastSql();
//        return json($data);
    }

    public function insert()
    {
        $db = new StudentModel();
//      $data = $db->select();

//        $db->studentId = '1730502222';
//        $db->studentName = "郑晓彬";
//        $db->gender = "男";
//        $db->both = "1999-07-10";
//        $db->salt = "248328";
//        $db->password = "0c628d9014bb12512c9c47045bc44b110dc09a0a";
//        $db->contact = "13600000000";
//        $db->grade = "17";
//        $db->years = "3";
//        $db->departmentId = "05";
//        $db->departmentName = "计算机系";
//        $db->majorId = "02";
//        $db->majorName = "计算机应用技术";
//        $db->class = "2";
//        $db->classId = "17305022";
//        $db->seat = "22";
//        $db->active = 1;
//        $db->idCard = "44000019990710291x";
//        $db->address = "";
//        $db->studentImg = "./Storage/User/Student/1730502127_郑晓彬_35B99372-1B99-52BB-5C76-12B2E9D90ECF.jpeg";


        $db->save([
            "studentId" => '1730502222',
            "studentName" => "郑晓彬",
            "gender" => "男",
            "both" => "1999-07-10",
            "salt" => "248328",
            "password" => "0c628d9014bb12512c9c47045bc44b110dc09a0a",
            "contact" => "13600000000",
            "grade" => "17",
            "years" => "3",
            "departmentId" => "05",
            "departmentName" => "计算机系",
            "majorId" => "02",
            "majorName" => "计算机应用技术",
            "class" => "2",
            "classId" => "17305022",
            "seat" => "22",
            "active" => 1,
            "idCard" => "44000019990710291x",
            "address" => "123",
            "studentImg" => "./Storage/User/Student/1730502127_郑晓彬_35B99372-1B99-52BB-5C76-12B2E9D90ECF.jpeg"
        ]);

        return Db::getLastSql();
//        return json($data);
    }

    public function index(){
//        return json(StudentModel::get('1730502222'));

//        return json(StudentModel::where([['studentName','like','%彬']])->findOrEmpty());

//        return json(StudentModel::getStudentName('1730502127'));

        $data = StudentModel::get('1730502222');

//        return json($data->nothing);
//        return json($data->getData());

        $data = StudentModel::get('1730502222')->withAttr('idCard',function ($val){
            return strtoupper($val);
        });

        return json($data);

    }

    public function search(){
//        $data = StudentModel::withSearch(['studentName','classId'],[
//            'studentName' => '',
//            'classId' => '17305021',
//            'order' => ['seat' => 'desc'],
//        ])->select()->hidden(['password','salt']);

        $data = StudentModel::withSearch(['studentName','classId'],[
            'studentName' => '',
            'classId' => '17305021',
            'order' => ['seat' => 'asc'],
        ])->select()->visible(['studentId','studentName'])
        ->append(['nothing']);

        $data = StudentModel::select();

        $data = $data->filter(function ($data){
            return $data['gender'] == '男';
        })->hidden(['salt','password']);

        $data1 = StudentModel::where([['gender','in',['男','']]])->select();
        $data2 = StudentModel::where([['gender','=','']])->select();

        /*
         * 差集
         */
//        return json($data1->diff($data2));

        /*
         * 交集
         */
//        return json($data1->intersect($data2));


//        return Db::getLastSql();
        return json($data);
    }

    public function type(){
        $db = StudentModel::get(1730502222);

        dump($db);
    }

    public function queryScope(){
//        $data = StudentModel::scope('genderMale')->select();
//        $data = StudentModel::scope('studentNameLike','彬')->select();
        $data = StudentModel::useGlobalScope(false)->genderMale()->studentNameLike('彬')->select();

//        return Db::getLastSql();
        return json($data);
    }

    public function view(){
        $data = StudentModel::get(1730502222);

        $this->assign('student',$data);

        return $this->fetch();
    }

    public function output(){
        $data = StudentModel::get(1730502222);
//        var_dump($data->toArray());
//        var_dump($data->hidden(['salt','password'])->toArray());
        return $data->hidden(['salt','password'])->toJson();
    }

    public function json(){
        $data = [
            "address" => ['city'=>"汕头"],
        ];

        $db = new StudentModel();

        $db->isUpdate(true)->save($data,["studentId" => '1730502222']);

//        return Db::getLastSql();

        // Mysql >= 5.7
//        return json(StudentModel::where('address->city','like','%汕头%')->select());

        return json(StudentModel::where('address','not in',['','[]',"{}"])->select());

    }
}