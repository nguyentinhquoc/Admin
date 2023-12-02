<?php
function upload_danhmuc(){
    $sql="SELECT * FROM danhmuc";
    $upload_danhmuc=pdo_query($sql);
    return $upload_danhmuc;
}
?>