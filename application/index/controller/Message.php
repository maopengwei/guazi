<?php
namespace app\index\controller;

/**
 * 信息
 */
class Message extends Common {

    public function initialize() {
        parent::initialize();
    }

    /**
     * 公告列表
     * @return [type] [description]
     */
    public function index() {
        $map = [];
        $order = "id desc";
        $field = "*";
        $page = '1';
        $limit = '20';
        if (input('get.title') != "") {
            $map[] = ['title', 'like', input('get.title') . "%"];
        }
        if (input('get.page') != "") {
            $page = input('get.page');
        }
        if (input('get.limit') != "") {
            $limit = input('get.limit');
        }
        $data = model('Message')->chaxun($map, $order, $field, $page, $limit);
        $this->result($data, 1, '', 'json');
    }
    /**
     * 添加公告
     *
     */
    public function add() {
        if (is_post()) {
            $data = array(
                'title' => trim(input('post.title')),
                'content' => trim(input('post.content')),
            );
            $validate = validate('Verify');
            if (!$validate->scene('addMessage')->check($data)) {
                $this->result('', 2, $validate->getError(), 'json');
            }
            $rel = model('Message')->tianjia($data);
            if ($rel) {
                $this->result('1', 1, '添加成功', 'json');
            } else {
                $this->result('1', 2, '添加失败，请联系网站管理人员', 'json');
            }
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
    }
    /**
     * 修改公告
     * @return [type] [description]
     */
    public function edit() {
        $id = input('id');
        $info = model("Message")->get($id);
        if (!$info || !$id) {
            $this->result('1', 201, '非法操作', 'json');
        }
        if (is_post()) {
            $data = array(
                'title' => trim(input('post.title')),
                'content' => trim(input('post.content')),
            );
            $rel = model('Message')->xiugai($data, ['id' => input('post.id')]);
            if ($rel) {
                $this->result('', 1, '修改成功', 'json');
            } else {
                $this->result('', 2, '修改失败', 'json');
            }
        } else {
            $this->result($info, 1, '', 'json');
        }
    }
    /**
     * 删除公告
     * @return [type] [description]
     */
    public function del() {
        if (input('post.id')) {
            $id = input('post.id');
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
        $info = model('Message')->get($id);
        if ($info) {
            $rel = model('Message')->destroy($id);
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
