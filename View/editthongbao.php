<main>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $sql = "SELECT * FROM thongbao where id=$id";
    $load_value = pdo_query_one($sql);
    if (isset($_POST['xn_add'])) {
        $Header = $_POST['Header'];
        $noidung = $_POST['noidung'];
        $img = $_FILES['img']['name'];
        $path = $img_path . "slider/" . $_FILES['img']['name'];
        $file = $_FILES['img']['tmp_name'];
        move_uploaded_file($file, $path);
        if ($Header != "" && $noidung != "") {
            if ($file) {
                $sql = "UPDATE `thongbao` SET `img` = '$img', `header` = '$Header', `noidung` = '$noidung' WHERE `thongbao`.`id` = $id;";
            }else {
                $sql = "UPDATE `thongbao` SET `header` = '$Header', `noidung` = '$noidung' WHERE `thongbao`.`id` = $id;";

            }
            pdo_execute($sql);
            header("Location: index.php?act=thongbao");
        } else {
            if ($Header == "" || empty($Header)) {
                $err1 = '
                                <p style="color: red;">* Vui lòng không bỏ trống</p>
                                            ';
            }
            if ($noidung == "" || empty($noidung)) {
                $err2 = '
                                <p style="color: red;">* Vui lòng không bỏ trống</p>
                                            ';
            }
        }
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
                                    <h3>Edit thongbao</h3>

                                    <p><br></p>
                                    <form action="" method="POST" enctype="multipart/form-data">

                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Header 1</label>
                                            <?php
                                            if (isset($err1)) {
                                                echo $err1;
                                            }
                                            ?>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Header"><?= $load_value['header'] ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Header 2</label>
                                            <?php
                                            if (isset($err2)) {
                                                echo $err2;
                                            }
                                            ?>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="noidung"><?= $load_value['noidung'] ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Ảnh sản phẩm</label>
                                            <input type="file" class="form-control" id="fileInput" onchange="displayImage()" name="img">
                                        </div>
                                        <div class="mb-3">
                                            <div style="display: flex; justify-content: space-around; ">
                                                <label for="">Ảnh cũ</label>
                                                <div><img src="<?= $img_path ?>thongbao/<?=$load_value['img']?>" alt="" height=" 150px" class="rounded float-start"></div>
                                                <label for="">Ảnh mới</label>
                                                <div><img id="selectedImage" alt="" height="150px" class="rounded float-start"></div>
                                            </div>
                                          
                                        </div>
                                        <div>
                                            <div style="margin: 100px;"><img id="selectedImage" alt="" height="150px" class="rounded float-start"></div>
                                        </div>

                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary" type="submit" style="width: 100%;" name="xn_add">Xác nhận thêm sản phẩm</button>
                                </div>
                                </form>

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