<?php

namespace app\common\validate;

use think\Validate;

class Test extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'    =>    ['规则1','规则2'...]
     *
     * @var array
     */
//    protected $rule = [
//        // 格式 "字段名|描述" => "限制规则|规则参数"
//        'name|用户名' => 'require|max:15|checkName:时,S',
//        'seat' => 'number|between:1,99',
//        'email' => 'email'
//    ];
    protected $rule = [
        "name|用户名" => [
            'require',
            "max" => 15,
            "checkName" => 'S'
        ],
        'seat' => [
            'number',
            'between' => '1,99'
        ],
        'email' => 'email',
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名'    =>    '错误信息'
     *
     * @var array
     */
    protected $message = [
        'name.require' => '名字不能为空',
        'name.max' => '名字长度不能大于15',
        'seat.between' => '座号为1~99之间',
        'email' => '邮箱格式不正确'
    ];

    // 场景验证设置
//    protected $scene = [
//        'insert' => ['name', 'seat', 'email'],
//        'update' => ['name', 'seat',],
//    ];

    // 公共方法的场景验证
    public function sceneUpdate()
    {
        return $this->only(['name','seat']) // 只验证指定字段
                    ->remove('name','max|checkName') // 不验证指定字段的方法
                    ->append('name','number') // 添加指定字段的验证方法
            ;
    }

    // 自定义规则
    protected function checkName($value, $rule, $data, $field, $description)
    {
        $key = strlen($description) == 0 ? $field : $description;
        $rule = strlen($rule) == 0 ? null : mb_split(",", $rule);
        if (!is_null($rule)) {
            foreach ($rule as $v) {
                if (strstr($value, $v)) {
                    return "$key 中包含非法字符 $v";
                }
            }
        }
        return true;
    }
}
