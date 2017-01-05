<?php foreach ($pros as $pro):?>
    <div class="shop_item">
        <div class="shop_img">
            <a href="detail.php"><img src="public/images/shopImg.jpg" alt=""></a>
        </div>
        <h3><?php echo $pro["pName"];?></h3>
        <p><?php echo $pro["iPrice"];?></p>
    </div>
<?php endforeach;?>

//首页4个大图
