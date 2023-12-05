<main>

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="snow-editor" style="height: auto;">
                                    <p><br></p>
                                    <h3>Thêm mới sản phẩm. <?php ?></h3>
                                    <p><br></p>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <label>Chọn danh mục</label>
                                        <select class="form-select form-select-sm" name="danhmuc" aria-label="Small select example">
                                            <?php $all_dm = upload_danhmuc();
                                            foreach ($all_dm as $key => $value) { ?>
                                                <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <p><br></p>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label"></label>Tên sản phẩm</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nhập tên sản phẩm." name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="mota"></textarea>
                                        </div>
                                        <div style="display: flex;">
                                            <div style="width: 100%; margin-right: 50px; ">
                                                <label for="formFile" class="form-label">Giá tiền</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">VND</span>
                                                    <input type="number" class="form-control" name="price">
                                                </div>
                                            </div>
                                            <div> <label for="formFile" class="form-label">SALE</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">%</span>
                                                    <input type="number" class="form-control" name="sale">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Ảnh sản phẩm</label>
                                            <input type="file" class="form-control" id="fileInput" onchange="displayImage()" name="img">
                                        </div>
                                        <div><img id="selectedImage" alt="" height="150px" class="rounded float-start"></div>

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
                                                        ?>
                                                            <td><input style="border: 0px; height: 30px; width: 100%;" value="0" type="number" min="0" name="<?= $id_color . $id_size ?>"></td>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit" style="width: 100%;" name="xn_add">Xác nhận thêm sản phẩm</button>
                                        </div>
                                    </form>
                                    <?php
                                    if (isset($_POST['xn_add'])) {
                                        $danhmuc = $_POST['danhmuc'];
                                        $name = $_POST['name'];
                                        $mota = $_POST['mota'];
                                        $price = $_POST['price'];
                                        $sale = $_POST['sale'];
                                        $img = $_FILES['img']['name'];
                                        $path = $img_path . "sanpham/" . $_FILES['img']['name'];
                                        $file = $_FILES['img']['tmp_name'];
                                        $masp = time();
                                        move_uploaded_file($file, $path);
                                        $sql = "INSERT INTO `sanpham` (`name`, `price`, `img`, `mota`, `iddm`, `sale`, `trangthai`, `masp`) VALUES ('$name', '$price', '$img', '$mota', '$danhmuc','$sale', '1', '$masp');";
                                        pdo_execute($sql);
                                        $sql2 = "SELECT id FROM sanpham where masp=$masp";
                                        $idsp_add = pdo_query_one($sql2);
                                        $idspadd = $idsp_add['id'];
                                        $sql1 = "SELECT * FROM size ";
                                        $sql2 = "SELECT * FROM color";
                                        $tongsize =  pdo_query($sql1);
                                        $tongcolor = pdo_query($sql2);
                                        foreach ($tongsize as $key => $value1) {
                                            foreach ($tongcolor as $key => $value2) {
                                              '<br>'.   $slbienthe = $_POST[$value1['id'] . $value2['id']];
                                              '<br>'.   $mabt = $value1['id'] . "_" . $value2['id'];
                                              '<br>'.   $idsize = $value1['id'];
                                              '<br>'.   $idcolor = $value2['id'];
                                                $sql3 = "INSERT INTO `bienthe` (`id`, `idsp`, `idcolor`, `idsize`, `soluong`, `mabienthe`) VALUES (NULL, '$idspadd', '$idcolor', ' $idsize', '$slbienthe', '$mabt');";
                                                pdo_execute($sql3);
                                            }
                                        }
                                    }
                                    ?>
                                    <p><br></p>
                                    <p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

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