<?php

/**
 * @param random string starter
 * 生成随机字符串
 * string make_str (int $length, str $type , array $ext)
 * $length 字符串长度；指定错误或者不指定将默认为8
 * $type 字符串包含的类型（l = lower 小写字母， u = upper 大写字母 ， 
 *      n = number 数字， s = specills 特殊字符）；
 *  指定错误或者不指定将默认为‘lun’
 *
 * $ext 可以将给定数组的内容随机追加到字符串，默认为空
 */
function make_str( $length = 8, $type = "lun", $ext = array()){
	if ($length <= 0){$length = 8;}
	if (strpos($type,'u') <= -1 && strpos($type,'l') <= -1 && strpos($type,'n') <= -1 && strpos($type,'s') <= -1 && empty($ext)) {$type = 'unl';}

	$chars = array();

	if (strpos($type,'u') > -1 ) {
		$chars = array_merge($chars,array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O', 'P','Q','R','S','T','U','V','W','X','Y','Z'));
	}

	if (strpos($type,'l') > -1 ) {
		$chars = array_merge($chars,array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'));
	}
	
	if (strpos($type,'n') > -1 ) {
		$chars = array_merge($chars,array('0','1','2','3','4','5','6','7','8','9'));
	}
	
	if (strpos($type,'s') > -1 ) {
		$chars = array_merge($chars,array('@','!','#','$','%','^','&','*','(',')','-','_', '[',']','{','}','<','>','~','`','+','=',',', '.',';',':','/','?','|'));
	}

	$chars = array_merge($chars, $ext);

	$str = '';
	$arr_len = count($chars) - 1;

	for($i = 0; $i < $length; $i++) {
		$max = $i == 0 ? ($arr_len > 25 ? 25 : $arr_len ) : $arr_len;
		$str .= $chars[mt_rand(0, $max)];  
	}  
	return $str;  
} 


function https_request($url,$data = null){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}
