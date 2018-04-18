<?php
namespace app\index\controller;

/**
 * 产品
 */
class Attribute extends Common {

    public function initialize() {
        parent::initialize();
    }
    /**
     * 属性列表
     * @return [type] [description]
     */
    public function index() {
        $map = [];
        $order = "id desc";
        $field = "*";
        $page = '1';
        $limit = '20';
        $map['pd_id'] = input('get.pd_id');
        $data = model('Attribute')->chaxun($map, $order, $field, $page, $limit);
        $this->result($data, 1, '', 'json');
        $this->success();
    }
    /**
     * 添加属性
     */
    public function add() {
        if (is_post()) {
            $data = array(
                'pd_id' => trim(input('post.pd_id')),
                'key' => trim(input('post.key')),
                'value' => trim(input('post.value')),
            );
            $rel = model('Attribute')->tianjia($data);
            if ($rel) {
                $this->result('1', 1, '添加成功', 'json');
            } else {
                $this->result('1', 2, '添加失败', 'json');
            }
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
    }
    //属性修改
    public function edit() {
        $info = model('Attribute')->get(input('id'));
        if (is_post()) {
            $data = array(
                'key' => trim(input('post.key')),
                'value' => trim(input('post.value')),
            );
            $rel = model('Attribute')->xiugai($data, ['id' => input('post.id')]);
            if ($rel) {
                $this->result('1', 1, '修改成功', 'json');
            } else {
                $this->result('1', 2, '修改失败', 'json');
            }
        } else {
            $this->result('', 201, '非法操作', 'json');
        }
    }
    /**
     * 属性删除
     * @return [type] [description]
     */
    public function del() {
        if (input('post.id')) {
            $id = input('post.id');
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
        $info = model('Attribute')->get($id);
        if ($info) {
            $rel = model('Attribute')->destroy($id);
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
