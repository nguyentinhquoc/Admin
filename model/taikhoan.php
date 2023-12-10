<?php
function upload_taikhoan($role)
{
    if ($role == 0) {
        $sql = "Select * from taikhoan ";
    } else {
        $sql = "Select * from taikhoan where role=$role";
    }
    $upload_taikhoan = pdo_query($sql);
    return $upload_taikhoan;
}
function khoa_taikhoan($id)
{
    $sql = "UPDATE `taikhoan` SET `trangthai` = '0' WHERE `taikhoan`.`id` = $id;";
    $khoa_taikhoan = pdo_execute($sql);
    return $khoa_taikhoan;
}
function mokhoa_taikhoan($id)
{
    $sql = "UPDATE `taikhoan` SET `trangthai` = '1' WHERE `taikhoan`.`id` = $id;";
    $mokhoa_taikhoan = pdo_execute($sql);
    return $mokhoa_taikhoan;
}
function capquyen_taikhoan($id)
{
    $sql = "UPDATE `taikhoan` SET `role` = '2' WHERE `taikhoan`.`id` = $id;";
    $capquyen_taikhoan = pdo_execute($sql);
    return $capquyen_taikhoan;
}
function huyquyen_taikhoan($id)
{
    $sql = "UPDATE `taikhoan` SET `role` = '1' WHERE `taikhoan`.`id` = $id;";
    $huyquyen_taikhoan = pdo_execute($sql);
    return $huyquyen_taikhoan;
}
function taikhoan_email($email)
{
    $sql = "SELECT * FROM taikhoan where email='$email'";
    $taikhoan_email = pdo_query_one($sql);
    return $taikhoan_email;
}
function doipass($pass_new, $email_old)
{
    $sql = "UPDATE `taikhoan` SET `pass` = '$pass_new' WHERE `taikhoan`.`email` = '$email_old';";
    $doipass = pdo_execute($sql);
    return $doipass;
}
function taikhoan_update($img_new, $email_new, $tel_new, $address_new, $email_old)
{
    if (!empty($img_new)) {
        $sql = "UPDATE `taikhoan` SET `email` = '$email_new', `address` = '$address_new', `tel` = '$tel_new' , `img` = '$img_new' WHERE `taikhoan`.`email` = '$email_old';";
    } else {
        $sql = "UPDATE `taikhoan` SET `email` = '$email_new', `address` = '$address_new', `tel` = '$tel_new'   WHERE `taikhoan`.`email` = '$email_old';";
    }
    $taikhona_update = pdo_execute($sql);
    return $taikhona_update;
}function taikhoan_all()
{
    $sql = "SELECT * FROM taikhoan";
    $taikhoan_all = pdo_query($sql);
    return $taikhoan_all;
}
