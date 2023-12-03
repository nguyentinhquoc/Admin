<?php 
include "../../model/pdo.php";
include "../gloabal.php";
if (isset($_POST['id_delete'])) {
    $id_delete = $_POST['id_delete'];
    $sql = "DELETE FROM banner WHERE `banner`.`id` = $id_delete";
    pdo_execute($sql);
} ?>
<thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">ẢNH BANNER</th>
        <th scope="col">Header 1</th>
        <th scope="col">Header 2</th>
        <th scope="col">Header 3</th>
        <th scope="col">Chức năng</th>
    </tr>
</thead>
<tbody>
    <?php
    $sql = "SELECT * FROM banner";
    $load_banner = pdo_query($sql);
    foreach ($load_banner as $key => $value) { ?>
        <tr>
            <th scope="row"><?= $key + 1 ?></th>
            <td><img src="<?= $img_path ?>slider/<?= $value['img'] ?>" alt="" width="100px"></td>
            <td><?= $value['h1'] ?></td>
            <td><?= $value['h2'] ?></td>
            <td><?= $value['h3'] ?></td>
            <td><a href="index.php?act=editbanner&id=<?= $value['id'] ?>">Sửa</a>
                <p onclick="delete_banner(<?= $value['id'] ?>)">Xóa</p>
            </td>
        </tr>
    <?php
    }
    ?>
</tbody>