<?php
namespace app\index\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 *
 */
class User extends Model {
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    //详情
    public function detail($where, $field = "*") {
        return $this->where($where)->field($field)->find();
    }
    //查询
    public function chaxun($map = [], $order = '', $field = "*", $page = 1, $limit = 20) {
        return $this->where($map)->order($order)->field($field)->paginate($limit);
    }
    /**
     * 添加
     * @param  [array] $data [description]
     * @return [bool]       [description]
     */
    public function tianjia($data) {

        // 编号
        $account = db('user')->order('id desc')->value('account');
        if ($account) {
            $bb = substr($account, -4);
            $cc = substr($account, 0, 3);
            $dd = $bb + 1;
            $new_account = $cc . $dd;
        } else {
            $new_account = 'MSC5001';
        }
        $data['account'] = $new_account;
        $data['add_time'] = date('Y-m-d H:i:s');
        $data['password'] = encrypt($data['password']);
        $data['safe_password'] = encrypt($data['safe_password']);
        $rel = $this->insertGetId($data);
        return $rel;
    }
    /**
     * 修改
     * @param  [array] $data  [数据]
     * @param  [array] $where [条件]
     * @return [bool]
     */
    public function xiugai($data, $where) {
        return $this->save($data, $where);
    }

}
