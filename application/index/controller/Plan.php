<?php
namespace app\index\controller;

/**
 * 计划控制器
 */
class Plan extends Base
{

    public function __construct()
    {
        parent::__construct();
    }
    /**
     *静态收益
     */
    public function jingtai()
    {
        $list = model('User')->where('level', 'gt', 0)->select();
        if ($list) {
            foreach ($list as $k => $v) {
                $jine = $v['msc'] * level_profit($v['level']) / 10000;
                $wallet = 0;
                if ($v['pid'] > 0) {
                    $p = model('User')->where('id', $v['pid'])->where('level', '>', 0)->field('level,msc')->find();
                    if ($p) {
                        if ($p['level'] > $v['level']) {
                            $wallet = $jine * cache('config')['b_profit'] / 100;
                        } else {
                            $wallet = $p['msc'] * level_profit($p['level']) * cache('config')['p_profit'] / 1000000;
                        }
                    }
                }
                $money = $jine + $wallet;
                if ($money) {
                    model('wallet')->tianjia($v['id'], $money, 2);
                    model('msc')->tianjia($v['id'], $money, 9);
                }
            }
        }
    }
    /**
     * 动态领导奖
     * @return [type] [description]
     */
    public function leader()
    {
        $list = model('User')
            ->where('direct', '>=', 4)
            ->where('msc', '>=', 1000)
            ->select();
        if ($list) {
            foreach ($list as $k => $v) {
                $yeji = 0;
                if ($v['direct'] > 9 && $v['team_yeji'] >= 100000) {

                    $direct = model('User')->where('pid', $v['id'])->select();
                    foreach ($direct as $key => $val) {
                        $yeji += model('wallet')->where('type', 2)->where('uid', $val['id'])->whereTime('add_time', 'today')->sum('jine');
                    }
                    model('Msc')->tianjia($v['id'], $yeji * cache('config')['leader_first'] / 100, 2);
                } elseif ($v['team_yeji'] >= 50000) {
                    $direct = model('User')->where('pid', $v['id'])->select();
                    foreach ($direct as $keyy => $vall) {
                        $yeji += model('wallet')->where('type', 2)->where('uid', $vall['id'])->whereTime('add_time', 'today')->sum('jine');
                    }
                    model('Msc')->tianjia($v['id'], $yeji * cache('config')['leader_second'] / 100, 2);
                }
            }
        }
    }
    //动态绩效奖
    public function results()
    {
        $list1 = model('User')->where('level', 3)->select();
        if ($list1) {
            foreach ($list1 as $k1 => $v1) {
                $yeji1 = 0;
                $team1 = model('User')->where('pid', $v1['id'])->select();
                foreach ($team1 as $k11 => $v11) {
                    $yeji1 += model('wallet')->where('type', 2)->where('uid', $v11['id'])->whereTime('add_time', 'today')->sum('jine');
                }
                model('Msc')->tianjia($v1['id'], $yeji1 * cache('config')['results_first'] / 1000, 3);
            }
        }
        $list2 = model('User')->where('level', 4)->select();
        if ($list2) {
            foreach ($list2 as $k2 => $v2) {
                $yeji2 = 0;
                $array2 = [
                    array('length', '<=', $v2['length'] + 2),
                    array('path', 'like', $v2['path'] . "%"),
                ];
                $team2 = model('User')->where($array2)->select();
                foreach ($team2 as $k21 => $v21) {
                    $yeji2 += model('wallet')->where('type', 2)->where('uid', $v21['id'])->whereTime('add_time', 'today')->sum('jine');
                }
                model('Msc')->tianjia($v2['id'], $yeji2 * cache('config')['results_second'] / 1000, 3);
            }
        }
        $list3 = model('User')->where('level', 5)->select();
        if ($list3) {
            foreach ($list3 as $k3 => $v3) {
                $yeji3 = 0;
                $array3 = array(
                    array('length', '<=', $v3['length'] + 3),
                    array('path', 'like', $v3['path'] . "," . $v3['id'] . "%"),
                );
                $team3 = model('User')->where($array3)->select();
                foreach ($team3 as $k31 => $v31) {
                    $yeji3 += model('wallet')->where('type', 2)->where('uid', $v31['id'])->wheretime('add_time', 'today')->sum('jine');
                }
                model('Msc')->tianjia($v3['id'], $yeji3 * cache('config')['results_three'] / 1000, 3);
            }
        }

    }
}
