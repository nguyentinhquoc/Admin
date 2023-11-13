<?php
session_start();

include '../model/pdo.php';
include '../model/danhmuc.php';
include '../model/sanpham.php';
include '../model/khachhang.php';
include '../model/binhluan.php';
include '../model/thongke.php';

$list_danhmuc = list_danhmuc('');
$list_kh = list_kh('');
$list_sanpham = list_sanpham('', 0);
$list_top10 = list_top();
$list_sanpham_home = list_sanpham_home();
$thongke = thongke_sp_dm();

if (!isset($_SESSION['active']) || $_SESSION['active'] != 1) {
    header('location: ../index.php');
}

include 'header.php';

if (isset($_GET['act']) && $_GET['act'] != '') {
    $act = $_GET['act'];
    switch ($act) {
        case 'thongke':
            include 'thongke/list.php';
            break;

        case 'bieudo':
            if (isset($_GET['chart']) && $_GET['chart'] != '') {
                $chart = $_GET['chart'];
                if ($chart == 'gia_min') {
                    include 'thongke/chart/gia_min.php';
                    include 'thongke/bieudo.php';
                } else if ($chart == 'gia_max') {
                    include 'thongke/chart/gia_max.php';
                    include 'thongke/bieudo.php';
                } else {
                    include 'thongke/chart/soluong.php';
                    include 'thongke/bieudo.php';
                }
            } else {
                include 'thongke/chart/soluong.php';
                include 'thongke/bieudo.php';
            }
            break;

            // DANH MỤC 
        case 'adddm':
            if (isset($_POST['themmoi'])) {
                $ten = $_POST['tenloai'];
                $same = 0;
                foreach ($list_danhmuc as $dm) {
                    if ($ten == $dm['name']) {
                        $thongbao = 'Tên danh mục đã tồn tại !';
                        $same = 1;
                    }
                }

                if ($same == 0) {
                    add_danhmuc($_POST['tenloai'], '');
                    $_SESSION['add'] = 'listdm';
                    header('location: index.php?act=listdm');
                }
            }
            include 'danhmuc/add.php';
            break;

        case 'listdm':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = '';
            }
            $list_danhmuc = list_danhmuc($kyw);
            include 'danhmuc/list.php';
            break;

        case 'xoadm':
            //  Xóa danh mục khi chọn nút xóa
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
                $_SESSION['delete'] = '1';
            }

            //  Xóa danh mục khi chọn checkbox
            else {
                if (isset($_POST['delete_checkbox']) && isset($_POST['checkbox'])) {
                    delete_checkbox_danhmuc($_POST['checkbox']);
                    $_SESSION['delete'] = '1';
                } else {
                    $_SESSION['checkbox_err'] = '1';
                }
            }

            // Hiển thị lại danh sách
            $listdanhmuc = list_danhmuc('');
            include 'danhmuc/list.php';
            break;

        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = edit_danhmuc($_GET['id']);
            }
            include 'danhmuc/update.php';
            break;

        case 'updatedm':
            if (isset($_POST['update'])) {
                if (isset($_POST['tenloai']) && $_POST['tenloai'] !== '') {
                    update_danhmuc($_POST['tenloai'], $_POST['id']);
                    $_SESSION['edit'] = '1';
                    header('location: index.php?act=listdm');
                }
            }
            include 'danhmuc/add.php';
            break;

            // SẢN PHẨM
        case 'addsp':
            $listdanhmuc = list_danhmuc('');
            if (isset($_POST['themmoi'])) {
                $tensanpham = $_POST['tensp'];
                $danhmuc = $_POST['danhmuc'];
                $giasanpham = $_POST['giasp'];
                $mota = $_POST['mota'];
                $file = $_FILES['anhsp'];
                $file_name = str_replace(' ', '', $file['name']);
                $folder = '../upload/';

                $same = 0;
                foreach ($list_sanpham as $sp) {
                    if ($tensanpham == $sp['name']) {
                        $thongbao = 'Tên sản phẩm đã tồn tại !';
                        $same = 1;
                    }
                }

                // Tạo đường dẫn file
                $target_file = $folder . $file_name;

                if ($same == 0) {
                    if ($danhmuc == 'not_exist') {
                        $_SESSION['dm_err'] = '1';
                    } else if ($danhmuc == '') {
                        $_SESSION['dm_empty'] = '1';
                    } else {
                        move_uploaded_file($file['tmp_name'], $target_file);
                        add_sanpham($danhmuc, $tensanpham, $giasanpham, $file_name, $mota);
                        $_SESSION['add'] = 'listsp';
                        header('location: index.php?act=listsp');
                    }
                }

            }
            include 'sanpham/add.php';
            break;

        case 'listsp':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $listdanhmuc = list_danhmuc('');
            $list_sanpham = list_sanpham($kyw, $iddm);
            include 'sanpham/list.php';
            break;

        case 'xoasp':
            //  Xóa danh mục khi chọn nút xóa
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
                $_SESSION['delete'] = '1';
            } else {
                //  Xóa danh mục khi chọn checkbox
                if (isset($_POST['delete_checkbox']) && isset($_POST['checkbox'])) {
                    delete_checkbox_sanpham($_POST['checkbox']);
                    $_SESSION['delete'] = '1';
                } else {
                    $_SESSION['checkbox_err'] = '1';
                }
            }

            // Hiển thị lại danh sách
            $list_sanpham = list_sanpham('', 0);
            $listdanhmuc = list_danhmuc('');
            include 'sanpham/list.php';
            break;

        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sp = edit_sanpham($_GET['id']);
                $listdanhmuc = list_danhmuc('');
            }
            include 'sanpham/update.php';
            break;

        case 'updatesp':
            if (isset($_POST['update'])) {
                $id = $_POST['id'];
                $name = $_POST['tensp'];
                $price = $_POST['giasp'];
                $iddm = $_POST['danhmuc'];
                $mota = $_POST['mota'];

                if (isset($_FILES['anhsp']) && ($_FILES['anhsp']['size'] > 0)) {
                    $file = $_FILES['anhsp'];
                    // sử dụng str_replace để xóa các khoảng trắng, tránh lỗi chèn src có space trong thẻ img
                    $file_name = str_replace(' ', '', $file['name']);
                    $folder = '../upload/';
                    $target_file = $folder . $file_name;
                    move_uploaded_file($file['tmp_name'], $target_file);
                } else {
                    $file_name = $_POST['anhsp'];
                }
                update_sanpham($id, $iddm, $name, $price, $file_name, $mota);

                $_SESSION['edit'] = '1';
            }
            $listdanhmuc = list_danhmuc('');
            $list_sanpham = list_sanpham('', 0);
            include 'sanpham/list.php';
            break;

            // KHÁCH HÀNG
        case 'addkh':
            if (isset($_POST['themmoi'])) {
                $tkkh = $_POST['tkkh'];
                $mkkh = $_POST['mkkh'];
                $email = $_POST['email'];
                $diachikh = isset($_POST['diachikh']) ? $_POST['diachikh'] : '';
                $sdtkh = $_POST['sdtkh'];
                $vaitro = $_POST['vaitro'];

                $file = $_FILES['anh'];
                $file_name = str_replace(' ', '', $file['name']);
                $folder = '../upload/';

                // Tạo đường dẫn file
                $target_file = $folder . $file_name;

                $same = 0;
                foreach ($list_kh as $kh) {
                    if ($tkkh == $kh['user']) {
                        $same = 1;
                        $thongbao = 'Tài khoản đăng ký đã tồn tại !';
                    }

                    if ($sdtkh == $kh['tel']) {
                        $same = 1;
                        $thongbao = 'SDT đăng ký đã tồn tại !';
                    }

                    if ($email == $kh['email']) {
                        $same = 1;
                        $thongbao = 'Email đăng ký đã tồn tại !';
                    }
                }

                if ($same == 0) {
                    move_uploaded_file($file['tmp_name'], $target_file);
                    add_kh($tkkh, $mkkh, $email, $diachikh, $sdtkh, $vaitro, $file_name);
                    header('location: index.php?act=listkh');
                    $_SESSION['add'] = 'listkh';
                }
            }
            include 'khachhang/add.php';
            break;

        case 'listkh':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = '';
            }
            $list_kh = list_kh($kyw);
            include 'khachhang/list.php';
            break;

        case 'xoakh':
            //  Xóa danh mục khi chọn nút xóa
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_kh($_GET['id']);
                $_SESSION['delete'] = '1';
            } else {
                //  Xóa danh mục khi chọn checkbox
                if (isset($_POST['delete_checkbox']) && isset($_POST['checkbox'])) {
                    delete_checkbox_kh($_POST['checkbox']);
                    $_SESSION['delete'] = '1';
                }
            }

            // Hiển thị lại danh sách
            $list_kh = list_kh('');
            include 'khachhang/list.php';
            break;

        case 'suakh':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $kh = edit_kh($_GET['id']);
            }
            include 'khachhang/update.php';
            break;

        case 'updatekh':
            if (isset($_POST['update'])) {
                $id = $_POST['id'];
                $tkkh = $_POST['tkkh'];
                $mkkh = $_POST['mkkh'];
                $email = $_POST['email'];
                $diachikh = isset($_POST['diachikh']) ? $_POST['diachikh'] : '';
                $sdtkh = $_POST['sdtkh'];
                $vaitro = $_POST['vaitro'];
                update_kh($id, $tkkh, $mkkh, $email, $diachikh, $sdtkh, $vaitro);

                $_SESSION['edit'] = '1';
            }
            $list_kh = list_kh('');
            include 'khachhang/list.php';
            break;

        case 'listbl':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = '';
            }
            $list_sanpham = list_sanpham('', 0);
            $list_kh = list_kh('');
            $list_bl = list_bl($kyw);
            include 'binhluan/list.php';
            break;

        case 'xoabl':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_bl($_GET['id']);
                $_SESSION['delete'] = '1';
            } else {
                //  Xóa danh mục khi chọn checkbox
                if (isset($_POST['delete_checkbox']) && isset($_POST['checkbox'])) {
                    delete_checkbox_bl($_POST['checkbox']);
                    $_SESSION['delete'] = '1';
                } else {
                    $_SESSION['checkbox_err'] = '1';
                }
            }

            // Hiển thị lại danh sách
            $list_sanpham = list_sanpham('', 0);
            $list_kh = list_kh('');
            $list_bl = list_bl('');
            include 'binhluan/list.php';
            break;

        case 'info':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
            }
            header('location: ../index.php?act=info&id=' . $id);
            break;

        case 'dangxuat';
            $_SESSION['logout'] = 1;
            header('location: ../index.php');
            break;

        default:
            include 'danhmuc/list.php';
            break;
    }
} else {
    include 'danhmuc/list.php';
}

include 'footer.php';
