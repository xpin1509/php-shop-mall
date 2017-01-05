<?php
require_once "../include.php";
checkLogin();
$cates = getAllCate();
if(!$cates){
    alertMes("没有分类，清先添加","addCate.php");
}
//得到所有数据
$id = $_REQUEST["id"];
$pros=getProById($id);
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>添加分类</title>
    <link rel="stylesheet" href="dist/bootstrap/css/bootstrap.css">
    <script src="https://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <form class="form-horizontal" role="form" action="doAdminAction.php?act=editPro&id=<?php echo $pros['id'];?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-6">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">商品名称</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="pName" placeholder="请输入商品名称" value="<?php echo $pros["pName"];?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">商品分类</label>
            <div class="col-sm-6">
                <select name="cId" id="" class="form-control">
                    <?php foreach ($cates as $cate):?>
                        <option value="<?php echo $cate['id'];?>"  <?php echo $cate['id']==$pros['cId']?"selected='selected'":null;?> ><?php echo $cate['cName'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">商品货号</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="pSn" placeholder="请输入商品货号"  value="<?php echo $pros["pSn"];?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">商品数量</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="pNum" placeholder="请输入商品数量"  value="<?php echo $pros["pNum"];?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">商品市场价</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="mPrice" placeholder="请输入商品市场价" value="<?php echo $pros["mPrice"];?>">
            </div>
        </div><div class="form-group">
            <label class="col-sm-2 control-label">商品慕课价</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="iPrice" placeholder="请输入商品慕课价" value="<?php echo $pros["iPrice"];?>">
            </div>
        </div><div class="form-group">
            <label class="col-sm-2 control-label">商品描述</label>
            <div class="col-sm-6">
                <textarea type="text" class="form-control" name="pDesc" placeholder="请输入商品描述" cols="40" rows="6">
                    <?php echo $pros["pDesc"];?>
                </textarea>
            </div>
        </div>
        <div class="form-group add-img">
            <label class="col-sm-2 control-label">商品图像</label>
            <div class="col-sm-6">
                <input type="file" class="form-control" name="mypic[]" value="请选择图片">
            </div>
            <div class="col-sm-1 control-label">
                <span class="glyphicon glyphicon-plus addImg"></span>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label"> </label>
            <div class="col-sm-6">
                <input type="submit" class="btn-group btn"  value="编辑商品"/>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(".addImg").click(function () {
        var html = '<div class="form-group add-img">'
            +'<label class="col-sm-2 control-label">商品图像</label>'
            +'<div class="col-sm-6">'
            +'<input type="file" class="form-control" name="mypic[]" value="请选择图片">'
            +'</div>'
            +'<div class="col-sm-1 control-label">'
            +'<span class="glyphicon glyphicon-minus delImg"></span>'
            +'</div>'
            +'</div>';
        $(this).parents(".form-group").after(html);
    })
    $("body").delegate(".delImg","click",function () {
        $(this).parents(".form-group").remove();
    });
</script>

</body>
</html>
