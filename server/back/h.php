<?php
session_start();

if (empty($_SESSION)) die('logged out');

$_SESSION['heartbeat'] = $_SERVER['REQUEST_TIME'];
echo 'ok';
