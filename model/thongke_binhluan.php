<?php
// function load_thongke_sanpham_danhmuc(){
//     $sql="SELECT danhmuc.id,danhmuc.name,COUNT(*)  'soluong', MIN(price) 'gia_min', Max(price)  'gia_max', AVG(price)  'giatrungbinh'
//     FROM danhmuc
//     JOIN sanpham
//     ON danhmuc.id = sanpham.iddm
//     GROUP BY danhmuc.id,danhmuc.name
//     ORDER BY soluong DESC"
//     return pdo_query($sql);
// }
// thống kê sanr pham and danh muc,lấy ra tổng giá min giá max và giá trung bình sphan
// group by là lấy điểm chung của 2 bên danh mục và sản phẩm
function load_thongke_binhluan(){
   $sql = "SELECT binhluan.id,taikhoan.name 'nameuser',binhluan.comment,sanpham.name,binhluan.date 
   FROM `taikhoan` 
   JOIN binhluan on binhluan.iduser=taikhoan.id 
   JOIN sanpham on binhluan.idsp = sanpham.id 
   ORDER BY binhluan.date DESC";
   $load_thongke_binhluan = pdo_query($sql);
   return $load_thongke_binhluan;

}

