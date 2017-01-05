<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/19
 * Time: 11:12
 */
require_once "../include.php";
$username = $_POST["username"];
$userpwd = md5($_POST["userpwd"]);

$sql = "select * from imooc_admin where username='{$username}' and password='{$userpwd}'";
$row = checkAdmin($sql);

if($row){
    $_SESSION['adminName'] = $row['username'];
    $_SESSION['adminId'] = $row['id'];
    //header("location:index.php");
    alertMes("登录成功","index.php");
}else{
    alertMes("登录失败，请重新登录","login.php");
}
