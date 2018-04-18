<?php
namespace app\index\controller;

/**
 * 转账
 */
class Transfer extends Common {

    public function initialize() {
        parent::initialize();

    }
    /**
     * 转账列表
     * @return [type] [description]
     */
    public function index() {
        $map = [];
        $order = "id desc";
        $field = "*";
        $page = '1';
        $limit = '20';
        if ($this->user['now'] && input('get.mobile')) {
            if (input('type') == 0) {
                $map['cuid|ruid'] = db('user')->where('mobile', input('get.mobile'))->value('id');
            } elseif (input('type') == 1) {
                $map['cuid'] = db('user')->where('mobile', input('get.mobile'))->value('id');
            } else {
                $map['ruid'] = db('user')->where('mobile', input('get.mobile'))->value('id');
            }
        } elseif (!$this->user['now']) {
            if (input('type') == 0) {
                $map['cuid|ruid'] = $this->user['id'];
            } elseif (input('type') == 1) {
                $map['cuid'] = $this->user['id'];
            } else {
                $map['ruid'] = $this->user['id'];
            }
        }
        if (input('get.page')) {
            $page = input('get.page');
        }
        if (input('get.limit') != "") {
            $limit = input('get.limit');
        }
        $data = model('Transfer')->chaxun($map, $order, $field, $page, $limit);
        foreach ($data as $k => $v) {
            $data[$k]['cuser'] = model('User')->get($v['cuid']);
            $data[$k]['ruser'] = model('User')->get($v['ruid']);
            $data[$k]['c_mobile'] = $data[$k]['cuser']['mobile'];
            $data[$k]['r_mobile'] = $data[$k]['ruser']['mobile'];
            if ($v['cuid'] == $this->user['id']) {
                $data[$k]['user'] = $data[$k]['ruser'];
            } else {
                $data[$k]['user'] = $data[$k]['cuser'];
            }
        }
        $this->result($data, 1, '', 'json');
    }
    /**
     * 转账瓜子币
     */
    public function add() {
        if (is_post()) {
            $uid = $this->user['id'];
            $safe_password = trim(input('post.safe_password'));
            if ($this->user['safe_password'] != encrypt($safe_password)) {
                $this->result('', 2, '您的安全密码不正确', 'json');
            }
            $jine = trim(input('post.jine'));
            if (!is_numeric($jine) || $jine < 10 || $jine % 10 != 0) {
                $this->result('', 2, '金额数目必须是10或10的倍数', 'json');
            }
            if ($jine > $this->user['wallet']) {
                $this->result('', 2, '您的瓜子币不足', 'json');
            }
            $transfer_id = model('User')->where('mobile', trim(input('post.mobile')))->value('id');
            if (!$transfer_id) {
                $this->result('', 2, '您要转账的用户不存在', 'json');
            }
            if ($transfer_id == $this->user['id']) {
                $this->result('', 2, '您不能转给自己', 'json');
            }
            $rel = model('Transfer')->tianjia($uid, $transfer_id, $jine);
            if ($rel) {
                $this->result('1', 1, '转账成功', 'json');
            } else {
                $this->result('1', 2, '转账失败，请联系网站管理人员', 'json');
            }
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
    }

    /**
     * 删除单号
     * @return [type] [description]
     */
    public function del() {
        if (input('post.id')) {
            $id = input('post.id');
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
        $info = model('Transfer')->get($id);
        if ($info) {
            $rel = model('Transfer')->destroy($id);
            if ($rel) {
                $this->result('1', 1, '删除成功', 'json');
            } else {
                $this->result('1', 2, '删除失败', 'json');
            }
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
    }
}
