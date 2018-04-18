<?php
namespace app\index\controller;

/**
 * 用户
 */
class User extends Common
{
    public function initialize()
    {
        parent::initialize();
    }
    public function index()
    {
        $map = [];
        $order = "id desc";
        $field = "*";
        $page = '1';
        $limit = '20';
        if (input('get.pmobile')) {
            $map['pid'] = db('user')->where('mobile', input('get.pmobile'))->value('id');
        }
        if (input('get.mobile')) {
            $map['mobile'] = input('get.mobile');
        }
        if (input('get.whether') != "") {
            $map['whether'] = input('get.whether');
        }
        if (input('get.pid')) {
            $map['pid'] = input('get.pid');
        }
        if (input('get.level')) {
            $map['level'] = input('get.level');
        }
        if (input('get.status') != "") {
            $map['status'] = input('get.status');
        }
        if (input('get.page') != "") {
            $page = input('get.page');
        }
        if (input('get.limit') != "") {
            $limit = input('get.limit');
        }
        $data = model('User')->chaxun($map, $order, $field, $page, $limit);
        foreach ($data as $k => $v) {
            $info = model('User')->where('id', $v['pid'])->find();
            $data[$k]['ptel'] = $info['mobile'];
            $data[$k]['pname'] = $info['real_name'];
        }
        $this->result($data, 1, '', 'json');
    }
    //查询某人身份信息
    public function user()
    {
        if (is_post()) {
            if (input('post.mobile') != "") {
                $info = model('User')->detail(['mobile' => input('post.mobile')], '*');
            }
            if (input('post.id') != "") {
                $info = model('User')->get(input('post.id'));
            }
            if ($info) {
                $this->s_msg('查询成功', $info);
            } else {
                $this->result('', 2, '查无此人', 'json');
            }
        }
    }
    public function add()
    {
        if (is_post()) {
            $mobile = str_replace(' ', '', trim(input('post.mobile')));
            $ptel = str_replace(' ', '', trim(input('post.ptel')));
            $data = array(
                'real_name' => trim(input('post.real_name')),
                'mobile' => $mobile,
                'password' => trim(input('post.password')),
                'safe_password' => trim(input('post.safe_password')),
                'alipay' => trim(input('post.alipay')),
                'wechat' => trim(input('post.wechat')),
                'ptel' => $ptel,
                'id_card' => trim(input('post.id_card')),
                'id_card_fan' => trim(input('post.real_name')),
                'whether' => trim(input('post.whether')),
            );
            //手机号
            if (model('User')->detail(['mobile' => $data['mobile']], '')) {
                $this->result('1', 2, '该手机号已存在', 'json');
            }
            $aa = 0;
            //父账号
            if (array_key_exists('ptel', $data)) {
                $parent = model('User')->detail(['mobile' => trim($data['ptel'])], 'id,path,length');
                if ($parent) {
                    $data['pid'] = $parent['id'];
                    $data['path'] = $parent['path'] . "," . $parent['id'];
                    $data['length'] = $parent['length'] + 1;
                    $aa = 1;
                } else {
                    $data['pid'] = 0;
                    $data['path'] = 0;
                    $data['length'] = 0;
                }
            } else {
                $data['pid'] = 0;
                $data['path'] = 0;
                $data['length'] = 0;
            }

            $rel = model('User')->tianjia($data);
            if ($rel) {
                $aa = model('User')->get($rel);
                $this->result($aa, 1, '添加成功', 'json');
            } else {
                $this->result('1', 2, '添加失败', 'json');
            }
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
    }
    public function renzheng()
    {
        if (in_array($this->user['status'], array('1,3'))) {
            $this->result('1', 2, '您的用户状态状态不接受认证', 'json');
        }
        $id = $this->user['id'];
        $data = array(
            'real_name' => trim(input('real_name')),
            'id_card_number' => trim(input('post.id_card_number')),
            'bank_name' => trim(input('post.bank_name')),
            'bank_addr' => trim(input('post.bank_addr')),
            'bank_person' => trim(input('post.bank_person')),
            'bank_number' => trim(input('post.bank_number')),
            'alipay' => trim(input('post.alipay')),
            'wechat' => trim(input('post.wechat')),
            'id_card' => trim(input('post.id_card')),
            'id_card_fan' => trim(input('post.id_card_fan')),
            'status' => 3,
        );
        $validate = validate('Verify');
        if (!$validate->scene('renUser')->check($data)) {
            $this->result('', 2, $validate->getError(), 'json');
        }
        $rel = model('User')->xiugai($data, ['id' => $this->user['id']]);
        if ($rel) {
            $this->result('1', 1, '认证成功，等待审核', 'json');
        } else {
            $this->result('1', 2, '认证失败，请联系网站管理员', 'json');
        }
    }
    public function check()
    {
        if (input('id')) {
            $id = input('id');
        } else {
            $id = $this->user['id'];
        }
        $data = array(
            'status' => input('post.status'),
        );
        $rel = model('User')->xiugai($data, ['id' => $id]);
        if ($rel) {
            $this->result('1', 1, '审核成功，状态改变', 'json');
        } else {
            $this->result('1', 2, '审核失败，请联系网站开发者', 'json');
        }
    }
    /**
     * 修改用户
     * @return [type] [description]
     */
    public function edit()
    {
        if (input('id')) {
            $id = input('id');
        } else {
            $id = $this->user['id'];
        }
        if (is_post()) {
            $data = [];
            if (input('post.alipay') != "") {
                $data['alipay'] = input('post.alipay');
            }
            if (input('post.wechat') != "") {
                $data['wechat'] = input('post.wechat');
            }
            if (input('post.bank_name') != "") {
                $data['bank_name'] = input('post.bank_name');
            }
            if (input('post.bank_name') != "") {
                $data['bank_name'] = input('post.bank_name');
            }
            if (input('post.bank_number') != "") {
                $data['bank_number'] = input('post.bank_number');
            }
            if (input('post.bank_addr') != "") {
                $data['bank_addr'] = input('post.bank_addr');
            }
            if (input('post.bank_person') != "") {
                $data['bank_person'] = input('post.bank_person');
            }
            if (input('post.status') != "") {
                $data['status'] = input('post.status');
            }
            if (input('mobile') != "") {
                $data['mobile'] = trim(input('post.mobile'));
            }
            if (input('real_name') != "") {
                $data['real_name'] = trim(input('post.real_name'));
            }
            if (input('password') != "") {
                $data['password'] = encrypt(trim(input('post.password')));
            }
            if (input('safe_password') != "") {
                $data['safe_password'] = encrypt(trim(input('post.safe_password')));
            }
            $rel = model('User')->xiugai($data, ['id' => $id]);
            if ($rel) {
                $this->result('1', 1, '修改成功', 'json');
            } else {
                $this->result('1', 2, '修改失败', 'json');
            }
        } else {
            $info = model("User")->get($id);
            $info['ptel'] = model('User')->where('id', $info['pid'])->value('mobile');
            $this->result($info, 1, '请求成功', 'json');
        }
    }
    public function change()
    {
        if (input('key') == 1) {
            $key = 'password';
        } else {
            $key = 'safe_password';
        }
        $password = trim(input('post.password'));
        if ($this->user[$key] != encrypt($password)) {
            $this->result('', 2, '您的原密码不正确', 'json');
        }
        if (trim(input('post.pass')) != trim(input('post.pass1'))) {
            $this->result('', 2, '两次输入的密码不相同', 'json');
        }
        $rel = model("User")->where('id', $this->user['id'])->setfield($key, encrypt(trim(input('post.pass'))));
        if ($rel) {
            $this->result('1', 1, '修改成功', 'json');
        } else {
            $this->result('1', 2, '修改失败', 'json');
        }
    }
    /**
     * 删除用户
     * @return [type] [description]
     */
    public function del()
    {
        if (input('post.id')) {
            $id = input('post.id');
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
        $info = model('User')->get($id);
        if ($info) {
            $rel = model('User')->destroy($id);
            if ($rel) {
                $this->result('1', 1, '删除成功', 'json');
            } else {
                $this->result('1', 2, '删除失败', 'json');
            }
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
    }
    //赠送瓜子
    public function giving()
    {
        if (!is_numeric(input('post.jine'))) {
            $this->result('1', 2, '请输入合法金额', 'json');
        }
        if (input('post.jine') == 0) {
            $this->result('1', 2, '请输入合法金额', 'json');
        }
        if (input('post.id') == "") {
            $this->result('1', 2, '非法操作', 'json');
        }
        if (input('post.jine') > 0) {
            $rel = model('msc')->tianjia(input('post.id'), input('post.jine'), 5);
        } else {
            $rel = model('msc')->tianjia(input('post.id'), abs(input('post.jine')), 6);
        }
        if ($rel) {
            $this->result(1, '1', '操作成功', 'json');
        } else {
            $this->result(1, '201', '操作失败', 'json');
        }
    }
}
