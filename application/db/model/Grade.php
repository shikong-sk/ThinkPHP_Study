<?php


namespace app\db\model;


use think\Model;

class Grade extends Model
{
    protected $pk = "grade";

    public function score(){
        // belongsToMany 多对多关联
        return $this->belongsToMany('Score','Student','studentId','grade');

    }
}