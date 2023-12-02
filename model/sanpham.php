<?php
function upload_sanpham($search){
    $sql="SELECT * FROM sanpham WHERE sanpham.name LIKE '%$search%'  ORDER BY id ASC ";
    $upload_sanpham=pdo_query($sql);
    return $upload_sanpham;
}
function upload_sanpham_id($id){
    $sql="SELECT * FROM sanpham WHERE sanpham.id = $id";
    $upload_sanpham_id=pdo_query_one($sql);
    return $upload_sanpham_id;
}
?>