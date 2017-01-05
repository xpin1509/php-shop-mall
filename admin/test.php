<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/19
 * Time: 15:16
 */
//echo md5("xpin");
//$sql = "insert imooc_admin(username,password,email) values('xpin','43837d4bd0c05cc299cd2a1a50be0c8d','xpin_1509@163.com')";
//echo $sql;
//session_start();
//$_SESSION["user"]="xpin";
//print_r($_SESSION);
require_once "../include.php";
$rows=getAllPro();
var_dump($rows);