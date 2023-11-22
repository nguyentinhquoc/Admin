
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

                                    <h5 class="mt-0">Inline edit with Button</h5>
                                    <p class="sub-header">Inline edit like a spreadsheet, toolbar column with edit
                                        button only and without focus on first input.</p>
                                    <div class="table-responsive">
                                        <table class="table table-centered mb-0" id="btn-editable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Tên người dùng</th>
                                                    <th>Bình luận </th>
                                                    <th>Ngày bình luận</th>
                                                    <th>Xóa</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $load_thongke_binhluan = load_thongke_binhluan();
                                            ?>
                                            <tbody>
                                                <?php foreach ($load_thongke_binhluan as $key => $value) {
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
                                                        
                                                            <a href="index.php?binhluan_id=<?=$id?>"
                                                                onclick="return xacnhanxoa()">Xóa</a>
                                                        </td>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <?php
                                                ?>


                                                <?php
                                                // lấy id của bình luận cần xóa
                                                if (isset($_GET['binhluan_id'])) {
                                                    $binhluan_id = $_GET['binhluan_id'];
                                                    //sql delete
                                                    $sql = "DELETE FROM binhluan WHERE `binhluan`.`id` = $binhluan_id";
                                                    pdo_execute($sql);
                                                    header("Location: index.php");
                                                }

                                                ?>

                                            </tbody>
                                        </table>
                                    </div> <!-- end .table-responsive-->
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->