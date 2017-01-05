<?php
    require_once "../include.php";
    checkLogin();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>shopImooc</title>
    <link rel="stylesheet" href="style/backstage.css">
</head>

<body>
<div class="head">
    <div class="logo fl"><a href="#"></a></div>
    <h3 class="head_text fr">慕课后台管理</h3>
</div>
<div class="operation_user clearfix">
    <div class="link fl"><a>慕课</a><span>&gt;&gt;</span><a>后台管理</a></div>
    <div class="link fr">
        欢迎您<?php echo $_SESSION["adminName"];?><span></span>
        <a href="/xpin-php" class="icon icon_i" target="_blank">网站首页</a><span></span>
        <a href="/xpin-php/admin" class="icon icon_i">后台首页</a><span></span>
        <a href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
    </div>
</div>
<div class="content clearfix">
    <div class="main">
        <!--右侧内容-->
        <div class="cont">
            <div class="title">后台管理</div>
            <iframe src="main.php" frameborder="0" name="mainFrame" width="100%" height="800"></iframe>
        </div>
    </div>
    <!--左侧列表-->
    <div class="menu">
        <div class="cont">
            <div class="title">管理员</div>
            <ul class="mList">
                <li>
                    <h3><span>-</span>分类管理</h3>
                    <dl>
                        <dd><a href="addCate.php" target="mainFrame">添加分类</a></dd>
                        <dd><a href="listCate.php" target="mainFrame">分类列表</a></dd>
                    </dl>
                </li>
                <li>
                    <h3><span>-</span>商品管理</h3>
                    <dl>
                        <dd><a href="addPro.php" target="mainFrame">添加商品</a></dd>
                        <dd><a href="listPro.php" target="mainFrame">商品列表</a></dd>
                    </dl>
                </li>

                <li>
                    <h3><span>-</span>注册会员</h3>
                    <dl>
                        <dd><a href="userList.php" target="mainFrame">会员列表</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>

</div>
</body>
</html>