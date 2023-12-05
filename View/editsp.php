<main>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $laytt_sp = upload_sanpham_id($id);
    }
    ?>
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="snow-editor" style="height: auto;">
                                    <p><br></p>
                                    <h3>Sửa sản phẩm :<?= $laytt_sp['name'] ?></h3>

                                    <p><br></p>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <label>Chọn danh mục</label>
                                        <select class="form-select form-select-sm" name="danhmuc" aria-label="Small select example">
                                            <?php $all_dm = upload_danhmuc();
                                            foreach ($all_dm as $key => $value) { ?>
                                                <option value="<?= $value['id'] ?>" <?= $value['id'] == $laytt_sp['iddm'] ? 'selected' : "" ?>><?= $value['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <p><br></p>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label"></label>Tên sản phẩm</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nhập tên sản phẩm." value="<?= $laytt_sp['name'] ?>" name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="mota"><?= $laytt_sp['mota'] ?></textarea>
                                        </div>
                                        <div style="display: flex;">
                                            <div style="width: 100%; margin-right: 50px; ">
                                                <label for="formFile" class="form-label">Giá tiền</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">VND</span>
                                                    <input type="number" class="form-control" value="<?= $laytt_sp['price'] ?>" name="price">
                                                </div>
                                            </div>
                                            <div> <label for="formFile" class="form-label">SALE</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">%</span>
                                                    <input type="number" class="form-control" value="<?= $laytt_sp['sale'] ?>" name="sale">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Ảnh sản phẩm</label>
                                            <input type="file" class="form-control" id="fileInput" onchange="displayImage()" name="img">
                                        </div>
                                        <div style="display: flex; justify-content: space-around; ">
                                            <label for="">Ảnh cũ</label>
                                            <div><img src="<?= $img_path ?>sanpham/<?= $laytt_sp['img'] ?>" alt="" height=" 150px" class="rounded float-start"></div>
                                            <label for="">Ảnh mới</label>
                                            <div><img id="selectedImage" alt="" height="150px" class="rounded float-start"></div>
                                        </div>
                                        <div class="mb-3">
                                        </div>
                                        <table class="table table-bordered">
                                            <thead>
                                                <?php
                                                $sql = "SELECT * from color";
                                                $color = pdo_query($sql);
                                                ?>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <?php foreach ($color as $value) { ?>
                                                        <th scope="col"><?= $value['color'] ?></th>
                                                    <?php
                                                    }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT * from size";
                                                $size = pdo_query($sql);
                                                ?>
                                                <?php foreach ($size as $value1) { ?>
                                                    <tr>
                                                        <th scope="col"><?= $value1['size'] ?></th>
                                                        <?php $sql = "SELECT * from color";
                                                        $color = pdo_query($sql);

                                                        ?>
                                                        <?php foreach ($color as $value2) {
                                                            $id_color = $value2['id'];
                                                            $id_size = $value1['id'];
                                                            $sql = "SELECT soluong from bienthe where idcolor = $id_color and idsize = $id_size and idsp = $id";
                                                            $soluong = pdo_query_one($sql); ?>
                                                            <td><input style="border: 0px; height: 30px; width: 100%;" value="<?= $soluong['soluong'] ?>" type="number" min="0"   name="<?= $id_color . $id_size ?>"></td>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <button class="btn btn-primary" type="submit" style="width: 100%;" name="xn_edit">Xác nhận sửa sản phẩm</button>
                                    </form>

                                    <?php
                                    if (isset($_POST['xn_edit'])) {
                                        $danhmuc = $_POST['danhmuc'];
                                        $name = $_POST['name'];
                                        $mota = $_POST['mota'];
                                        $price = $_POST['price'];
                                        $sale = $_POST['sale'];
                                        $img = $_FILES['img']['name'];
                                        $path = $img_path . "sanpham/" . $_FILES['img']['name'];
                                        $file = $_FILES['img']['tmp_name'];
                                        move_uploaded_file($file, $path);
                                        if ($file) {
                                            $sql = "UPDATE `sanpham` SET `name` = '$name',`iddm`='$danhmuc',`mota`='$mota',`sale`='$sale',`price`='$price',`img`='$img' WHERE `sanpham`.`id` = $id;";
                                        } else {
                                            $sql = "UPDATE `sanpham` SET `name` = '$name',`iddm`='$danhmuc',`mota`='$mota',`sale`='$sale',`price`='$price' WHERE `sanpham`.`id` = $id;";
                                        }
                                        pdo_execute($sql);
                                        $sql1 = "SELECT * FROM size ";
                                        $sql2 = "SELECT * FROM color";
                                        $tongsize =  pdo_query($sql1);
                                        $tongcolor = pdo_query($sql2);
                                        foreach ($tongsize as $key => $value1) {
                                            foreach ($tongcolor as $key => $value2) {
                                                $slbienthe = $_POST[$value1['id'] . $value2['id']];
                                                $mabt = $value1['id'] . "_" . $value2['id'];
                                                $sql4 = "UPDATE `bienthe` SET `soluong` = '$slbienthe' WHERE `bienthe`.`mabienthe` =  '$mabt' and bienthe.idsp= '$id';";
                                                pdo_execute($sql4);
                                            }
                                        }
                                        header('Location: index.php?act=sanpham&suatc');
                                    }
                                    ?>
                                    <p><br></p>
                                    <p>
                                    </p>
                                </div> <!-- end Snow-editor-->
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div><!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->

        <script>
            function displayImage() {
                var input = document.getElementById('fileInput');
                var img = document.getElementById('selectedImage');

                var file = input.files[0];

                if (file) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        img.src = e.target.result;
                    };

                    reader.readAsDataURL(file);
                }
            }
        </script>
</main>