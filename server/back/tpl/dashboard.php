<?php $pageRight = 1;
if ($pageRight > $_SESSION['rights']) {
    showCode(403);
    die();
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title><?php echo $title ?>-总览</title>
    <?php head() ?>
    <link href="css/barChart.css" rel='stylesheet' type='text/css' />
    <link href="css/fabochart.css" rel='stylesheet' type='text/css' />
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
                <div class="outter-wp">
                    <!--custom-widgets-->
                    <div class="custom-widgets">
                        <div class="row-one">
                            <div class="col-md-3 widget">
                                <div class="stats-left ">
                                    <h5>今日</h5>
                                    <h4>访客</h4>
                                </div>
                                <div class="stats-right">
                                    <label>90</label>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="col-md-3 widget states-mdl">
                                <div class="stats-left">
                                    <h5>今日</h5>
                                    <h4>浏览</h4>
                                </div>
                                <div class="stats-right">
                                    <label> 85</label>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="col-md-3 widget states-thrd">
                                <div class="stats-left">
                                    <h5>今日</h5>
                                    <h4>成交</h4>
                                </div>
                                <div class="stats-right">
                                    <label>51</label>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <!--//custom-widgets-->

                    <!--/charts-->
                    <div class="charts">
                        <div class="chrt-inner">
                            <div class="chrt-bars">
                                <div class="col-md-6 chrt-two">
                                    <h3 class="sub-tittle">历史访问量 </h3>
                                    <div id="chart2"></div>
                                </div>
                                <div class="col-md-6 chrt-three">
                                    <h3 class="sub-tittle">历史浏览量</h3>
                                    <div id="chartdiv2"></div>

                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <!--/float-charts-->
                            <div class="pie">
                                <div class="col-md-6 chrt-three second">
                                    <h3 class="sub-tittle">Radar chart</h3>
                                    <div id="chartdiv4"></div>

                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="area">
                                <div class="col-md-6 chrt-two area">
                                    <h3 class="sub-tittle">Line Multi Chart</h3>
                                    <div style="area">
                                        <canvas id="canvas" style="width:100%;height:100%"></canvas>
                                    </div>
                                    <button id="randomizeData">Randomize Data</button>
                                </div>
                                <div class="col-md-6 chrt-three">
                                    <h3 class="sub-tittle">Stacked bar chart</h3>
                                    <div id="chartdiv1"></div>

                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!--//weather-charts-->
                            <div class="graph-visualization">
                                <div class="col-md-6 map-1">
                                    <h3 class="sub-tittle">Weather </h3>
                                    <div class="weather">
                                        <div class="weather-top">
                                            <div class="weather-top-left">
                                                <div class="degree">
                                                    <figure class="icons">
                                                        <canvas id="partly-cloudy-day" width="64" height="64">
                                                        </canvas>
                                                    </figure>
                                                    <span>37°</span>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <p>FRIDAY
                                                    <label>13</label>
                                                    <sup>th</sup>
                                                    AUG
                                                </p>
                                            </div>
                                            <div class="weather-top-right">
                                                <p><i class="fa fa-map-marker"></i>Location</p>
                                                <label>Lorem ipsum</label>
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                        <div class="weather-bottom">
                                            <div class="weather-bottom1">
                                                <div class="weather-head">
                                                    <h4>Cloudy</h4>
                                                    <figure class="icons">
                                                        <canvas id="cloudy" width="40" height="40"></canvas>
                                                    </figure>
                                                    <h6>20°</h6>
                                                    <div class="bottom-head">
                                                        <p>Monday</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="weather-bottom1 ">
                                                <div class="weather-head">
                                                    <h4>Sunny</h4>
                                                    <figure class="icons">
                                                        <canvas id="clear-day" width="40" height="40">
                                                        </canvas>

                                                    </figure>
                                                    <h6>37°</h6>
                                                    <div class="bottom-head">
                                                        <p>Tuesday</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="weather-bottom1">
                                                <div class="weather-head">
                                                    <h4>Rainy</h4>
                                                    <figure class="icons">
                                                        <canvas id="sleet" width="40" height="40">
                                                        </canvas>
                                                    </figure>


                                                    <h6>7°</h6>
                                                    <div class="bottom-head">
                                                        <p>Wednesday</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="weather-bottom1 ">
                                                <div class="weather-head">
                                                    <h4>Snowy</h4>
                                                    <figure class="icons">
                                                        <canvas id="snow" width="40" height="40">
                                                        </canvas>
                                                    </figure>

                                                    <h6>-10°</h6>
                                                    <div class="bottom-head">
                                                        <p>Thursday</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-6 map-2">
                                    <div class="profile-nav alt">
                                        <section class="panel">
                                            <div class="user-heading alt clock-row terques-bg">
                                                <h3 class="sub-tittle clock">Easy Clock </h3>
                                            </div>
                                            <ul id="clock">
                                                <li id="sec"></li>
                                                <li id="hour"></li>
                                                <li id="min"></li>
                                            </ul>

                                            <ul class="clock-category">
                                                <li>
                                                    <a href="#" class="active">
                                                        <img src="images/time.png" alt="">
                                                        <span>Clock</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <img src="images/alarm.png" alt="">
                                                        <span>Alarm</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <img src="images/watch.png" alt="">
                                                        <span>Stop watch</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <img src="images/timer.png" alt="">
                                                        <span>Timer</span>
                                                    </a>
                                                </li>
                                            </ul>

                                        </section>

                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>

                            <!--//charts-->
                            <div class="area-charts">
                                <div class="col-md-6 panel-chrt">
                                    <h3 class="sub-tittle dyna">Dynamic Speedometer </h3>
                                    <div id="wrapper">
                                        <div id="left">
                                            <div>
                                                <label for='miles'>Miles:</label> <input type="text" name="miles" id="miles" />
                                            </div>
                                            <div>
                                                <label for='kilometers'>Kilometers:</label> <input type="text" name="kilometers" id="kilometers" />
                                            </div>
                                            <p id="errmsg"></p>
                                        </div>

                                        <div id="gauge">
                                            <div id="circle"></div>
                                            <div id="numbers"></div>
                                            <div id="mi-km"></div>
                                            <div id="needle"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 tini-time-line">
                                    <h3 class="sub-tittle">Time line </h3>
                                    <ul class="timeline">
                                        <li>
                                            <div class="timeline-badge info"><i class="fa fa-smile-o"></i></div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">Title</h4>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>Description...</p>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="timeline-badge primary"><i class="fa fa-star-o"></i></div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">Title</h4>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>Description...</p>
                                                </div>
                                            </div>
                                        </li>



                                        <li>
                                            <div class="timeline-badge danger"><i class="fa fa-times-circle-o"></i></div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">Title</h4>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>Description...</p>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="timeline-badge success"><i class="fa fa-check-circle-o"></i></div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">Title</h4>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>Description...</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!--/bottom-grids-->
                            <div class="bottom-grids">
                                <div class="dev-table">
                                    <div class="col-md-4 dev-col">

                                        <div class="dev-widget dev-widget-transparent">
                                            <h2 class="inner one">Server Usage</h2>
                                            <p>Today server usage in percentages</p>
                                            <div class="dev-stat"><span class="counter">68</span>%</div>
                                            <div class="progress progress-bar-xs">
                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                            </div>
                                            <p>We Todayly recommend you change your plan to <strong>Pro</strong>. Click here to get more details.</p>

                                            <a href="#" class="dev-drop">Take a closer look <span class="fa fa-angle-right pull-right"></span></a>
                                        </div>

                                    </div>
                                    <div class="col-md-4 dev-col mid">

                                        <div class="dev-widget dev-widget-transparent dev-widget-success">
                                            <h3 class="inner">Today Earnings</h3>
                                            <p>This is Today earnings per last year</p>
                                            <div class="dev-stat">$<span class="counter">75,332</span></div>
                                            <div class="progress progress-bar-xs">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 79%;"></div>
                                            </div>
                                            <p>We happy to notice you that you become an Elite customer, and you can get some custom sugar.</p>

                                            <a href="#" class="dev-drop">Take a closer look <span class="fa fa-angle-right pull-right"></span></a>
                                        </div>

                                    </div>
                                    <div class="col-md-4 dev-col">

                                        <div class="dev-widget dev-widget-transparent dev-widget-danger">
                                            <h3 class="inner">Your Balance</h3>
                                            <p>All your earnings for this time</p>
                                            <div class="dev-stat">$<span class="counter">5,321</span></div>
                                            <div class="progress progress-bar-xs">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                            </div>
                                            <p>You can withdraw this money in end of each month. Also you can spend it on our marketplace.</p>

                                            <a href="#" class="dev-drop">Take a closer look <span class="fa fa-angle-right pull-right"></span></a>
                                        </div>

                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!--//bottom-grids-->

                        </div>
                        <!--/charts-inner-->
                    </div>
                    <!--//outer-wp-->
                </div>
            </div>
        </div>
        <!--//content-inner-->
        <?php sidebar() ?>
        <div class="clearfix"></div>
    </div>
    <!--js -->
    <?php foot(); ?>
    <link rel="stylesheet" href="css/vroom.css">
    <script type="text/javascript" src="js/vroom.js"></script>
    <script type="text/javascript" src="js/TweenLite.min.js"></script>
    <script type="text/javascript" src="js/CSSPlugin.min.js"></script>

    <!--clock init-->
    <script src="js/css3clock.js"></script>
    <!--Easy Pie Chart-->
    <!--skycons-icons-->
    <script src="js/skycons.js"></script>


    <script src="js/amcharts.js"></script>
    <script src="js/serial.js"></script>
    <script src="js/light.js"></script>
    <script src="js/radar.js"></script>
    <!--//skycons-icons-->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/side.js" type="text/javascript"></script>
    <script>
        var icons = new Skycons({
                "color": "#00C6D7"
            }),
            list = [
                "clear-night", "clear-day",
                "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                "fog"
            ],
            i;

        for (i = list.length; i--;)
            icons.set(list[i], list[i]);

        icons.play();
    </script>
    <script>
        var icons = new Skycons({
                "color": "#00C6D7"
            }),
            list = [
                "clear-night", "clear-day",
                "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                "fog"
            ],
            i;

        for (i = list.length; i--;)
            icons.set(list[i], list[i]);

        icons.play();
    </script>
    <script type="text/javascript" src="js/protovis-d3.2.js"></script>
    <script type="text/javascript" src="js/vix.js"></script>
    <script src="js/fabochart.js"></script>
    <script>
        $(document).ready(function() {
            data = {
                '9月': 300,
                '10月': 200,
                '11月': 100,
                '12月': 500,
                '1月': 400,
                '2月': 200
            };

            $("#chart1").faBoChart({
                time: 500,
                animate: true,
                instantAnimate: true,
                straight: false,
                data: data,
                labelTextColor: "#002561",
            });
            $("#chart2").faBoChart({
                time: 2500,
                animate: true,
                data: data,
                straight: true,
                labelTextColor: "#002561",
            });
        });
    </script>
    <script>
        var chart = AmCharts.makeChart("chartdiv2", {
            "type": "serial",
            "theme": "patterns",
            "legend": {
                "useGraphSettings": true
            },
            "dataProvider": [{
                "year": 8,
                "独立访客": 1,
                "页面访问": 5
            }, {
                "year": 9,
                "独立访客": 3,
                "页面访问": 2
            }, {
                "year": 10,
                "独立访客": 1,
                "页面访问": 2
            }, {
                "year": 11,
                "独立访客": 2,
                "页面访问": 1
            }, {
                "year": 12,
                "独立访客": 3,
                "页面访问": 5
            }, {
                "year": 1,
                "独立访客": 4,
                "页面访问": 3
            }, {
                "year": 2,
                "独立访客": 1,
                "页面访问": 2
            }],
            "valueAxes": [{
                "integersOnly": true,
                "maximum": 6,
                "minimum": 1,
                "reversed": true,
                "axisAlpha": 0,
                "dashLength": 5,
                "gridCount": 10,
                "position": "left",
                "title": "Place taken"
            }],
            "startDuration": 0.5,
            "graphs": [{
                "balloonText": "place taken by Italy in [[category]]: [[value]]",
                "bullet": "round",
                "hidden": true,
                "title": "Italy",
                "valueField": "独立访客",
                "fillAlphas": 0
            }, {
                "balloonText": "[[category]]月独立访客量:[[value]]",
                "bullet": "round",
                "title": "Germany",
                "valueField": "页面访问",
                "fillAlphas": 0
            }, {
                "balloonText": "place taken by UK in [[category]]: [[value]]",
                "bullet": "round",
                "title": "United Kingdom",
                "valueField": "uk",
                "fillAlphas": 0
            }],
            "chartCursor": {
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "year",
            "categoryAxis": {
                "gridPosition": "start",
                "axisAlpha": 0,
                "fillAlpha": 0.05,
                "fillColor": "#000000",
                "gridAlpha": 0,
                "position": "top"
            },
            "export": {
                "enabled": true,
                "position": "bottom-right"
            }
        });
    </script>
    <script>
        var chart = AmCharts.makeChart("chartdiv4", {
            "type": "radar",
            "theme": "light",
            "dataProvider": [{
                "direction": "N",
                "value": 8
            }, {
                "direction": "NE",
                "value": 9
            }, {
                "direction": "E",
                "value": 4.5
            }, {
                "direction": "SE",
                "value": 3.5
            }, {
                "direction": "S",
                "value": 9.2
            }, {
                "direction": "SW",
                "value": 8.4
            }, {
                "direction": "W",
                "value": 11.1
            }, {
                "direction": "NW",
                "value": 10
            }],
            "valueAxes": [{
                "gridType": "circles",
                "minimum": 0,
                "autoGridCount": false,
                "axisAlpha": 0.2,
                "fillAlpha": 0.05,
                "fillColor": "#FFFFFF",
                "gridAlpha": 0.08,
                "guides": [{
                    "angle": 225,
                    "fillAlpha": 0.7,
                    "fillColor": "#052963",
                    "tickLength": 0,
                    "toAngle": 315,
                    "toValue": 14,
                    "value": 0,
                    "lineAlpha": 0,

                }, {
                    "angle": 45,
                    "fillAlpha": 0.6,
                    "fillColor": "#ea4c89",
                    "tickLength": 0,
                    "toAngle": 135,
                    "toValue": 14,
                    "value": 0,
                    "lineAlpha": 0,
                }],
                "position": "left"
            }],
            "startDuration": 1,
            "graphs": [{
                "balloonText": "[[category]]: [[value]] m/s",
                "bullet": "round",
                "fillAlphas": 0.3,
                "valueField": "value"
            }],
            "categoryField": "direction",
            "export": {
                "enabled": true
            }
        });
    </script>
    <script>
        var randomScalingFactor = function() {
            return Math.round(Math.random() * 100 * (Math.random() > 0.5 ? -1 : 1));
        };
        var randomColor = function(opacity) {
            return 'rgba(' + Math.round(Math.random() * 255) + ',' + Math.round(Math.random() * 255) + ',' + Math.round(Math.random() * 255) + ',' + (opacity || '.3') + ')';
        };

        var lineChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "My First dataset",
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
                yAxisID: "y-axis-1",
            }, {
                label: "My Second dataset",
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
                yAxisID: "y-axis-2"
            }]
        };

        $.each(lineChartData.datasets, function(i, dataset) {
            dataset.borderColor = randomColor(0.4);
            dataset.backgroundColor = randomColor(1);
            dataset.pointBorderColor = randomColor(0.7);
            dataset.pointBackgroundColor = randomColor(0.5);
            dataset.pointBorderWidth = 1;
        });

        console.log(lineChartData);

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myLine = Chart.Line(ctx, {
                data: lineChartData,
                options: {

                    hoverMode: 'label',
                    stacked: false,
                    scales: {
                        xAxes: [{
                            display: true,
                            gridLines: {
                                offsetGridLines: false
                            }
                        }],
                        yAxes: [{
                            type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: true,
                            position: "left",
                            id: "y-axis-1",
                        }, {
                            type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: true,
                            position: "right",
                            id: "y-axis-2",

                            // grid line settings
                            gridLines: {
                                drawOnChartArea: false, // only want the grid lines for one axis to show up
                            },
                        }],
                    }
                }
            });
        };

        $('#randomizeData').click(function() {
            lineChartData.datasets[0].data = [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()];

            lineChartData.datasets[1].data = [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()];

            window.myLine.update();
        });
    </script>
    <script src="js/Chart.js"></script>
    <script>
        var chart = AmCharts.makeChart("chartdiv1", {
            "type": "serial",
            "theme": "light",
            "rotate": true,
            "marginBottom": 50,
            "dataProvider": [{
                "age": "85+",
                "male": -0.1,
                "female": 0.3
            }, {
                "age": "80-54",
                "male": -0.2,
                "female": 0.3
            }, {
                "age": "75-79",
                "male": -0.3,
                "female": 0.6
            }, {
                "age": "70-74",
                "male": -0.5,
                "female": 0.8
            }, {
                "age": "65-69",
                "male": -0.8,
                "female": 1.0
            }, {
                "age": "60-64",
                "male": -1.1,
                "female": 1.3
            }, {
                "age": "55-59",
                "male": -1.7,
                "female": 1.9
            }, {
                "age": "50-54",
                "male": -2.2,
                "female": 2.5
            }, {
                "age": "45-49",
                "male": -2.8,
                "female": 3.0
            }, {
                "age": "40-44",
                "male": -3.4,
                "female": 3.6
            }, {
                "age": "35-39",
                "male": -4.2,
                "female": 4.1
            }, {
                "age": "30-34",
                "male": -5.2,
                "female": 4.8
            }, {
                "age": "25-29",
                "male": -5.6,
                "female": 5.1
            }, {
                "age": "20-24",
                "male": -5.1,
                "female": 5.1
            }, {
                "age": "15-19",
                "male": -3.8,
                "female": 3.8
            }, {
                "age": "10-14",
                "male": -3.2,
                "female": 3.4
            }, {
                "age": "5-9",
                "male": -4.4,
                "female": 4.1
            }, {
                "age": "0-4",
                "male": -5.0,
                "female": 4.8
            }],
            "startDuration": 1,
            "graphs": [{
                "fillAlphas": 0.8,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "male",
                "title": "Male",
                "labelText": "[[value]]",
                "clustered": false,
                "labelFunction": function(item) {
                    return Math.abs(item.values.value);
                },
                "balloonFunction": function(item) {
                    return item.category + ": " + Math.abs(item.values.value) + "%";
                }
            }, {
                "fillAlphas": 0.8,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "female",
                "title": "Female",
                "labelText": "[[value]]",
                "clustered": false,
                "labelFunction": function(item) {
                    return Math.abs(item.values.value);
                },
                "balloonFunction": function(item) {
                    return item.category + ": " + Math.abs(item.values.value) + "%";
                }
            }],
            "categoryField": "age",
            "categoryAxis": {
                "gridPosition": "start",
                "gridAlpha": 0.2,
                "axisAlpha": 0
            },
            "valueAxes": [{
                "gridAlpha": 0,
                "ignoreAxisWidth": true,
                "labelFunction": function(value) {
                    return Math.abs(value) + '%';
                },
                "guides": [{
                    "value": 0,
                    "lineAlpha": 0.2
                }]
            }],
            "balloon": {
                "fixedPosition": true
            },
            "chartCursor": {
                "valueBalloonsEnabled": false,
                "cursorAlpha": 0.05,
                "fullWidth": true
            },
            "allLabels": [{
                "text": "Male",
                "x": "28%",
                "y": "97%",
                "bold": true,
                "align": "middle"
            }, {
                "text": "Female",
                "x": "75%",
                "y": "97%",
                "bold": true,
                "align": "middle"
            }],
            "export": {
                "enabled": true
            }

        });
    </script>
    <script>
        var icons = new Skycons({
                "color": "#002561"
            }),
            list = [
                "clear-night", "partly-cloudy-day",
                "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                "fog"
            ],
            i;

        for (i = list.length; i--;)
            icons.set(list[i], list[i]);

        icons.play();
    </script>
    <script>
        var icons = new Skycons({
                "color": "#00C6D7"
            }),
            list = [
                "clear-night", "cloudy",
                "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                "fog"
            ],
            i;

        for (i = list.length; i--;)
            icons.set(list[i], list[i]);

        icons.play();
    </script>

    <script type="text/javascript+protovis">
        /* Parse dates. */
        var dateFormat = pv.Format.date("%d-%b-%y");
        vix.forEach(function(d) d.date = dateFormat.parse(d.date));

        /* Scales. */
        var w = 1220,
            h = 300,
            x = pv.Scale.linear(vix, function(d) d.date).range(0, w),
            y = pv.Scale.linear(vix, function(d) d.low, function(d) d.high).range(0, h).nice();

        var vis = new pv.Panel()
            .width(w)
            .height(h)
            .margin(10)
            .left(30);

        /* Dates. */
        vis.add(pv.Rule)
            .data(x.ticks())
            .left(x)
            .strokeStyle("#eee")
            .anchor("bottom").add(pv.Label)
            .text(x.tickFormat);

        /* Prices. */
        vis.add(pv.Rule)
            .data(y.ticks(7))
            .bottom(y)
            .left(-10)
            .right(-10)
            .strokeStyle(function(d) d % 10 ? "#ddd" : "#ddd")
            .anchor("left").add(pv.Label)
            .textStyle(function(d) d % 10 ? "#999" : "#ddd")
            .text(y.tickFormat);

        /* Candlestick. */
        vis.add(pv.Rule)
            .data(vix)
            .left(function(d) x(d.date))
            .bottom(function(d) y(Math.min(d.high, d.low)))
            .height(function(d) Math.abs(y(d.high) - y(d.low)))
            .strokeStyle(function(d) d.open < d.close ? "#052963" : "#00C6D7")
            .add(pv.Rule)
            .bottom(function(d) y(Math.min(d.open, d.close)))
            .height(function(d) Math.abs(y(d.open) - y(d.close)))
            .lineWidth(10);

        vis.render();
    </script>

</body>

</html>
