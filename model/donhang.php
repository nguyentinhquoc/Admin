<?php
function upload_dh($trangthai){
    if ($trangthai=="") {
    $sql="SELECT phanloaidh.id,taikhoan.name 'user',taikhoan.tel, chitietdh.date,trangthai.id 'idtt',chitietdh.date,trangthai.trangthai,chitietdh.thanhtien,chitietdh.madh FROM phanloaidh JOIN chitietdh ON phanloaidh.madh=chitietdh.madh JOIN trangthai ON trangthai.id=phanloaidh.idtrangthai JOIN taikhoan ON taikhoan.id=phanloaidh.iduser WHERE phanloaidh.idtrangthai = '3' OR phanloaidh.idtrangthai = '4' OR phanloaidh.idtrangthai = '5' OR phanloaidh.idtrangthai = '6' GROUP BY phanloaidh.madh ";
        
    }else{
    $sql="SELECT phanloaidh.id,taikhoan.name 'user',taikhoan.tel, chitietdh.date,chitietdh.date ,trangthai.id 'idtt',trangthai.trangthai,chitietdh.thanhtien,chitietdh.madh FROM phanloaidh JOIN chitietdh ON phanloaidh.madh=chitietdh.madh JOIN trangthai ON trangthai.id=phanloaidh.idtrangthai JOIN taikhoan ON taikhoan.id=phanloaidh.iduser WHERE phanloaidh.idtrangthai = '$trangthai' GROUP BY phanloaidh.madh ";
}
    $upload_dh= pdo_query($sql);
    return $upload_dh;
}
function chitietdh_sp($madh){
$sql="SELECT sanpham.name,size.size,color.color,phanloaidh.soluong,sanpham.price FROM `sanpham` JOIN bienthe ON bienthe.idsp=sanpham.id JOIN phanloaidh ON phanloaidh.bienthe=bienthe.id JOIN size ON size.id=bienthe.idsize JOIN color ON color.id=bienthe.idcolor where phanloaidh.madh=$madh";
$chitietdh_sp=pdo_query($sql);
return $chitietdh_sp;
}
function chitietdh_tt($madh){
$sql="SELECT chitietdh.hoten,chitietdh.sdt,chitietdh.diachi,chitietdh.sale,chitietdh.thanhtoan,chitietdh.thanhtien,chitietdh.madh,chitietdh.date FROM chitietdh JOIN phanloaidh ON phanloaidh.madh=chitietdh.madh JOIN taikhoan ON taikhoan.id=phanloaidh.iduser where phanloaidh.madh=$madh GROUP BY phanloaidh.madh";
$chitietdh_tt=pdo_query_one($sql);
return $chitietdh_tt;
}
// SELECT chitietdh.date,taikhoan.name'user',taikhoan.email, phanloaidh.madh FROM phanloaidh JOIN chitietdh ON phanloaidh.madh=chitietdh.madh JOIN taikhoan ON taikhoan.id=phanloaidh.iduser JOIN bienthe ON bienthe.id=phanloaidh.bienthe JOIN sanpham ON sanpham.id=bienthe.idsp JOIN size ON size.id=bienthe.idsize JOIN color ON color.id=bienthe.idcolor join trangthai ON phanloaidh.idtrangthai=trangthai.id 

?>