<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Quản lý đơn hàng</h4>
                            <p class="text-muted font-14 mb-3">
                                <?php
                                if (isset($_GET['iddh'])) {
                                    if ($_GET['iddh'] == 3) {
                                        $abd_head = "Dưới đây là bảng quản lí cho các đơn hàng đang chờ xác nhận";
                                    }
                                    if ($_GET['iddh'] == 4) {
                                        $abd_head = "Dưới đây là bảng quản lí cho các đơn hàng đang được giao";
                                    }
                                    if ($_GET['iddh'] == 5) {
                                        $abd_head = "Dưới đây là bảng quản lí cho các đơn hàng đã hoàn thành";
                                    }
                                    if ($_GET['iddh'] == 6) {
                                        $abd_head = "Dưới đây là bảng quản lí cho các đơn hàng đã hủy";
                                    }
                                } else {
                                    $abd_head = "Dưới đây là bảng quản lí cho các tất cả các đơn hàng";
                                }
                                ?>
                                <?= $abd_head ?>
                            </p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Mã đơn hàng</th>
                                        <th scope="col">Ngày tạo</th>
                                        <th scope="col">Trạng thái đơn hàng</th>
                                        <th scope="col">Tổng tiền</th>
                                        <th scope="col">Khách hàng</th>
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
                                <script>
                                    function update(madh, huy) {
                                        $.post("ajax/update_dh.php", {
                                            madh: madh,
                                            huy: huy,
                                        }, function(data) {
                                            $(".table").html(data);
                                        });
                                    }
                                </script>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>