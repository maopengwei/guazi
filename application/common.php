<?php
/**
 * 加密函数
 * @param string 加密后字符串
 */
function encrypt($data, $key = 'fes45dsk')
{
    $prep_code = serialize($data);
    $block = mcrypt_get_block_size('des', 'ecb');
    if (($pad = $block - (strlen($prep_code) % $block)) < $block) {
        $prep_code .= str_repeat(chr($pad), $pad);
    }
    $encrypt = mcrypt_encrypt(MCRYPT_DES, $key, $prep_code, MCRYPT_MODE_ECB);
    return base64_encode($encrypt);
}

/**
 *  解密函数
 * @param array 解密后数组
 */
function decrypt($str, $key = 'fes45dsk')
{
    $str = base64_decode($str);
    $str = mcrypt_decrypt(MCRYPT_DES, $key, $str, MCRYPT_MODE_ECB);
    $block = mcrypt_get_block_size('des', 'ecb');
    $pad = ord($str[($len = strlen($str)) - 1]);
    if ($pad && $pad < $block && preg_match('/' . chr($pad) . '{' . $pad . '}$/', $str)) {
        $str = substr($str, 0, strlen($str) - $pad);
    }
    return unserialize($str);
}
/**
 * hmacMd5
 */
function HmacMd5($data, $key)
{
    //RFC 2104 HMAC implementation for php
    //Creates an md5 HMAC.
    //Eliminates the need to install mhash to compute a HMAC
    //Hacked by Lance Rushing(NOTE:Hacked means written)
    //需要配置环境支持iconv,否则中文参数不能正常处理
    $b = 64;
    if (strlen($key) > $b) {
        $key = pack("H*", md5($key));
    }
    $key = str_pad($key, $b, chr(0x00));
    $ipad = str_pad('', $b, chr(0x36));
    $opad = str_pad('', $b, chr(0x5c));
    $k_ipad = $key ^ $ipad;
    $k_opad = $key ^ $opad;
    return md5($k_opad . pack("H*", md5($k_ipad . $data)));
}
//解密
function jsDecrypt($encryptedData, $privateKey, $iv = "O2%=!ExPCuY6SKX(")
{
    $encryptedData = base64_decode($encryptedData);
    $decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $privateKey, $encryptedData, MCRYPT_MODE_CBC, $iv);
    $decrypted = rtrim($decrypted, "\0");
    return $decrypted;
}

//加密
function jsEncode($encodeData, $privateKey, $iv = "O2%=!ExPCuY6SKX(")
{
    $encode = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $privateKey, $encodeData, MCRYPT_MODE_CBC, $iv));
    $encode = rtrim($encode, "\0");
    return $encode;
}

//上传图片
function base64_upload($base64)
{
    $base64_image = str_replace(' ', '+', $base64);
    //post的数据里面，加号会被替换为空格，需要重新替换回来，如果不是post的数据，则注释掉这一行
    if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image, $result)) {
        $image_name = rand(100, 999) . time() . '.png';
        $path = "/uploads/" . date("Ymd") . '/' . $image_name;

        $image_file = env('ROOT_PATH') . 'public/' . $path;
        $rel = check_path(dirname($image_file));
        //服务器文件存储路径
        if (file_put_contents($image_file, base64_decode(str_replace($result[1], '', $base64_image)))) {
            return $path;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
function check_path($path)
{
    if (is_dir($path)) {
        return true;
    }
    if (mkdir($path, 0755, true)) {
        return true;
    }
    return false;
}
/**
 * 发送验证码
 * @param  [type] $mobile  [手机号]
 * @param  [type] $content [内容]
 * @return [type]          [结果]
 */
function note_code($mobile, $content)
{
    header('Content-Type:text/html;charset=utf8');
    $userid = '';
    $account = Config::get('smsaccount');
    $password = Config::get('smspassword');
    $password = md5($password);
    $password = ucfirst($password);
    // $content = '【健康360生活】尊敬的会员您好,' . $content;
    $content = '【瓜子币】尊敬的会员您好,' . $content;
    $content = urlencode($content);
    $gateway = "http://114.113.154.5/sms.aspx?action=send&userid={$userid}&account={$account}&password={$password}&mobile={$mobile}&content={$content}&sendTime=";
    $result = file_get_contents($gateway);
    $xml = simplexml_load_string($result);
    if ($xml->returnstatus == 'Faild') {
        return false;
    }
    return true;
}

/**
 * 生成一段随机字符串
 * @param int $len 几位数
 */
function GetRandStr($len)
{
    $chars = array(
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
        "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
        "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
        "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
        "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",
        "3", "4", "5", "6", "7", "8", "9",
    );
    $charsLen = count($chars) - 1;
    shuffle($chars);
    $output = "";
    for ($i = 0; $i < $len; $i++) {
        $output .= $chars[mt_rand(0, $charsLen)];
    }
    return $output;
}

//post get options
function is_post()
{
    return request()->isPost();
}
function is_get()
{
    return request()->isGet();
}
function is_options()
{
    return request()->isOptions();
}

//会员升级
function member_up($id, $msc, $lev, $pid)
{
    switch (true) {
        case $msc >= 500 && $msc < 2000;
            $level = 1;
            break;
        case $msc >= 2000 && $msc < 5000;
            $level = 2;
            break;
        case $msc >= 5000 && $msc < 10000;
            $level = 3;
            break;
        case $msc >= 10000 && $msc < 50000;
            $level = 4;
            break;
        case $msc >= 50000;
            $level = 5;
            break;
        default:
            $level = 0;
    }
    if ($level != $lev) {
        if ($lev == 0 && $pid != 0) {
            model('User')->where('id', $pid)->setInc('direct');
        }
        model("User")->xiugai(['level' => $level], ['id' => $id]);
    }
}
function level_profit($level)
{
    return db('config_static')->where('id', $level)->value('profit');
}

//团队加业绩
function team_yeji($id, $jine)
{
    $info = model('User')->get($id);
    $arr = explode(',', $info['path']);
    foreach ($arr as $v) {
        if ($v > 0) {
            db('User')->where('id', $v)->setInc('team_yeji', $jine);
        }
    }
}
//团队有效人数
function team_count($id)
{
    $info = model('User')->get($id);
    $path = $info['path'] . "%";
    $map[] = ['level', '>', 0];
    $map[] = ['path', 'like', $path];
    $count = model("User")->where($map)->count();
    return $count;
}
