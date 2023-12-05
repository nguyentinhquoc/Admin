<main>
    <?php
    if (isset($_POST['xn_add'])) {
        $Header = $_POST['Header'];
        $noidung = $_POST['noidung'];
        $img = $_FILES['img']['name'];
        $path = $img_path . "thongbao/" . $_FILES['img']['name'];
        $file = $_FILES['img']['tmp_name'];
        if ($file && $Header != "" && $noidung != "") {
            move_uploaded_file($file, $path);
            $sql = "INSERT INTO `thongbao` (`id`, `img`, `header`, `noidung`) VALUES (NULL, ' $img', '$Header', '$noidung');";
            pdo_execute($sql);
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
          
            if ($img == "" || empty($img)) {
                $err4 = '
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
                                    <h3>Thêm mới thông báo</h3>

                                    <p><br></p>
                                    <form action="" method="POST" enctype="multipart/form-data">

                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Header</label>
                                            <?php
                                            if (isset($err1)) {
                                                echo $err1;
                                            }
                                            ?>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Header"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                                            <?php
                                            if (isset($err2)) {
                                                echo $err2;
                                            }
                                            ?>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="noidung"></textarea>
                                        </div>



                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Ảnh banner</label>
                                            <input type="file" class="form-control" id="fileInput" onchange="displayImage()" name="img">
                                            <?php
                                            if (isset($err4)) {
                                                echo $err4;
                                            }
                                            ?>
                                        </div>
                                        <div>
                                            <div style="margin: 100px;"><img id="selectedImage" alt="" height="150px" class="rounded float-start"></div>
                                        </div>

                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary" type="submit" style="width: 100%;" name="xn_add">Xác nhận thêm thông báo</button>
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