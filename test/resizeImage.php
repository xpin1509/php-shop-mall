<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/30
 * Time: 16:28
 */
require_once "../lib/string.func.php";
$filename = "test.jpg";
thumb($filename,"uploads/image_50/".$filename,50,50,true);
thumb($filename,"uploads/image_220/".$filename,220,220,true);
thumb($filename,"uploads/image_350/".$filename,350,350,true);
thumb($filename,"uploads/image_800/".$filename,800,800,true);
/*代码copy，仅供对比
 * function thumb($filename,$destination=null,$dst_w=null,$dst_h=null,$isReservedSource=false,$scale=0.5){
    list($src_w,$src_h,$imagetype)=getimagesize($filename);
    if(is_null($dst_w)||is_null($dst_h)){
        $dst_w=ceil($src_w*$scale);
        $dst_h=ceil($src_h*$scale);
    }
    $mime=image_type_to_mime_type($imagetype);
    $createFun=str_replace("/", "createfrom", $mime);
    $outFun=str_replace("/", null, $mime);
    $src_image=$createFun($filename);
    $dst_image=imagecreatetruecolor($dst_w, $dst_h);
    imagecopyresampled($dst_image, $src_image, 0,0,0,0, $dst_w, $dst_h, $src_w, $src_h);
    //image_50/sdfsdkfjkelwkerjle.jpg
    if($destination&&!file_exists(dirname($destination))){
        mkdir(dirname($destination),0777,true);
    }
    $dstFilename=$destination==null?getUniName().".".getExt($filename):$destination;
    $outFun($dst_image,$dstFilename);
    imagedestroy($src_image);
    imagedestroy($dst_image);
    if(!$isReservedSource){
        unlink($filename);
    }
    return $dstFilename;
}*/
/**
 * @param $filename
 * @param null $destination
 * @param null $dst_w
 * @param null $dst_h
 * @param bool $isReservedSourse
 * @param float $scale
 * @return null|string
 */
function thumb($filename,$destination=null,$dst_w=null,$dst_h=null,$isReservedSourse = false, $scale = 0.5){
        list($src_w,$src_h,$imagetype) = getimagesize($filename);
        if(is_null($dst_w)||is_null($dst_h)) {
            $dst_w = $src_w * $scale;
            $dst_h = $src_h * $scale;
        }
        $mime = image_type_to_mime_type($imagetype);
        $createFun=str_replace("/", "createfrom", $mime);
        $outFun = str_replace("/",null,$mime);
        $src_image = $createFun($filename);
        $dst_image = imagecreatetruecolor($dst_w, $dst_h);
        imagecopyresampled($dst_image,$src_image,0,0,0,0,$dst_w,$dst_h,$src_w,$src_h);
        if($destination&&!file_exists(dirname($destination))){
            mkdir(dirname($destination),0777,true);
        }
        $dstFilename = $destination == null?getUniName().".".getExt($filename):$destination;
        $outFun($dst_image,$dstFilename);
        imagedestroy($src_image);
        imagedestroy($dst_image);
        if(!$isReservedSourse){
            unlink($filename);
        }
        return $dstFilename;
}