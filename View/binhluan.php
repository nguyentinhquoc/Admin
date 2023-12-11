<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div> <!-- end row -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                        <h4 class="mt-0 header-title">Quản lý bình luận</h4>
                            <p class="text-muted font-14 mb-3">
                                Dưới đây là bảng quản lí tất cả các bình luận
<br>
                            <div class="table-responsive">
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
                            </div> <!-- end .table-responsive-->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div> <!-- end row -->
            <script>
    function update_bl(id_xoa, id_an) {
        $.post("ajax/binhluan.php", {
            id_xoa: id_xoa,
            id_an: id_an,
        }, function(data) {
            $(".table-responsive").html(data);
        });
    }
</script>

        </div> <!-- container -->

    </div> <!-- content -->