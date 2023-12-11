<div class="content-page">
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Quản lý thông báo</h4>
                            <p class="text-muted font-14 mb-3">
                                Dưới đây là bảng quản lí tất cả các thông báo
                                <br>
                                <a href="index.php?act=addthongbao">Thêm thông báo</a>
                        </div>
                        </p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ẢNH BANNER</th>
                                    <th scope="col">Header</th>
                                    <th scope="col">Nội dung</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                $sql = "SELECT * FROM thongbao";
                                $load_thongbao = pdo_query($sql);

                                foreach ($load_thongbao as $key => $value) { ?>
                                    <tr>
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td><img src="<?= $img_path ?>thongbao/<?= $value['img'] ?>" alt="" width="100px"></td>
                                        <td><?= $value['header'] ?></td>
                                        <td><?= $value['noidung'] ?></td>
                                        <td><a href="index.php?act=editthongbao&id=<?= $value['id'] ?>">Sửa</a> <a onclick="return delete_thongbao(<?= $value['id'] ?>)">Xóa</a> </td>
                                    </tr>
                                <?php
                                }

                                ?>
                            </tbody>
                        </table>
                        <script>
                            function delete_thongbao(id_delete) {
                                $.post("ajax/thongbao.php", {
                                    id_delete: id_delete,
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