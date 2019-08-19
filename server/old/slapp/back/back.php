<!DOCTYPE html> <?php include_once 'inc.php'; header('Location:redpack.php')?>
<html style="min-height: 3052px;">
<head>
	<meta charset="UTF-8">
	<title>Director | Dashboard</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="description" content="Developed By M Abdur Rokib Promy">
	<meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
	<!-- bootstrap 3.0.2 -->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<!-- font Awesome -->
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Ionicons -->
	<link href="css/ionicons.min.css" rel="stylesheet" type="text/css">

	<link href="//fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	<!-- Theme style -->
	<link href="css/style.css" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
          </script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js">
          </script>
      <![endif]-->
      <style id="__web-inspector-hide-shortcut-style__" type="text/css">
      .__web-inspector-hide-shortcut__, .__web-inspector-hide-shortcut__ *, .__web-inspector-hidebefore-shortcut__::before, .__web-inspector-hideafter-shortcut__::after
      {
      	visibility: hidden !important;
      }
  </style>
</head>


<body class="skin-black  pace-done" style="max-width: 700px;margin: auto;">
	<div class="pace  pace-inactive">
		<div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
			<div class="pace-progress-inner">
			</div>
		</div>
		<div class="pace-activity">
		</div>
	</div>
	<!-- header logo: style can be found in header.less -->

	<div class="wrapper row-offcanvas row-offcanvas-left" style="min-height: 441px;">
		<!-- Left side column. contains the logo and sidebar -->


		<!-- Right side column. Contains the navbar and content of the page -->
		<aside class="">
			<!-- Content Header (Page header) -->
			<form class="form-horizontal tasi-form" method="get">


			<!-- Main content -->
			<section class="content">
				<!--row1-->
				<div class="row">
					<div class="col-md-12">
						<?php 

						pdo_get('Appsettings',array());

						foreach ($variable as $key => $value) {
							# code...
						}
							'<section class="panel">
							 
							<header class="panel-heading">
								小程序题头更改
							</header>
							<div class="panel-body">
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Default</label>
										<div class="col-sm-10">
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Help text</label>
										<div class="col-sm-10">
											<input type="text" class="form-control">
											<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Rounder</label>
										<div class="col-sm-10">
											<input type="text" class="form-control round-input">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Input focus</label>
										<div class="col-sm-10">
											<input class="form-control" id="focusedInput" type="text" value="This is focused...">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Disabled</label>
										<div class="col-sm-10">
											<input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled="">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Placeholder</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" placeholder="placeholder">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Password</label>
										<div class="col-sm-10">
											<input type="password" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 col-sm-2 control-label">Static control</label>
										<div class="col-lg-10">
											<p class="form-control-static">email@example.com</p>
										</div>
									</div>
								
							</div>
						</section>'
					?>


						<section class="panel">
							<header class="panel-heading">
								Form Elements
							</header>
							<div class="panel-body">
									<div class="form-group has-success">
										<label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Input with success</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" id="inputSuccess">
										</div>
									</div>
									<div class="form-group has-warning">
										<label class="col-sm-2 control-label col-lg-2" for="inputWarning">Input with warning</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" id="inputWarning">
										</div>
									</div>
									<div class="form-group has-error">
										<label class="col-sm-2 control-label col-lg-2" for="inputError">Input with error</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" id="inputError">
										</div>
									</div>
							</div>
						</section>
						<section class="panel">
							<header class="panel-heading">
								Control sizing
							</header>
							<div class="panel-body">
									<div class="form-group">
										<label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Control sizing</label>
										<div class="col-lg-10">
											<input class="form-control input-lg m-b-10" type="text" placeholder=".input-lg">
											<input class="form-control m-b-10" type="text" placeholder="Default input">
											<input class="form-control input-sm m-b-10" type="text" placeholder=".input-sm">

											<select class="form-control input-lg m-b-10">
												<option>Option 1</option>
												<option>Option 2</option>
												<option>Option 3</option>
											</select>
											<select class="form-control m-b-10">
												<option>Option 1</option>
												<option>Option 2</option>
												<option>Option 3</option>
											</select>
											<select class="form-control input-sm m-b-10">
												<option>Option 1</option>
												<option>Option 2</option>
												<option>Option 3</option>
											</select>
										</div>
									</div>
							</div>
						</section>
						<section class="panel">
							<header class="panel-heading">
								Form Elements
							</header>
							<div class="panel-body">
									<div class="form-group">
										<label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Checkboxes and radios</label>
										<div class="col-lg-10">
											<div class="checkbox">
												<label>
													<input type="checkbox" value="">
													Option one is this and that—be sure to include why it's great
												</label>
											</div>

											<div class="checkbox">
												<label>
													<input type="checkbox" value="">
													Option one is this and that—be sure to include why it's great option one
												</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
													Option one is this and that—be sure to include why it's great
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
													Option two can be something else and selecting it will deselect option one
												</label>
											</div>

										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Inline checkboxes</label>
										<div class="col-lg-10">
											<label class="checkbox-inline">
												<input type="checkbox" id="inlineCheckbox1" value="option1"> 1
											</label>
											<label class="checkbox-inline">
												<input type="checkbox" id="inlineCheckbox2" value="option2"> 2
											</label>
											<label class="checkbox-inline">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
											</label>

										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Selects</label>
										<div class="col-lg-10">
											<select class="form-control m-b-10">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
											</select>

											<select multiple="" class="form-control">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Column sizing</label>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-lg-2">
													<input type="text" class="form-control" placeholder=".col-lg-2">
												</div>
												<div class="col-lg-3">
													<input type="text" class="form-control" placeholder=".col-lg-3">
												</div>
												<div class="col-lg-4">
													<input type="text" class="form-control" placeholder=".col-lg-4">
												</div>
											</div>

										</div>
									</div>
							</div>
						</section>
						<section class="panel">
							<header class="panel-heading">
								Input groups
							</header>
							<div class="panel-body">
									<div class="form-group">
										<label class="col-sm-2 control-label col-lg-2">Basic examples</label>
										<div class="col-lg-10">
											<div class="input-group m-b-10">
												<span class="input-group-addon">@</span>
												<input type="text" class="form-control" placeholder="Username">
											</div>

											<div class="input-group m-b-10">
												<input type="text" class="form-control">
												<span class="input-group-addon">.00</span>
											</div>

											<div class="input-group m-b-10">
												<span class="input-group-addon">$</span>
												<input type="text" class="form-control">
												<span class="input-group-addon">.00</span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label col-lg-2">Sizing</label>
										<div class="col-lg-10">
											<div class="input-group input-group-lg m-b-10">
												<span class="input-group-addon">@</span>
												<input type="text" class="form-control input-lg" placeholder="Username">
											</div>

											<div class="input-group m-b-10">
												<span class="input-group-addon">@</span>
												<input type="text" class="form-control" placeholder="Username">
											</div>

											<div class="input-group input-group-sm m-b-10">
												<span class="input-group-addon">@</span>
												<input type="text" class="form-control" placeholder="Username">
											</div>

										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label col-lg-2">Checkboxe and radio</label>
										<div class="col-lg-10">
											<div class="input-group m-b-10">
												<span class="input-group-addon">
													<input type="checkbox">
												</span>
												<input type="text" class="form-control">
											</div>

											<div class="input-group m-b-10">
												<span class="input-group-addon">
													<input type="radio">
												</span>
												<input type="text" class="form-control">
											</div>

										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label col-lg-2">Button addons</label>
										<div class="col-lg-10">
											<div class="input-group m-b-10">
												<span class="input-group-btn">
													<button class="btn btn-white" type="button">Go!</button>
												</span>
												<input type="text" class="form-control">
											</div>

											<div class="input-group m-b-10">
												<input type="text" class="form-control">
												<span class="input-group-btn">
													<button class="btn btn-white" type="button">Go!</button>
												</span>
											</div>

											<div class="input-group m-b-10">
												<div class="input-group-btn">
													<button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown">Action <span class="caret">
													</span>
												</button>
												<ul class="dropdown-menu">
													<li>
														<a href="#">Action</a>
													</li>
													<li>
														<a href="#">Another action</a>
													</li>
													<li>
														<a href="#">Something else here</a>
													</li>
													<li class="divider">
													</li>
													<li>
														<a href="#">Separated link</a>
													</li>
												</ul>
											</div>
											<input type="text" class="form-control">
										</div>
										<div class="input-group m-b-10">
											<input type="text" class="form-control">
											<div class="input-group-btn">
												<button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown">Action <span class="caret">
												</span>
											</button>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="#">Action</a>
												</li>
												<li>
													<a href="#">Another action</a>
												</li>
												<li>
													<a href="#">Something else here</a>
												</li>
												<li class="divider">
												</li>
												<li>
													<a href="#">Separated link</a>
												</li>
											</ul>
										</div>
									</div>

								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-2">Segmented buttons</label>
								<div class="col-lg-10">
									<div class="input-group m-b-10">
										<div class="input-group-btn">
											<button tabindex="-1" class="btn btn-white" type="button">Action</button>
											<button tabindex="-1" data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">
												<span class="caret">
												</span>
											</button>
											<ul role="menu" class="dropdown-menu">
												<li>
													<a href="#">Action</a>
												</li>
												<li>
													<a href="#">Another action</a>
												</li>
												<li>
													<a href="#">Something else here</a>
												</li>
												<li class="divider">
												</li>
												<li>
													<a href="#">Separated link</a>
												</li>
											</ul>
										</div>
										<input type="text" class="form-control">
									</div>

									<div class="input-group m-b-10">
										<input type="text" class="form-control">
										<div class="input-group-btn">
											<button tabindex="-1" class="btn btn-white" type="button">Action</button>
											<button tabindex="-1" data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">
												<span class="caret">
												</span>
											</button>
											<ul role="menu" class="dropdown-menu pull-right">
												<li>
													<a href="#">Action</a>
												</li>
												<li>
													<a href="#">Another action</a>
												</li>
												<li>
													<a href="#">Something else here</a>
												</li>
												<li class="divider">
												</li>
												<li>
													<a href="#">Separated link</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>

						</form>
					</div>
				</section>
				<section class="panel">
					<header class="panel-heading">
						Inline Grid
					</header>
					<div class="panel-body">

						<div class="row">

							<div class="col-md-12 form-group">
								<input type="text" placeholder=".col-md-12" class="form-control">
							</div>

							<div class="col-md-6 form-group">
								<input type="text" placeholder=".col-md-6" class="form-control">
							</div>

							<div class="col-md-6 form-group">
								<input type="text" placeholder=".col-md-6" class="form-control">
							</div>


							<div class="col-md-4 form-group">
								<input type="text" placeholder=".col-md-4" class="form-control">
							</div>

							<div class="col-md-4 form-group">
								<input type="text" placeholder=".col-md-4" class="form-control">
							</div>

							<div class="col-md-4 form-group">
								<input type="text" placeholder=".col-md-4" class="form-control">
							</div>


							<div class="col-md-3 form-group">
								<input type="text" placeholder=".col-md-3" class="form-control">
							</div>

							<div class="col-md-3 form-group">
								<input type="text" placeholder=".col-md-3" class="form-control">
							</div>

							<div class="col-md-3 form-group">
								<input type="text" placeholder=".col-md-3" class="form-control">
							</div>

							<div class="col-md-3 form-group">
								<input type="text" placeholder=".col-md-3" class="form-control">
							</div>


							<div class="col-md-2 form-group">
								<input type="text" placeholder=".col-md-2" class="form-control">
							</div>

							<div class="col-md-2 form-group">
								<input type="text" placeholder=".col-md-2" class="form-control">
							</div>

							<div class="col-md-2 form-group">
								<input type="text" placeholder=".col-md-2" class="form-control">
							</div>

							<div class="col-md-2 form-group">
								<input type="text" placeholder=".col-md-2" class="form-control">
							</div>

							<div class="col-md-2 form-group">
								<input type="text" placeholder=".col-md-2" class="form-control">
							</div>

							<div class="col-md-2 form-group">
								<input type="text" placeholder=".col-md-2" class="form-control">
							</div>


							<div class="col-md-1 form-group">
								<input type="text" placeholder=".col-md-1" class="form-control">
							</div>

							<div class="col-md-1 form-group">
								<input type="text" placeholder=".col-md-1" class="form-control">
							</div>

							<div class="col-md-1 form-group">
								<input type="text" placeholder=".col-md-1" class="form-control">
							</div>

							<div class="col-md-1 form-group">
								<input type="text" placeholder=".col-md-1" class="form-control">
							</div>

							<div class="col-md-1 form-group">
								<input type="text" placeholder=".col-md-1" class="form-control">
							</div>

							<div class="col-md-1 form-group">
								<input type="text" placeholder=".col-md-1" class="form-control">
							</div>

							<div class="col-md-1 form-group">
								<input type="text" placeholder=".col-md-1" class="form-control">
							</div>

							<div class="col-md-1 form-group">
								<input type="text" placeholder=".col-md-1" class="form-control">
							</div>

							<div class="col-md-1 form-group">
								<input type="text" placeholder=".col-md-1" class="form-control">
							</div>

							<div class="col-md-1 form-group">
								<input type="text" placeholder=".col-md-1" class="form-control">
							</div>

							<div class="col-md-1 form-group">
								<input type="text" placeholder=".col-md-1" class="form-control">
							</div>

							<div class="col-md-1 form-group">
								<input type="text" placeholder=".col-md-1" class="form-control">
							</div>
						</div>

					</div>
				</section>
			</div>
		</div>

	</section>
	<!-- /.content -->
</aside>
<!-- /.right-side -->
<div class="footer-main">
	Copyright © Director, 2014
</div>
</div>
<!-- ./wrapper -->
<!-- jQuery 2.0.2 -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js">
</script>
<script src="js/jquery.min.js" type="text/javascript">
</script>

<!-- Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript">
</script>
<!-- Director App -->
<script src="js/Director/app.js" type="text/javascript">
</script>


</body>
</html>
