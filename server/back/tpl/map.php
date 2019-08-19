<!--
Author: xmoban.cn
Author URL: http://www.xmoban.cn/
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
    <title>
        <?php echo $title ?>-地图</title>
    <?php head() ?>
    <!-- map -->
    <link href="css/jqvmap.css" rel='stylesheet' type='text/css' />
    <script src="js/jquery.vmap.js"></script>
    <script src="js/jquery.vmap.sampledata.js" type="text/javascript"></script>
    <script src="js/jquery.vmap.world.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: '#f4f4f4',
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#052963',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#052963', '#07A3B1'],
                normalizeFunction: 'polynomial'
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('#vmap1').vectorMap({
                map: 'world_en',
                backgroundColor: '#f4f4f4',
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#666666',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#fcb314', '#ea4c89'],
                normalizeFunction: 'polynomial'
            });
        });
    </script>
    <!-- map -->

</head>

<body>
    <div class="page-container">
        <!--/content-inner-->
        <div class="left-content">
            <div class="inner-content">
                <!-- header-starts -->
                <div class="header-section">
                    <div class="clearfix"></div>
                </div>
                <!-- //header-ends -->
                <!--/outer-wp-->
                <div class="outter-wp">
                    <!--/graph-visual-->
                    <div class="graph-visual">
                        `<div class="clearfix"></div>
                        <div class="map-bottm">
                            <h3 class="inner-tittle two"> Default Map</h3>
                            <div class="graph">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d6056558.454375799!2d13.59848807125107!3d42.16517993416346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1453718837836" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                    <!--/graph-visual-->

                </div>
                <!--//outer-wp-->
            </div>
        </div>
        <!--//content-inner-->
        <!--/sidebar-menu-->
         <?php sidebar() ?>
        <div class="clearfix"></div>
    </div>
        <?php foot() ?>
    <!--js -->
    <script src="js/datamaps-all.js"></script>
    <script src="js/map.js"></script>
</body>

</html>
