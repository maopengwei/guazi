<?php
// +----------------------------------------------------------------------
// | Description: Api基础类，验证权限
// +----------------------------------------------------------------------
// | Author: linchuangbin <linchuangbin@honraytech.com>
// +----------------------------------------------------------------------

namespace app\index\controller;

class Common extends Base
{
    public $user;

    public function initialize()
    {
        parent::initialize();
        /*获取头部信息*/
        $header = $this->request->header();
        $authToken = null;
        if (array_key_exists('authtoken', $header)) {
            $authToken = $header['authtoken'];
        }
        if ($authToken) {
            $authToken = explode(':', $authToken);
            $this->user = model('User')->where("mobile", $authToken[0])->find();
        } else {
            $this->user = model('User')->where("mobile", '18739912537')->find();
            // $this->result("1", 401, "token不存在", "json");
        }

        if (empty($this->user)) {
            $this->result("1", 401, "账号不存在", "json");
        }
        if (!$this->user['whether'] && !cache('config')['status']) {
            $this->result('1', 203, "网站维护", "json");
        }
        //密码处理
        $pass = decrypt($this->user['password']);
        $password = HmacMd5($pass, $pass);

        // //解密
        if (!array_key_exists('1', $authToken)) {
            $this->result("1", 401, "token不对", "json");
        }
        $dataStr = jsDecrypt($authToken[1], $password);
        if (empty($dataStr)) {
            $this->result('1', 401, "没有权限", "json");
        }
        // 解析解密后的字符串
        $dataStr = explode(':', $dataStr);
        if ($dataStr[0] != $_SERVER["PHP_SELF"] . $_SERVER['PATH_INFO']) {
            $this->result('1', 401, "密码错误", "json");
        }
    }

    /**
     * 返回封装后的API数据到客户端
     * @access protected
     * @param  mixed     $data 要返回的数据
     * @param  integer   $code 返回的code
     * @param  mixed     $msg 提示信息
     * @param  string    $type 返回数据格式
     * @param  array     $header 发送的Header信息
     * @return void
     */
    // protected function result($data) {
    //     response($data);
    //     $result = [
    //         'code' => $code,
    //         'msg' => $msg,
    //         'time' => time(),
    //         'data' => $data,
    //     ];
    //     $type = $type ?: $this->getResponseType();
    //     $response = Response::create($result, $type)->header($header);
    //     throw new HttpResponseException($response);
    // }
    protected function e_msg($msg, $data = "")
    {
        $this->result($data, '2', $msg, 'json');
    }
    protected function s_msg($msg, $data = "")
    {
        $this->result($data, '1', $msg, 'json');
    }
    public function wzwh()
    {
        $aa = cache('config')['status'];
        if (!$aa) {
            $this->error('网站维护');
        }
    }
}
