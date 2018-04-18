<?php
namespace app\index\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 *
 */
class Wallet extends Model {
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
    public function tianjia($uid, $jine, $type) {
        $data = array(
            1 => '投资消耗',
            2 => '静态收益',
            3 => '动态直推奖',
            4 => '动态领导奖',
            5 => '动态绩效奖',
            6 => '好友转出',
            7 => '好友转入',
            8 => '提现申请',
            9 => '提现申请驳回',
            10 => '寄售卖出',
            11 => '寄售买入',
            12 => '购买产品',
            13 => '订单取消',
            14 => '报单中心奖',
            15 => '寄售取消',
            16 => '后台赠送',
            17 => '后台扣除',
        );
        $array = array(
            'uid' => $uid,
            'jine' => $jine,
            'type' => $type,
            'note' => $data[$type],
            'add_time' => date('Y-m-d H:i:s'),
        );
        $rel = $this->insertGetId($array);
        if ($rel) {
            if (in_array($type, array(1, 6, 8, 10, 12, 17))) {
                model('User')->where('id', $uid)->setDec('wallet', $jine);
            } else {
                model('User')->where('id', $uid)->setInc('wallet', $jine);
            }
        }
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
