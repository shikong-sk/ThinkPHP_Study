<?php


namespace app\db\controller;

use app\db\model\Course;
use app\db\model\Grade;
use app\db\model\Score;
use app\db\model\Student as StudentModel;
use app\db\model\Department;
use think\Db;

class Forgen
{
    public function index()
    {
//        $department = Department::get('05');
//        $student = StudentModel::get("1730502127");

//        return $student->department;
//        dump($department->student);
//        dump($student);
//        dump($student->department);
//        echo Db::getLastSql();

//        dump($department->student);
//        dump($department->student->select());
//        echo Db::getLastSql();

        // 关联修改
//        dump($student->department->save(["departmentName"=>"计算机系"]));
//        echo Db::getLastSql();

//        // 关联新增   示例
//        dump($student->department()->save(["departmentName"=>"计算机系"]));
//        echo Db::getLastSql();

        // 反向 一对一关联 查询 (无需 belongsto )
//        dump(Department::hasWhere('student',['studentId'=>'1730502127'])->find());
//        dump(Department::hasWhere('student',function($query){
//            $query->where([
//                ['student.studentId','=','1730502127']
//            ]);
//        })->find());
//        echo Db::getLastSql();


        // 一对多关联查询
        $student = Department::get('05');
        dump($student->studentMany()->where([[
            'gender', 'in', ['男', '女']
        ]])->field('password,salt', true)->select());
        echo Db::getLastSql();

        dump(Department::has('studentMany', '>', 0)->select());
        echo Db::getLastSql();

        dump(StudentModel::hasWhere('departmentMany', ['student.active' => 1])->removeOption('group')->select());
        echo Db::getLastSql();

        // 一对多新增
//        Department::get('06')->studentMany()->save(['departmentName'=>'计机']);

        // 一对多删除
//        Department::get('06','student')->together('student')->delete();
    }

    public function before()
    {
        // 关联预载入
//        $studentList = StudentModel::all([
//            '1730502101',
//            '1730502127'
//        ]);

//        $studentList = StudentModel::with('department,classes')->all([
//            '1730502101',
//            '1730502127'
//        ]);

        // 简化形式
//        $studentList = StudentModel::all([
//            '1730502101',
//            '1730502127'
//        ], 'department,classes');


        // 关联预加载
//        $studentList = StudentModel::withJoin([
//            // 限定查询字段
//            'department' => ["departmentId","departmentName"],
//            'classes' => function($query){
//                return $query->withField("class,classId");
//            }
//        ])->all([
//            '1730502101',
//            '1730502127',
//        ]);
//
//        foreach ($studentList as $student) {
//            dump($student);
//        }

        // 延迟预加载
        $studentList = StudentModel::all([
            "1730502101",
            "1730502127",
        ]);

        // ... 其他操作

        $studentList->load(["department", "classes"]);
        foreach ($studentList as $student) {
            dump($student);
        }

    }

    public function count()
    {

        // 关联统计
        // 支持
        // withCount withMax withMin withSum withAvg

//        $departmentList = Department::withCount("student")->all(
//            [
//                "01",
//                "05"
//            ]
//        );

        // 别名
        $departmentList = Department::withCount(["student" => "count"])->all(
            [
                "01",
                "05"
            ]
        );

        foreach ($departmentList as $department) {
            dump($department);
//            dump($department->student_count); // 默认 名称_count
            dump($department->count);
        }

    }

    public function show()
    {
        // 关联输出

        $studentList = Department::withJoin([
            'student',
        ])->all([
            '01',
            '05',
        ]);

//        foreach ($studentList as $student) {
//            dump($student);
//        }

        // 隐藏字段
//        dump($studentList->hidden([
//            'student.password',
//            'student.salt',
//            "student" => [
//                "departmentId",
//                "departmentName",
//            ],
//            'active',
//        ]));

        // 可见字段
        dump($studentList->visible([
            "student"=>[
                "studentId",
                "studentName",
                "classId"
            ],
            "departmentId",
            "departmentName",
        ])->append(["classes.classId"]));
    }

    public function many(){
        // 多对多关联查询
        $data = Grade::get('17');
//        $data = Score::get('1730502127');

        dump($data);
        dump($data->score);
//        dump($data->grade);
//        dump(Db::getLastSql());

//        dump($data->score()->save(["studentId"=>"1730502127","score"=>"10"]));
//        dump($data->score()->save("1730502127"));

        // 中间表添加数据 attach(主键,["额外参数列"=>"内容"])
        // 中间表删除数据 detach(主键)
    }
}