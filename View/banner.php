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
                                <a href="index.php?act=addbanner">Thêm sản phẩm</a>
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
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                $sql = "SELECT * FROM banner";
                                $load_banner = pdo_query($sql);

                                foreach ($load_banner as $key => $value) { ?>
                                    <tr>
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td><img src="<?= $img_path ?>banner/<?= $value['img'] ?>" alt="" width="100px"></td>
                                        <td><?= $value['h1'] ?></td>
                                        <td><?= $value['h2'] ?></td>
                                        <td><?= $value['h3'] ?></td>
                                        <td><a href="index.php?act=editbanner&id=<?= $value['id'] ?>">Sửa</a> <a onclick="return confirm('Bạn có chắc muốn xóa baner ?')" href="index.php?act=banner&delete=<?= $value['id'] ?>">Xóa</a> </td>
                                    </tr>
                                <?php
                                }
                                if (isset($_GET['delete'])) {
                                    $id_delete = $_GET['delete'];
                                    $sql = "DELETE FROM banner WHERE `banner`.`id` = $id_delete";
                                    pdo_execute($sql);
                                    header("Location: index.php?act=banner");
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