<?php
ob_start();
include("../model/pdo.php");
include "../model/thongke_binhluan.php";
include "../model/delete_bl.php";
include "../model/taikhoan.php";
include "../model/sanpham.php";
include "../model/vocher.php";
include "header.php";
$act = $_GET["act"];
if (!isset($_GET["act"])) {
    include("uploadsp.php");
} else {
    switch ($act) {
        case 'quanli_binhluan':
            include "binhluan.php";
            break;
        case 'chat':
            include "chat.php";
            break;
        case 'taikhoan':
            include "taikhoan.php";
            break;
        case 'vocher':
            include "vocher.php";
            break;
        case 'donhang':
            include "donhang.php";
            break;
        default:
            break;
    }
}
include "footer.php";
