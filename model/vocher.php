<?php
function upload_vocher(){
    $sql="SELECT vocher.id 'idvocher',taikhoan.name,vocher.date,vocher.sale  FROM `vocher` JOIN taikhoan ON vocher.iduser=taikhoan.id";
    $upload_vocher=pdo_query($sql);
    return $upload_vocher;
}
function xoa_vocher($id){
    $sql="DELETE FROM vocher WHERE `vocher`.`id` = $id";
    $xoa_vocher=pdo_execute($sql);
    return $xoa_vocher;
}
?>