<!DOCTYPE HTML>
<html>

<head>
	<title>无权限的访问！-
		<?php echo $title ?>
	</title>
	<?php head() ?>
</head>

<body>
	<!--/404-->
	<div class="error_page error">
		<!--/error-top-->
		<div class="error-top error">
			<h3>4<i class="iconfont icon-smile"></i>3</h3>
			<span>无权限的访问</span>
			<?php
            if (!$_SESSION['login']) {
                echo '<p class="breadcrumb">可能原因：登录已过期</p>';
                $_SESSION['curr_page'] = $_SERVER['HTTP_X_FORWARDED_PROTO'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            } else {
                echo '<p class="breadcrumb">对不起，您没有权限访问这个页面</p>';
            }
            ?>
			<div class="error-btn">
				<a class="read fourth" href="logout.php">重新登录</a>
				<a class="read fourth" href="index.php">去主面板</a>
				<a class="read fourth" href="javascript:history.go(-1)">返回上一页</a>
			</div>
		</div>

		<!--//error-top-->
	</div>
	<?php foot() ?>
</body>

</html>
