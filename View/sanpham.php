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
                            <div class="search_sanpham">
                                <form action="index.php?act=sanpham" method="post">
                                   
                                    <label for="exampleDataList" class="form-label">Datalist example</label>
                                    <input type="text" class="form-control" name="search" list="datalistOptions" id="exampleDataList" placeholder="Tìm kiếm sản phẩm">
                                    <datalist id="datalistOptions">
                                        <option value="Nike">
                                        <option value="MLB">
                                        <option value="Jordan">
                                    </datalist>
                                </form>
                                <a href="index.php?act=addsp">Thêm sản phẩm</a>
                            </div>
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
                                        <th scope="col">Đánh giá(/5)</th>
                                        <th scope="col">Chi tiết</th>
                                        <th scope="col">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php
                                    $search = "";
                                    if (isset($_POST["search"])) {
                                        $search = $_POST["search"];
                                    }
                                    $upload_sanpham = upload_sanpham($search);
                                    foreach ($upload_sanpham as $key => $value) { ?>
                                        <tr>
                                            <th scope="row"><?= $key + 1 ?></th>
                                            <td><img src="<?= $img_path ?>sanpham/<?= $value['img'] ?>" alt="" width="100px"></td>
                                            <td><?= $value['name'] ?></td>
                                            <td><?= $value['price'] ?></td>
                                            <td><?= $value['luotxem'] ?></td>
                                            <td><?= $value['soluong'] ?></td>
                                            <td><?= $value['sale'] ?></td>
                                            <td><?= $value['star'] ?></td>
                                            <td><a href="">Chi tiết</a></td>
                                            <td><a href="index.php?act=editsp&id=<?= $value['id'] ?>">Sửa</a> <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm <?= $value['name'] ?>')" href="index.php?act=sanpham&delete=<?= $value['id'] ?>">Xóa</a> </td>
                                        </tr>
                                    <?php
                                    }
                                    if (isset($_GET['delete'])) {
                                        $id_delete = $_GET['delete'];
                                        $sql = "DELETE FROM sanpham WHERE `sanpham`.`id` = $id_delete";
                                        pdo_execute($sql);
                                        header("Location: index.php?act=sanpham&deletetc");
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