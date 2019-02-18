<?php 

if (!(isset($_GET['get']) && $_GET['get'] != null && trim($_GET['get']) !='')){die();}

date_default_timezone_set("Asia/Shanghai");


$postStr = file_get_contents("php://input");
$postData = json_decode($postStr, true);

include_once 'pdo/inc.php';
include_once 'func.php';


switch ($_GET['get']) {
    
    case 'first':

        $rs = pdo_get('AppSettings', array('appid =' => $postData['id'],'appSecret =' => hash('sha256' , $postData['sec'])));
        if(($rs == false || empty($rs)) || (isset($postData['salt']) == false || $postData['salt'] == null || trim($postData['salt']) =='') )
        {
            header("HTTP/1.1 400 Bad Request");
            echo json_encode(array('code'=> -1,'err'=>'you have no rights to login'));
            die();
        }
        $type = $rs['appType'];

        $rs = pdo_get('temp_login',array('salt =' => $postData['salt'], 'appid ='=> $postData['id']));
        if($rs){
            $rtn = array('share' => json_decode($rs['detail'],true)['shareCode'], 'login' => $rs['temp_str']);
            echo json_encode($rtn);
            exit();
        }

        $date = date("Y-m-d H:i:s");

        $temp = '';
        do {
            $temp = make_str(10);
            $rs = pdo_get('coupon_user', array('coupon_code' => $temp), array('coupon_code'));
        } while (!(!$rs || empty($rs)));
        
        
        
        $rtn = array('share' => $temp);

        do {
            $temp = make_str(16);
            $rs = pdo_get('temp_login', array('temp_str' => $temp), array('temp_str'));
        } while (!(!$rs || empty($rs)));

        $rtn['login'] = $temp;

        pdo_insert('temp_login',array(
            'type' => $type,
            'appid' => $postData['id'],
	    'temp_str' => $rtn['login'],
	    'salt' => $postData['salt'],
            'detail' => json_encode(array('shareCode'=>$rtn['share'])),
            'login_time' => $date,
        ));
        echo json_encode($rtn);

    break;

    case 'setting':

        if (!(isset($_GET['tmp']) && trim($_GET['tmp']) != '')) {
            header("HTTP/1.1 488 Bad Request");
            die('Login Required!');
        }

        $sql = 'SELECT `appSetting` FROM `AppSettings` WHERE `appid`=(SELECT `appid` FROM `temp_login` WHERE `temp_str`=:tmp)';
        $rs = pdo_fetchall($sql,array('tmp' => $_GET['tmp']));
        
        echo json_encode(json_decode($rs[0]['appSetting'],true)[$_GET['page']]);

    break;
    
    case 'login':

        if (!(isset($_GET['tmp']) && trim($_GET['tmp']) != '')) {
            header("HTTP/1.1 488 Bad Request");
            die('Login Required!');
        }


        include_once "decrypt/wxBizDataCrypt.php";
        include_once 'login.php';

        pdo_get('temp_login',array('temp_str =' => $_GET['tmp']));

        $login = new wxAppLogin($postData['code']);
	$rtn = json_decode($login->getinfo(),true);

        $appid = ($login->getAppIdSec())['appid'];
        $sessionKey = $rtn['session_key'];

        $encryptedData = $postData['encryptedData'];

        $iv = $postData['iv'];

        $pc = new WXBizDataCrypt($appid, $sessionKey);
        $errCode = $pc->decryptData($encryptedData, $iv, $Data_ );

        $data = json_decode($Data_,true);
        $openID = $data['openId'];

        $query_data = json_decode($data,true);
        unset($query_data['watermark']);
        $query_data['openid_miniapp'] = $query_data['openId'];
        unset($query_data['openId']);

        $rs = pdo_get('wxUserData', array('openid_miniapp =' => $query_data['openid_miniapp']));

        if (empty($rs) || $rs === false) {
            $rs = pdo_insert('wxUserData', $query_data);
	}
	$sql = 'UPDATE `temp_login` SET `userData_id`=:0 WHERE `temp_str`=:1';
	$ext = array($openID,$_GET['tmp']);
	$sq = sql_u($sql,$ext);
	$sq = pdo_update('temp_login',array('userData_id' => $openID),array('temp_str' => $_GET['tmp']));
	var_dump($sq);

    break;
    
    case 'coupon':

        
        if (!(isset($_GET['tmp']) && trim($_GET['tmp']) != '')) {
            header("HTTP/1.1 488 Bad Request");
            die('Login Required!');
        }


        $sql = 'SELECT `coupon_user`.`start_time`,
                `coupon_user`.`end_time`,
                `coupon_user`.`coupon_code`,
                `coupon_user`.`active`,
                `coupon_user`.`is_use`,
                `coupon_pool`.`top_per_user`,
                `coupon_pool`.`avail_per_user`,
                `coupon_pool`.`type`,
                `coupon_pool`.`min`,
                `coupon_pool`.`value`,
                `coupon_pool`.`goods_type`,
             `coupon_pool`.`name`
                FROM `coupon_user`
                INNER JOIN `coupon_pool`
                WHERE `coupon_user`.`appid`=(SELECT `appid` FROM `temp_login` WHERE `temp_str`=:0)
		AND `coupon_user`.`openid_'.apptype().'`=(SELECT `userData_id` FROM `temp_login` WHERE `temp_str`=:1)
		AND `coupon_pool`.`cid`=`coupon_user`.`pool_id`';
        
        $rs = sql_u($sql , array($_GET['tmp'],$_GET['tmp']));

        $date = date("Y-m-d H:i:s");
        $now = strtotime($date);
        $i = 0;
        foreach($rs as $k => $v){
            $end_time = strtotime($v['end_time']);
            if($now > $end_time){
                $rs[$i]['outdate'] = 1;
            }else{
                $rs[$i]['outdate'] = 0;
            }
            $i++;
        }

        switch($_GET['type']){
            case 'get':
 
                echo str_replace('00:00:00','',json_encode($rs));

            break;
            case 'new':
		$tmplogin = pdo_get('temp_login',array('temp_str'=>$_GET['tmp']));
		
		$pool = pdo_getall('coupon_pool', array('appid' => $tmplogin['appid']));
		$user = pdo_getall('coupon_user',array('appid'=>$tmplogin['appid'],'openid_'.apptype() => tmplogin['userData_id']));

		switch($_GET['gettype']){
		    case 'share':
			    $pool = pdo_getall('coupon_pool', array('appid' => $tmplogin['appid'],'type'=>0));
			    var_dump($tmplogin);
			$rs = sql_u('SELECT `pool_id`,count(*) FROM `coupon_user` WHERE `appid`=:0 AND openid_'.apptype().'=:1  GROUP BY `pool_id`',array($tmplogin['appid'],$tmplogin['userData_id']));
			var_dump($rs);
			$allcount = array();
			foreach($rs as $k => $v){
				$allcount[$v['pool_id']] = $v["count(*)"];
			}
			var_dump($allcount);
			$rs = sql_u('SELECT `pool_id`,count(*) FROM `coupon_user` WHERE `appid`=:0 AND openid_'.apptype().'=:1 AND`is_use`=0 AND unix_timestamp(`end_time`)>unix_timestamp(now()) GROUP BY `pool_id`',array($tmplogin['appid'],$tmplogin['userData_id']));
			var_dump($rs);
			$avalcount = array();
			foreach($rs as $k => $v){
				$avalcount[$v['pool_id']] = $v["count(*)"];
			}
			var_dump($allcount);
			$rs = sql_u('SELECT * FROM `coupon_user` WHERE `appid`=:0 AND openid_'.apptype().'=:1',array($tmplogin['appid'],$tmplogin['userData_id']));
			var_dump($rs);
			foreach($pool as $v){
				if($v['top_per_user'] <= $allcount[$v['pool_id']] || $v['avail_per_user'] <= $avalcount[$v['pool_id']]){break;}
				$allcount[$v['pool_id']]++;
				$avalcount[$v['pool_id']]++;
				    $rs = pdo_insert('coupon_user',array('appid' => $tmplogin['appid'], 
					    'openid_'.apptype()=> $tmplogin['userData_id'], 
					    'from_share_code' => $_GET['code'], 
					    'owner_share_code' => json_decode($tmplogin['detail'],true)['shareCode'], 
					    'is_use' => 0, 
					    'start_time' =>  date("Y-m-d H:i:s"), 
					    'end_time' => ($v['life_time'] > 0 ? date("Y-m-d H:i:s",strtotime("+{$v['life_time']} hours")) : $v['end_time']), 
					    'coupon_code'=>make_str(10), 
					    'active' => ($v['is_on_share'] == 2 ? 1 : 0 ),  
					    'pool_id'=> $v['cid'], 
					    'coupon_type' => $v['type']));
			}
		    break;
		} 
            break;
        }
    break;

    case 'share':
        switch($_GET['type']){
            case 'reciv':
                pdo_get('temp_login',array('temp_str =' => $_GET['tmp']));
		$sql = 'UPDATE `coupon_user` SET `share_account`=`share_account`+1 WHERE `appid`=(SELECT `appid` FROM `temp_login` WHERE `temp_str`=:0)  AND `owner_share_code`=:1';

                $ext = array($_GET['tmp'] ,$_GET['code']);
		$rs = sql_u($sql,$ext);
		$rs = sql_u('SELECT `coupon_user`.`share_account` as `now`,`coupon_user`.`coupon_code`,`coupon_pool`.`share_count` as `min` FROM `coupon_user` LEFT JOIN `coupon_pool` ON `coupon_user`.`appid`=`coupon_pool`.`appid` WHERE `coupon_user`.`appid`=(SELECT `appid` FROM `temp_login` WHERE `temp_str`=:0)',array($_GET['tmp']));
		$sql = '';
		foreach($rs as $v){
			if($v['now'] > $v['min']){
				$sql = 'UPDATE `coupon_user` SET `active`=1 WHERE `coupon_code`="'.$v['coupon_code'].'"';
				$rs = sql_s($sql);
				var_dump($rs);
			}
			
		}
                $rtn = array('status' => ($rs ? 'ok' : 'error'));
                echo json_encode($rtn);
        }
    break;

    default:
            header("HTTP/1.1 404 Not Found");
            die();
    break;
}

function apptype(){

                $data = pdo_get('temp_login' , array('temp_str =' => $_GET['tmp']));
                $type = '';
                if ($data['type'] == '1') {
                    $type = 'miniapp';
                }elseif ($data['type'] == '2') {
                    $type = 'offaccount';
                }elseif($data['type'] == '3'){
                    $type = 'website';
                }
        return $type;

}
