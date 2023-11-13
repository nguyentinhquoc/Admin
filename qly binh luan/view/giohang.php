<div class="row formcontent">
    <div class="row flex between">
        <h4 class="title_cate">GIỎ HÀNG</h4>
        <div class="flex between" style="gap: 10px">
            <h4 class="amount_cart">
                <i style="font-size: 1.2vw;" class="fa-solid fa-basket-shopping"></i> <?= $sl['tongsanpham'] ?>
            </h4>
        </div>
    </div>
    <?php if (count($giohang) == 0) { ?>
        <div style="height: 65vh;" class="row flex fl-col center boxcontent">
            <h4><i style="font-size: 1.2vw;" class="fa-regular fa-face-sad-tear"></i> Giỏ hàng trống</h4>
            <h5><a style="color: rgba(256,155,0,1);" href="index.php"><i style="font-size: 1.2vw;" class="fa-solid fa-basket-shopping"></i> Mua sắm ngay</a></h5>
        </div>
    <?php } else { ?>
        <form action="" class="row formds <?= (count($giohang)) < 3 ? 'heightmiddlescreen' : '' ?>">
            <table id="cart" class="row mb">
                <?php foreach ($giohang as $row) {
                    extract($row); ?>
                    <tr>
                        <td><input name="checkbox[]" value=<?= $id ?> type="checkbox"></td>
                        <td><img width="80px" src="upload/<?= $anhsp ?>" alt=""></td>
                        <td>
                            <a href="index.php?act=chitiet&detail=<?= $idpro ?>">
                                <?= $tensp ?>
                            </a>
                        </td>
                        <td><?= $dongia ?> <i class="fa-solid fa-dollar-sign"></i></td>
                        <td>
                            <div class="amount flex center" style="column-gap: 10px">
                                <p class="minus">-</p>
                                <p class="quantity" id="quantity-<?= $idpro ?>"><?= $soluong ?></p>
                                <p class="plus" onclick="plus(<?= $idpro ?>)">+</p>
                            </div>
                        </td>
                        <td>
                            <button class="button delete">
                                <a onclick="return confirm('Xóa sản phẩm này khỏi giỏ hàng ?')" href="index.php?act=xoasp_giohang&id=<?= $idpro ?>"><i class="fa-solid fa-trash"></i></a>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <div class="row mb">
                <input type="button" onclick="checkAll()" value="Chọn tất cả" />
                <input type="button" onclick="checkRemoveAll()" value="Bỏ chọn tất cả" />
                <input class="delete_all" type="submit" name="delete_checkbox" onclick="return confirm(`Xóa các mục đã chọn ?`)" value="Xóa các mục đã chọn" />
            </div>
            <button id="buycart" type="submit" class="flex between row">
                <h4>Thanh toán</h4>
                <h4>
                <i class="fa-solid fa-hand-holding-dollar"></i>
                    <?= $total['tongdongia']?> $</h4>
            </button>
        </form>
    <?php } ?>
</div>