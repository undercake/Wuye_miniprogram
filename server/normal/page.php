<?php
// dsy_session();
//
if(!$_SESSION['proj_id'] && !isStr($_GET['page'])){
    die('Ivalid token');
}

// $rs = pdo_get('AppSettings', array('proj_id =' => $_SESSION['proj_id']), array('proj_id', 'appType'));
$sql = 'SELECT json_extract(`appSetting`,:0) AS `setting` FROM `AppSettings` WHERE `proj_id`=:1';
$ext = array("$.pages.".$_GET['page'],$_SESSION['proj_id']);
$rs1 = sql_u($sql , $ext);

echo $rs1[0]['setting'];
