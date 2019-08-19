<?php
// include_once 'inc.php';
//
// check.php


$rs = pdo_get('AppSettings',array('appid =' => $APPID),array('proj_id', 'appType'));

if ($rs == '1' && strpos($_SERVER["HTTP_REFERER"],'servicewechat.com') <= -1) {
    dsy_session();
    die('Ivalid type error');
}

$_SESSION['proj_id'] = $rs['proj_id'];
$_SESSION['checked'] = true;
