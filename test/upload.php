<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>添加分类</title>
    <link rel="stylesheet" href="../admin/dist/bootstrap/css/bootstrap.css">
    <script src="https://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <form class="form-horizontal" role="form" action="doAction3.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-6">

            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">商品名称</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="" placeholder="请输入商品名称">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">商品分类</label>
            <div class="col-sm-6">
                <select name="cId" id="" class="form-control">
                    <option value="">家用电器</option>
                    <option value="">手机数码</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">商品货号</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="" placeholder="请输入商品货号">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">商品数量</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="" placeholder="请输入商品数量">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">商品市场价</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="" placeholder="请输入商品市场价">
            </div>
        </div><div class="form-group">
            <label class="col-sm-2 control-label">商品慕课价</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="" placeholder="请输入商品慕课价">
            </div>
        </div><div class="form-group">
            <label class="col-sm-2 control-label">商品描述</label>
            <div class="col-sm-6">
                <textarea type="text" class="form-control" name="" placeholder="请输入商品描述" cols="40" rows="6"></textarea>
            </div>
        </div><div class="form-group">
            <label class="col-sm-2 control-label">商品图像</label>
            <div class="col-sm-6">
                <input type="file" class="form-control" name="mypic[]" value="请选择图片">
                <input type="file" class="form-control" name="mypic[]" value="请选择图片">
                <input type="file" class="form-control" name="mypic[]" value="请选择图片">
                <input type="file" class="form-control" name="mypic1" value="请选择图片">
                <input type="file" class="form-control" name="mypic2" value="请选择图片">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label"> </label>
            <div class="col-sm-6">
                <input type="submit" class="btn-group btn"  value="添加商品"/>
            </div>
        </div>
    </form>
</div>
</body>
</html>
