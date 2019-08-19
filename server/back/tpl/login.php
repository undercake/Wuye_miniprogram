<?php if(isset($_SESSION['login']) && $_SESSION['login']){header('Location:dashboard');die();}?><!DOCTYPE HTML>
<html>

<head>
	<title><?php echo $title ?>-登录</title>
	<?php head() ?>
	<link href="css/unlock.css" rel='stylesheet' type='text/css'>
</head>

<body>
	<div class="error_page">
		<div class="error-top">
			<div class="login">
				<h3 class="inner-tittle t-inner">智能网络</h3>
				<div class="buttons login">
				</div>
				<form onsubmit="return subcheck()" action="act.php" method="post">
					<p class="input-container"><span class="iconfont icon-user"></span><input autocomplete="on"  required type="text" class="text" name="user" placeholder="用户名/邮箱/手机号"></p>
					<p class="input-container"><span class="iconfont icon-lock"></span>
						<input required type="password" name="passe" placeholder="密码" autocomplete="off"></p>
						<input type="hidden" name="pass"></p>
					<p class="input-container" style="height:53px;" id="slideCheck"></p>
					<input type="hidden" id="slideCheckInput" name="check" value="false">
					<div class="submit"><input type="submit" value="登录"></div>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>

		<!--//login-top-->
	</div>
	<?php foot() ?>
	<!--//login-->
	<script src='js/unlock.js'></script>
	<script src='js/cookie.js'></script>
	<script src='js/hashes.min.js'></script>
	<script type="text/javascript">
	<?php if (!$_SESSION['login'] && $_SESSION['loginInfo'] == 'pass') : ?>
			showModel({
				title:'登录错误:',
				showText:'用户名或者密码不正确！',
				level:'danger'
			});
	<?php endif ?>
	<?php $_SESSION['loginInfo'] = '' ?>
		function subcheck(){
			if ($.trim($('form [name=user]').val()) == '' || $.trim($('form [name=passe]').val()) == '') {
				showModel({
					title:'登录错误:',
					showText:'用户名或者密码为空！',
					autoclose: 3000,
					level:'danger',
				});
				return false;
			}
			if($('#slideCheckInput').val() == 'false'){
				showModel({
					title:'登录错误:',
					showText:'请先滑动解锁',
					level:'warning',
				});
				return false;
			}
			var sha256 = new Hashes.SHA256;
			$('form [name=pass]').val(sha256.hex($('form [name=passe]').val()));
			return true;
		}

		$('#slideCheck').slideToUnlock({
			text: '向右拖动滑块解锁',
			succText: '解锁成功！',
			succFunc: function() {
				$('#unlockSlideHandle').removeClass('unlock-handle').addClass('unlock-handle-success');
				$('#slideCheckInput').val('success');
			}
		});
	</script>
</body>

</html>
