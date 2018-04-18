<?php
namespace app\index\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 *
 */
class Sell extends Model {
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    public function getAidTextAttr($value, $data) {
        return model('Admin')->where('id', $data['aid'])->value('ad_name');
    }
    /**
     * status
     * 0 添加单子
     * 1 等待打款
     * 2 等待收款
     * 3 已完成
     * 4 已取消
     * @param  [type] $aid  [description]
     * @param  [type] $note [description]
     * @return [type]       [description]
     */
    public function tianjia($uid, $jine) {
        $array = array(
            'uid' => $uid,
            'jine' => $jine,
            'price' => cache('config')['price'],
            'add_time' => date('Y-m-d H:i:s'),
        );
        $rel = $this->insert($array);
        if ($rel) {
            model("Wallet")->tianjia($uid, $jine, 10);
        }
        return $rel;
    }

    //查询
    public function chaxun($map = [], $order = '', $field = "*", $page = 1, $limit = 20) {
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
