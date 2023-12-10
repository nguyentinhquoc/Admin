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
                                <br>
                        </div>
                        </p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Họ tên khách hàng</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Nội dung</th>
                                    <th scope="col">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_GET['delete'])) {
                                    $iddelete = $_GET['delete'];
                                    $sql = "DELETE FROM lienhe WHERE `lienhe`.`id` = $iddelete";
                                    pdo_execute($sql);
                                }
                                $sql = "SELECT * FROM lienhe";
                                $load_banner = pdo_query($sql);
                                foreach ($load_banner as $key => $value) { ?>
                                    <tr>
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td><?= $value['fullname'] ?></td>
                                        <td><?= $value['email'] ?></td>
                                        <td><?= $value['tel'] ?></td>
                                        <td><?= $value['noidung'] ?></td>
                                        <td><a href="index.php?act=cskh&delete=<?= $value['id'] ?>">Xóa</a> </td>
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