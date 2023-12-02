<?php
include "../../model/pdo.php";
include "../../model/taikhoan.php";
$capquyen = $_POST['capquyen'];
$khoa = $_POST['khoa'];
if ($capquyen == 0) {
    $sql = "SELECT * FROM taikhoan where id = '$khoa'";
    $check = pdo_query_one($sql);
    if ($check['trangthai'] == 0) {
        mokhoa_taikhoan($khoa);
    }
    if ($check['trangthai'] == 1) {
        khoa_taikhoan($khoa);
    }
}
if ($khoa == 0) {
    $sql = "SELECT * FROM taikhoan where id = '$capquyen'";
    $check = pdo_query_one($sql);
    if ($check['role'] == 2) {
        huyquyen_taikhoan($capquyen);
    }
    if ($check['role'] == 1) {
        capquyen_taikhoan($capquyen);
    }
}

?>
<thead>
    <tr>
        <th scope="col"># </th>
        <th scope="col">Họ và tên</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Email</th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">Chức năng</th>
        <th scope="col">Quyền truy cập</th>
    </tr>
</thead>
<tbody>
    <?php
    $role = 0;
    if (isset($_POST['role'])) {
       echo $role = $_POST['role'];
    }
    $upload_taikhoan = upload_taikhoan($role);
    foreach ($upload_taikhoan as $key => $value) { ?>
        <tr>
            <th scope="row"><?= $key + 1 ?></th>
            <td><?= $value['name'] ?></td>
            <td><?= $value['tel'] ?></td>
            <td><?= $value['email'] ?></td>
            <td><?= $value['address'] ?></td>
            <td>
                <?php
                $id = $value['id']; ?>
                <p onclick="update_taikhoan(<?= $id ?>,0,<?=$role?>)"><?php
                                                            if ($value['role'] == 1) {
                                                                echo "Cấp quyền Admin";
                                                            } else {
                                                                echo "Hủy quyền Admin";
                                                            }
                                                            ?></p>

            </td>
            <td>
                <p onclick="update_taikhoan(0,<?= $id ?>,<?=$role?>)">
                    <?php
                    if ($value['trangthai'] == 1) {
                        echo "Khóa";
                    } else {
                        echo "Mở khóa";
                    }
                    ?>
                </p>

            </td>

        </tr>
    <?php
    }
    ?>
</tbody>