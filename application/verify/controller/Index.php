<?php


namespace app\verify\controller;


use app\common\validate\Test;
use think\Controller;
use think\facade\Session;
use think\Validate;
use think\validate\ValidateRule;
use think\facade\Validate as FValidate;

class Index extends Controller
{

    // 批量验证
    protected $batchValidate = true;

    // 验证失败时抛出异常
//    protected $failException = true;

    public function index()
    {
        $data = [
            "name" => "S1234567890123456",
            "seat" => 100,
            "email" => "skskcks.cn",
        ];
//
        $validate = new Test();

        if (!$validate->scene('update')->batch()->check($data)){
            dump($validate->getError());
        }

        // 验证器
//        $res = $this->validate($data,Test::class);
        // 添加验证场景
//        $res = $this->validate($data,'\app\common\validate\Test.update');
//        $res = $this->validate($data,'Test.update');

//        $validate = new Validate();
//        $validate->rule([
//            "name|用户名" => [
//                'require',
//                "max" => 15,
//            ],
//            'seat' => [
//                'number',
//                'between' => '1,99'
//            ],
//            'email' => 'email'
//        ]);
        // 对象化写法
//        $validate->rule([
//            "name|用户名" => ValidateRule::isRequire()->max(10),
//            'seat' => ValidateRule::isNumber()->between('1,99'),
//            'email' => ValidateRule::isEmail()
//        ]);
        // 闭包
//        $validate->rule([
//            'name' => function ($value, $data, $field) {
//                $rule = ['S'];
//                foreach ($rule as $v) {
//                    if (strstr($value, $v)) {
//                        return "$field 中包含非法字符 $v";
//                    }
//                }
//                return true;
//            }
//        ]);
//
//        $validate->message([
//            'name.require' => 'name_require', // 语言包替换 thinkphp/lang/zh-cn.php
//            'name.max' => '用户名长度不能大于15',
//            'seat.between' => '座号为1~99之间',
//            'email' => '邮箱格式不正确'
//        ]);

//        $res = $validate->batch()->check($data);

//        if ($res !== true) {
//            dump($res);
//            dump($validate->getError());
//        }
    }

    public function read($id){
        return "vRead id : $id";
    }

    public function facade(){
        // 静态方法不抛出错误 只返回 true 和 false 需要自行处理
//        dump(FValidate::isEmail('skskcks.cn'));
//        dump(FValidate::isRequire(''));
//        dump(FValidate::isNumber('10b'));

        // 支持多规则验证
//        dump(FValidate::checkRule('11','number|between:1,10'));
        dump(FValidate::checkRule('11',ValidateRule::isNumber()->between('1,10')));
    }

    public function token(){
        dump(Session::get());
        return $this->fetch('token');
    }

    public function checkToken(){
        $data = [
            'user' => input('post.user'),
            '__token__' => input('post.__token__')
        ];

//        dump($data);
        $validate = new Validate();
        $validate->rule([
            'user' => 'require|token'
        ]);

        if(!$validate->batch()->check($data)){
            dump($validate->getError());
        }
        else{
            return '验证通过';
        }
    }
}