<?php
namespace app\index\controller;

use think\Controller;
use think\Request;

class Base extends Controller
{
    protected $request;
    public function initialize()
    {
        parent::initialize();
        /*允许跨域*/
        // $origin = '*';
        // $origin = '192.168.2.183';
        $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : "http://192.168.2.215:8000";
        // header('Access-Control-Allow-Origin:' . $origin);
        // header('Access-Control-Allow-Credentials: false');
        // header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        // header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, authToken");
        header('Access-Control-Allow-Origin:' . $origin);
        header('Access-Control-Allow-Credentials: true');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, authToken");
        if (is_options()) {
            $this->result("1", 402, "option请求", "json");
        }
        if (!cache('config')) {
            $setting = model('Config')->getInfo();
            cache('config', $setting);
        }
        $this->request = new Request;
    }
    public function object_array($array)
    {
        if (is_object($array)) {
            $array = (array) $array;
        }
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                $array[$key] = $this->object_array($value);
            }
        }
        return $array;
    }
    //解密
    public function jsDecrypt($encryptedData, $privateKey, $iv = "O2%=!ExPCuY6SKX(")
    {
        $encryptedData = base64_decode($encryptedData);
        $decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $privateKey, $encryptedData, MCRYPT_MODE_CBC, $iv);
        $decrypted = rtrim($decrypted, "\0");
        return $decrypted;
    }
    // function jsDecrypt($encryptedData, $privateKey, $iv = "O2%=!ExPCuY6SKX(")
    // {
    //     $encryptedData = base64_decode($encryptedData);
    //     $decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $privateKey, $encryptedData, MCRYPT_MODE_CBC, $iv);
    //     $decrypted = rtrim($decrypted, "\0");
    //     return $decrypted;
    // }

}
