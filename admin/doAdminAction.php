<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/20
 * Time: 9:54
 */
require_once "../include.php";

$act=$_REQUEST['act'];
if($act=="logout"){
    logout();
}else if($act=="addCate"){
    $mes = addCate();
}else if($act=="editCate"){
    $id=$_REQUEST["id"];
    $mes = updateCate($id);
}else if($act=="delCate"){
    $id=$_REQUEST["id"];
    $mes = delCate($id);
}else if($act=="addPro"){
    $mes = addPro();
}else if($act=="editPro"){
    $id=$_REQUEST["id"];
    $mes = editPro($id);
}else if($act=="delPro"){
    $id=$_REQUEST["id"];
    $mes = delProById($id);
}


if($mes){
    echo $mes;
}