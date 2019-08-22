<?php 
include 'inc.php';
$rtn = '';
switch ($_GET['type']) {
    case 'get':
        $rtn .= '<div class="panel-body table-responsive"><table class="table table-hover"><thead><tr>
        <th>名称</th>
        <th>代金价格</th>
        <th>门槛</th>
        <th>券码</th>
        <th>激活</th>
        <th>使用</th>
        <th>到期</th>
        </tr></thead>';
        $sql = 'SELECT `coupon_user`.`active`,`coupon_user`.`is_use`,`coupon_user`.`end_time`,`coupon_user`.`coupon_code`, `coupon_pool`.`name`,`coupon_pool`.`value`,`coupon_pool`.`min` FROM `coupon_user` LEFT JOIN `coupon_pool` ON `coupon_pool`.`appid`=`coupon_user`.`appid` WHERE `coupon_user`.`coupon_code`=:0 AND `coupon_user`.`appid`=:1';
        $rs = sql_u($sql,array($_GET['cup'],$_SESSION['appid']));
        if ($rs == false || empty($rs)) {
            echo '该券不存在！';
            exit();
        }else{
            $rs = $rs[0];

        $date = date("Y-m-d H:i:s");
        $now = strtotime($date);
        $end = strtotime($rs['end_time']);

        if($now > $end){
            $outdate = 1;
        }else{
            $outdate = 0;
        }
            $rtn .= "<tr>
                        <td>{$rs['name']}</td>
                        <td>{$rs['value']}</td>
                        <td>{$rs['min']}</td>
                        <td>{$rs['coupon_code']}</td>
                        <td><span class=".($rs['active'] == 1 ? '"label label-success">已' :'"label label-danger">未')."激活</span></td>
                        <td><span class=".($rs['is_use'] == 1 ? '"label label-danger">已' :'"label label-success">未')."使用</span></td>
                        <td><span class=".($outdate == 1 ? '"label label-danger">已' :'"label label-success">未')."过期</span></td>
                        </tr>";
            $rtn .= "<tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>".($rs['active'] == 1 ? '' : "<button onclick=\"cou('active','{$_GET['cup']}')\" type=\"button\" class=\"btn btn-info\">激活</button>")."</td>
                        <td>".($rs['is_use'] == 1 ? '' : "<button  type=\"button\" ". (($rs['active'] != 1 || $rs['is_use'] == 1 || $outdate == 1) ? 'disabled="disabled"' : "onclick=\"cou('use','{$_GET['cup']}')\"" ) ." class=\"btn btn-info\">使用</button>")."</td>
                        <td></td>
                        </tr>";
        }

      
$rtn .= '</table></div>';




        break;
    


    case 'active':
        $sql = 'UPDATE `coupon_user` SET `active`=1 WHERE `coupon_code`=:0 AND `appid`=:1';
        $rs = sql_u($sql,array($_GET['cup'],$_SESSION['appid']));
        echo json_encode(array('status' => (empty($rs)? 'ok' : 'error'),'content'=> $rs));
        exit;
        break;

    case 'use':
        $sql = 'UPDATE `coupon_user` SET `is_use`=1 WHERE `coupon_code`=:0 AND `appid`=:1';
        $rs = sql_u($sql,array($_GET['cup'],$_SESSION['appid']));
        echo json_encode(array('status' => (empty($rs)? 'ok' : 'error'),'content'=> $rs));
        die();
        break;
    default:
        # code...
        break;
}
$rtn .= '<div id="noti-box" style="overflow: hidden; width: auto;" class="panel-body"></div>';

echo $rtn;
