<?php
namespace app\index\controller;

/**
 * 转账
 */
class Sell extends Common
{

    public function initialize()
    {
        parent::initialize();

    }
    /**
     * 转账列表
     * @return [type] [description]
     */
    public function index()
    {
        $map = [];
        $order = "id desc";
        $field = "*";
        $page = '1';
        $limit = '20';
        $map['cold'] = 0;
        if (input('type') == 4) {

        } elseif ($this->user['now'] && input('get.mobile')) {
            if (input('type') == 0) {
                $map['uid|xiadan_id'] = db('user')->where('mobile', input('get.mobile'))->value('id');
            } elseif (input('type') == 1) {
                $map['uid'] = db('user')->where('mobile', input('get.mobile'))->value('id');
            } elseif (input('type') == 2) {
                $map['xiadan_id'] = db('user')->where('mobile', input('get.mobile'))->value('id');
            }
        } elseif (!$this->user['now']) {
            if (input('type') == 0) {
                $map['uid|xiadan_id'] = $this->user['id'];
            } elseif (input('type') == 1) {
                $map['uid'] = $this->user['id'];
            } else {
                $map['xiadan_id'] = $this->user['id'];
            }
        }

        if (input('get.status') != "") {
            $map['status'] = input('get.status');
        }
        if (input('get.cold')) {
            $map['cold'] = input('get.cold');
        }
        if (input('get.page') != "") {
            $page = input('get.page');
        }
        if (input('get.limit') != "") {
            $limit = input('get.limit');
        }
        $data = model('Sell')->chaxun($map, $order, $field, $page, $limit);
        $data->sum = '9';
        foreach ($data as $k => $v) {
            $data[$k]['seller'] = model('User')->get($v['uid']);
            $data[$k]['buyer'] = model('User')->get($v['xiadan_id']);
            $data[$k]['seller_mobile'] = $data[$k]['seller']['mobile'];
            $data[$k]['buyer_mobile'] = $data[$k]['buyer']['mobile'];
            if ($this->user['id'] == $v['uid']) {
                $data[$k]['ornot'] = 0; //卖家
                $data[$k]['user'] = $data[$k]['buyer'];
            } else {
                $data[$k]['ornot'] = 1; //买家
                $data[$k]['user'] = $data[$k]['seller'];
            }
        }

        $this->result($data, 1, '', 'json');
    }
    /**
     * 寄卖
     */
    public function add()
    {
        if (is_post()) {
            $safe_password = trim(input('post.safe_password'));
            if ($this->user['safe_password'] != encrypt($safe_password)) {
                $this->result('', 2, '您的安全密码不正确', 'json');
            }
            $jine = trim(input('post.jine'));
            if ($jine > $this->user['wallet']) {
                $this->result('', 2, '您的瓜子币不足', 'json');
            }

            if (!is_numeric($jine) || $jine < 100 || $jine % 100 != 0) {
                $this->result('', 2, '金额必须是100的或100的倍数', 'json');
            }

            $rel = model('Sell')->tianjia($this->user['id'], $jine);
            if ($rel) {
                $this->result('1', 1, '寄售成功', 'json');
            } else {
                $this->result('1', 2, '寄售失败，请联系网站管理人员', 'json');
            }
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
    }
    /**
     * 买入
     * @return [type] [description]
     */
    public function buy()
    {
        if (is_post()) {
            $safe_password = trim(input('post.safe_password'));
            if ($this->user['safe_password'] != encrypt($safe_password)) {
                $this->result('', 2, '您的安全密码不正确', 'json');
            }
            $info = model('Sell')->get(input('post.id'));
            if ($info['uid'] == $this->user['id']) {
                $this->result('', 2, '您不能购买自己的单子', 'json');
            }
            $data = array(
                'xiadan_id' => $this->user['id'],
                'status' => 1,
                'xiadan_time' => date('Y-m-d H:i:s'),
            );
            $rel = model('Sell')->xiugai($data, ['id' => input('post.id')]);
            if ($rel) {
                $this->result('1', 1, '下单成功,请打款', 'json');
            } else {
                $this->result('1', 2, '下单失败，请联系网站管理人员', 'json');
            }
        }
    }
    //详情
    public function detail()
    {
        $id = input('get.id');
        $sell = model("Sell")->get($id);
        $seller = [];
        $buyer = [];
        if ($sell['uid']) {
            $seller = model('User')->get($sell['uid']);
        }
        if ($sell['xiadan_id']) {
            $buyer = model('User')->get($sell['xiadan_id']);
        }
        $data = array(
            'info' => $sell,
            'seller' => $seller,
            'buyer' => $buyer,
        );
        $this->result($data, 1, '', 'json');
    }
    //确认打款
    public function dakuan()
    {
        if (is_post()) {
            $safe_password = trim(input('post.safe_password'));
            if ($this->user['safe_password'] != encrypt($safe_password)) {
                $this->result('', 2, '您的安全密码不正确', 'json');
            }
            $info = model('Sell')->get(input('post_id'));
            if ($info['uid'] == $this->user['id']) {
                $this->result('', 2, '您不能给自己的单子打款', 'json');
            }
            if (input('post.pic') == "") {
                $this->e_msg('请上传打款凭证');
            }
            $data = array(
                'status' => 2,
                'dakuan_time' => date('Y-m-d H:i:s'),
                'pic' => input('post.pic'),
            );
            $rel = model('Sell')->xiugai($data, ['id' => input('post.id')]);
            if ($rel) {
                $this->result('1', 1, '打款成功,请等待对面收款', 'json');
            } else {
                $this->result('1', 2, '确定打款失败，请联系网站管理人员', 'json');
            }
        }
    }
    //确认收款
    public function shoukuan()
    {
        if (is_post()) {
            $safe_password = trim(input('post.safe_password'));
            if ($this->user['safe_password'] != encrypt($safe_password)) {
                $this->result('', 2, '您的安全密码不正确', 'json');
            }
            $data = array(
                'status' => 3,
                'finish_time' => date('Y-m-d H:i:s'),
            );
            $info = model("Sell")->get(input('post.id'));
            $rel = model('Sell')->xiugai($data, ['id' => input('post.id')]);
            if ($rel) {
                model('Wallet')->tianjia($info['xiadan_id'], $info['jine'], 11);
                $this->result('1', 1, '收款成功,该订单已完结', 'json');
            } else {
                $this->result('1', 2, '收款失败，请联系网站管理人员', 'json');
            }
        }
    }
    //未收款投诉
    public function tousu()
    {
        if (is_post()) {
            $data = array(
                'cold' => 3,
                'cold_time' => date('Y-m-d H:i:s'),
            );
            $info = model("Sell")->get(input('post.id'));
            $rel = model('Sell')->xiugai($data, ['id' => input('post.id')]);
            if ($rel) {
                $this->result('1', 1, '投诉成功, 等待后台处理', 'json');
            } else {
                $this->result('1', 2, '投诉失败，请联系网站管理人员', 'json');
            }
        }
    }
    /**
     * 删除单号
     * @return [type] [description]
     */
    public function del()
    {
        if (input('post.id')) {
            $id = input('post.id');
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
        $info = model('Sell')->get($id);
        if ($info) {
            $rel = model('Sell')->destroy($id);
            if ($rel) {
                $this->result('1', 1, '删除成功', 'json');
            } else {
                $this->result('1', 2, '删除失败', 'json');
            }
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
    }
    /**
     * 删除单号
     * @return [type] [description]
     */
    public function quxiao()
    {
        if (input('post.id')) {
            $id = input('post.id');
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
        $data = array(
            'status' => 4,
        );
        $info = model("Sell")->get($id);
        $rel = model('Sell')->xiugai($data, ['id' => $id]);
        if ($rel) {
            model('Wallet')->tianjia($info['uid'], $info['jine'], 15);
            $this->result('1', 1, '取消成功', 'json');
        } else {
            $this->result('1', 2, '取消失败', 'json');
        }
    }
}
