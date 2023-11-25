<?php
function upload_sanpham(){
    $sql="SELECT * FROM sanpham";
    $upload_sanpham=pdo_query($sql);
    return $upload_sanpham;
}
?>