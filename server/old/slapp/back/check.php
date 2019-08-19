<?php
include_once 'inc.php';

$rs = pdo_get('shop_login',array(
		'username =' => $_POST['u'],
		'passwd ='=>hash('sha256',$_POST['p'])
	)
);

if (empty($rs) || $rs == false) {
	echo '<script>alert("账号或密码有误，请检查");history.go(-1);</script>';
	exit;
}
$_SESSION['login'] = 1;
$_SESSION['appid'] = $rs['appid'];
$_SESSION['username'] = $rs['username'];
header('Location:redpack.php');
