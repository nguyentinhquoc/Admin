
<?php
include "../../model/pdo.php";
include "../../model/vocher.php";

if (isset($_POST['id_delete'])) {
    $id_delete=$_POST['id_delete'];
    xoa_vocher($id_delete);
 }
?>
<thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Họ và tên</th>
        <th scope="col">Giá trị vocher</th>
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
            <td>
                <p style="cursor: pointer; color: red; font-weight: bolder;"  onclick="delete_vocher(<?= $value['idvocher'] ?>)">Xóa vocher</p>
            </td>

        </tr>
    <?php
    }
    ?>
</tbody>
