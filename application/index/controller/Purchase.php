<?php
namespace app\index\controller;

/**
 * 投资 复投
 */
class Purchase extends Common
{

    public function initialize()
    {
        parent::initialize();

    }
    /**
     * 投资列表
     * @return [type] [description]
     */
    public function index()
    {
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
        if (input('get.type') != "") {
            $map['type'] = input('get.type');
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
        $data = model('Purchase')->chaxun($map, $order, $field, $page, $limit);
        foreach ($data as $k => $v) {
            $info = model('User')->get($v['uid']);
            $data[$k]['mobile'] = $info['mobile'];
            $data[$k]['account'] = $info['account'];
            $data[$k]['real_name'] = $info['real_name'];
        }
        $this->result($data, 1, '', 'json');
    }
    /**
     *投资购买
     * level 购买等级 12345
     * type 购买类型 0瓜子币1线下
     */
    public function add()
    {
        if (is_post()) {
            $uid = $this->user['id'];
            if ($this->user['status'] != 1) {
                $this->result('', 2, '您没有实名认证成功', 'json');
            }
            $safe_password = trim(input('post.safe_password'));
            if ($this->user['safe_password'] != encrypt($safe_password)) {
                $this->result('', 2, '您的安全密码不正确', 'json');
            }
            if (input('post.level') <= 0) {
                $this->result('', 2, '购买金额不能为0', 'json');
            }
            if (input('post.type') == 0) {
                $jine = 500 * input('post.level');
            } else {
                $jine = 500 * input('post.level') / cache('config')['price'];
            }
            if (input('post.type') == 0 && $jine > $this->user['wallet']) {
                $this->result('', 2, '您的瓜子币不足', 'json');
            }
            $rel = model('Purchase')->tianjia($uid, input('post.level'), $jine, input('post.type'));
            if ($rel) {
                if (input('post.type') == 0) {
                    model('Wallet')->tianjia($uid, $jine, 1);
                    model('Msc')->tianjia($uid, $jine, 7);
                    $this->result('1', 1, '投资成功', 'json');
                }
                $this->result('1', 1, '投资成功,待审核', 'json');
            } else {
                $this->result('1', 2, '投资失败，请联系网站管理人员', 'json');
            }
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
    }
    /**
     * 审核投资单
     * @return [type] [description]
     */
    public function check()
    {
        if (is_post()) {
            $data = array(
                'deal_time' => date('Y-m-d H:i:s'),
                'status' => input('post.status'),
                'check_id' => $this->user['id'],
            );
            $info = model('Purchase')->get(input('post.id'));
            $account = model('User')->get($info['uid']);
            $rel = model('Purchase')->xiugai($data, ['id' => input('post.id')]);
            if ($rel) {
                if (input('post.status') == 1) {
                    //msc记录
                    model('Msc')->tianjia($info['uid'], $info['jine'], 8);
                }
                $this->result('', 1, '审核成功', 'json');
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
    public function del()
    {
        if (input('post.id')) {
            $id = input('post.id');
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
        $info = model('Purchase')->get($id);
        if ($info) {
            $rel = model('Purchase')->destroy($id);
            if ($rel) {
                $this->result('1', 1, '删除成功', 'json');
            } else {
                $this->result('1', 2, '删除失败', 'json');
            }
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
    }
    //msc等级分配图
    public function infoList()
    {
        $list = db('config_static')->select();
        $this->result($list, 1, '成功', 'json');
    }
}
