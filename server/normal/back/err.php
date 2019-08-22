<?php
include_once 'inc.php';
$status = (int)$_GET['err'] || 0;
if ($status < 500) {
    // header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
    tpl_require('404');
}else{
    // header($_SERVER["SERVER_PROTOCOL"]." 500 Internal Server Error", true, 500);
    tpl_require('500');
}
