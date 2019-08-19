<?php
include 'inc.php';
$currpage = $_SESSION['curr_page'] ?? false;
session_destroy();

if ($currpage) {
    session_start();
    $_SESSION['login'] = false;
    $_SESSION['curr_page'] = $currpage;
}
header('Location:index.php');
