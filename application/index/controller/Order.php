<?php
namespace app\index\controller;

/**
 * 产品
 */
class Order extends Common {

    public function initialize() {
        parent::initialize();

    }
    /**
     * 订单列表
     * @return [type] [description]
     */
    public function index() {
        $map = [];
        $order = "id desc";
        $field = "*";
        $page = '1';
        $limit = '20';
        if ($this->user['now'] && input('get.mobile')) {
            $map['uid'] = db('user')->where('mobile', input('get.mobile'))->value('id');
        } elseif (!$this->user['now']) {
            $map['uid'] = $this->user['id'];
        }
        if (input('get.status') != "") {
            $map['status'] = input('get.status');
        }
        if (input('get.page')) {
            $page = input('get.page');
        }
        if (input('get.limit') != "") {
            $limit = input('get.limit');
        }
        $data = model('Order')->chaxun($map, $order, $field, $page, $limit);
        $this->result($data, 1, '', 'json');
    }
    /**
     * 添加订单
     */
    public function add() {
        if (is_post()) {
            $product = model("Product")->get(input('post.pd_id'));
            $mobile = str_replace(' ', '', trim(input('post.mobile')));
            $safe_password = trim(input('post.safe_password'));
            if ($this->user['safe_password'] != encrypt($safe_password)) {
                $this->result('', 2, '您的安全密码不正确', 'json');
            }
            $data = array(
                'uid' => $this->user['id'],
                'pd_id' => trim(input('post.pd_id')),
                'pd_num' => trim(input('post.pd_num')),
                'pd_name' => $product['name'],
                'pd_price' => $product['price'] / cache('config')['price'],
                'pd_attribute' => trim(input('post.attribute')),
                'address' => trim(input('post.address')),
                'uname' => trim(input('post.uname')),
                'mobile' => $mobile,
            );
            $jine = $data['pd_price'] * $data['pd_num'];
            if ($jine > $this->user['wallet']) {
                $this->result('', 2, '您的瓜子币不足', 'json');
            }
            $rel = model('Order')->tianjia($data);
            if ($rel) {
                model("Product")
                    ->where('id', input('post.pd_id'))
                    ->inc('sales', $data['pd_num'])
                    ->dec('inventory', $data['pd_num'])
                    ->update();
                model('Wallet')->tianjia($this->user['id'], $jine, 12);
                $this->result('1', 1, '添加成功', 'json');
            } else {
                $this->result('1', 2, '添加失败', 'json');
            }
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
    }
    //订单取消
    public function quxiao() {
        if (input('post.id')) {
            $id = input('post.id');
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
        $info = model('Order')->get($id);
        if ($info) {
            $rel = model("Order")->xiugai(['status' => 0], ['id' => $id]);
            if ($rel) {
                model("Wallet")->tianjia($info['uid'], $info['pd_price'] * $info['pd_num'], 13);
                $this->result('1', 1, '订单取消成功', 'json');
            } else {
                $this->result('1', 2, '订单取消失败', 'json');
            }
        }
    }
    //订单详情
    public function detail() {
        $info = model('Order')->get(input('get.id'));
        $this->result($info, 1, '', 'json');
    }
    //订单发货
    public function deliver() {
        $info = model('Order')->get(input('id'));
        if (is_post()) {
            $data = array(
                'deliver_time' => date('Y-m-d H:i:s'),
                'deliver_company' => trim(input('post.deliver_company')),
                'deliver_number' => trim(input('post.deliver_number')),
                'status' => 2,
            );
            $rel = model('Order')->xiugai($data, ['id' => input('post.id')]);
            if ($rel) {
                $this->result('1', 1, '发货成功', 'json');
            } else {
                $this->result('1', 2, '发货失败', 'json');
            }
        } else {
            $this->result($info, 1, '', 'json');
        }
    }
    //订单收货
    public function receive() {
        $info = model("Order")->get(input('post.id'));
        if (is_post()) {
            $data = array(
                'finish_time' => date('Y-m-d H:i:s'),
                'status' => 3,
            );
            $rel = model('Order')->xiugai($data, ['id' => input('post.id')]);
            if ($rel) {
                $this->result('1', 1, '收货成功', 'json');
            } else {
                $this->result('1', 2, '收货失败', 'json');
            }
        }
    }
    /**
     * 删除订单
     * @return [type] [description]
     */
    public function del() {
        if (input('post.id')) {
            $id = input('post.id');
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
        $info = model('Order')->get($id);
        if ($info) {
            $rel = model('Order')->destroy($id);
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
