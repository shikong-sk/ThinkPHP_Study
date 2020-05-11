<?php


namespace app\db\model;


use think\Model;

class Department extends Model
{
    protected $pk = 'departmentId';

    public function student(){

//        return $this->hasOne('Student','departmentId');

        // 反向关联查询
//        return $this->belongsTo('Student','departmentId','departmentId');
        return $this->belongsTo("app\db\model\Student",'departmentId','departmentId');
    }

    public function studentMany(){
        // hasMany 一对多关联
        return $this->hasMany('Student','departmentId','departmentId');
    }

    public function classes(){

        // hasOne 一对一关联
        // 模型名称,外键名,本表字段名
        return $this->hasOne('ClassModel','departmentId','departmentId');

    }
}