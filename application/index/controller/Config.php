<?php
namespace app\index\controller;

/**
 * 配置控制器
 */
class Config extends Common
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        if (is_post()) {
            $data = input('post.');
            $rel = model('Config')->xiugai($data);
            if ($rel) {
                $this->result($rel, 1, '修改成功', 'json');
            } else {
                $this->result($rel, 2, '修改失败', 'json');
            }
        } else {
            $info = model('Config')->getInfo();
            $this->result($info, 1, '', 'json');
        }
    }
    public function profit()
    {
        $data = input('post.');
        foreach ($data as $k => $v) {
            db('config_static')->where('id', $v['id'])->setfield('profit', $v['profit']);
        }
        $this->result('1', 1, '修改成功', 'json');
    }
    public function carouse()
    {
        if (is_post()) {
            if (input('post.carouse/a')) {
                $carouse = implode(',', input('post.carouse/a'));
            }

            $rel = db("config")->where('id', 14)->setfield('value', $carouse);
            if ($rel) {
                $this->result($rel, 1, '修改成功', 'json');
            } else {
                $this->result($rel, 2, '您并没有做出修改', 'json');
            }
        } else {
            $car = db('config')->where('id', 14)->value('value');
            if ($car) {
                $carouse = explode(',', $car);
            } else {
                $carouse = [];
            }
            $this->result($carouse, 1, '成功', 'json');
        }

    }
}
