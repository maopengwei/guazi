<?php
namespace app\index\model;

use think\Model;

/**
 * 验证码
 */
class Code extends model {

    public function initialize() {
        parent::initialize();
    }
    public function detail($where, $field = "*") {
        return $this->where($where)->field($field)->find();
    }
    public function tianjia($mobile, $code) {
        $array = array(
            'tel' => $mobile,
            'code' => $code,
            'add_time' => time(),
        );
        $rel = $this->insertGetid($array);
        return $rel;
    }
    //验证码的验证
    public function verify_code($mobile, $code) {
        $code_info = $this->where('tel', $mobile)->find();
        if (!$code_info) {
            return array(
                'code' => 0,
                'note' => '验证码不正确',
            );
        }
        if ($code_info['code'] != $code) {
            return array(
                'code' => 0,
                'note' => '验证码不正确',
            );
        }
        $past = $this->guoqi($code_info['add_time']);
        if ($past) {
            $this->shanchu($code_info['id']);
            return array(
                'code' => 0,
                'note' => '验证码过期了',
            );
        }
        return array(
            'code' => 1,
            'note' => $code_info['id'],
        );
    }
    /**
     * 过期
     * @param  [type] $time 验证码生成时间
     * @return [type]       true false
     */
    public function guoqi($time) {
        $cha = time() - $time;
        if ($cha > 2000) {
            //10分钟
            return true;
        } else {
            return false;
        }
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
    /**
     * 删除
     * @param  [type] $id [id]
     * @return [type]     [0,1]
     */
    public function shanchu($id) {
        $this->where('id', $id)->delete($id);
    }
}
