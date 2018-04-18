<?php
namespace app\index\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 *
 */
class Transfer extends Model {
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
    public function tianjia($cuid, $ruid, $jine) {
        $array = array(
            'cuid' => $cuid,
            'ruid' => $ruid,
            'jine' => $jine,
            'add_time' => date('Y-m-d H:i:s'),
        );
        $rel = $this->insertGetId($array);
        if ($rel) {
            model('wallet')->tianjia($cuid, $jine, 6);
            model('wallet')->tianjia($ruid, $jine, 7);
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
