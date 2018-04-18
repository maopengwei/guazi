<?php
namespace app\index\controller;

/**
 * 报单中心
 */
class Center extends Common {

    public function initialize() {
        parent::initialize();

    }
    /**
     * 报单中心申请列表
     * @return [type] [description]
     */
    public function index() {
        $map = [];
        $order = "status,id desc";
        $field = "*";
        $page = '1';
        $limit = '20';
        if (input('get.mobile')) {
            $map['uid'] = db('user')->where('mobile', input('get.mobile'))->value('id');
        }
        if (input('get.id')) {
            $map['uid'] = input('get.id');
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
        $data = model('Center')->chaxun($map, $order, $field, $page, $limit);
        foreach ($data as $k => $v) {
            $info = model("user")->get($v['uid']);
            $data[$k]['mobile'] = $info['mobile'];
            $data[$k]['real_name'] = $info['real_name'];
            $data[$k]['account'] = $info['account'];
        }
        $this->result($data, 1, '', 'json');
    }
    /**
     *投资购买
     * level 购买等级 12345
     * type 购买类型 0瓜子币1线下
     */
    public function add() {
        if (is_post()) {
            if ($this->user['is_center']) {
                $this->result('', 2, '您已经是报单中心了', 'json');
            }
            $info = model('Center')->where('uid', $this->user['id'])->where('status', 0)->find();
            if ($info) {
                $this->result('', 2, '您已经申请过了，请等待审核', 'json');
            }
            $team_count = team_count($this->user['id']);
            if ($team_count < 100) {
                $this->result('', 2, '您的团队总人数不足100', 'json');
            }
            $rel = model('Center')->tianjia($this->user['id']);

            if ($rel) {
                $this->result('1', 1, '申请成功，等待审核', 'json');
            } else {
                $this->result('1', 2, '申请失败，请联系网站管理人员', 'json');
            }
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
    }
    /**
     * 审核申请单
     * @return [type] [description]
     */
    public function check() {
        if (is_post()) {
            $data = array(
                'deal_time' => date('Y-m-d H:i:s'),
                'status' => input('post.status'),
                'check_id' => $this->user['id'],
            );
            $info = model('Center')->get(input('post.id'));
            $rel = model('Center')->xiugai($data, ['id' => input('post.id')]);
            if ($rel) {
                if (input('post.status') == 1) {
                    model('User')->xiugai(['center' => 1], ['id' => $info['uid']]);
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
        $info = model('Center')->get($id);
        if ($info) {
            $rel = model('Center')->destroy($id);
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
