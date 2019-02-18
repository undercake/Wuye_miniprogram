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
        <?php include 'header.php' ?>
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
                            </section>

                            <section class="panel">
                                <header class="panel-heading">
                                    券池概览
                                </header>
                                <div class="panel-body table-responsive">
                                        <table class="table table-hover">
                                              <thead>
                                                <tr>
                                                  <th>#</th>
                                                  <th>名称</th>
                                                  <th>代金价格</th>
                                                  <th>红包类型</th>
                                                  <th>门槛（元）</th>
                                                  <th>剩余数量</th>
                                                  <th>每位用户领取上限</th>
                                                  <th>过期时间</th>
                                              </tr>
                                          </thead>
                                        <?php $i = 1; ?>
                                        <?php foreach ($pool as $value): ?>
                                                <tr>
                                                  <td><?php echo $i; ?></td>
                                                  <td><?php echo $value['name'] ?></td>
                                                  <td><?php echo $value['type'] == 0 ? '分享获得' : ( $value['type'] == 1 ? '不可通过分享获得':'随时可以获得') ?></td>
                                                  <td><?php echo $value['value'] ?></td>
                                                  <td><?php echo $value['min'] ?></td>
                                                  <td><span class="badge badge-<?php echo (int)$value['sum_count'] > 10 ? ((int)$value['sum_count'] > 100 ?'success': 'info') :'danger';?>"><?php echo $value['sum_count'] ?></span></td>
                                                  <td><?php echo $value['top_per_user'] == -1? '无上限' : $value['avail_per_user'] ; ?></td>
                                                  <td><?php echo $value['end_time'] ?></td>

                                              </tr>
                                              <?php $i++; ?>
                                        <?php endforeach ?>
                                      </table>
                                </div>
                            </section>





                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    新增代金券
                                </header>

                                <div class="panel-body">
                                    <form onsubmit="return isUpload();" class="form-horizontal tasi-form" method="post" action="add.php?type=coupon&appid=<?php echo $_SESSION['appid']; ?>">
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">优惠券名称</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" class="form-control" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">代金券类型</label>
                                            <div class="col-sm-10">
                                                <select name="type">
                                                    <option selected value="0">分享获得</option>
                                                    <option value="1">不可通过分享获得</option>
                                                    <option value="2">随时可以获得</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">代金券价格</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="value" class="form-control" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">代金券门槛</label>
                                            <div class="col-sm-10">
                                                <input required="required" type="number" name="min" class="form-control round-input">
                                                <span class="help-block">门槛价格为0时相当于无门槛券</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">发行总数量</label>
                                            <div class="col-sm-10">
                                                <input name="count" required="required" class="form-control" name="focusedInput" type="number">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">每位用户同时可用张数</label>
                                            <div class="col-sm-10">
                                                <input name="maxcount" required="required" class="form-control"  type="number">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">代金券过期时间</label>
                                            <div class="col-sm-10">
                                                <input name="endtime" required="required" class="form-control" type="datetime-local">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info">提交</button>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
            <div class="footer-main">
                Copyright &copy Director, 2014
            </div>
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>

        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Director App -->
        <script src="js/Director/app.js" type="text/javascript"></script>
        <script>
            function isUpload(){
                return confirm("提交之后不能再更改，确定提交?");
            }
        </script>
    </body>
    </html>
