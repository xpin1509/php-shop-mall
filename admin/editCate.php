<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/23
 * Time: 10:21
 */
require_once '../include.php';
$id=$_GET["id"];
$row=getCateById($id);
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>添加分类</title>
    <link rel="stylesheet" href="dist/bootstrap/css/bootstrap.css">
</head>
<body>
<form class="form-horizontal" role="form" action="doAdminAction.php?act=editCate&id=<?php echo $row['id'];?>" method="post" style="overflow: hidden;">
    <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-6">

        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">分类名称</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="cName" placeholder="请输入分类名称" value="<?php echo $row["cName"];?>">
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-2 control-label"> </label>
        <div class="col-sm-6">
            <input type="submit" class="btn-group btn"  value="修改分类"/>
        </div>
    </div>
</form>
</body>
</html>
