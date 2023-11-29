<?php if (isset($_SESSION['pro_id'])) {
        $id_pro[] = $_SESSION['pro_id'];
        unset($_SESSION['pro_id']);
        var_dump($id_pro);
    } ?>
<div class="row mb">
    <?php if (isset($search_result) && $search_result != '') {
        if (count($list_sanpham) == 0) { ?>
            <h4 class="title_cate"><?= 'Không tìm thấy kết quả : "' . $kyw . '"' ?></h4>
        <?php } else { ?>
            <h4 class="title_cate"><?= $search_result . ' cho "' . $kyw . '"' ?></h4>
        <?php } ?>
    <?php } ?>
    <?php if (isset($ten_dm) && $ten_dm != '') { ?>
        <h3 class="title_cate"><?= $ten_dm ?></h3>
    <?php } ?>

    <div class="row products <?= count($list_sanpham) <= 4 ? 'heightmiddlescreen' : '' ?>">
        <?php if (count($list_sanpham) == 0) { ?>
            <div class="row flex">
                <p>Chưa có sản phẩm nào.</p>
            </div>
            <?php } else {
            foreach ($list_sanpham as $sp) {
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
                            <button class="" onclick="sendProductID(<?= $id ?>)"><i style="font-size:1.2vw" class="fa-solid fa-cart-arrow-down"></i></button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>