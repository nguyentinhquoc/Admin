<?php include 'model/notification.php' ?>
<div class="row header">
    <div class="header_title">
        <p style="font-size: 0.7vw; font-style:italic">N.A.T APPLE STORE</p>
    </div>
    <div class="sign">
        <?php if (isset($_SESSION['active']) && (count($list_kh) > 0)) {
            if ($_SESSION['active'] == 1) { ?>
                <a href="admin/index.php"><i class="fa-brands fa-atlassian"></i> Quản trị</a>
                <a href="index.php?act=giohang"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</a>
                <li id="user" class="dropdown"><i class="fa-solid fa-user"></i> <?= $_SESSION['nameuser'] ?>
                    <ul class="dropdown-list">
                        <li>
                            <a href="index.php?act=info&id=<?= $_SESSION['iduser'] ?>">
                                <img width="50px" height="50px" src="upload/<?= $_SESSION['avatar'] != '' ? $_SESSION['avatar'] : 'user.png' ?>" alt="">
                                <h5><?= $_SESSION['nameuser'] ?></h5>
                            </a>
                        </li>
                        <li><a href="index.php?act=doimk&id=<?= $_SESSION['iduser'] ?>">Đổi mật khẩu</a></li>
                        <li>
                            <a onclick="return confirm('Đăng xuất ?')" href="index.php?act=dangxuat"><i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất</a>
                        </li>
                    </ul>
                </li>
            <?php } else { ?>
                <a href="index.php?act=giohang"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</a>

                <li id="user" class="dropdown"><i class="fa-solid fa-user"></i> <?= $_SESSION['nameuser'] ?>
                    <ul class="dropdown-list">
                        <li>
                            <a href="index.php?act=info&id=<?= $_SESSION['iduser'] ?>">
                                <img width="50px" height="50px" src="upload/<?= $_SESSION['avatar'] != '' ? $_SESSION['avatar'] : 'user.png' ?>" alt="">
                                <h5><?= $_SESSION['nameuser'] ?></h5>
                            </a>
                        </li>
                        <li><a href="index.php?act=doimk&id=<?= $_SESSION['iduser'] ?>">Đổi mật khẩu</a></li>
                        <li>
                            <a onclick="return confirm('Đăng xuất ?')" href="index.php?act=dangxuat"><i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất</a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
        <?php } else { ?>
            <li id="user" class="dropdown"><a href="index.php?act=dangnhap"><i class="fa-solid fa-user"></i> Đăng nhập/Đăng ký </a>
                <!-- <a href="index.php?act=dangnhap"><i class="fa-solid fa-user"></i> Đăng nhập/Đăng ký </a> -->
                <ul class="dropdown-list">
                    <li><a href="index.php?act=dangky"> Đăng kí</a></li>
                    <li><a href="index.php?act=quenmk"> Quên mật khẩu</a></li>
                </ul>
            </li>
        <?php } ?>

    </div>
</div>
<div id="navbar" class="row mb menu">
    <div class=" flex between boxcenter">
        <ul style="width: 60%;" class="flex between">
            <li>
                <a href="index.php">
                    <img width="30px" src="upload/logo.png" alt="">
                </a>
            </li>
            <li class="dropdown">Danh mục
                <ul class="dropdown-list">
                    <?php foreach ($list_danhmuc as $dm) {
                        extract($dm)
                    ?>
                        <li><a style="" href="index.php?act=sanpham&iddm=<?= $id ?>"><?= $name ?></a></li>
                    <?php } ?>
                </ul>
            </li>
            <li><a href="index.php?act=sanpham">Sản phẩm</a></li>
            <li><a href="index.php?act=gioithieu">Giới thiệu</a></li>
            <li><a href="index.php?act=lienhe">Liên hệ</a></li>
            <li><a href="index.php?act=gopy">Góp ý</a></li>
            <li><a href="index.php?act=hoidap">Hỏi đáp</a></li>
        </ul>
        <form class="searching" action="index.php?act=sanpham" method="POST">
            <input class="" type="search" placeholder="Tìm kiếm sản phẩm" name="kyw">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
</div>
<div class="boxcenter">