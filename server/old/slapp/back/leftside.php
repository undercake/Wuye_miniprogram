          <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo $_SESSION['username']; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li <?php echo strpos($_SERVER['SCRIPT_NAME'],'redpack.php') ? 'class="active"' :''; ?>>
                            <a href="redpack.php">
                                <i class="fa fa-circle"></i> <span>红包管理页面</span>
                            </a>
                        </li>
                        <li <?php echo strpos($_SERVER['SCRIPT_NAME'],'redpack_use.php') ? 'class="active"' :''; ?>>
                            <a href="redpack_use.php">
                                <i class="fa fa-check-circle"></i> <span>红包使用页面</span>
                            </a>
                        </li>
                        <li <?php echo strpos($_SERVER['SCRIPT_NAME'],'appsetting.php') ? 'class="active"' :''; ?>>
                            <a href="appsetting.php">
                                <i class="fa fa-check-circle"></i> <span>小程序编辑页面</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>