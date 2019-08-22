<!DOCTYPE html>
<?php 
include_once 'inc.php'; 


    $type = pdo_getall('coupon_type',array('appid' => $_SESSION['appid']));
    $pool = pdo_getall('coupon_pool',array('appid' => $_SESSION['appid']));
    $user = pdo_getall('coupon_user',array('appid' => $_SESSION['appid']));


?>
<html>
<head>
    <?php include 'header.html'; ?>
    <title>红包管理</title>
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                导航栏
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php include 'leftside.php';?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->


                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">



                            <section class="panel">
                                <header class="panel-heading">
                                    代金券使用
                                </header>
                                <div class="panel-body table-responsive">
                                    <div style="max-width:400px;margin:auto">
                                        <div class="form-group">
                                          <label for="ma">券码</label>
                                          <input type="text" class="form-control" id="ma">
                                      </div>
                                      <div style="text-align: center">
                                        <button style="width:100%" onclick="ma()" type="button" class="btn btn-info">提交</button>
                                    </div>
                                      
                                    </div>
                                </div>
                            </section>

                            <section class="panel">
                                <div id="back" class="panel-body table-responsive">
                                        
                                </div>
                            </section>





                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
            <div class="footer-main">
                Copyright &苏连智能网络, 2019
            </div>
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>

   

        <script>
            function ma(){
                if ($.trim($('#ma').val()) == '') return;
                $.ajax({
                    url:'getma.php?type=get&cup=' + $('#ma').val(),
                    success:function(res){
                        setData(res);
                    }
                });
            }

            function setData(res){
                $('#back').html(res);
            }

            function cou(e,r){
                    $.ajax({
                        url:'getma.php?type='+e+'&cup=' + r,
                        success:function(rs){
                            res = JSON.parse(rs);
                            if (res.status == 'ok') {
                                ma();
                            }else{
                                info(res.level,res.title,res.cont);
                            }
                        }
                    });
            }

            function info(leve,title,cont){
                let info = '<div class="alert alert-'+leve+'">button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button><strong>'+title+'</strong>'+cont+'</div>'
                $('#noti-box').append(info);
            }
</script>

         <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

        <script src="js/plugins/chart.js" type="text/javascript"></script>

        <!-- datepicker
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
        <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- calendar -->
        <script src="js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

        <!-- Director App -->
        <script src="js/Director/app.js" type="text/javascript"></script>

        <!-- Director dashboard demo (This is only for demo purposes) -->
        <script src="js/Director/dashboard.js" type="text/javascript"></script>


    </body>
    </html>
