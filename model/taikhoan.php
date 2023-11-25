<?php
function upload_taikhoan(){
    $sql="Select * from taikhoan";
    $upload_taikhoan=pdo_query($sql);
    return $upload_taikhoan;
}
function khoa_taikhoan($id){
$sql="UPDATE `taikhoan` SET `trangthai` = '0' WHERE `taikhoan`.`id` = $id;";
$khoa_taikhoan=pdo_execute($sql);
return $khoa_taikhoan;
}
function mokhoa_taikhoan($id){
$sql="UPDATE `taikhoan` SET `trangthai` = '1' WHERE `taikhoan`.`id` = $id;";
$mokhoa_taikhoan=pdo_execute($sql);
return $mokhoa_taikhoan;
}
function capquyen_taikhoan($id){
$sql="UPDATE `taikhoan` SET `role` = '2' WHERE `taikhoan`.`id` = $id;";
$capquyen_taikhoan=pdo_execute($sql);
return $capquyen_taikhoan;
}
function huyquyen_taikhoan($id){
$sql="UPDATE `taikhoan` SET `role` = '1' WHERE `taikhoan`.`id` = $id;";
$huyquyen_taikhoan=pdo_execute($sql);
return $huyquyen_taikhoan;
}
?>