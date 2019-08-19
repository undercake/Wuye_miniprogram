<?php $pageRight = 2;
if ($pageRight > $_SESSION['rights']) {
    showCode(403);
    die();
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>
        <?php echo $title ?>-新闻编辑</title>
    <?php head() ?>
    <link href="css/wangEditor.min.css" rel='stylesheet' type='text/css' />

</head>

<body>
    <div class="page-container">
        <!--/content-inner-->
        <div class="left-content">
            <div class="inner-content">
                <!-- header-starts -->
                <div class="header-section" style="">
                    <!--//menu-right-->
                    <div class="clearfix"></div>
                </div>
                <!-- //header-ends -->
                <div class="outter-wp">
                    <div class="graph-visual">
                        <h2 class="inner-tittle">新闻编辑</h2>
                        <div class="grid-1">
                            <form onsubmit="return subcheck()" method="post" action="act.php?type=<?php echo $_GET['e']?>" class="form-horizontal">
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">标题</label>
                                    <div class="col-sm-8">
                                        <input autocomplete="off" class="form-control" required name="title" type="text" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="author" class="col-sm-2 control-label">发布者</label>
                                    <div class="col-sm-8">
                                        <input autocomplete="off" class="form-control" name="author" type="text" value="">
                                    </div>
                                    <div class="col-sm-2">
                                        <p class="help-block">选填，不填默认为“管理员”</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="cont_view" class="col-sm-2 control-label">新闻内容</label>
                                    <div class="col-sm-8">
                                        <div id="cont_view"></div>
                                        <textarea name="cont" style="display:none"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="checkbox-inline1">
                                        <label class="col-sm-2 control-label">置顶</label>
                                        <div class="col-sm-8 control-label" style="text-align: left;margin-top: 6px;">

                                            <div class="onoffswitch">
                                                <input type="checkbox" name="check" class="onoffswitch-checkbox" id="myonoffswitch">
                                                <label class="onoffswitch-label" for="myonoffswitch">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">简介</label>
                                    <div class="col-sm-8">
                                        <textarea name="descripion" class="form-control"></textarea>
                                    </div>
                                    <div class="col-sm-2">
                                        <p class="help-block">选填，如果不填写会默认抓取正文前54个字</p>
                                    </div>
                                </div>
                                <div class="col-sm-offset-2">
                                    <button type="submit" class="btn btn-primary btn-lg">提交</button>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="" class="col-sm-2 control-label"></label>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn">提交</button>
                                    </div>
                                </div> -->
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--//content-inner-->
        <!--/sidebar-menu-->
        <?php sidebar() ?>
        <div class="clearfix"></div>
    </div>
    <?php foot() ?>
    <script src="js/side.js" type="text/javascript"></script>
    <script src="js/wangEditor.min.js" type="text/javascript"></script>
    <script src="js/xss.js" type="text/javascript"></script>
    <script>

        let count = 0;
        var E = window.wangEditor;

        var editor = new E('#cont_view');
        // 自定义菜单配置
        editor.customConfig.menus = [
            'head',
            'bold',
            'italic',
            'fontSize',
            'underline',
            'strikeThrough',
            'foreColor',
            'backColor',
            'justify', // 对齐方式
            'image', // 插入图片
            'table', // 表格
            'undo', // 撤销
            'redo' // 重复
        ];

        editor.customConfig.uploadImgServer = '<?php echo ' //'.$base ?>upfile.php';
        editor.customConfig.uploadImgMaxLength = 1;
        editor.customConfig.showLinkImg = false;
        editor.customConfig.pasteIgnoreImg = true;
        editor.customConfig.debug = true;

        editor.customConfig.onchange = function(html) {
            editor.txt.html(filterXSS(html));
            if (editor.txt.text().length > 54 && $.trim($('textarea[name=descripion]').val()) == '') {
                $('textarea[name=descripion]').val(editor.txt.text().substring(0, 54));
            }
        }

        editor.customConfig.onblur = function(html) {
            editor.txt.html(filterXSS(html));
            if (editor.txt.text().length > 54 && $.trim($('textarea[name=descripion]').val()) == '') {
                $('textarea[name=descripion]').val(editor.txt.text().substring(0, 54));
            }
        }

        editor.create();

        function subcheck() {
            if ($.trim($('textarea[name=descripion]').val()) == '') {
                $('textarea[name=descripion]').val(editor.txt.text().substring(0, 54));
            }

            if ($.trim($('input[name=author]').val()) == '') {
                $('input[name=author]').val('管理员');
            }

            if ($.trim(editor.txt.text()) == '') {
                showModel({
                    showText: '新闻内容必须要有文字',
                    level: 'danger'
                });
                return false;
            }
            console.log(JSON.stringify(editor.txt.getJSON()));
            $('textarea[name=cont]').val(JSON.stringify(editor.txt.getJSON()));

            return true;
        }
    </script>
    <script src="js/bootstrap-markdown.js"></script>0
</body>

</html>
