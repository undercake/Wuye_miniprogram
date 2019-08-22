<?php

if (!isset($upfile) || is_null($upfile) || stristr($upfile, 'base64')) {
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
    die();
}
$pic = array('header' => explode('base64,', $upfile)[0], 'body' => explode('base64,', $upfile)[1]);

$arr = array();
preg_match_all("(\b[a-zA-Z0-9]+\b)", $pic['header'], $arr);
$file = array('filetype' => $arr[0][1],'endpoint' => $arr[0][2]);
var_dump($arr, $image);
