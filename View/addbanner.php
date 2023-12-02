<main>
    <?php
    if (isset($_POST['xn_add'])) {
        $Header1 = $_POST['Header1'];
        $Header2 = $_POST['Header2'];
        $Header3 = $_POST['Header3'];
        $img = $_FILES['img']['name'];
        $path = $img_path . "slider/" . $_FILES['img']['name'];
        $file = $_FILES['img']['tmp_name'];
        if ($file && $Header1 != "" && $Header2 != "" && $Header3 != "") {
            move_uploaded_file($file, $path);
            $sql = "INSERT INTO `banner` (`img`, `h1`, `h2`, `h3`) VALUES ('$img', '$Header1', '$Header2', '$Header3');";
            pdo_execute($sql);
        } else {
            if ($Header1 == "" || empty($Header1)) {
                $err1 = '
                                <p style="color: red;">* Vui lòng không bỏ trống</p>
                                            ';
            }
            if ($Header2 == "" || empty($Header2)) {
                $err2 = '
                                <p style="color: red;">* Vui lòng không bỏ trống</p>
                                            ';
            }
            if ($Header3 == "" || empty($Header3)) {
                $err3 = '
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
                                    <h3>Thêm mới banner</h3>

                                    <p><br></p>
                                    <form action="" method="POST" enctype="multipart/form-data">

                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Header 1</label>
                                            <?php
                                            if (isset($err1)) {
                                                echo $err1;
                                            }
                                            ?>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Header1"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Header 2</label>
                                            <?php
                                            if (isset($err2)) {
                                                echo $err2;
                                            }
                                            ?>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Header2"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Header 3</label>
                                            <?php
                                            if (isset($err3)) {
                                                echo $err3;
                                            }
                                            ?>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Header3"></textarea>
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