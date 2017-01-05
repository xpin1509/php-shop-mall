<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/19
 * Time: 11:22
 */
function alertMes($mes,$url){
    echo "<script>alert('{$mes}')</script>";
    echo "<script>window.location='{$url}'</script>";
}