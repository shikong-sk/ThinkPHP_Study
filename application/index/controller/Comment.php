<?php


namespace app\index\controller;


class Comment
{
    public function read($id,$blog_id){
        return "Comment read id : $id , blog_id : $blog_id";
    }

    public function edit($id,$blog_id){
        return "Comment edit id : $id , blog_id : $blog_id";
    }
}