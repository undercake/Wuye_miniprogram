<?php if ($path[1] == 'login'): ?>

<!--footer section start-->
<div class="footer">
    <p> Copyright <span style="color:#ea4c89">&copy;Smart</span> All Rights Recived</p>
    </p>
</div>

<?php else: ?>

<!--footer section start-->
<footer>
    <p> Copyright <span style="color:#ea4c89">&copy;Smart</span> All Rights Recived</p>
    </p>
</footer>
<!--footer section end-->

<?php endif; ?>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery.easydropdown.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/notice.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/scripts.js"></script>

<script>
    var toggle = true;

    $(".sidebar-icon").click(function() {
        if (toggle) {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({
                "position": "absolute"
            });
        } else {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function() {
                $("#menu span").css({
                    "position": "relative"
                });
            }, 400);
        }

        toggle = !toggle;
    });
</script>
<?php $blackList = array('h.php','logout.php','login','404','403') ?>
<?php if (!in_array($path[1], $blackList) && $_SESSION['login']): ?>
<script>
    let heartbeatURL = '//<?php echo $base ?>h.php';
</script>
<script src="js/heartbeat.js"></script>

<?php endif; ?>
