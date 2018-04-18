<?php
namespace app\index\model;

use think\Model;
use think\model\concern\SoftDelete;

/**投资
 *
 */
class Purchase extends Model {
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
    public function tianjia($uid, $level, $jine, $type = 0) {
        $array = array(
            'uid' => $uid,
            'level' => $level,
            'jine' => $jine,
            'type' => $type,
            'add_time' => date('Y-m-d H:i:s'),
            'price' => cache('config')['price'],
        );
        if ($type == 0) {
            $array['status'] = 1;
        }
        $rel = $this->insertGetId($array);
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
