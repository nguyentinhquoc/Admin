<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>X Shop</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="shortcut icon" href="../upload/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="row header">
        <div class="header_title">
        </div>
        <div class="sign">
            <?php if (isset($_SESSION['active']) && (count($list_kh) > 0)) {
                if ($_SESSION['active'] == 1) { ?>
                    <a href="../index.php"><i class="fa-brands fa-atlassian"></i> Khách</a>
                    <li id="user" class="dropdown"><i class="fa-solid fa-user"></i> <?= $_SESSION['nameuser'] ?>
                        <ul class="dropdown-list">
                            <li>
                                <a href="../index.php?act=info&id=<?= $_SESSION['iduser'] ?>">
                                    <img width="50px" height="50px" src="../upload/<?= $_SESSION['avatar'] != '' ? $_SESSION['avatar'] : 'user.png' ?>" alt="">
                                    <h5><?= $_SESSION['nameuser'] ?></h5>
                                </a>
                            </li>
                            <li><a href="../index.php?act=doimk&id=<?= $_SESSION['iduser'] ?>">Đổi mật khẩu</a></li>
                            <li>
                                <a onclick="return confirm('Đăng xuất ?')" href="../index.php?act=dangxuat"><i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất</a>
                            </li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <a href="#"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</a>
                    <a href="index.php?act=info&id=<?= $_SESSION['iduser'] ?>"><i class="fa-solid fa-user"></i><?= $_SESSION['nameuser'] ?></a>
                    <a onclick="return confirm('Đăng xuất ?')" href="index.php?act=dangxuat"><i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất</a>
                <?php } ?>
            <?php } else { ?>
                <a href="../index.php?act=dangnhap"><i class="fa-solid fa-user"></i> Đăng nhập/Đăng ký </a>
                <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
            <?php } ?>

        </div>
    </div>
    <div id="navbar" class="row mb menu">
        <div class="flex between boxcenter">
            <ul class="flex row controladmin">
                <li>
                    <a href="index.php">
                        <img width="30px" src="../upload/logo.png" alt="">
                    </a>
                </li>
                <li><a href="index.php?act=listdm">Danh mục</a></li>
                <li><a href="index.php?act=listsp">Hàng hóa</a></li>
                <li><a href="index.php?act=listkh">Khách hàng</a></li>
                <li><a href="index.php?act=listbl">Bình luận</a></li>
                <li><a href="index.php?act=thongke">Thống kê</a></li>
            </ul>
        </div>
    </div>
    <div class="boxcenter">