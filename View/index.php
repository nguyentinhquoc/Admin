<?php
ob_start();
session_start();
include "gloabal.php";
include "../model/pdo.php";
include "../model/star.php";
include "../model/danhmuc.php";
include "../model/binhluan.php";
include "../model/delete_bl.php";
include "../model/taikhoan.php";
include "../model/sanpham.php";
include "../model/thongbao.php";
include "../model/vocher.php";
include "../model/donhang.php";
include "header.php";
if (!isset($_GET["act"])) {
    include("home.php");
} else {
    $act = $_GET["act"];
    switch ($act) {
        case 'cskh':
            include "cskh.php";
            break;
        case 'myaccout':
            include "mytk.php";
            break;
        case "dangxuat":
            unset($_SESSION['email_dn']);
            header('location: ../../../../User/view/index.php?act=dangxuat');
            break;
        case "muahang":
            header('location: ../../../../User/view/index.php');
            break;
        case 'quanli_binhluan':
            include "binhluan.php";
            break;
        case 'chitietsp':
            include "chitietsp.php";
            break;
        case 'editthongbao':
            include "editthongbao.php";
            break;
        case 'addthongbao':
            include "addthongbao.php";
            break;
        case 'addbanner':
            include "addbanner.php";
            break;
        case 'editbanner':
            include "editbanner.php";
            break;
        case 'banner':
            include "banner.php";
            break;
        case 'chitietdh':
            include "chitietdh.php";
            break;
        case 'addsp':
            include "addsp.php";
            break;
        case 'sanpham':
            include "sanpham.php";
            break;
        case 'thongbao':
            include "thongbao.php";
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
        case 'editsp':
            include "editsp.php";
            break;
        default:
            break;
    }
}
include "footer.php";
