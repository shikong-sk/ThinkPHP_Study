<?php


namespace app\db\model;


use think\Model;

class Score extends Model
{
    protected $pk = "studentId";

    public function grade(){
        // belongsToMany 多对多关联
        return $this->belongsToMany('Grade','Student','grade','studentId');

    }
}