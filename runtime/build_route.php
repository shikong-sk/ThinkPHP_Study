<?php 
//根据 Annotation 自动生成的路由规则
Route::resource("col",'collect/Index');
Route::get('col/:id','collect/Index/read')
	->ext("")
	->pattern([
	"id" => "\d+$"
	]);