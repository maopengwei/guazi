<?php
namespace app\index\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 *
 */
class Msc extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    //详情
    public function detail($where, $field = "*")
    {
        return $this->where($where)->field($field)->find();
    }
    //查询
    public function chaxun($map = [], $order = '', $field = "*", $page = 1, $limit = 20)
    {
        return $this->where($map)->order($order)->field($field)->paginate($limit);
    }
    /**
     * 添加
     * @param  [array] $data [description]
     * @return [bool]       [description]
     */
    public function tianjia($uid, $jine, $type)
    {

        $data = array(
            1 => '动态直推奖',
            2 => '动态领导奖',
            3 => '动态绩效奖',
            4 => '报单中心奖',
            5 => '购买数量',
            6 => '扣除数量',
            7 => '瓜子币投资',
            8 => '现金投资',
            9 => '静态收益减少',
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
            $info = model('User')->get($uid);
            if (in_array($type, array(6, 9))) {
                model('User')->where('id', $uid)->setDec('msc', $jine);
            } else {
                model('User')->where('id', $uid)->setInc('msc', $jine);

                //团队加业绩
                team_yeji($uid, $jine);

                if ($info['pid'] > 0) {
                    //动态直推奖
                    $money = $jine * cache('config')['direct_profit'] / 100;
                    model('msc')->tianjia($info['pid'], $money, 1);
                    //报单中心奖
                    $parent = model("user")->get($info['pid']);
                    if ($parent['is_center']) {
                        model('Msc')->tianjia($info['pid'], $jine * 5 / 100, 4);
                    }
                }
            }
            //会员升级
            member_up($uid, $info['msc'], $info['level'], $info['pid']);
        }
        return $rel;
    }
    /**
     * 修改
     * @param  [array] $data  [数据]
     * @param  [array] $where [条件]
     * @return [bool]
     */
    public function xiugai($data, $where)
    {
        return $this->save($data, $where);
    }

}
