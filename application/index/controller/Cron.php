<?php
namespace app\index\controller;

/**
 * 图片验证码
 */
class Cron extends Base
{

    public function initialize()
    {
        parent::initialize();
    }
    /**
     * 上传图片
     * @return [type] [description]
     */
    public function scpz()
    {
        try {
            $rel = base64_upload(input('post.img'));
        } catch (\Exception $e) {
            $this->result(1, '202', $e->getMessage(), 'json');
        }
        if ($rel) {
            $this->result($rel, 1, '上传成功', 'json');
        } else {
            $this->result($rel, 2, '上传失败', 'json');
        }
    }
    /**
     * 86400 / 24 3600/60    120 两分钟
     * 验证码
     * @return [type] [description]
     */
    public function send()
    {
        $mobile = str_replace(' ', '', trim(input('post.mobile')));
        if (cache($mobile)) {
            $this->result('1', 1, '每次发送间隔120秒', 'json');
        }
        // $random = mt_rand(100000, 999999);
        $random = 123456;
        $content = "您的验证码为：" . $random;
        // $rel = note_code($mobile, $content);
        $rel = true;
        if ($rel) {
            cache($mobile, $random, 120);
            $this->result($rel, 1, '发送成功', 'json');
        } else {
            $this->result($rel, 2, '发送失败', 'json');
        }
    }
    public function register()
    {
        $mobile = str_replace(' ', '', trim(input('post.mobile')));
        $ptel = str_replace(' ', '', trim(input('post.ptel')));
        $code_info = cache($mobile) ?: "";
        if (!$code_info) {
            $this->result('1', 2, '请重新发送验证码', 'json');
        } elseif (trim(input('post.code')) != $code_info) {
            $this->result('1', 2, '验证码不正确', 'json');
        }

        $data = array(
            'mobile' => $mobile,
            'password' => trim(input('post.password')),
            'safe_password' => trim(input('post.safe_password')),
            'ptel' => $ptel,
        );
        $validate = validate('Verify');
        if (!$validate->scene('addUser')->check($data)) {
            $this->result('', 2, $validate->getError(), 'json');
        }

        if ($data['password'] != trim(input('post.password1'))) {
            $this->result('1', 2, '两次输入登录密码不相同', 'json');
        }
        if ($data['safe_password'] != trim(input('post.safe_password1'))) {
            $this->result('1', 2, '两次输入安全密码不相同', 'json');
        }

        //手机号
        if (model('User')->detail(['mobile' => $data['mobile']], '')) {
            $this->result('1', 2, '该手机号已存在', 'json');
        }

        //父账号
        $parent = model('User')->detail(['mobile' => $data['ptel']], 'id,path,length');
        if ($parent) {
            $data['pid'] = $parent['id'];
            $data['path'] = $parent['path'] . "," . $parent['id'];
            $data['length'] = $parent['length'] + 1;
        } else {
            $this->result('1', 2, '推荐人不存在', 'json');
        }

        $rel = model('User')->tianjia($data);

        if ($rel) {
            $this->result('1', 1, '添加成功', 'json');
        } else {
            $this->result('1', 2, '添加失败', 'json');
        }

    }
    public function forget()
    {
        if (is_post()) {
            $mobile = str_replace(' ', '', trim(input('post.mobile')));
            //手机号
            $info = model('User')->detail(['mobile' => $mobile]);
            if (!$mobile || !$info) {
                $this->result('1', 2, '该手机号不存在', 'json');
            }
            $data = array(
                'mobile' => $mobile,
                'password' => trim(input('post.pass')),
            );
            if ($data['password'] != trim(input('post.pass1'))) {
                $this->result('1', 2, '两次密码输入不一致', 'json');
            }

            $code_info = cache($mobile) ?: "";
            if (!$code_info) {
                $this->result('1', 2, '请重新发送验证码', 'json');
            } elseif (trim(input('post.code')) != $code_info) {
                $this->result('1', 2, '验证码不正确', 'json');
            }

            $validate = validate('Verify');
            if (!$validate->scene('forgetUser')->check($data)) {
                $this->result('', 2, $validate->getError(), 'json');
            }

            $data['password'] = encrypt($data['password']);
            $rel = model('User')->xiugai($data, ['id' => $info['id']]);
            if ($rel) {
                model('Code')->shanchu($code_info['note']);
                $this->result('1', 1, '修改成功', 'json');
            } else {
                $this->result('1', 2, '修改失败,可能您的密码没有做出修改', 'json');
            }
        }
    }
    public function ceshi()
    {
        halt(cache('config'));
    }
    public function token()
    {
        $pass = trim(input('post.password'));
        $url = trim(input('post.url'));
        $tel = trim(input('post.mobile'));
        $pass1 = HmacMd5($pass, $pass);
        $str = jsEncode($url, $pass1);
        $this->result($tel . ':' . $str, 1, "获取成功", "json");
    }
}
