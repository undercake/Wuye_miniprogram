<?php
define('IA_ROOT', '');


$config = array();

$config['db']['master']['host'] = '127.0.0.1';
$config['db']['master']['username'] = 'slapp';
$config['db']['master']['password'] = '48EX0yCMf2A1ztmy';
$config['db']['master']['port'] = '3306';
$config['db']['master']['database'] = 'slapp';
$config['db']['master']['charset'] = 'utf8';
$config['db']['master']['pconnect'] = 0;
$config['db']['master']['tablepre'] = '';
$config['db']['tablepre'] = '';

$config['db']['slave_status'] = false;

$_W = array('config' => $config);

include_once 'loader.class.php';
include_once 'db.class.php';
include_once 'PDO_mysql.class.php';
include_once 'global.func.php';
include_once 'PDO.class.php';
include_once 'pdo.func.php';
include_once 'safe.func.php';


function sql_s($sql){
  return sql_u($sql,array());
}

function sql_u($sql,$ext){
    global $config;
   $dbh =new PDO("mysql:host={$config['db']['master']['host']};dbname={$config['db']['master']['database']}",$config['db']['master']['username'],$config['db']['master']['password']);
   $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
   $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $dbh->exec("set names '".$config['db']['master']['charset']."'");
   $stmt = $dbh->prepare($sql);
   $exeres = $stmt->execute($ext);
   $data = array();
   if ($exeres) {

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
             $data[] = $row;
         }
  }else {
        $data[0] = $dbh -> errorInfo();
        $data[1] = $stmt -> errorInfo();
  }
  $dbh = null;
  return $data;
}
