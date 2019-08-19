<?php

$postStr = file_get_contents("php://input");
$postData = json_decode($postStr, true);

session_start();


date_default_timezone_set("Asia/Shanghai");

include_once 'config.php';
include_once '../pdo/inc.php';
include_once 'func.php';
