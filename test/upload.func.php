<?php
require_once ("../lib/string.func.php");
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/27
 * Time: 12:36
 */

//$filename = $_FILES["mypic"]["name"];
//$type = $_FILES["mypic"]["type"];
//$tmp_name = $_FILES["mypic"]["tmp_name"];
//$error = $_FILES["mypic"]["error"];
//$size = $_FILES["mypic"]["size"];

/**上传文件
 * @param $fileInfo
 * @param string $path
 * @param array $allowExt
 * @param int $maxSize
 * @param bool $imgFlag
 * @return string
 */
function uploadFile($fileInfo, $path = "upload",$allowExt = array("gif", "jpeg", "jpg", "png", "wbmp", "psd"),$maxSize = 1048576,$imgFlag = true){

    //判断错误信息
    if ($fileInfo["error"] == UPLOAD_ERR_OK) {
        $ext = getExt($fileInfo["name"]);
        //限制文件上传类型
        if (!in_array($ext, $allowExt)) {
            exit("非法文件");
        }
        if ($fileInfo["size"] > $maxSize) {
            exit("上传文件过大");
        }
        if ($imgFlag) {
            $info = getimagesize($fileInfo["tmp_name"]);
            if (!$info) {
                exit("不是真正的图片类型");
            }
        }
        //需要判断是否通过HTTP POST方式上传上来的
        $filename = getUinName() . "." . $ext;
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $destination = $path . "/" . $filename;
        if (is_uploaded_file($fileInfo["tmp_name"])) {
            if (move_uploaded_file($fileInfo["tmp_name"], $destination)) {
                $mes = "文件上传成功";
            } else {
                $mes = "文件移动失败";
            }
        } else {
            $mes = "文件不是通过HTTP POST方式上传上来的";
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
    return $mes;
}