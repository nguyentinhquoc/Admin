<?php
include "../../model/pdo.php";
include "../gloabal.php";

if (isset($_POST['id_delete'])) {
    $id_delete = $_POST['id_delete'];
    $sql = "DELETE FROM thongbao WHERE `thongbao`.`id` = $id_delete";
    pdo_execute($sql);
}
?><thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">ẢNH BANNER</th>
        <th scope="col">Header</th>
        <th scope="col">Nội dung</th>
    </tr>
</thead>
<tbody>
    <?php
    $sql = "SELECT * FROM thongbao";
    $load_thongbao = pdo_query($sql);

    foreach ($load_thongbao as $key => $value) { ?>
        <tr>
            <th scope="row"><?= $key + 1 ?></th>
            <td><img src="<?= $img_path ?>thongbao/<?= $value['img'] ?>" alt="" width="100px"></td>
            <td><?= $value['header'] ?></td>
            <td><?= $value['noidung'] ?></td>
            <td><a href="index.php?act=edittb&id=<?= $value['id'] ?>">Sửa</a> <a onclick="return delete_thongbao(<?= $value['id'] ?>)">Xóa</a> </td>
        </tr>
    <?php
    }

    ?>
</tbody>