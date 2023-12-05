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
                                    <h3>Thêm mới sản phẩm.</h3>
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

                                        <div class="mb-3">
                                            <div id="box_bt"></div>
                                            

                                                <a class="btn btn-primary" onclick="thembt()">Thêm biến thể sản phẩm</a>
                                            </div>
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
                                        move_uploaded_file($file, $path);
                                        if ($file) {
                                            $sql = "UPDATE `sanpham` SET `name` = '$name',`iddm`='$danhmuc',`mota`='$mota',`sale`='$sale',`price`='$price',`img`='$img' WHERE `sanpham`.`id` = $id;";
                                        } else {
                                            $sql = "UPDATE `sanpham` SET `name` = '$name',`iddm`='$danhmuc',`mota`='$mota',`sale`='$sale',`price`='$price' WHERE `sanpham`.`id` = $id;";
                                        }
                                        pdo_execute($sql);
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

            </div>

        </div>
        <div id="box_bt"></div>

        <script>
            function thembt() {
                var box_bt = document.getElementById("box_bt");
                box_bt.innerHTML += `<div style="display: flex; ">
                                                <div style="width: 40%;">
                                                    <label for="formFile" class="form-label">Chọn màu: </label>
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                                <div style="width: 40%;">
                                                    <label for="formFile" class="form-label">Chọn size: </label>
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option value="3">Three</option>
                                                        </select>
                                                </div>
                                                    <div style="width: 10%;">
                                                        <label for="formFile" class="form-label">Số lượng</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">SL</span>
                                                            <input type="number" class="form-control" name="soluong">
                                                        </div>
                                                    </div>
                                                </div>
`;
            }


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