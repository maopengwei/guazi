<?php
namespace app\index\controller;

/**
 * 收益
 */
class Profit extends Common {

    public function initialize() {
        parent::initialize();
    }
    public function index() {
        $map = [];
        $order = "id desc";
        $field = "*";
        $page = 1;
        $limit = 20;
        if ($this->user['now']) {
        } else {
            $map['uid'] = $this->user['id'];
        }
        if (input('get.mobile')) {
            $map['uid'] = model('User')->where('mobile', input('get.mobile'))->value('id');
        }
        if (input('get.type')) {
            $map['type'] = input('get.type');
        }
        if (input('get.page')) {
            $page = input('get.page');
        }
        if (input('get.limit') != "") {
            $limit = input('get.limit');
        }
        $data = model('Wallet')->chaxun($map, $order, $field, $page, $limit);
        foreach ($data as $k => $v) {
            $info = model("user")->get($v['uid']);
            $data[$k]['mobile'] = $info['mobile'];
            $data[$k]['real_name'] = $info['real_name'];
            if (in_array($v['type'], [1, 6, 8, 10, 12, 17])) {
                $data[$k]['justice'] = 0;
            } else {
                $data[$k]['justice'] = 1;
            }
        }
        $this->result($data, 1, '', 'json');
    }
    public function msc() {
        $map = [];
        $order = "id desc";
        $field = "*";
        $page = 1;
        $limit = 20;
        if ($this->user['now']) {
        } else {
            $map['uid'] = $this->user['id'];
        }
        if (input('get.mobile')) {
            $map['uid'] = model('User')->where('mobile', input('get.mobile'))->value('id');
        }
        if (input('get.type')) {
            $map['type'] = input('get.type');
        }
        if (input('get.page')) {
            $page = input('get.page');
        }
        if (input('get.limit') != "") {
            $limit = input('get.limit');
        }
        // dump($map);
        $data = model('Msc')->chaxun($map, $order, $field, $page, $limit);
        foreach ($data as $k => $v) {
            $info = model("user")->get($v['uid']);
            $data[$k]['mobile'] = $info['mobile'];
            $data[$k]['real_name'] = $info['real_name'];
            if (in_array($v['type'], [7])) {
                $data[$k]['justice'] = 0;
            } else {
                $data[$k]['justice'] = 1;
            }
        }
        $this->result($data, 1, '', 'json');
    }
    public function jingtai() {
        $info = model("User")->where('mobile', input('get.mobile'))->find();
        $shouyi = $info['msc'] * level_profit($info['level']) / 10000 * input('get.days');
        $p = model("user")->get($info['pid']);
        $wallet = 0;
        if ($p) {
            if ($p['msc'] > $info['msc']) {
                $wallet = $jine * cache('config')['b_profit'] / 100;
            } else {
                $wallet = $p['msc'] * level_profit($p['level']) * cache('config')['p_profit'] / 1000000 * input('get.days');
            }
        }
        $data = array(
            0 => $shouyi,
            1 => $wallet,
        );
        $this->result($data, '1', '成功', 'json');
    }

}
