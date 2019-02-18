<?php 
include_once 'inc.php'; 


$res = pdo_get('AppSettings',array('appid' => $_SESSION['appid']));
$rs = json_decode($res['appSetting'],true);



?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'header.html'; ?>
    <title>小程序编辑页面</title>
</head>
<body class="skin-black">
        <?php include 'header.php' ?>
    <div class="wrapper row-offcanvas row-offcanvas-left">
       <?php include 'leftside.php';?>

       <!-- Right side column. Contains the navbar and content of the page -->
       <aside class="right-side">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <form action="add.php?type=app" method="post">


                <div class="row">
                    <div class="col-md-12">


                        <section class="panel">
                            <div class="alert alert-warning">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                                <strong>注意：</strong> 由于服务器运维及安全方面考虑，图片更改及更多高级内容编辑将在后续版本提供！
                            </div>
                            <header class="panel-heading">
                                <?php echo $rs["basic"]['title']; ?>
                            </header>
                            <div class="panel-body table-responsive">
                                <div class="form-group">
                                    <label for="basic_1">小程序名称</label>
                                    <input type="text" name="basic_1" class="form-control" id="basic_1" value="<?php echo $rs['basic']['appName'] ?>">
                                    
                                </div>
                            </div>
                        </section>




                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">


                        <section class="panel">
                            <header class="panel-heading">
                                <?php echo $rs["index"]['page_name']; ?>
                            </header>
                            <div class="panel-body table-responsive">
                                <div class="form-group">
                                    <label for="index_1">页面名称</label>
                                    <input type="text" name="index_1" class="form-control" id="index_1" value="<?php echo $rs['index']['page_name'] ?>">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="index_2">关于</label>
                                    <input type="text" name="index_2" class="form-control" id="index_2" value="<?php echo $rs['index']['about'] ?>">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="index_3">标签名称，用“逗号”隔开</label>
                                    <input type="text" name="index_3" class="form-control" id="index_3" value="<?php $i = 1 ;foreach($rs['index']['tags'] as $v){echo ($i == 1? '' :',').$v;$i++;} ?>">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="index_4">轮播图切换间隔（单位：毫秒）</label>
                                    <input type="text" name="index_4" class="form-control" id="index_4" value="<?php echo $rs['index']['swiper']['interval'] ?>">
                                    <span class="help-block">1秒 = 1000毫秒</span>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="index_5">轮播图切换动效时间（单位：毫秒）</label>
                                    <input type="text" name="index_5" class="form-control" id="index_5" value="<?php echo $rs['index']['swiper']['duration'] ?>">
                                    <span class="help-block">1秒 = 1000毫秒</span>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="index_6">通知信息，用“逗号”隔开</label>
                                    <input type="text" name="index_6" class="form-control" id="index_6" value="<?php $i = 1 ;foreach($rs['index']['massage'] as $v){echo ($i == 1? '' :',').$v;$i++;} ?>">
                                    <span class="help-block">少于两个不滚动，如果需要，请用相同文字，中间用逗号隔开</span>
                                </div>
                            </div>
                        </section>




                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">


                        <section class="panel">
                            <header class="panel-heading">
                                <?php echo $rs["env"]['page_name']; ?>
                            </header>
                            <div class="panel-body table-responsive">
                                <div class="form-group">
                                    <label for="env_1">第一段标题</label>
                                    <input type="text" name="env_1" class="form-control" id="env_1" value="<?php echo $rs['env']['contant'][0]['title'] ?>">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="env_2">第一段文字</label>
                                    <textarea rows="5" type="text" name="env_2" class="form-control" id="env_2"><?php foreach ($rs['env']['contant'][0]['contant'] as $v) {
                                        echo "{$v}\n";
                                    }  ?></textarea>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="env_3">第二段标题</label>
                                    <input type="text" name="env_3" class="form-control" id="env_3" value="<?php echo $rs['env']['contant'][1]['title'] ?>">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="env_4">第二段文字</label>
                                    <textarea rows="5" type="text" name="env_4" class="form-control" id="env_4"><?php foreach ($rs['env']['contant'][1]['contant'] as $v) {
                                        echo "{$v}\n";
                                    }  ?></textarea>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="env_5">底部标题</label>
                                    <input type="text" name="env_5" class="form-control" id="env_5" value="<?php echo $rs['env']['bottom']['title'] ?>">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="env_6">底部文字</label>
                                    <input type="text" name="env_6" class="form-control" id="env_6" value="<?php echo $rs['env']['bottom']['contant'] ?>">
                                    
                                </div>
                            </div>
                        </section>




                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12">


                        <section class="panel">
                            <header class="panel-heading">
                                <?php echo $rs["info"]['page_name']; ?>
                            </header>
                            <div class="panel-body table-responsive">
                                <div class="form-group">
                                    <label for="info_1">页面标题</label>
                                    <input type="text" name="info_1" class="form-control" id="info_1" value="<?php echo $rs['info']['title'] ?>">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="info_2">文字描述</label>
                                    <textarea rows="5" type="text" name="info_2" class="form-control" id="info_2"><?php foreach ($rs['info']['contant'] as $v) {
                                        echo "{$v}\n";
                                    }  ?></textarea>
                                    
                                </div>
                            </div>
                        </section>

                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12">


                        <section class="panel">
                            <header class="panel-heading">
                                <?php echo $rs["service"]['page_name']; ?>
                            </header>
                            <div class="panel-body table-responsive">
                                <div class="form-group">
                                    <label for="service_1">页面标题</label>
                                    <input type="text" name="service_1" class="form-control" id="service_1" value="<?php echo $rs['service']['title'] ?>">
                                </div>
                                <div id="service_content">



                                    <div class="form-group">
                                        <label for="service_2">第一段标题</label>
                                        <input type="text" name="service_2" class="form-control" id="service_2" value="<?php echo $rs['service']['tags'][0] ?>">

                                    </div>

                                    <div class="form-group">
                                        <label for="service_3">第一段文字</label>
                                        <textarea rows="5" type="text" name="service_3" class="form-control" id="service_3"><?php echo $rs['service']['detail'][0] ?></textarea>

                                    </div>


                                    <div class="form-group">
                                        <label for="service_4">第二段标题</label>
                                        <input type="text" name="service_4" class="form-control" id="service_4" value="<?php echo $rs['service']['tags'][1] ?>">
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="service_5">第二段文字</label>
                                        <textarea rows="5" type="text" name="service_5" class="form-control" id="service_3"><?php echo $rs['service']['detail'][1] ?></textarea>
                                        
                                    </div>


                                    <div class="form-group">
                                        <label for="service_6">第三段标题</label>
                                        <input type="text" name="service_6" class="form-control" id="service_6" value="<?php echo $rs['service']['tags'][2] ?>">

                                    </div>

                                    <div class="form-group">
                                        <label for="service_7">第三段文字</label>
                                        <textarea rows="5" type="text" name="service_7" class="form-control" id="service_7"><?php echo $rs['service']['detail'][2] ?></textarea>

                                    </div>

                                            <!-- <?php
#                                      $i = 1;
                                            #foreach ($variable as $key => $value): ?>

                                                <div class="form-group">
                                                    <label for="service_title_<?php #echo $i;?>">第<?php #echo $i;?>段标题</label>
                                                    <input type="text" name="service_title_<?php #echo $i;?>" class="form-control" id="service_title_<?php #echo $i;?>" value="<?php #echo $rs['service']['tags'][$i-1] ?>">
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label for="service_content_<?php #echo $i;?>">第<?php #echo $i;?>段描述</label>
                                                    <textarea rows="5" type="text" name="service_content_<?php #echo $i;?>" class="form-control" id="service_content_<?php #echo $i;?>"><?php #$rs['service']['detail'][$i-1] ?></textarea>
                                                    
                                                </div>
                                                <?php #endforeach ?> -->
                                            <!-- </div> -->

                                        </div>
                                    </div>
                                </section>

                            </div>
                        </div>





                        <div class="row">
                            <div class="col-md-12">


                                <section class="panel">
                                    <header class="panel-heading">
                                        <?php echo $rs["needs"]['page_name']; ?>
                                    </header>
                                    <div id="needs_content">
                                        <div class="form-group">
                                            <label for="needs_1">页面标题</label>
                                            <input typ"text" name="needs_1" class="form-control" id="needs_1" value="<?php echo $rs['needs']['title'] ?>">
                                        </div>




                                        <div class="form-group">
                                            <label for="needs_4">第一个招聘信息</label>

                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label"><?php echo $rs['needs']['contant'][0]['contant_1_title'] ?></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="needs_1_1" class="form-control" id="needs_1_1" value="<?php echo $rs['needs']['contant'][0]['contant_1'] ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label"><?php echo $rs['needs']['contant'][0]['contant_2_title'] ?></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="needs_1_2" class="form-control" id="needs_1_2" value="<?php echo $rs['needs']['contant'][0]['contant_2'] ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label"><?php echo $rs['needs']['contant'][0]['contant_1_title'] ?></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="needs_1_3" class="form-control" id="needs_1-2" value="<?php echo $rs['needs']['contant'][0]['contant_3'] ?>">
                                                </div>
                                            </div>
                                        </div>




                                        <div class="form-group">
                                            <label for="needs_2_1">第二个招聘信息</label>

                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label"><?php echo $rs['needs']['contant'][1]['contant_2_title'] ?></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="needs_2_1" class="form-control" id="needs_2_1" value="<?php echo $rs['needs']['contant'][1]['contant_2'] ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label"><?php echo $rs['needs']['contant'][1]['contant_2_title'] ?></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="needs_2_2" class="form-control" id="needs_4" value="<?php echo $rs['needs']['contant'][1]['contant_2'] ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label"><?php echo $rs['needs']['contant'][1]['contant_3_title'] ?></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="needs_2_3" class="form-control" id="needs_4" value="<?php echo $rs['needs']['contant'][1]['contant_3'] ?>">
                                                </div>
                                            </div>
                                        </div>




                                        <div class="form-group">
                                            <label for="needs_4">第三个招聘信息</label>

                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label"><?php echo $rs['needs']['contant'][2]['contant_1_title'] ?></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="needs_3_1" class="form-control" id="needs_3_1" value="<?php echo $rs['needs']['contant'][2]['contant_1'] ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label"><?php echo $rs['needs']['contant'][2]['contant_2_title'] ?></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="needs_3_2" class="form-control" id="needs_3_2" value="<?php echo $rs['needs']['contant'][2]['contant_2'] ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label"><?php echo $rs['needs']['contant'][2]['contant_3_title'] ?></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="needs_3_3" class="form-control" id="needs_3_3" value="<?php echo $rs['needs']['contant'][2]['contant_3'] ?>">
                                                </div>
                                            </div>
                                        </div>






                                    <div class="form-group">
                                        <label for="needs_2">底部信息</label>
                                        <textarea type="text" name="needs_2" class="form-control" id="needs_2"><?php foreach ($rs['needs']['bottom'] as $v) {
                                        echo "{$v}\n";
                                    }  ?></textarea>

                                    </div>
                                    <div class="form-group"><button style="margin: auto;width:100px;" type="submit" class="btn btn-info">提交</button></div>

                                            





    <!--                     <?php #
                                            #$i = 1;
                                            #foreach ($value["needs"]['contant'] as $value): ?>

                                                <div class="form-group">
                                                    <label for="needs_title_<?php # echo $i;?>">第<?php # echo $i;?>个招聘信息</label>
                                                    <input type="text" name="needs_title_<?php # echo $i;?>" class="form-control" id="needs_title_<?php # echo $i;?>" value="<?php # echo $rs['needs']['tags'][$i-1] ?>">
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label for="needs_content_<?php # echo $i;?>">第<?php # echo $i;?>段描述</label>
                                                    <textarea rows="5" type="text" name="needs_content_<?php # echo $i;?>" class="form-control" id="needs_content_<?php # echo $i;?>"><?php # $rs['needs']['detail'][$i-1] ?></textarea>
                                                    
                                                </div>
                                                <?php #endforeach ?> -->
                                        </div>
                                        
                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>



                </form>
            </section><!-- /.content -->
        </aside><!-- /.right-side -->
        <div class="footer-main">
            Copyright &苏连智能网络, 2019
        </div>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.0.2 -->

    <!-- jQuery 2.0.2 -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="js/jquery.min.js" type="text/javascript"></script>

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

    <!-- Director for demo purposes -->
    <script type="text/javascript">
        $('input').on('ifChecked', function(event) {
// var element = $(this).parent().find('input:checkbox:first');
// element.parent().parent().parent().addClass('highlight');
$(this).parents('li').addClass("task-done");
console.log('ok');
});
        $('input').on('ifUnchecked', function(event) {
// var element = $(this).parent().find('input:checkbox:first');
// element.parent().parent().parent().removeClass('highlight');
$(this).parents('li').removeClass("task-done");
console.log('not');
});

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
                    console.log(rs)
                    console.log(res)
                    info(res.level,res.title,res.cont);
                }
            });
        }

        function info(leve,title,cont){
            let info = '<div class="alert alert-'+leve+'">button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button><strong>'+title+'</strong>'+cont+'</div>'
            $('#noti-box').append(info);
        }

        $('#noti-box').slimScroll({
            height: '400px',
            size: '5px',
            BorderRadius: '5px'
        });

        $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
            checkboxClass: 'icheckbox_flat-grey',
            radioClass: 'iradio_flat-grey'
        });
    </script>
    <script type="text/javascript">
        $(function() {
            "use strict";


        });
// Chart.defaults.global.responsive = true;
</script>
</body>
</html>
