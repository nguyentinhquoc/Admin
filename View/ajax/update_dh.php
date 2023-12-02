<?php
include "../../model/pdo.php";
include "../../model/donhang.php";
$madh = $_POST['madh'];
$huy = $_POST['huy'];
$sql = "SELECT * FROM phanloaidh where madh='$madh'";
$dh = pdo_query_one($sql);
if ($huy == 0) {
    $trangthai = $dh['idtrangthai'] + 1;
    if ($trangthai <= 5) {
        $sql2 = "UPDATE `phanloaidh` SET `idtrangthai` = '$trangthai' WHERE `phanloaidh`.`madh` = $madh";
        pdo_execute($sql2);
    }
} elseif ($huy == 1) {
    $trangthai = $dh['idtrangthai'];
    if ($trangthai < 5) {
        $sql2 = "UPDATE `phanloaidh` SET `idtrangthai` = '6' WHERE `phanloaidh`.`madh` = $madh";
        pdo_execute($sql2);
    }
}
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Mã đơn hàng</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col">Trạng thái đơn hàng</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Khách hàng</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Chi tiết</th>
            <th scope="col">Xác nhận</th>
            <th scope="col">Hủy đơn hàng</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($_GET['iddh'])) {
            $trangthai = $_GET['iddh'];
        } else {
            $trangthai = "";
        }

        echo $trangthai;
        $upload_dh = upload_dh($trangthai);
        foreach ($upload_dh as $key => $value) {

            if ($value['idtt'] == 3) {
                $update_tt = "Xác nhận đơn hàng";
            } elseif ($value['idtt'] == 4) {
                $update_tt = "Xác nhận đã hoàn thành";
            } elseif ($value['idtt'] == 5) {
                $update_tt = "Đã hoàn thành";
            } elseif ($value['idtt'] == 6) {
                $update_tt = "Đã hủy";
            }
        ?>
            <td><?= $key + 1 ?></td>
            <td><?= $value['madh'] ?></td>
            <td><?= $value['date'] ?></td>
            <td><?= $value['trangthai'] ?></td>
            <td><?= $value['thanhtien'] ?></td>
            <td><?= $value['user'] ?></td>
            <td><?= $value['tel'] ?></td>
            <th scope="col"><a href="index.php?act=chitietdh&madh=<?= $value['madh'] ?>"> Chi tiết</a></th>
            <th scope="col">
                <p style="color: green; cursor: pointer;" onclick="update(<?= $value['madh'] ?>,0)"> <?= $update_tt ?></p>
            </th>
            </th>
            <th scope="col">
                <p onclick="update(<?= $value['madh'] ?>,1)" style="color: red;cursor: pointer; ">Hủy đơn hàng</p>
            </th>
            </tr>
        <?php
        }

        ?>
    </tbody>

</table>