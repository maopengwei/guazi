<?php
namespace app\index\controller;

/**
 * 提现
 */
class Tixian extends Common {

    public function initialize() {
        parent::initialize();
    }

    /**
     * 提现列表
     * @return [type] [description]
     */
    public function index() {
        $map = [];
        $order = "status,id desc";
        $field = "*";
        $page = '1';
        $limit = '20';
        if (!$this->user['now']) {
            $map['uid'] = $this->user['id'];
        }
        if (input('get.mobile')) {
            $map['uid'] = db('user')->where('mobile', input('get.mobile'))->value('id');
        }
        if (input('get.status') != "") {
            $map['status'] = input('get.status');
        }
        if (input('get.type') != "") {
            $map['type'] = input('get.type');
        }
        if (input('get.page')) {
            $page = input('get.page');
        }
        if (input('get.limit') != "") {
            $limit = input('get.limit');
        }
        $data = model('Tixian')->chaxun($map, $order, $field, $limit);
        foreach ($data as $k => $v) {
            $info = model('User')->get($v['uid']);
            $data[$k]['mobile'] = $info['mobile'];
            $data[$k]['real_name'] = $info['real_name'];
            $data[$k]['bank_addr'] = $info['bank_addr'];
        }
        $data->sum = 5;
        $this->result($data, 1, '', 'json');
    }
    /**
     * 添加提现单
     */
    public function add() {
        if (is_post()) {
            $jine = trim(input('post.jine'));
            $safe_password = trim(input('post.safe_password'));
            if ($this->user['safe_password'] != encrypt($safe_password)) {
                $this->result('', 2, '您的安全密码不正确', 'json');
            }
            $data = array(
                'uid' => $this->user['id'],
                'jine' => $jine,
                'type' => input('post.type'),
                'real_name' => $this->user['real_name'],
            );
            if (input('post.type') == 1) {
                if (!$this->user['wechat']) {
                    $this->result('', 2, '请到个人中添加微信号', 'json');
                }
                $data['account'] = $this->user['wechat'];
            } elseif (input('post.type') == 0) {
                if (!$this->user['alipay']) {
                    $this->result('', 2, '请到个人中添加支付宝号', 'json');
                }
                $data['account'] = $this->user['alipay'];
            } else {
                if (!$this->user['bank_number']) {
                    $this->result('', 2, '请到个人中添加银行卡', 'json');
                }
                $data['account'] = $this->user['bank_number'];
                $data['bank_addr'] = $this->user['bank_addr'];
            }
            if (!is_numeric($jine) || $jine <= 0) {
                $this->result('', 2, '请输入合法金额', 'json');
            }
            if ($jine > $this->user['wallet']) {
                $this->result('', 2, '您的瓜子币不足', 'json');
            }
            $rel = model('Tixian')->tianjia($data);
            if ($rel) {
                $this->result('1', 1, '提现成功,等待审核', 'json');
            } else {
                $this->result('1', 2, '提现失败，请联系网站管理人员', 'json');
            }
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
    }
    /**
     * 审核提现单
     * @return [type] [description]
     */
    public function check() {
        if (is_post()) {
            $data = array(
                'deal_time' => date('Y-m-d H:i:s'),
                'status' => input('post.status'),
                'check_id' => $this->user['id'],
            );
            $info = model('Tixian')->get(input('post.id'));
            $account = model('User')->get($info['uid']);
            $rel = model('Tixian')->xiugai($data, ['id' => input('post.id')]);
            if ($rel) {
                if (input('post.status') == 2) {
                    model('wallet')->tianjia($info['uid'], $info['jine'], 9);
                }
                $this->result('', 1, '已审核', 'json');
            } else {
                $this->result('', 2, '审核失败', 'json');
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
        $info = model('Tixian')->get($id);
        if ($info) {
            $rel = model('Tixian')->destroy($id);
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
