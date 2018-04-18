<?php
namespace app\index\controller;

/**
 * 登录
 */
class Login extends Common
{

    public function initialize()
    {
        parent::initialize();
    }
    //前台登录
    public function login()
    {
        if ($this->user['status'] == 0) {
            $this->e_msg('您的账户已冻结');
        }
        model('User')->xiugai(['now' => 0], ['id' => $this->user['id']]);
        $info = $this->user;
        $info['jingtai'] = model('Wallet')->where('type', 2)->where('uid', $this->user['id'])->sum('jine');
        $info['dongtai'] = model('Msc')->where('type', 'in', [1, 2, 3, 4])->where('uid', $this->user['id'])->sum('jine');
        $this->result($this->user, 1, '登录成功', 'json');
    }
    //后台登录
    public function adminLogin()
    {
        if ($this->user['whether']) {
            model('User')->xiugai(['now' => 1], ['id' => $this->user['id']]);
            $this->result($this->user, 1, '登录成功', 'json');
        } else {
            $this->result('1', 2, '非法操作', 'json');
        }
    }
    //所有删除
    public function all_delete()
    {
        if (input('post.id')) {
            $id = input('post.id');
        } else {
            $this->e_msg('id不存在');
        }
        if (input('post.key')) {
            $key = input('post.key');
        } else {
            $this->e_msg('数据表不存在');
        }
        $array = array(
            'Attribute', 'Carouse', 'Center', 'Code', 'Message', 'Msc', 'Order', 'Product', 'Wallet', 'Purchase', 'Sell', 'Tixian', 'Transfer', 'Type', 'User',
        );
        if (!in_array($key, $array)) {
            $this->e_msg('非法操作');
        }
        $info = model($key)->get($id);
        if ($info) {
            $rel = model($key)->destroy($id);
            if ($rel) {
                $this->s_msg('删除成功');
            } else {
                $this->e_msg('请联系网站管理员');
            }
        } else {
            $this->e_msg('数据不存在');
        }
    }
}
