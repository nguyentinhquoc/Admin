<?php include 'view/controluser.php'; ?>
<div class="row mb">
    <div class="row">
        <div class="banner">
            <video id="video" autoplay loop>
                <source src="video/video1.mp4" type="video/mp4">
            </video>
        </div>
    </div>
    <div class="row">
        <h4 class="title_cate">Sản phẩm mới</h4>
    </div>
    <div class="row products mb10">
        <?php foreach ($list_sanpham_home as $sp) {
            extract($sp);
        ?>
            <div class="boxproducts mb10">
                <div onclick="return window.location.href = 'index.php?act=chitiet&detail=<?= $id ?>'">
                    <div class="row img">
                        <img src="upload/<?= $img ?>" alt="">
                    </div>
                    <div class="row deltail_pro mb10">
                        <p class="price_pro"><?= $price ?> $</p>
                        <p class="name_pro"><?= $name ?></p>
                    </div>
                </div>
                <div class="row info_add">
                    <p><i class="fa-solid fa-eye"></i><?= ' ' . $luotxem ?></p>
                    <div class="btn_pro">
                        <button onclick="sendProductID(<?= $id ?>)"><i style="font-size:1.2vw" class="fa-solid fa-cart-arrow-down"></i></button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <br>
    <div class="row">
        <h4 class="title_cate">Top yêu thích</h4>
    </div>
    <div class="row products">
        <?php foreach ($list_top as $sp) {
            extract($sp);
        ?>
            <div class="boxproducts mb10">
                <div onclick="return window.location.href = 'index.php?act=chitiet&detail=<?= $id ?>'">
                    <div class="row img">
                        <img src="upload/<?= $img ?>" alt="">
                    </div>
                    <div class="row deltail_pro mb10">
                        <p class="price_pro"><?= $price ?> $</p>
                        <p class="name_pro"><?= $name ?></p>
                    </div>
                </div>
                <div class="row info_add">
                    <p><i class="fa-solid fa-eye"></i><?= ' ' . $luotxem ?></p>
                    <div class="btn_pro">
                        <button onclick="sendProductID(<?= $id ?>)"><i style="font-size:1.2vw" class="fa-solid fa-cart-arrow-down"></i></button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>