<?php
require_once "./include.php";
//得到所有的分类
$cates = getAllCate();
//得到各分类下的各商品
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>首页</title>
    <link type="text/css" rel="stylesheet" href="public/style/reset.css">
    <link type="text/css" rel="stylesheet" href="public/style/main.css">
</head>

<body>
<div class="headerBar">
    <div class="topBar">
        <div class="comWidth">
            <div class="leftArea">
                <a class="collection" onclick="AddFavorite();">收藏慕课</a>
            </div>
            <div class="rightArea">
                欢迎来到慕课网！<a href="login.php">[登录]</a><a href="#">[免费注册]</a>
            </div>
        </div>
    </div>
    <div class="logoBar">
        <div class="comWidth">
            <div class="logo fl">
                <a href="#"><img src="public/images/logo.jpg" alt="慕课网"></a>
            </div>
            <div class="search_box fl">
                <input type="text" class="search_text fl">
                <input type="button" value="搜 索" class="search_btn fr">
            </div>
            <div class="shopCar fr">
                <span class="shopText fl">购物车</span>
                <span class="shopNum fl">0</span>
            </div>
        </div>
    </div><!--logo结束-->
    <div class="navBox">
        <div class="comWidth clearfix">
            <div class="shopClass fl">
                <h3>全部商品分类<i class="shopClass_icon"></i></h3>
                <div class="shopClass_show">
                    <dl class="shopClass_item">
                        <dt><a href="#" class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
                        <dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
                    </dl>
                    <dl class="shopClass_item">
                        <dt><a href="#" class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
                        <dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
                    </dl>
                    <dl class="shopClass_item">
                        <dt><a href="#" class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
                        <dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
                    </dl>
                    <dl class="shopClass_item">
                        <dt><a href="#" class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
                        <dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
                    </dl>
                    <dl class="shopClass_item">
                        <dt><a href="#" class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
                        <dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
                    </dl>
                </div>
                <div class="shopClass_list hide">
                    <div class="shopClass_cont">
                        <dl class="shopList_item">
                            <dt>电脑装机</dt>
                            <dd>
                                <a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a>
                            </dd>
                        </dl>
                        <dl class="shopList_item">
                            <dt>电脑装机</dt>
                            <dd>
                                <a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
                            </dd>
                        </dl>
                        <dl class="shopList_item">
                            <dt>电脑装机</dt>
                            <dd>
                                <a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
                            </dd>
                        </dl>
                        <dl class="shopList_item">
                            <dt>电脑装机</dt>
                            <dd>
                                <a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
                            </dd>
                        </dl>
                        <dl class="shopList_item">
                            <dt>电脑装机</dt>
                            <dd>
                                <a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
                            </dd>
                        </dl>
                        <div class="shopList_links">
                            <a href="#">文字测试内容等等<span></span></a><a href="#">文字容等等<span></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="nav fl">
                <li><a href="list.php" class="active">数码城</a></li>
                <li><a href="list.php">天黑黑</a></li>
                <li><a href="list.php">团购</a></li>
                <li><a href="list.php">发现</a></li>
                <li><a href="list.php">二手特卖</a></li>
                <li><a href="list.php">名品会</a></li>
            </ul>
        </div>
    </div>
</div><!--header结束-->
<div class="banner comWidth clearfix">
    <div class="banner_bar banner_big" id="banner_bar">
        <ul class="imgBox" id="imgBox">
            <li style="opacity: 1;z-index: 1;"><a href="#"><img src="public/images/banner/banner_01.jpg" alt="banner"></a></li>
            <li><a href="#"><img src="public/images/banner/banner_02.jpg" alt="banner"></a></li>
            <li><a href="#"><img src="public/images/banner/banner_01.jpg" alt="banner"></a></li>
            <li><a href="#"><img src="public/images/banner/banner_02.jpg" alt="banner"></a></li>

        </ul>
        <div class="imgNum" id="imgNum">
            <a class="active"></a><a></a><a></a><a></a>
        </div>
        <a class="slide-control-item slider_control_prev" onselectstart="return false"><</a>
        <a class="slide-control-item slider_control_next" onselectstart="return false">></a>
    </div>
</div><!--banner结束-->
<?php foreach ($cates as $cate):?>
<div class="shopTit comWidth">
    <span class="icon"></span><h3><?php echo $cate["cName"];?></h3>
    <a href="#" class="more">更多&gt;&gt;</a>
</div>
<div class="shopList comWidth clearfix">
    <div class="leftArea">
        <div class="banner_bar banner_sm">
            <ul class="imgBox">
                <li><a href="#"><img src="public/images/banner/banner_sm_01.jpg" alt="banner"></a></li>
            </ul>
            <div class="imgNum">
                <a href="#" class="active"></a><a href="#"></a><a href="#"></a><a href="#"></a>
            </div>
        </div>
    </div>

    <div class="rightArea">
        <div class="shopList_top clearfix">
            <?php $pros = getProByCate($cate["id"],"4");?>
            <?php foreach ($pros as $pro):?>
                <div class="shop_item">
                    <div class="shop_img">
                        <?php $img = getOneAlbum($pro["id"]);?>
                        <a href="detail.php"><img src="image_220/<?php echo $img["albumPath"];?>" alt=""></a>
                    </div>
                    <h3><?php echo $pro["pName"];?></h3>
                    <p><?php echo $pro["iPrice"];?></p>
                </div>
            <?php endforeach;?>
        </div>
        <div class="shopList_sm clearfix">
            <?php $pros = getProByCate($cate["id"],"4,4");?>
            <?php foreach ($pros as $pro):?>
            <div class="shopItem_sm">
                <div class="shopItem_smImg">
                    <?php $img = getOneAlbum($pro["id"]);?>
                    <a href="#"><img src="image_220/<?php echo $img["albumPath"];?>" alt=""></a>
                </div>
                <div class="shopItem_text">
                    <p><?php echo $pro["pName"];?></p>
                    <h3>￥<?php echo $pro["iPrice"];?></h3>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<?php endforeach;?>
<div class="hr_25"></div>
<div class="footer">
    <p><a href="#">慕课简介</a><i>|</i><a href="#">慕课公告</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：400-675-1234</p>
    <p>Copyright &copy; 2006 - 2014 慕课版权所有&nbsp;&nbsp;&nbsp;京ICP备09037834号&nbsp;&nbsp;&nbsp;京ICP证B1034-8373号&nbsp;&nbsp;&nbsp;某市公安局XX分局备案编号：123456789123</p>
    <p class="web"><a href="#"><img src="public/images/webLogo.jpg" alt="logo"></a><a href="#"><img src="public/images/webLogo.jpg" alt="logo"></a><a href="#"><img src="public/images/webLogo.jpg" alt="logo"></a><a href="#"><img src="public/images/webLogo.jpg" alt="logo"></a></p>
</div>
<script src="public/js/slider.js"></script>
<script>
    function AddFavorite(sURL, sTitle)
    {
        try
        {
            window.external.addFavorite(sURL, sTitle);
        }
        catch (e)
        {
            try
            {
                window.sidebar.addPanel(sTitle, sURL, "");
            }
            catch (e)
            {
                alert("加入收藏失败，请使用Ctrl+D进行添加");
            }
        }
    }
</script>
</body>
</html>
