<?php
namespace app\index\controller;

/**
 * 投资 复投
 */
class Type extends Common
{

    public function initialize()
    {
        parent::initialize();

    }
    /**
     * 分类列表
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
        $data = model('Type')->chaxun($map, $order, $field, $page, $limit);
        $this->result($data, 1, '', 'json');
    }
    /**
     * 添加分类
     */
    public function add()
    {
        if (is_post()) {
            $name = trim(input('post.name'));
            $icon = trim(input('post.icon'));
            //分类名
            if (model('Type')->detail(['name' => $name], '')) {
                $this->result('1', 2, '该分类已存在', 'json');
            }
            $rel = model('Type')->tianjia($name, $icon);

            if ($rel) {
                $this->result('1', 1, '添加分类成功', 'json');
            } else {
                $this->result('1', 2, '添加分类失败，请联系网站开发人员', 'json');
            }
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
    }
    /**
     * 修改分类
     * @return [type] [description]
     */
    public function edit()
    {
        $info = model("Type")->get(input('id'));
        if (is_post()) {
            $data = [];
            if (input('post.name') != "") {
                $data['name'] = trim(input('post.name'));
            }
            if (input('post.icon') != "") {
                $data['icon'] = trim(input('post.icon'));
            }

            $rel = model('Type')->xiugai($data, ['id' => input('post.id')]);
            if ($rel) {
                $this->result('', 1, '修改成功', 'json');
            } else {
                $this->result('', 2, '您并没有做出修改', 'json');
            }

        } else {
            $this->result($info, 1, '成功', 'json');
        }
    }
    /**
     * 删除分类
     * @return [type] [description]
     */
    public function del()
    {
        if (input('post.id')) {
            $id = input('post.id');
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
        $info = model('Type')->get($id);
        if ($info) {
            $rel = model('Type')->destroy($id);
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
