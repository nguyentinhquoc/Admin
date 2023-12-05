<?php
function upload_sanpham($search,$trangthai){
    if ($trangthai == 2) {
        $sql="SELECT * FROM sanpham WHERE sanpham.name LIKE '%$search%'  ORDER BY id ASC ";
    } else{
        $sql="SELECT * FROM sanpham WHERE sanpham.name LIKE '%$search%' and sanpham.trangthai = $trangthai  ORDER BY id ASC ";
    }
    $upload_sanpham=pdo_query($sql);
    return $upload_sanpham;
}
function upload_sanpham_id($id){
    $sql="SELECT * FROM sanpham WHERE sanpham.id = $id";
    $upload_sanpham_id=pdo_query_one($sql);
    return $upload_sanpham_id;
}
?>