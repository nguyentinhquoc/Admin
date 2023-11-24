<?php
// lấy id của bình luận cần xóa
if (isset($_GET['$binhluan_id'])) {
    $binhluan_id=$_GET['binhluan_id'];
    //sql delete
    $sql="DELETE FROM binhluan WHERE binhluan_id=$binhluan_id";
    pdo_execute($sql);
    //
    echo("xóa cmt thành công");
    header("location :index.php");
}
?>
