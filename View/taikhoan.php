<!-- ============================================================== -->
<?php
if (isset($_GET['idkhoa'])) {
    $idkhoa = $_GET['idkhoa'];
    khoa_taikhoan($idkhoa);
}
if (isset($_GET['mokhoa'])) {
    $mokhoa = $_GET['mokhoa'];
    mokhoa_taikhoan($mokhoa);
}
if (isset($_GET['capquyen'])) {
    $capquyen = $_GET['capquyen'];
    capquyen_taikhoan($capquyen);
}
if (isset($_GET['huyquyen'])) {
    $huyquyen = $_GET['huyquyen'];
    huyquyen_taikhoan($huyquyen);
}
?>
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Quản lý tài khoản</h4>
                            <p class="text-muted font-14 mb-3">
                                Dưới đây là bảng quản lí tất cả các tài khoản
                            </p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
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
                                    if (isset($_GET['role'])) {
                                        $role = $_GET['role'];
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
                                                <p onclick="update_taikhoan(0,<?= $id ?>,<?= $role ?>)">
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
                            </table>
                            <script>
                                function update_taikhoan(capquyen, khoa, role) {
                                    $.post("ajax/taikhoan.php", {
                                        capquyen: capquyen,
                                        khoa: khoa,
                                        role: role,
                                    }, function(data) {
                                        $(".table").html(data);
                                    });
                                }
                            </script>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>