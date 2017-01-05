<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/27
 * Time: 14:15
 */
/**生成唯一字符串
 * @return string
 */
function getUniName(){
        return md5(uniqid(microtime(true),true));
}

/**得到文件拓展名
 * @param string $filename
 * @return string
 */
function getExt($filename){
    $file_name = explode(".",$filename);
    return strtolower(end($file_name));
}
