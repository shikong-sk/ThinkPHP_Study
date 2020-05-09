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

    public function make(){
        // Validate 内置规则

        // require 必填 非空
        dump(FValidate::isRequire(''));
        dump(FValidate::must('',''));

        // Number 纯数字 非负 非小数
        dump(FValidate::isNumber(-10));

        // Integer 整数 非小数
        dump(FValidate::isInteger(-10));

        // Float 小数 浮点数
        dump(FValidate::isFloat('-10.5'));

        // boolean 布尔值
        dump(FValidate::isBoolean(true));

        // email 是否为邮箱格式
        dump(FValidate::isEmail('sk@skcks.cn'));

        // array 是否为数组
        dump(FValidate::isArray([1,2,3]));

        // accepted 是否为 yes | on | 1 之一
        dump(FValidate::isAccepted('on'));

        // date 是否为有效日期 支持 date datetime 格式
        dump(FValidate::isDate('2020-05-01'));

        // dateFormat 是否为指定日期格式
        // dateFormat:Y-m-d
        dump(FValidate::dateFormat('2020-05-01','Y-m-d'));

        // alpha 是否为纯字母
        dump(FValidate::isAlpha('AbC'));

        // alphaNum 是否为字母和数字
        dump(FValidate::isAlphaNum('AbC123'));

        // alphaDash 是否为字母和数字 以及 _-
        dump(FValidate::isAlphaDash('AbC_123'));

        // chs 是否为纯汉字
        dump(FValidate::isChs('时空'));

        // chsAlpha 是否为汉字和字母
        dump(FValidate::isChsAlpha('时空AbC'));

        // chsAlphaNum 是否为汉字和字母、数字
        dump(FValidate::isChsAlphaNum('时空AbC123'));

        // chsDash 是否为汉字和字母、数字 以及 _-
        dump(FValidate::isChsDash('时空AbC_123'));

        // cntrl 是否为控制字符 换行符 缩进符
        dump(FValidate::isCntrl("\n\t\r"));

        // graph 是否为可打印字符 不含空格、中文
        dump(FValidate::isGraph("AbC"));

        // print 是否为可打印字符 含空格 不含中文
        dump(FValidate::isPrint("A b C"));

        // lower 是否为小写字符
        dump(FValidate::isLower("abc"));

        // upper 是否为大写字符
        dump(FValidate::isUpper("ABC"));

        // space 是否为空白字符
        dump(FValidate::isSpace(" \t\n\r"));

        // xdigit 是否为16进制
        dump(FValidate::isXdigit("FF"));

        // activeUrl 是否为有效域名
        dump(FValidate::isActiveUrl("skcks.cn"));

        // url 是否为有效URL地址 格式 需带上协议头
        dump(FValidate::isUrl("http://baidu.com"));

        // ip 是否为有效ip地址 支持 IPv4、IPv6地址
//        dump(FValidate::isIp("223.5.5.5"));
        dump(FValidate::isIp("fec0:0:0:ffff::1"));

        // mobile 是否为有效手机号码 格式
        dump(FValidate::isMobile("13688888888"));

        // idCard 是否为有效身份证号码 支持18位身份证号码
        dump(FValidate::isIdCard("440000199010011111"));

        // macAddr 是否为有效MAC地址 格式
        dump(FValidate::isMacAddr("02-50-9D-9C-B7-B7"));

        // zip 是否为有效邮编 格式
        dump(FValidate::isZip("000000"));

        // in:1,2,3 是否有某个值
        dump(FValidate::in('1','1,2,3'));

        // notIn:1,2,3 是否不含有某个值
        dump(FValidate::notIn('5','1,2,3'));

        // between:1,100 是否在区间内
        dump(FValidate::between('5','1,100'));

        // notBetween:1,100 是否不在区间内
        dump(FValidate::notBetween('500','1,100'));

        // length:2,20 长度是否在范围内
        dump(FValidate::length('2','1,2'));

        // max:1 字符最大长度
        dump(FValidate::max('2','1'));

        // min:1 字符最小长度
        dump(FValidate::min('2','1'));

        // after:2020-01-01 是否在指定日期之后

        // before:2020-01-01 是否在指定日期之前

        // expire:2020-04-01,2020-05-01 当前日期 是否在某个期限内
        dump(FValidate::expire('','2020-04-01,2020-05-31'));

        // allowIp:0.0.0.0,255.255.255.255 IP 是否在允许 列表 内
        dump(FValidate::allowIp('127.0.0.1','127.0.0.0,127.0.0.1,127.0.0.255'));

        // denyIp:0.0.0.0,255.255.255.255 IP 是否在禁止 地址范围 内
        dump(FValidate::denyIp('127.0.0.1','127.0.0.0,127.0.0.255'));

        // 字段比较
        // confirm:password 是否与另一个字段匹配
        // different:password 是否与另一个字段不匹配
        // eq:100 = same 是否 等于 某个值
        // gt:100 > 是否 大于 某个值
        // egt:100 >= 是否 大于等于 某个值
        // lt:100 < 是否 小于 某个值
        // elt:100 <= 是否 小于等于 某个值

        // 其他验证类
        // \d{6} 正则表达式
        // regex:\d{6} 正则表达式
        // file 判断是否为文件
        // image:150,150,gif 宽,高,图片类型 判断图片
        // fileExt:jpg,txt 允许的文件后缀
        // fileMime:text/html 允许的文件类型
        // fileSize:2048 允许的文件字节大小
        // behavior:\app\... 判断行为验证
        // unique:student 判断字段值在表中是否是唯一的(不含表名前缀)
        // unique:student,studentId 判断字段值在表中指定的字段是否是唯一的(不含表名前缀)
        // unique:student,studentId,123 判断字段值在表中指定的字段是否是唯一的(不含表名前缀),排除指定值
        // unique:student,seat,27,1730502127 判断字段值在表中指定的字段是否是唯一的(不含表名前缀),排除指定的主键值
        // requireWith:id 当指定字段中有数值时为必填字段
    }
}