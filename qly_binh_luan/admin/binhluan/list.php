<?php
include '../model/notification.php';
?>
<div class="row">
    <div class="row">
        <h4 class="title_cate">DANH SÁCH BÌNH LUẬN</h4>
    </div>
    <form action="index.php?act=listbl" method="POST" class="row formsearch">
        <input id="search" type="text" name="kyw" placeholder="Nhập thông tin bình luận">
        <button type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
    <form action="index.php?act=xoabl" method="POST" class="row formcontent">
        <div class="row mb10">
            <input type="button" onclick="checkAll()" value="Chọn tất cả" />
            <input type="button" onclick="checkRemoveAll()" value="Bỏ chọn tất cả" />
            <input class="delete_all" type="submit" name="delete_checkbox" onclick="return confirm(`Xóa các bình luận này ?`)" value="Xóa các mục đã chọn" />
        </div>
        <div class="row mb10 formds">
            <table>
                <tr>
                    <th><i class="fa-solid fa-square-check fa-xl"></i></th>
                    <th>ID</th>
                    <th>Tài khoản</th>
                    <th>Sản phẩm</th>
                    <th>Ngày bình luận</th>
                    <th>Nội dung</th>
                    <th>THAO TÁC</th>
                </tr>
                <?php if (count($list_bl) == 0) { ?>
                    <tr>
                        <td colspan="7" style="text-align:center" colspan="4">Chưa có bình luận nào</td>
                    </tr>
                    <?php } else {
                    $list_sp = list_sanpham('', 0);
                    foreach ($list_bl as $bl) {
                        extract($bl);
                        $xoabl = "index.php?act=xoabl&id=" . $id;
                    ?>
                        <tr>
                            <td><input name="checkbox[]" value=<?= $id ?> type="checkbox"></td>
                            <td><?= $id ?></td>
                            <td style="text-align: start">
                                <?php foreach ($list_kh as $kh) {
                                    if ($kh['id'] == $iduser) {
                                        echo '#' . $iduser . ' - ' . $kh['user'];
                                    }
                                } ?>
                            </td>
                            <td style="text-align: start">
                                <?php foreach ($list_sanpham as $sp) {
                                    if ($sp['id'] == $idpro) {
                                        echo '#' . $idpro . ' - ' . $sp['name'];
                                    }
                                } ?>
                            </td>
                            <td><?= $ngaybinhluan ?></td>
                            <td style="text-align: start"><?= $noidung ?></td>
                            <td>
                                <div class="btnbox">
                                    <button class="button delete">
                                        <a onclick="return confirm(`Xóa bình luận này ?`)" href="<?= $xoabl ?>"><i class="fa-solid fa-trash"></i></a>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>
        <div class="row mb20">
            <input type="button" onclick="checkAll()" value="Chọn tất cả" />
            <input type="button" onclick="checkRemoveAll()" value="Bỏ chọn tất cả" />
            <input class="delete_all" type="submit" name="delete_checkbox" onclick="return confirm(`Xóa các bình luận này ?`)" value="Xóa các mục đã chọn" />
        </div>
    </form>
</div>