<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/3
 * Time: 10:46
 */
/**添加商品
 * @return string
 */
function addPro(){
    $arr = $_POST;
    $arr["pubTime"] = time();
    $path = "./uploads";
    $uploadFiles = uploadFile($path);//返回上传后的文件数组
    if(is_array($uploadFiles)&&$uploadFiles){
        foreach ($uploadFiles as $key=>$uploadFile){
            thumb($path."/".$uploadFile["name"],"../image_50/".$uploadFile["name"],50,50);
            thumb($path."/".$uploadFile["name"],"../image_220/".$uploadFile["name"],220,220);
            thumb($path."/".$uploadFile["name"],"../image_350/".$uploadFile["name"],350,350);
            thumb($path."/".$uploadFile["name"],"../image_800/".$uploadFile["name"],800,800);
        }
    }
    $pId = insertPro("imooc_pro",$arr);
    if($pId){
        foreach ($uploadFiles as $uploadFile){
            $arr1["pid"] = $pId;
            $arr1["albumPath"] = $uploadFile["name"];
            addAlbum($arr1);
        }
        $mes = "<p>添加成功</p>|<a href='addPro.php' target='mainFrame'>继续添加</a>|<a href='listPro.php' target='mainFrame'>查看列表</a>";
    }else{
        //遍历删除上传文件
        foreach ($uploadFiles as $uploadFile){
            if(file_exists("../image_800/".$uploadFile["name"])){
                unlink("../image_800/".$uploadFile["name"]);
            }
            if(file_exists("../image_50/".$uploadFile["name"])){
                unlink("../image_50/".$uploadFile["name"]);
            }
            if(file_exists("../image_220/".$uploadFile["name"])){
                unlink("../image_220/".$uploadFile["name"]);
            }
            if(file_exists("../image_350/".$uploadFile["name"])){
                unlink("../image_350/".$uploadFile["name"]);
            }
        }
       $mes = "<p>添加失败</p><a href='addPro.php' target='mainFrame'>重新添加</a>";
    }
    return $mes;
}

function insertPro($table,$array){
    $conn =new mysqli(DB_HOST, DB_USER, DB_PWD, DB_DBNAME);
    if ($conn->errno) {
        die("Connection failed: " . $conn->error);
    }else{
        $conn->set_charset(DB_CHARSET);
    }
    $keys=join(",",array_keys($array));
    $vals="'".join("','",array_values($array))."'";
    $sql="insert {$table}($keys) values({$vals})";
    $res = $conn->query($sql);
    $id = mysqli_insert_id($conn);
    return $id;
}

/**得到单个商品的图集
 * @param $id
 * @return array
 */
function getAllImgByProId($id){
    $sql = "select a.albumPath from imooc_album a where pid='{$id}' ";
    $rows = fetchAll($sql);
    return $rows;
}
function editPro($id){
    $arr = $_POST;
    $path = "./uploads";
    $uploadFiles = uploadFile($path);//返回上传后的文件数组
    if(is_array($uploadFiles)&&$uploadFiles){
        foreach ($uploadFiles as $key=>$uploadFile){
            thumb($path."/".$uploadFile["name"],"../image_50/".$uploadFile["name"],50,50);
            thumb($path."/".$uploadFile["name"],"../image_220/".$uploadFile["name"],220,220);
            thumb($path."/".$uploadFile["name"],"../image_350/".$uploadFile["name"],350,350);
            thumb($path."/".$uploadFile["name"],"../image_800/".$uploadFile["name"],800,800);
        }
    }
    $where = "id ={$id}";
    $res = updatePro("imooc_pro",$arr,$where);
    if($res&&$id){
        foreach ($uploadFiles as $uploadFile){
            $arr1["pid"] = $id;
            $arr1["albumPath"] = $uploadFile["name"];
            addAlbum($arr1);
        }
        $mes = "<p>编辑成功</p>";
    }else{
        if(is_array($uploadFiles)&&$uploadFiles){
        //遍历删除上传文件
            foreach ($uploadFiles as $uploadFile){
                if(file_exists("../image_800/".$uploadFile["name"])){
                    unlink("../image_800/".$uploadFile["name"]);
                }
                if(file_exists("../image_50/".$uploadFile["name"])){
                    unlink("../image_50/".$uploadFile["name"]);
                }
                if(file_exists("../image_220/".$uploadFile["name"])){
                    unlink("../image_220/".$uploadFile["name"]);
                }
                if(file_exists("../image_350/".$uploadFile["name"])){
                    unlink("../image_350/".$uploadFile["name"]);
                }
            }
        }
        $mes = "<p>编辑失败</p>";
    }
    return $mes;
}

/**更新商品
 * @param $table
 * @param $array
 * @param null $where
 * @return int|string
 */
function updatePro($table,$array,$where=null){
    $conn =new mysqli(DB_HOST, DB_USER, DB_PWD, DB_DBNAME);
    if ($conn->errno) {
        die("Connection failed: " . $conn->error);
    }else{
        $conn->set_charset(DB_CHARSET);
    }
    $str = null;
    foreach($array as $key=>$val){
        if($str==null){
            $sep="";
        }else{
            $sep=",";
        }
        $str.=$sep.$key."='".$val."'";
    }
    $sql="update {$table} set {$str} ".($where==null?null:" where ".$where);
    $res=$conn->query($sql);
    return $res;
}

/**删除商品
 * @param $id
 */
function delProById($id){
        $where="id=$id";
        $res=delete("imooc_pro",$where);
        $proImgs=getAllImgByProId($id);
        if($proImgs&&is_array($proImgs)){
            foreach($proImgs as $proImg){
                if(file_exists("uploads/".$proImg['albumPath'])){
                    unlink("uploads/".$proImg['albumPath']);
                }
                if(file_exists("../image_50/".$proImg['albumPath'])){
                    unlink("../image_50/".$proImg['albumPath']);
                }
                if(file_exists("../image_220/".$proImg['albumPath'])){
                    unlink("../image_220/".$proImg['albumPath']);
                }
                if(file_exists("../image_350/".$proImg['albumPath'])){
                    unlink("../image_350/".$proImg['albumPath']);
                }
                if(file_exists("../image_800/".$proImg['albumPath'])){
                    unlink("../image_800/".$proImg['albumPath']);
                }
            }
        }
        $where1="pid={$id}";
        $res1=delete("imooc_album",$where1);
        if($res&&$res1){
            $mes="删除成功!<br/><a href='listPro.php' target='mainFrame'>查看商品列表</a>";
        }else{
            $mes="删除失败!<br/><a href='listPro.php' target='mainFrame'>重新删除</a>";
        }
        return $mes;
}

/**获取所有的商品集合
 * @return array
 */
function getAllPro($sql){
    $res = fetchAll($sql);
    return $res;
}

/**根据id得到商品详情
 * @return array
 */
function getProById($id){
    $sql = "select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id where p.id='{$id}'";
    $res = fetchOne($sql);
    return $res;
}

/**得到分类下的商品
 * @param $id
 * @param $limit
 * @return array
 */
function getProByCate($id,$limit){
    $sql = "select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id where p.cid={$id} order by id DESC limit {$limit}";
    $res = fetchAll($sql);
    return $res;
}
function getOneAlbum($id){
    $sql = "select a.albumPath from imooc_album a where pid='{$id}' ";
    $res = fetchOne($sql);
    return $res;
}