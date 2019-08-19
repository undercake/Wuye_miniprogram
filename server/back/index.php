<?php
if(!isset($_SERVER['PATH_INFO'])){header('Location:index.php/login');die();}

include_once 'inc.php';

tpl_require($path[1]);
