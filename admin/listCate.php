<?php
require_once '../include.php';
$sql="select id,cName from imooc_cate  order by id";
$rows=fetchAll($sql);
if(!$rows){
    echo  "<script>alert('sorry 没有分类，请添加分类')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>分类列表</title>
    <link rel="stylesheet" href="style/backstage.css">
    <link rel="stylesheet" href="dist/bootstrap/css/bootstrap.css"></link>
</head>
<body>
<div class="container">
    <!--表格-->
    <table class="table">
        <caption>分类列表</caption>
        <thead>
        <tr>
            <th width="10%">编号</th>
            <th width="10%">分类</th>
            <th width="10%">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1; foreach($rows as $row):?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $row["cName"];?></td>
            <td>
                <a href="editCate.php?id=<?php echo $row["id"];?>" class="btn btn-sm btn-default">修改</a>
                <a href="doAdminAction.php?act=delCate&id=<?php echo $row["id"];?>" class="btn btn-sm btn-danger">删除</a>
            </td>
        </tr>
        <?php $i++;endforeach;?>
        </tbody>
    </table>
    <div class="form-group">
        <a  class="btn btn-group pull-right" href="addCate.php">添加</a>
    </div>
</div>
</body>
</html>
