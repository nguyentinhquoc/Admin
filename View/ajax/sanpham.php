<?php
include "../../model/pdo.php";
include "../../model/sanpham.php";
include "../gloabal.php";

$id_an = $_POST['id_an'];
$id_delete = $_POST['id_delete'];
$trangthai = $_POST["idtrangthai"];
if (!empty($_POST["search"])) {
    $search = $_POST["search"];
}else {
    $search="";
}


if ($id_an == 0) {
    $sql = "DELETE FROM sanpham WHERE `sanpham`.`id` = $id_delete";
    pdo_execute($sql);
} elseif ($id_delete == 0) {
    $sql = "SELECT * FROM sanpham where id='$id_an'";
    $sp = pdo_query_one($sql);
    if ($sp['trangthai'] == 1) {
        $sql2 = "UPDATE `sanpham` SET `trangthai` = '0' WHERE `sanpham`.`id` = $id_an";
    }
    if ($sp['trangthai'] == 0) {

        $sql2 = "UPDATE `sanpham` SET `trangthai` = '1' WHERE `sanpham`.`id` = $id_an";
    }
    pdo_execute($sql2);
}
?>
<thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Ảnh sản phẩm</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Giá sản phẩm</th>
        <th scope="col">Lượt xem</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Giảm giá</th>
        <th scope="col">Đánh giá(/5)</th>
        <th scope="col">Chi tiểt</th>
        <th scope="col" >Chức năng</th>
    </tr>
</thead>
<tbody>
<?php
    $upload_sanpham = upload_sanpham($search, $trangthai);
    foreach ($upload_sanpham as $key => $value) { ?>
        <tr>
            <th scope="row"><?= $key + 1 ?></th>
            <td><img src="<?= $img_path ?>sanpham/<?= $value['img'] ?>" alt="" width="100px"></td>
            <td><?= $value['name'] ?></td>
            <td><?= $value['price'] ?></td>
            <td><?= $value['luotxem'] ?></td>
            <td><?= $value['soluong'] ?></td>
            <td><?= $value['sale'] ?></td>
            <td><?= $value['star'] ?></td>
           
            <td><a href="index.php?act=editsp&id=<?= $value['id'] ?>">Chi tiết</a></td>
            <td>
                <div style="display: flex;">
                    <p class="thao_tac thaotac_2" style="margin-left: 10px;" onclick="delete_sanpham(0,<?= $value['id'] ?>,<?= $trangthai ?>,<?= $search ?>)">
                        <?php
                        if ($value['trangthai'] == 1) {
                            echo '<i class="fa fa-eye" aria-hidden="true"></i>';
                        } else {
                            echo '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
                        }
                        ?>
                    </p>

                    <p class="thao_tac thaotac_1" style="margin-left: 20px;" onclick="delete_sanpham(<?= $value['id'] ?>,0,<?= $trangthai ?>,<?= $search ?>)"><i class="fa fa-trash" aria-hidden="true"></i>
                </div>
            </td>
</p>

        </tr>
    <?php
    }

    ?>
</tbody>