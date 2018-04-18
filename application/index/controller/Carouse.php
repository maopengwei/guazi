<?php
namespace app\index\controller;

/**
 * 信息
 */
class Carouse extends Common
{

    public function initialize()
    {
        parent::initialize();
    }

    /**
     * 轮播图列表
     * @return [type] [description]
     */
    public function index()
    {
        $map = [];
        $order = "id desc";
        $field = "*";
        $page = '1';
        $limit = '20';
        if (input('get.page')) {
            $page = input('get.page');
        }
        if (input('get.limit') != "") {
            $limit = input('get.limit');
        }
        $data = model('Carouse')->chaxun($map, $order, $field, $page, $limit);
        $this->result($data, 1, '', 'json');
    }
    /**
     * 添加轮播图
     */
    public function add()
    {
        if (is_post()) {
            $data = array(
                'path' => trim(input('post.path')),
                'url' => trim(input('post.url')),
                'name' => trim(input('post.name')),
            );
            $validate = validate('Verify');
            if (!$validate->scene('addCarouse')->check($data)) {
                $this->result('', 2, $validate->getError(), 'json');
            }
            $rel = model('Carouse')->tianjia($data);
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
     * 修改轮播图
     * @return [type] [description]
     */
    public function edit()
    {
        $id = input('id');
        $info = model("Carouse")->get($id);
        if (!$info || !$id) {
            $this->result('1', 201, '非法操作', 'json');
        }
        if (is_post()) {
            $data = array(
                'path' => trim(input('post.path')),
                'name' => trim(input('post.name')),
                'url' => trim(input('post.url')),
                'sort' => trim(input('post.sort')),
            );
            $rel = model('Carouse')->xiugai($data, ['id' => input('post.id')]);
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
     * 删除轮播图
     * @return [type] [description]
     */
    public function del()
    {
        if (input('post.id')) {
            $id = input('post.id');
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
        $info = model('Carouse')->get($id);
        if ($info) {
            $rel = model('Carouse')->destroy($id);
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
