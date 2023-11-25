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
                            <h4 class="mt-0 header-title">Quản lý sản phẩm</h4>
                            <p class="text-muted font-14 mb-3">
                               Dưới đây là bảng quản lí tất cả các sản phẩm
                            </p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Ảnh sản phẩm</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Giá sản phẩm</th>
                                        <th scope="col">Lượt xem</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Giảm giá</th>
                                        <th scope="col">Đánh giá</th>
                                        <th scope="col">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $upload_sanpham = upload_sanpham();
                                    foreach ($upload_sanpham as $key => $value) { ?>
                                        <tr>    
                                            <th scope="row"><?= $key + 1 ?></th>
                                            <td><?= $value['name'] ?></td>
                                            <td><?= $value['tel'] ?></td>
                                            <td><?= $value['email'] ?></td>
                                            <td><?= $value['address'] ?></td>
                                            <td>
                                                <?php
                                                $id = $value['id'];
                                                if ($value['role'] == 1) {  ?>
                                                    <a href="index.php?act=taikhoan&capquyen=<?= $id ?>">Cấp quyền Admin </a>
                                                <?php } elseif ($value['role'] == 2) { ?>
                                                    <a href="index.php?act=taikhoan&huyquyen=<?= $id ?>">Hủy quyền Admin</a>
                                                <?php  }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($value['trangthai'] == 1) {  ?>
                                                    <a href="index.php?act=taikhoan&idkhoa=<?= $id ?>">Khóa </a>
                                                <?php } elseif ($value['trangthai'] == 0) { ?>
                                                    <a href="index.php?act=taikhoan&mokhoa=<?= $id ?>">Mở khóa</a>
                                                <?php  }
                                                ?>
                                            </td>

                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>