<?php
function load_thongke_sanpham_danhmuc(){
    $sql="SELECT danhmuc.id,danhmuc.name,COUNT(*)  'soluong', MIN(price) 'gia_min', Max(price)  'gia_max', AVG(price)  'giatrungbinh'
    FROM danhmuc
    JOIN sanpham
    ON danhmuc.id = sanpham.iddm
    GROUP BY danhmuc.id,danhmuc.name
    ORDER BY soluong DESC"
    return pdo_query($sql);
}
// thống kê sanr pham and danh muc,lấy ra tổng giá min giá max và giá trung bình sphan
// group by là lấy điểm chung của 2 bên danh mục và sản phẩm
function load_thongke_binhluan(){
   $sql = "SELECT sanpham.id,sanpham.name,COUNT(*) as soluong,MIN(binhluan.date)
   as ngay_min , Max(binhluan.date)as ngay_max
   FROM binhluan    
   JOIN sanpham
   ON sanpham.id=binhluan.idsp
   GROUP BY sanpham.id
   ORDER BY soluong DESC";
   return pdo_query($sql);

}

<!-- thống kê theo bảng sp -->

load_thongke_binhluan();
load_thongke_sanpham_danhmuc();