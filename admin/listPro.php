<?php
require_once '../include.php';
checkLogin();
//得到所有数据
$cates = getAllCate();
@$keyward = $_REQUEST["keywards"]?$_REQUEST["keywards"]:null;
@$classification = $_REQUEST["cateId"]?$_REQUEST["cateId"]:null;
$where = $keyward?"where p.pName like '%{$keyward}%'":null;
$where1 = $classification?"where p.cId={$classification}":null;
if ($where!=null){
    $where1 = $classification?"and p.cId={$classification}":null;
}else{
    $where1 = $classification?"where p.cId={$classification}":null;
}
$sql = "select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id {$where}{$where1}";
$rows=getAllPro($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品列表</title>
    <link rel="stylesheet" href="style/backstage.css">
    <link rel="stylesheet" href="dist/bootstrap/css/bootstrap.css"></link>
    <script src="https://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<div class="container" style="margin: 10px">
<div class="row">
<!--    <div class="col-sm-3">-->
<!--        上架时间-->
<!--        <select name="" id="" class="form-control"style="width: 50%;display: inline">-->
<!--            <option value=""></option>-->
<!--            <option value="">由新到旧</option>-->
<!--            <option value="">由旧到新</option>-->
<!--        </select>-->
<!--    </div>-->
    <div class="col-sm-3 pull-right">
        <form class="bs-example bs-example-form" role="form" id="search-form" action="listPro.php">
            <div class="input-group">
                <input type="hidden" name="cateId" id="cateId">
                <input type="text" class="form-control" name="keywards" value="<?php echo $keyward;?>" placeholder="输入相关商品名称">
                <span class="input-group-addon"><a class="glyphicon glyphicon-search" id="search-btn"></a></span>
            </div>
        </form>
    </div>
    <div class="col-sm-3 pull-right">
        商品分类
        <select name="" id="changecate-btn" class="form-control" style="width: 50%;display: inline">
            <option value="">全部</option>
            <?php foreach ($cates as $cate):?>
            <option value="<?php echo $cate["id"];?>"<?php echo $cate["id"]==$classification?"selected='select'":null;?>><?php echo $cate["cName"];?></option>
            <?php endforeach;?>
        </select>
    </div>

</div>
</div>
<table class="table">
    <thead>
    <tr>
        <th width="10%">编号</th>
        <th width="10%">商品名称</th>
        <th width="10%">商品分类</th>
        <th width="10%">上架时间</th>
        <th width="15%">操作</th>
    </tr>
    </thead>
    <tbody>
        <?php $i=1;  foreach ($rows as $row):?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $row["pName"];?></td>
            <td><?php echo $row["cName"];?></td>
            <td><?php echo date('Y-m-d', $row["pubTime"]); ?></td>
            <td>
                <a href="editPro.php?id=<?php echo $row["id"];?>" class="btn btn-sm btn-default">修改</a>
                <a data-toggle="modal" data-target="#myModal<?php echo $i;?>" class="btn btn-sm btn-default">详情</a>
                <a href="doAdminAction.php?act=delPro&id=<?php echo $row["id"];?>" class="btn btn-sm btn-danger">删除</a>
            </td>
            <div class="modal fade" id="myModal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                &times;
                            </button>
                            <h4 class="modal-title" id="myModalLabel">
                                商品详情
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">商品名称：</label>
                                <?php echo $row["pName"];?>
                            </div>
                            <div class="form-group">
                                <label for="">商品类别：</label>
                                <?php echo $row["cName"];?>
                            </div>
                            <div class="form-group">
                                <label for="">商品货号：</label>
                                <?php echo $row["pNum"];?>
                            </div>
                            <div class="form-group">
                                <label for="">商品数量：</label>
                                <?php echo $row["pSn"];?>
                            </div>
                            <div class="form-group">
                                <label for="">商品价格：</label>
                                <?php echo $row["mPrice"];?>
                            </div>
                            <div class="form-group">
                                <label for="">慕课价格：</label>
                                <?php echo $row["iPrice"];?>
                            </div>
                            <div class="form-group">
                                <label for="">商品图片：</label>
                                <?php
                                $proImg = getAllImgByProId($row["id"]);
                                foreach ($proImg as $img):
                                ?>
                                <img src="uploads/<?php echo $img['albumPath'];?>" alt="<?php echo $row["pName"];?>">
                                <?php endforeach;?>
                            </div>
                            <div class="form-group">
                                <label for="">是否上架：</label>
                                <?php echo $row["isShow"]==1?"上架":"下架";?>
                            </div>
                            <div class="form-group">
                                <label for="">是否热卖：</label>
                                <?php echo $row["isHot"]==1?"正常":"热卖";?>
                            </div>
                            <div class="form-group">
                                <label for="">商品简介：</label>
                                <?php echo $row["pDesc"];?>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal -->
            </div>
        </tr>
        <?php $i++; endforeach;?>
    </tbody>
</table>
<script type="text/javascript">
    $("#search-btn").click(function () {
        $("#search-form").submit();
    })
    $("#changecate-btn").change(function () {
        var $cate = $(this).val();
        $("#cateId").val($cate);
       $("#search-form").submit();
    })
</script>
</body>
</html>
