<?php
include 'inc.php';
switch($_GET['type']) {
    case 'app':
            
        $data = array(
            "basic" =>
            array(
                "title" => "小程序基本设置",
                "back" => "#1e9234",
                "front" => "#ffffff",
                "appName" => $_POST['basic_1'],
                "fllow_page" => true,
                "ShareData" =>
                array(
                    "title" => "云天时代",
                    "page" => "/pages/index/index",
                    "option" =>
                    array(
                        "coupon" => -1,
                    ),
                    "pic" => false,
                ),
            ),
            "index" =>
            array(
                "page_name" => $_POST['index_1'],
                "title" => "服务信息咨询平台",
                "about" => $_POST['index_2'],
                "logo" => "https://wx.suliansmart.com/slapp/img/logo.png",
                "tags" =>explode(',',str_replace('，', ',', $_POST['index_3'])),
                "swiper" =>
                array(
                    "imgUrls" =>
                    array(
                       "https://wx.suliansmart.com/slapp/img/index/banner1.png",
                       "https://wx.suliansmart.com/slapp/img/index/banner2.png",
                       "https://wx.suliansmart.com/slapp/img/index/banner3.png",
                   ),
                    "autoplay" => true,
                    "indicatorDots" => true,
                    "interval" => $_POST['index_4'],
                    "duration" => $_POST['index_5'],
                    "circular" => true,
                    "height" => "277",
                ),
                "pages" =>
                array(
                    "img" =>
                    array(
                       "https://wx.suliansmart.com/slapp/img/index/nav1.png",
                       "https://wx.suliansmart.com/slapp/img/index/nav2.png",
                       "https://wx.suliansmart.com/slapp/img/index/nav3.png",
                       "https://wx.suliansmart.com/slapp/img/logo.png",
                   ),
                    "script" =>
                    array(
                       "服务范围",
                       "商家环境",
                       "招聘专区",
                       "关于我们",
                   ),
                ),
                "massage" =>explode(',',str_replace('，', ',', $_POST['index_6'])),
                "massage_logo" => "https://wx.suliansmart.com/slapp/img/massage.png",
                "redpackage" =>
                array(
                    "width" => "120",
                    "height" => "46",
                    "backcolor" => "d1361a",
                    "contant" => "红包",
                ),
                "sharing" =>
                array(
                    "title" => "商家信息",
                    "contant" => "分享",
                    "icon" => "https://wx.suliansmart.com/slapp/img/share.png",
                    "icon_width" => "26",
                    "icon_height" => "26",
                ),
                "list_item" =>
                array(

                    array(
                        "title" => "服务时间",
                        "contant" => "24小时为您服务",
                        "dataset" => "",
                        "icon" => false,
                        "icon_width" => "",
                        "icon_height" => "",
                    ),
                    
                    array(
                        "title" => "联系电话",
                        "contant" => "15222297789 （24小时）",
                        "dataset" => "15222297789",
                        "icon" => "https://wx.suliansmart.com/slapp/img/phone.png",
                        "icon_width" => "40",
                        "icon_height" => "45",
                    ),
                    
                    array(
                        "title" => "咨询电话",
                        "contant" => "022-23838725",
                        "dataset" => "022-23838725",
                        "icon" => "https://wx.suliansmart.com/slapp/img/phone.png",
                        "icon_width" => "40",
                        "icon_height" => "45",
                    ),
                    
                    array(
                        "title" => "地 址",
                        "contant" => "天津肿瘤医院后门100米（宾水道45号 增1号 冀津宾馆院内保安室旁1号）",
                        "dataset" => "map",
                        "icon" => "https://wx.suliansmart.com/slapp/img/map.png",
                        "icon_width" => "40",
                        "icon_height" => "58",
                    ),
                    
                    array(
                        "title" => "服务优势",
                        "contant" => "为您提供住宿、免费医疗咨询的一条龙服务!",
                        "dataset" => "",
                        "icon" => false,
                        "icon_width" => "",
                        "icon_height" => "",
                    ),
                ),
                "map" =>
                array(
                    "latitude" => 39.0780460853,
                    "longitude" => 117.1864628792,
                    "scale" => 20,
                    "name" => "冀津宾馆",
                    "address" => "宾水道45号增1号",
	    	),
		"owner" => 'https://wx.suliansmart.com/slapp/img/owner.jpg'
            ),
            "env" =>
            array(
                "title" => "关于商家",
                "page_name" => "关于商家",
                "contant" =>
                array(

                    array(
                        "title" => $_POST['env_1'],
                        "contant" =>explode("\n",$_POST['env_2']),
                        "images" => false,
                    ),
                    
                    array(
                        "title" => $_POST['env_3'],
                        "contant" => explode("\n",$_POST['env_4']),
                        "images" =>
                        array(

                            array(

                                array(
                                    "title" => "干净舒适",
                                    "img" => "https://wx.suliansmart.com/slapp/img/env/1.png",
                                ),
                                
                                array(
                                    "title" => "就医便捷",
                                    "img" => "https://wx.suliansmart.com/slapp/img/env/2.png",
                                ),
                                
                                array(
                                    "title" => "环境清净",
                                    "img" => "https://wx.suliansmart.com/slapp/img/env/3.png",
                                ),
                            ),
                            
                            array(

                                array(
                                    "title" => "设备齐全",
                                    "img" => "https://wx.suliansmart.com/slapp/img/env/4.png",
                                ),
                                
                                array(
                                    "title" => "干净舒适",
                                    "img" => "https://wx.suliansmart.com/slapp/img/env/5.png",
                                ),
                                
                                array(
                                    "title" => "家的感觉",
                                    "img" => "https://wx.suliansmart.com/slapp/img/env/6.png",
                                ),
                            ),
                        ),
                        "img_height" => "108",
                        "img_width" => "175",
                    ),
                ),
                "bottom" =>
                array(
                    "title" => $_POST['env_5'],
                    "contant" => $_POST['env_6'],
                ),
            ),
            "info" =>
            array(
                "page_name" => "商会介绍",
                "title" => $_POST['info_1'],
                "contant" => explode("\n",$_POST['info_2']),
            ),
            "service" =>
            array(
                "page_name" => "服务范围",
                "title" => $_POST['service_1'],
                "tags" =>
                array(
                   $_POST['service_2'],
                   $_POST['service_4'],
                   $_POST['service_6'],
               ),
                "detail" =>
                array(
                   $_POST['service_3'],
                   $_POST['service_5'],
                   $_POST['service_7'],
               ),
                "img" => "https://wx.suliansmart.com/slapp/img/service.png",
                "img_width" => "310",
                "img_height" => "196",
                "margin" => "25",
            ),
            "needs" =>
            array(
                "page_name" => "招聘专区",
                "title" => $_POST['needs_1'],
                "pic_width" => "180",
                "pic_height" => "160",
                "contant" =>
                array(

                    array(
                        "img" => "https://wx.suliansmart.com/slapp/img/need/1.png",
                        "contant_1_title" => "招聘",
                        "contant_1" => $_POST['needs_1_1'],
                        "contant_2_title" => "薪资",
                        "contant_2" => $_POST['needs_1_2'],
                        "contant_3_title" => "要求",
                        "contant_3" => $_POST['needs_1_3'],
                    ),
                    
                    array(
                        "img" => "https://wx.suliansmart.com/slapp/img/need/2.png",
                        "contant_1_title" => "招聘",
                        "contant_1" => $_POST['needs_2_1'],
                        "contant_2_title" => "薪资",
                        "contant_2" => $_POST['needs_2_2'],
                        "contant_3_title" => "要求",
                        "contant_3" => $_POST['needs_2_3'],
                    ),
                    
                    array(
                        "img" => "https://wx.suliansmart.com/slapp/img/need/3.png",
                        "contant_1_title" => "招聘",
                        "contant_1" => $_POST['needs_3_1'],
                        "contant_2_title" => "薪资",
                        "contant_2" => $_POST['needs_3_2'],
                        "contant_3_title" => "要求",
                        "contant_3" => $_POST['needs_3_3'],
                    ),
                ),
                "bottom" =>explode("\n",$_POST['needs_2']),
            ),
            "coupon" =>
            array(
                "page_name" => "我的优惠券",
                "bg_color" => "d1361a",
            )
        );
    $rs = sql_u('UPDATE `AppSettings` SET `appSetting`=:0 WHERE `appid`=:1',array(json_encode($data),$_SESSION['appid']));
    if (empty($rs)) {
        echo '<script>alert("插入成功!");window.location.href="appsetting.php";</script>';
    }
    break;
    case 'coupon':
	    $rs = pdo_insert('coupon_pool',array(
		    'appid' => $_SESSION['appid'],
            'name' => $_POST["name"],
            'type' => $_POST["type"],
            'value' => $_POST["value"],
            'min' => $_POST["min"],
            'sum_count' => $_POST["count"],
            'avail_per_user' => $_POST["maxcount"],
            'end_time' => $_POST["endtime"],
    ));
	    var_dump($rs);
	if($rs || empty($rs)){
		echo '<script>alert("插入成功");window.location.href="redpack.php";</script>';
	}else{
		echo '<script>alert("插入失败，错误码：10001");window.location.href="redpack.php";</script>';
	}
    break;
}
