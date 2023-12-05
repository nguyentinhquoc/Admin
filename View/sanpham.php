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
                                <form action="" method="post">
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
                                        <th scope="col">Đánh giá(/5)</th>
                                        <th scope="col">Chi tiểt</th>
                                        <th scope="col">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php
                                    $search = "";
                                    $trangthai = 2;
                                    if (isset($_POST["search"])) {
                                        $search = $_POST["search"];
                                    }
                                    if (isset($_GET["idtrangthai"])) {
                                        $trangthai = $_GET["idtrangthai"];
                                    }
                                    $upload_sanpham = upload_sanpham($search, $trangthai);
                                    foreach ($upload_sanpham as $key => $value) {
                                        $idsp = $value['id'];

                                    ?>
                                        <tr>
                                            <th scope="row"><?= $key + 1 ?></th>
                                            <td><img src="<?= $img_path ?>sanpham/<?= $value['img'] ?>" alt="" width="100px"></td>
                                            <td><?= $value['name'] ?></td>
                                            <td><?= $value['price'] ?></td>
                                            <td><?= $value['luotxem'] ?></td>
                                            <?php
                                            $sqlsoluong = "SELECT SUM(bienthe.soluong) AS 'soluong' FROM `bienthe` WHERE idsp=$idsp";
                                            $loadsl = pdo_query_one($sqlsoluong);
                                            ?>
                                            <td><?= $loadsl['soluong'] ?></td>
                                            <?php
                                            $sql_danhgia = "SELECT AVG(danhgia.danhgia) 'chatluong' FROM `danhgia` JOIN bienthe ON danhgia.idbienthe=bienthe.id JOIN sanpham ON sanpham.id=bienthe.idsp where sanpham.id = $idsp ";
                                            $sql_danhgia = pdo_query_one($sql_danhgia);
                                            $star = $sql_danhgia['chatluong'];
                                            if (empty($star)) {
                                                $star = "Chưa có dánh giá !";
                                            }
                                            ?>
                                            <td>
                                                <p style="color: orange;"><?= $star ?></p>
                                            </td>
                                            <td><a href="index.php?act=editsp&id=<?= $value['id'] ?>">Chi tiết<?=$search?></a></td>
                                            <td>
                                                <div style="display: flex;">
                                                    <p class="thao_tac thaotac_2" style="margin-left: 10px;" onclick="delete_sanpham(0,<?= $value['id'] ?>,<?= $trangthai ?>,'<?= $search ?>')">
                                                        <?php
                                                        if ($value['trangthai'] == 1) {
                                                            echo '<i class="fa fa-eye" aria-hidden="true"></i>';
                                                        } else {
                                                            echo '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
                                                        }
                                                        ?>
                                                    </p>

                                                    <p class="thao_tac thaotac_1" style="margin-left: 20px;" onclick="delete_sanpham(<?= $value['id'] ?>,0,<?= $trangthai ?>,'<?= $search ?>')"><i class="fa fa-trash" aria-hidden="true"></i>
                                                </div>
                                            </td>
                                            </p>

                                        </tr>
                                    <?php
                                    }

                                    ?>
                                </tbody>
                                <script>
                                    function delete_sanpham(id_delete, id_an, idtrangthai, search) {
                                        if (confirm("Bạn có chắc chắn với hành động của mmình ?")) {
                                            $.post("ajax/sanpham.php", {
                                                id_delete: id_delete,
                                                id_an: id_an,
                                                idtrangthai: idtrangthai,
                                                search: search,
                                            }, function(data) {
                                                $(".table").html(data);
                                            });
                                        }
                                    }
                                </script>
                            </table>

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>