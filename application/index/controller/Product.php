<?php
namespace app\index\controller;

/**
 * 产品
 */
class Product extends Common
{

    public function initialize()
    {
        parent::initialize();

    }
    /**
     * 产品列表
     * @return [type] [description]
     */
    public function index()
    {
        $map = [];
        $order = "sort desc,id desc";
        $field = "*";
        $page = '1';
        $limit = '20';
        if (input('get.type_id') != "") {
            $map['type_id'] = input('get.type_id');
        }
        if (input('get.order') != "") {
            $order = input('get.order');
        }
        if (input('get.is_hot') != "") {
            $map['is_hot'] = input('get.is_hot');
        }
        if (input('get.name') != "") {
            $map['name'] = input('get.name');
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
        $data = model('Product')->chaxun($map, $order, $field, $page, $limit);
        foreach ($data as $k => $v) {
            $data[$k]['cont'] = explode(',', $v['content']);
            $data[$k]['exchange'] = cache('config')['price'];
        }
        $this->result($data, 1, '', 'json');
    }
    /**
     * 添加产品
     */
    public function add()
    {
        if (is_post()) {
            // $this->result(request()->post("content/a"), 1, '添加成功', 'json');
            // halt($_POST['content']);

            $data = array(
                'type_id' => input('post.type_id'),
                'name' => trim(input('post.name')),
                'price' => trim(input('post.price')),
                'pic' => trim(input('post.pic')),
                'content' => implode(',', input('post.content/a')),
                'inventory' => trim(input('post.inventory')),
            );
            $rel = model('Product')->tianjia($data);
            if ($rel) {

                $this->result('1', 1, '添加成功', 'json');
            } else {
                $this->result('1', 2, '添加失败', 'json');
            }
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
    }
    //产品详情
    public function detail()
    {
        $info = model('Product')->get(input('get.id'));
        $info['content'] = explode(',', $info['content']);
        $info['exchange'] = cache('config')['price'];
        $attribute = model("Attribute")->where('pd_id', input('get.id'))->select();
        $list = [];
        $i = 0;
        if ($attribute) {
            foreach ($attribute as $k => $v) {
                $list[$i]['name'] = $v['key'];
                $list[$i]['value'] = explode(',', $v['value']);
                $i++;
            }
        }
        $data = array(
            0 => $info,
            1 => $list,
        );
        $this->result($data, 1, '', 'json');
    }
    //产品修改
    public function edit()
    {
        $info = model('Product')->get(input('id'));
        $info['content'] = explode(',', $info['content']);
        $info['type_name'] = model('Type')->where('id', $info['type_id'])->value('name');
        if (is_post()) {
            $data = [];
            if (input('post.status') != "") {
                $data['status'] = trim(input('post.status'));
            }
            if (input('post.name') != "") {
                $data['name'] = trim(input('post.name'));
            }
            if (input('post.price') != "") {
                $data['price'] = trim(input('post.price'));
            }
            if (input('post.content/a') != "") {
                $data['content'] = implode(',', input('post.content/a'));
            }
            if (input('post.inventory') != "") {
                $data['inventory'] = trim(input('post.inventory'));
            }
            if (input('post.type_id') != "") {
                $data['type_id'] = trim(input('post.type_id'));
            }
            if (input('post.is_hot') != "") {
                $data['is_hot'] = trim(input('post.is_hot'));
            }
            if (input('post.pic') != "") {
                $data['pic'] = trim(input('post.pic'));
            }
            $rel = model('Product')->xiugai($data, ['id' => input('post.id')]);
            if ($rel) {
                $this->result('1', 1, '修改成功', 'json');
            } else {
                $this->result('1', 2, '您没有修改任何东西', 'json');
            }
        } else {
            $this->result($info, 1, '', 'json');
        }
    }
    /**
     * 删除产品
     * @return [type] [description]
     */
    public function del()
    {
        if (input('post.id')) {
            $id = input('post.id');
        } else {
            $this->result('1', 201, '非法操作', 'json');
        }
        $info = model('Product')->get($id);
        if ($info) {
            $rel = model('Product')->destroy($id);
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
