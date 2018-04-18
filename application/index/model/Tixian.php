<?php
namespace app\index\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 *财务
 */
class Tixian extends Model {
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    //用户姓名
    public function getUidTextAttr($value, $data) {
        return model('User')->where('Id', $data['uid'])->value('real_name');
    }
    //添加
    public function tianjia($data) {
        $recharge = $data['jine'] * cache('config')['recharge'] / 100;
        $price = cache('config')['price'];
        $data['shidao'] = $data['jine'] - $recharge;
        $data['recharge'] = $recharge;
        $data['price'] = $price;
        $data['add_time'] = date('Y-m-d H:i:s');
        $rel = $this->insert($data);
        if ($rel) {
            model('wallet')->tianjia($data['uid'], $data['jine'], 8);
        }
        return $rel;
    }
    //查询
    public function chaxun($map, $order, $field, $limit) {
        return $this->where($map)->order($order)->field($field)->paginate($limit);
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
