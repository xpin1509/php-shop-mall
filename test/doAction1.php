<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/27
 * Time: 16:12
 */
require_once ("../lib/string.func.php");
require_once ("upload.func.php");
//foreach ($_FILES as $val){
//    $info = uploadFile($val);
//    echo $info;
//}

/**构建上传文件信息
 * @return Array
 */
function buildInfo(){
    $i = 0;
    foreach ($_FILES as $v){
        //单文件
        if(is_string($v["name"])){
            $files[$i] = $v;
            $i++;
        }else{
            //多文件
            foreach ($v["name"] as $key=>$val){
                $files[$i]["name"] = $val;
                $files[$i]["type"] = $v["type"][$key];
                $files[$i]["tmp_name"] = $v["tmp_name"][$key];
                $files[$i]["error"] = $v["error"][$key];
                $files[$i]["size"] = $v["size"][$key];
                $i++;
            }
        }
    }
    return $files;
}

function uploadFile($fileInfo, $path = "upload",$allowExt = array("gif", "jpeg", "jpg", "png", "wbmp", "psd"),$maxSize = 1048576,$imgFlag = true){
    if(!file_exists($path)){
        mkdir($path,0777,true);
    }
    $i = 0;
    $files = buildInfo();
    foreach ($files as $file){
        //判断错误信息
        if ($fileInfo["error"] == UPLOAD_ERR_OK) {
            $ext = getExt($fileInfo["name"]);
            //限制文件上传类型
            if (!in_array($ext, $allowExt)) {
                exit("非法文件");
            }
            //检测是不是真的图片
            if ($imgFlag) {
                $info = getimagesize($fileInfo["tmp_name"]);
                if (!$info) {
                    exit("不是真正的图片类型");
                }
            }
            //上传文件的大小
            if ($fileInfo["size"] > $maxSize) {
                exit("上传文件过大");
            }

            //需要判断是否通过HTTP POST方式上传上来的
            $filename = getUinName() . "." . $ext;
            $destination = $path . "/" . $filename;
            if (!(is_uploaded_file($fileInfo["tmp_name"])) ){
                exit ("文件不是通过HTTP POST方式上传上来的");
            }
            if (move_uploaded_file($fileInfo["tmp_name"], $destination)) {
                $mes = "文件上传成功";
            } else {
                $mes = "文件移动失败";
            }
        } else {
            switch ($fileInfo["error"]) {
                case 1:
                    $mes = "超过了配置文件的上传文件大小";
                    break;
                case 2:
                    $mes = "超过了表单设置的上传文件的大小";
                    break;
                case 3:
                    $mes = "文件部分被上传";
                    break;
                case 4:
                    $mes = "没有文件被上传";
                    break;
                case 6:
                    $mes = "没有找到临时目录";//UPLOAD_ERR_NO_TMP_DIR
                    break;
                case 7:
                    $mes = "文件不可写";
                    break;
                case 8:
                    $mes = "由于扩展程序中断了文件上传";
                    break;
            }
        }
    }
    return $mes;
}