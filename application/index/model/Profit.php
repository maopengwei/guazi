<?php
namespace app\index\model;

use think\Model;
use traits\model\SoftDelete;

/**
 *财务
 */
class Profit extends Model {
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    //查询
    public function chaxun($map, $order, $field, $page, $limit) {
        return $this->where($map)->order($order)->field($field)->paginate($limit);
    }

    public function tianjia($aid, $money, $type) {
        $data = array(
            1 => '店长兑换',
            2 => '兑换未通过',
            3 => '充值通过',
            4 => '录入订单',
            5 => '会员转出',
            6 => '录入会员',
            7 => '订单取消',
        );
        $array = array(
            'aid' => $aid,
            'money' => $money,
            'note' => $data[$type],
            'type' => $type,
            'add_time' => date('Y-m-d H:i:s'),
        );
        $rel = $this->insert($array);
        if ($rel) {
            $data = [1, 4, 6];
            if (in_array($type, $data)) {
                model('Admin')->where('Id', $aid)->setDec('integral', $money);
            } else {
                model('Admin')->where('Id', $aid)->setInc('integral', $money);
            }
        }
        return $rel;
    }

    public function getAidTextAttr($value, $data) {
        return model('Admin')->where('Id', $data['aid'])->value('ad_name');
    }

}
