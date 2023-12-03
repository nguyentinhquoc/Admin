<?php
include "../../model/pdo.php";
include "../../model/binhluan.php";
$id_xoa=$_POST['id_xoa'];
$id_an=$_POST['id_an'];
if ($id_xoa==0) {
        $sql = "SELECT * FROM binhluan where id = $id_an";
        $check = pdo_query_one($sql);
        if ($check['trangthai'] == 1) {
            $sql2 = "UPDATE `binhluan` SET `trangthai` = '0' WHERE `binhluan`.`id` = $id_an";
        }
        if ($check['trangthai'] == 0) {
            $sql2 = "UPDATE `binhluan` SET `trangthai` = '1' WHERE `binhluan`.`id` = $id_an";
        }
        pdo_execute($sql2);
}
if ($id_an==0) {
        $sql = "DELETE FROM binhluan WHERE `binhluan`.`id` = $id_xoa";
        pdo_execute($sql);
    }
?>
<table class="table table-centered mb-0" id="btn-editable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Tên người dùng</th>
                                            <th>Bình luận </th>
                                            <th>Ngày bình luận</th>
                                            <th>Ẩn</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $load_binhluan = load_binhluan();
                                    ?>
                                    <tbody>
                                        <?php foreach ($load_binhluan as $key => $value) {
                                            extract($value);
                                        ?>

                                            <tr>
                                                <td>
                                                    <?= $key + 1 ?>
                                                </td>
                                                <td>
                                                    <?= $name ?>
                                                </td>
                                                <td>
                                                    <?= $nameuser ?>
                                                </td>
                                                <td>
                                                    <?= $comment ?>
                                                </td>
                                                <td>
                                                    <?= $date ?>
                                                </td>
                                                <td>
                                                    <p style=" cursor: pointer; color: green; font-weight: bolder;"  onclick="update_bl(0,<?= $id ?>)"><?php if ($trangthai == 1) {
                                                                                                                                                            echo "Ẩn";
                                                                                                                                                        } else {
                                                                                                                                                            echo "Hiển thị";
                                                                                                                                                        } ?></p>
                                                </td>
                                                <td>
                                                    <p style=" cursor: pointer; color: red; font-weight: bolder;" onclick="update_bl(<?= $id ?>,0)">Xóa</p>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php
                                        ?>
                                        <?php
                                        if (isset($_GET['binhluan_id_delete'])) {
                                            $binhluan_id_delete = $_GET['binhluan_id_delete'];
                                            $sql = "DELETE FROM binhluan WHERE `binhluan`.`id` = $binhluan_id_delete";
                                            pdo_execute($sql);
                                            header("Location: index.php?act=quanli_binhluan");
                                        }
                                        if (isset($_GET['binhluan_id_an'])) {
                                            $binhluan_id_an = $_GET['binhluan_id_an'];
                                            $sql = "SELECT * FROM binhluan where id = $binhluan_id_an";
                                            $check = pdo_query_one($sql);
                                            if ($check['trangthai'] == 1) {
                                                $sql2 = "UPDATE `binhluan` SET `trangthai` = '0' WHERE `binhluan`.`id` = $binhluan_id_an";
                                            }
                                            if ($check['trangthai'] == 0) {
                                                $sql2 = "UPDATE `binhluan` SET `trangthai` = '1' WHERE `binhluan`.`id` = $binhluan_id_an";
                                            }
                                            pdo_execute($sql2);
                                            // header("Location: index.php?act=quanli_binhluan");
                                        }
                                        ?>
                                    </tbody>
                                </table>