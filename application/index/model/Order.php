<?php
namespace app\index\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 * 订单
 * status 1 待发货 2待收货 3已完成 0已取消
 */
class Order extends Model {
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    //详情
    public function detail($where, $field = "*") {
        return $this->where($where)->field($field)->find();
    }
    //查询
    public function chaxun($map, $order, $field, $page, $limit) {
        return $this->where($map)->order($order)->field($field)->paginate($limit);
    }
    /**
     * 添加
     * @param  [array] $data [description]
     * @return [bool]       [description]
     */
    public function tianjia($data) {
        // 编号
        $order_number = $this->order('id desc')->value('order_number');

        if ($order_number) {
            $bb = substr($order_number, -8);
            $dd = $bb + 1;
            $new_order_number = 'gz' . date('YmdHis') . $dd;
        } else {
            $new_order_number = 'gz' . date('YmdHis') . '10000001';
        }
        $data['order_number'] = $new_order_number;
        $data['add_time'] = date('Y-m-d H:i:s');
        $rel = $this->insert($data);
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
