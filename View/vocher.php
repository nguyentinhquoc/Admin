<?php
if (isset($_GET['idvocher'])) {
   $idvocher=$_GET['idvocher'];
   xoa_vocher($idvocher);
}
?>
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Quản lý Vocher</h4>
                            <p class="text-muted font-14 mb-3">
                               Dưới đây là bảng quản lí tất cả các Vocher
                            </p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Họ và tên</th>
                                        <th scope="col">Giá trị vocher</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $upload_vocher = upload_vocher();
                                    foreach ($upload_vocher as $key => $value) { ?>
                                        <tr>
                                            <th scope="row"><?= $key + 1 ?></th>
                                            <td><?= $value['name'] ?></td>
                                            <td><?= $value['sale'] ?></td>
                                            <td><?= $value['date'] ?></td>
                                            <td>
                                            <?php $idvocher=$value['idvocher'] ?>
                                               <a href="index.php?act=vocher&idvocher=<?=$idvocher?>">Xóa vocher</a>
                                            </td>

                                        </tr>
                                    <?php
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