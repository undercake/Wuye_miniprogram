<?php
session_start();
if (empty($_SESSION)) {
    $_SESSION['login'] == false;
}
$_SESSION['last_access'] = $_SERVER['REQUEST_TIME'];
include_once 'config.php';
include_once 'func.php';
include_once '../func.php';
include_once 'tpl/tpl.php';
include_once '../../pdo/inc.php';

$base = $_SERVER['HTTP_HOST'].str_replace('err.php', '', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));

$path = explode('/', $_SERVER['PATH_INFO']) ?? array('','');
$base = $_SERVER['HTTP_HOST'].str_replace(array('err.php','index.php'),'',$_SERVER['SCRIPT_NAME']);

$outlist = array('act.php', 'err.php', 'logout.php', 'upfile.php');

if (
    !(isset($_SESSION['login']) && $_SESSION['login']) //是否登录
    && $path[1] != 'login'      // 是否是登录页面
    && !strstr_array($_SERVER['SCRIPT_NAME'],$outlist) //是否是这几个页面
) {
    header('Location://'.$base.'index.php/login');
}

if ($path[1] == '' && !( strstr_array($_SERVER['SCRIPT_NAME'],$outlist))) {
    header('Location:dashboard');
}

// var_dump($_GET,$path,$base);
