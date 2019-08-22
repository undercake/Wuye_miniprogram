<?php
session_start();

include_once '../pdo/inc.php';
include_once '../func.php';

if (strpos(($_SERVER['SCRIPT_NAME'],'check.php') == false || strpos($_SERVER['SCRIPT_NAME'],'index.php') == false) && ((!isset($_SESSION['login'])) || $_SESSION['login'] != 1)) {
  header('Location:index.php');
}