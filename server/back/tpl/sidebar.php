<!--/sidebar-menu-->
<div class="sidebar-menu">
    <header class="logo">
        <a class="sidebar-icon"> <span class="iconfont bold icon-menu"></span></a>

             <a> <span id="logo"> <h1 style="font-size: 1.2em;"><img style="display:inline;width:30px;margin-right:10px;" src="images/sllogo.png" alt="Logo"/>苏连智能</h1></span>
    </header>
    <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
    <!--/down-->
    <div class="down">
        <a href="index.php/dashboard"><img src="images/admin.jpg"></a>
        <a href="index.php/profile"><span class=" name-caret"><?php echo $_SESSION['info']['co_name'] ?></span></a>
        <p><?php echo $_SESSION['info']['motto'] ?></p>
        <ul>
            <li><a class="tooltips" href="index.php/profile"><span>个人主页</span><i class="iconfont icon-user"></i></a></li>
            <!-- <li><a class="tooltips" href="index.php/index.html"><span>设置</span><i class="lnr lnr-cog"></i></a></li> -->
            <li><a class="tooltips" href="index.php/logout.php"><span>退出登录</span><i class="iconfont icon-logout"></i></a></li>
        </ul>
    </div>
    <!--//down-->
    <div class="menu">
        <ul id="menu">
            <?php if (in_array(1, $_SESSION['rights'])): ?>

            <li><a href="index.php/dashboard"><i class="iconfont icon-dashboard"></i> <span>主面板</span></a></li>
            <?php endif; ?>
            <?php if (in_array(2, $_SESSION['rights'])): ?>

            <li id="menu-academico"><a><i class="iconfont icon-detail"></i> <span>新闻管理</span> <span class="iconfont icon-right
" style="float: right"></span></a>
                <ul id="menu-academico-sub">
                    <li id="menu-academico-avaliacoes"><a href="index.php/editor?e=news">新闻编辑</a></li>
                    <li id="menu-academico-boletim"><a href="index.php/table?e=news">新闻管理</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <?php if (in_array(3, $_SESSION['rights'])): ?>

            <li id="menu-academico"><a><i class="iconfont icon-sound"></i> <span>通知管理</span> <span class="iconfont icon-right
" style="float: right"></span></a>
                <ul id="menu-academico-sub">
                    <li id="menu-academico-avaliacoes"><a href="index.php/editor?e=notice">通知编辑</a></li>
                    <li id="menu-academico-boletim"><a href="index.php/table?e=notice">通知管理</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <?php if (in_array(4, $_SESSION['rights'])): ?>
            <li id="menu-academico"><a><i class="iconfont icon-location"></i> <span>地点位置</span> <span class="iconfont icon-right
" style="float: right"></span></a>
                <ul id="menu-academico-sub">
                    <li id="menu-academico-avaliacoes"><a href="index.php/map">新增地点</a></li>
                    <li id="menu-academico-boletim"><a href="index.php/map">地点管理</a></li>
                    <li id="menu-academico-boletim"><a href="index.php/map">小区管理</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <?php if (in_array(5, $_SESSION['rights'])): ?>
            <li><a href="index.php/table"><i class="iconfont icon-team"></i> <span>客户管理</span></a></li>

            <?php endif; ?>
        </ul>
    </div>
</div>
