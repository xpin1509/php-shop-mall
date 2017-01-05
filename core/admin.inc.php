<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/19
 * Time: 13:58
 */

/**
 * 检测admin用户
 * @param $sql
 */
function checkAdmin($sql){
    // 创建连接
    $conn = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_DBNAME);
    // 检测连接
    if ($conn->connect_error) {
        die("数据连接失败: " . $conn->connect_error);
    }
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    return $row;
}

/**
 *检查admin登录
 */
function checkLogin(){
    if ($_SESSION["adminId"]==""){
        header("location:login.php");
    }
}

/**
 * admin退出
 */
function logout(){
    $_SESSION=Array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    session_destroy();
    header("location:login.php");
}































