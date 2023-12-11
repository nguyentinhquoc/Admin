<?php
function upload_dh($trangthai,$search){
    if ($search == "" || empty($search)) {
        if ($trangthai == "") {
            $sql = "SELECT phanloaidh.id, taikhoan.name 'user', taikhoan.tel, chitietdh.date, trangthai.id 'idtt', chitietdh.date, trangthai.trangthai, chitietdh.thanhtien, chitietdh.madh 
                    FROM phanloaidh 
                    JOIN chitietdh ON phanloaidh.madh = chitietdh.madh 
                    JOIN trangthai ON trangthai.id = phanloaidh.idtrangthai 
                    JOIN taikhoan ON taikhoan.id = phanloaidh.iduser 
                    WHERE phanloaidh.idtrangthai IN ('3', '4', '5', '6') 
                    GROUP BY phanloaidh.madh";
        } else {
            $sql = "SELECT phanloaidh.id, taikhoan.name 'user', taikhoan.tel, chitietdh.date, chitietdh.date, trangthai.id 'idtt', trangthai.trangthai, chitietdh.thanhtien, chitietdh.madh 
                    FROM phanloaidh 
                    JOIN chitietdh ON phanloaidh.madh = chitietdh.madh 
                    JOIN trangthai ON trangthai.id = phanloaidh.idtrangthai 
                    JOIN taikhoan ON taikhoan.id = phanloaidh.iduser 
                    WHERE phanloaidh.idtrangthai = '$trangthai' 
                    GROUP BY phanloaidh.madh";
        }
    } elseif ($search != "") {
        if ($trangthai == "") {
            $sql = "SELECT phanloaidh.id, taikhoan.name 'user', taikhoan.tel, chitietdh.date, trangthai.id 'idtt', chitietdh.date, trangthai.trangthai, chitietdh.thanhtien, chitietdh.madh 
                    FROM phanloaidh 
                    JOIN chitietdh ON phanloaidh.madh = chitietdh.madh 
                    JOIN trangthai ON trangthai.id = phanloaidh.idtrangthai 
                    JOIN taikhoan ON taikhoan.id = phanloaidh.iduser 
                    WHERE (phanloaidh.idtrangthai IN ('3', '4', '5', '6')) AND phanloaidh.madh LIKE '%$search%' 
                    GROUP BY phanloaidh.madh";
        } else {
            $sql = "SELECT phanloaidh.id, taikhoan.name 'user', taikhoan.tel, chitietdh.date, chitietdh.date, trangthai.id 'idtt', trangthai.trangthai, chitietdh.thanhtien, chitietdh.madh 
                    FROM phanloaidh 
                    JOIN chitietdh ON phanloaidh.madh = chitietdh.madh 
                    JOIN trangthai ON trangthai.id = phanloaidh.idtrangthai 
                    JOIN taikhoan ON taikhoan.id = phanloaidh.iduser 
                    WHERE (phanloaidh.idtrangthai = '$trangthai') AND phanloaidh.madh LIKE '%$search%' 
                    GROUP BY phanloaidh.madh";
        }
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
// SELECT * FROM `chitietdh` JOIN phanloaidh ON phanloaidh.madh=chitietdh.madh JOIN taikhoan ON phanloaidh.iduser=taikhoan.id WHERE taikhoan.id=17
function load_chitietdh($email,$idtrangthai){
$sql="SELECT chitietdh.madh FROM `chitietdh` JOIN phanloaidh ON phanloaidh.madh=chitietdh.madh JOIN taikhoan ON phanloaidh.iduser=taikhoan.id  WHERE taikhoan.email='$email' and phanloaidh.idtrangthai=$idtrangthai GROUP BY chitietdh.madh";
$load_chitietdh=pdo_query($sql);
return $load_chitietdh;
}
function load_chitietdh_sp($madh){
$sql="SELECT sanpham.id,sanpham.img,sanpham.name,sanpham.price,phanloaidh.soluong,size.size,color.color,chitietdh.sale,chitietdh.thanhtien,bienthe.id 'idbt',phanloaidh.id 'idpl',phanloaidh.danhgia 'danhgia' From phanloaidh JOIN bienthe on phanloaidh.bienthe=bienthe.id JOIN sanpham ON sanpham.id=bienthe.idsp JOIN chitietdh ON chitietdh.madh=phanloaidh.madh JOIN color ON color.id=bienthe.idcolor JOIN size ON size.id=bienthe.idsize WHERE phanloaidh.madh=$madh;";
$load_chitietdh_sp=pdo_query($sql);
return $load_chitietdh_sp;
}
?>