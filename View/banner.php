<div class="content-page">
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Quản lý banner</h4>
                            <p class="text-muted font-14 mb-3">
                                Dưới đây là bảng quản lí tất cả các banner
<br>
                                <a href="index.php?act=addbanner">Thêm banner</a>
                        </div>
                        </p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ẢNH BANNER</th>
                                    <th scope="col">Header 1</th>
                                    <th scope="col">Header 2</th>
                                    <th scope="col">Header 3</th>
                                    <th scope="col">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM banner";
                                $load_banner = pdo_query($sql);
                                foreach ($load_banner as $key => $value) { ?>
                                    <tr>
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td><img src="<?= $img_path ?>slider/<?= $value['img'] ?>" alt="" width="100px"></td>
                                        <td><?= $value['h1'] ?></td>
                                        <td><?= $value['h2'] ?></td>
                                        <td><?= $value['h3'] ?></td>
                                        <td><a href="index.php?act=editbanner&id=<?= $value['id'] ?>">Sửa</a> <p onclick="delete_banner(<?=$value['id']?>)" >Xóa</p> </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            <script>
                                    function delete_banner(id_delete) {
                                        $.post("ajax/banner.php", {
                                            id_delete:id_delete,
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