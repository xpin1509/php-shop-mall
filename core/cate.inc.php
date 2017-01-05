<?php
/**
 * 商品分类核心函数
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/20
 * Time: 17:19
 */
function addCate(){
    $arr = $_POST;
    if(insert("imooc_cate",$arr)){
         header("location:listCate.php");
    }else{
        header("location:addCate.php");
    }
}

function getCateById($id){
    $sql ="SELECT * FROM imooc_cate WHERE id='{$id}'";
    $res = fetchOne($sql);
    return $res;
}

function updateCate($id){
    $cName = $_POST["cName"];
    $sql = "UPDATE imooc_cate SET cName='{$cName}' WHERE id='{$id}'";
    if(update($sql)){
        header("location:listCate.php");
    }else{
        $mes="更新失败";
    }
    return $mes;
}
function delCate($id){
    $cName = $_POST["cName"];
    $sql = "DELETE FROM imooc_cate WHERE id='{$id}'";
    if(update($sql)){
        header("location:listCate.php");
    }else{
        $mes="删除失败";
    }
    return $mes;
}

/**
 * 得到所有数组
 * @return array
 */
function getAllCate(){
    $sql ="SELECT * FROM imooc_cate";
    $rows = fetchAll($sql);
    return $rows;
}