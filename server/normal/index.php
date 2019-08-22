<?php

if (!isStr($_GET['get']) && !isStr($_SERVER["HTTP_REFERER"])) {
    die('Ivalid token');
}

include_once 'inc.php';
// var_dump($_SERVER);

$arr = array();

preg_match_all("/\/\b([a-zA-Z0-9]+)\b/", $_SERVER["HTTP_REFERER"], $arr);

// var_dump($arr);

$APPID = $arr[1][1];
// echo $APPID.'<br>';
$APPVERSION = $arr[1][2];
// echo $APPVERSION;
//
if (!isset($_SESSION['checked']) || !$_SESSION['checked']) {
    include 'check.php';
}

switch ($_GET['get']) {
    case 'page': // 获取page信息
            include 'page.php';
        break;
}

function isStr($str)
{
    return ((isset($str) && $str != null && $str != null && trim($str) !='')) ? true : false ;
}
