<?php
ob_start();
include("../model/pdo.php");
include "../model/thongke_binhluan.php";
include "../model/delete_bl.php";
include "header.php";
$act = $_GET["act"];
if (!isset($_GET["act"])) {
    include("home.php");
} else {
    switch ($act) {
        case 'quanli_binhluan':
            include "binhluan.php";
            break;
        case 'chat':
            include "chat.php";
            break;
        default:
            break;
    }
}
include "footer.php";
