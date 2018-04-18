<?php
namespace app\index\validate;

use think\Validate;

/**
 * 添加管理员验证器
 */
class Verify extends Validate {
    protected $rule = [
        'real_name' => 'require',
        'password' => 'require',
        'safe_password' => 'require',
        'id_card' => 'require',
        'id_card_fan' => 'require',
        'alipay' => 'require',
        'wechat' => 'require',
        'ptel' => 'require|regex:/^[1][34578][0-9]{9}$/',
        'mobile' => 'require|regex:/^[1][34578][0-9]{9}$/',
        'title' => 'require',
        'content' => 'require',
        'path' => 'require',
        'id_card_number' => ['require', "regex" => "^[1-9]\d{5}(18|19|([23]\d))\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$"],
        'bank_name' => 'require',
        'bank_addr' => 'require',
        'bank_person' => 'require',
        'bank_number' => 'require',
        // 'tel' => 'require|regex:/^[1][34578][0-9]{9}$/',
        // 'realname' => 'require',
        // 'pass' => 'require|min:6|max:16',
        // 'secpwd' => 'require|min:6|max:16',
        // 'old_pass' => 'require|min:6|max:16',
        // 'pass1' => 'require|confirm:pass',
        // 'old_secpwd' => 'require|min:6|max:16',
        // 'secpwd1' => 'require|different:secpwd',
        // 'sex' => 'require',
        // 'num' => 'require|number|>:0',
        // 'alipay' => 'require',
        // 'wechat' => 'require',
        // 'status' => 'require',
        // 'group' => 'require',
        // 'name' => 'require',
    ];
    protected $field = [
        'real_name' => '真实姓名',
        'password' => '登录密码',
        'mobile' => '手机号',
        'safe_password' => '安全密码',
        'id_card' => '身份证正面',
        'id_card_fan' => '身份证反面',
        'alipay' => '支付宝',
        'wechat' => '微信',
        'ptel' => '推荐人手机号',
        'title' => '标题',
        'content' => '内容',
        'path' => "图片",
        'id_card_number' => '身份证号',
        'bank_name' => '银行卡名称',
        'bank_addr' => '开户行地址',
        'bank_number' => '银行卡号',
        'bank_person' => '开户人',
        // 'pass' => '登录密码',
        // 'pass1' => '二次登录密码',
        // 'old_pass' => '原登录密码',
        // 'secpwd' => '安全密码',
        // 'old_secpwd' => '原安全密码',
        // 'sex' => '性别',
        // 'num' => '金额',
        // 'wechat' => '微信',
        // 'alipay' => '支付宝',
        // 'status' => '状态',
        // 'group' => '分组',
        // 'name' => '管理员',
    ];
    protected $message = [
        'mobile.regex' => '请填写正确的手机号',
        'ad_tel.regex' => '请填写正确的手机号',
        'ptel.regex' => '请填写正确的父账号手机号',
    ];
    protected $scene = [
        // 前台
        'addUser' => ['password', 'mobile', 'safe_password', 'ptel'],
        'renUser' => ['real_name', 'id_card_number', 'bank_name', 'bank_person', 'bank_addr', 'alipay', 'wechat', 'id_card', 'id_card_fan', 'bank_number'],
        'forgetUser' => ['mobile', 'password'],
        'addMessage' => ['title', 'content'],
        'addCarouse' => ['path'],
    ];

}
