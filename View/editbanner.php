<main>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $sql = "SELECT * FROM banner where id=$id";
    $load_value = pdo_query_one($sql);
    if (isset($_POST['xn_add'])) {
        $Header1 = $_POST['Header1'];
        $Header2 = $_POST['Header2'];
        $Header3 = $_POST['Header3'];
        $img = $_FILES['img']['name'];
        $path = $img_path . "slider/" . $_FILES['img']['name'];
        $file = $_FILES['img']['tmp_name'];
        move_uploaded_file($file, $path);
        if ($Header1 != "" && $Header2 != "" && $Header3 != "") {
            if ($file) {
                $sql = "UPDATE `banner` SET `img` = '$img', `h1` = '$Header1', `h2` = '$Header2', `h3` = '$Header3' WHERE `banner`.`id` = $id;";
            }else {
                $sql = "UPDATE `banner` SET `h1` = '$Header1', `h2` = '$Header2', `h3` = '$Header3' WHERE `banner`.`id` = $id;";

            }
            pdo_execute($sql);
            header("Location: index.php?act=banner");
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
                                    <h3>Edit banner</h3>

                                    <p><br></p>
                                    <form action="" method="POST" enctype="multipart/form-data">

                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Header 1</label>
                                            <?php
                                            if (isset($err1)) {
                                                echo $err1;
                                            }
                                            ?>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Header1"><?= $load_value['h1'] ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Header 2</label>
                                            <?php
                                            if (isset($err2)) {
                                                echo $err2;
                                            }
                                            ?>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Header2"><?= $load_value['h2'] ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Header 3</label>
                                            <?php
                                            if (isset($err3)) {
                                                echo $err3;
                                            }
                                            ?>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Header3"><?= $load_value['h3'] ?></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Ảnh sản phẩm</label>
                                            <input type="file" class="form-control" id="fileInput" onchange="displayImage()" name="img">
                                        </div>
                                        <div class="mb-3">
                                            <div style="display: flex; justify-content: space-around; ">
                                                <label for="">Ảnh cũ</label>
                                                <div><img src="<?= $img_path ?>slider/<?=$load_value['img']?>" alt="" height=" 150px" class="rounded float-start"></div>
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