<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coderthemes.com/adminto/layouts/apps-chat.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Nov 2023 23:15:29 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Chat | Adminto - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- App css -->

    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- icons -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>

<!-- body start -->

<body class="loading" data-layout-color="light" data-layout-mode="default" data-layout-size="fluid" data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-end mb-0">





                <li class="dropdown notification-list topbar-dropdown">
                    <?php
                    $email = $_SESSION['email_dn'];
                    $taikhoan_email = taikhoan_email($email);
                    ?>
                    <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="<?= $img_path . "avarta_user/" . $taikhoan_email['img'] ?>" alt="" width="100px" height="100px" style=" border-radius: 50px;" alt="user-image" class="rounded-circle">

                        <span class="pro-user-name ms-1">
                            Thao tác <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="index.php?act=myaccout&profile=1" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>Tài khoản của tôi</span>
                        </a>
                        <!-- item-->
                        <a href="index.php?act=muahang" class="dropdown-item notify-item">
                            <i class="fe-lock"></i>
                            <span>Mua hàng</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="index.php?act=dangxuat" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Đang xuất</span>
                        </a>
                    </div>
                </li>
                <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                        <i class="fe-settings noti-icon"></i>
                    </a>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="index.html" class="logo logo-light text-center">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="16">
                    </span>
                </a>
                <a href="index.html" class="logo logo-dark text-center">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="16">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                <li>
                    <button class="button-menu-mobile disable-btn waves-effect">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li>
                    <h4 class="page-title-main">Chat</h4>
                </li>

            </ul>

            <div class="clearfix"></div>

        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="h-100" data-simplebar>

                <!-- User box -->
                <div class="user-box text-center">
                    <?php
                    $email = $_SESSION['email_dn'];
                    $taikhoan_email = taikhoan_email($email);
                    ?>
                    <img src="<?= $img_path . "avarta_user/" . $taikhoan_email['img'] ?>" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
                    <div class="dropdown">
                        <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown" aria-expanded="false"><?= $taikhoan_email['name'] ?></a>

                        <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="index.php?act=myaccout&profile=1" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>Tài khoản của tôi</span>
                            </a>
                            <!-- item-->
                            <a href="index.php?act=muahang" class="dropdown-item notify-item">
                                <i class="fe-lock"></i>
                                <span>Mua hàng</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="index.php?act=dangxuat" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Đang xuất</span>
                            </a>
                        </div>


                      
                    </div>

                    <p class="text-muted left-user-info">TRANG QUẢN TRỊ</p>

                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="text-muted left-user-info">
                                <i class="mdi mdi-cog"></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="#">
                                <i class="mdi mdi-power"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul id="side-menu">

                        <li class="menu-title">Tổng quan</li>

                        <li>
                            <a href="index.php">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        <li class="menu-title mt-2">Hỗ trợ</li>

                        <li>
                            <a href="index.php?act=cskh">
                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                                <span>Hỗ trợ khách hàng </span>
                            </a>
                        </li>
                        <li class="menu-title mt-2">Chi tiết</li>
                        <li>
                            <a href="#sidebarTaskssp" data-bs-toggle="collapse">
                                <i class="fa fa-list" aria-hidden="true"></i>
                                <span> Quản lí sản phẩm </span>
                            </a>
                            <div class="collapse" id="sidebarTaskssp">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="index.php?act=sanpham">Tất cả sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="index.php?act=sanpham&idtrangthai=1">Sản phẩm hiển thị</a>

                                    </li>
                                    <li>
                                        <a href="index.php?act=sanpham&idtrangthai=0">Sản phẩm ẩn</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="index.php?act=thongbao">
                                <i class="fa fa-bell" aria-hidden="true"></i>

                                <span> Quán lí thông báo</span>
                            </a>
                        </li>

                        <li>
                            <a href="index.php?act=vocher">
                                <i class="mdi mdi-gift-outline"></i>
                                <span>Quản lí Vocher </span>
                            </a>
                        </li>

                        <li>
                            <a href="index.php?act=banner">
                                <i class="fa fa-columns" aria-hidden="true"></i>
                                <span> Quản lí Banner</span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?act=quanli_binhluan">
                                <i class="mdi mdi-forum-outline"></i>
                                <span> Quản lí bình luận</span>
                            </a>
                        </li>

                        <li>
                            <a href="#sidebarTasks" data-bs-toggle="collapse">
                                <i class="mdi mdi-clipboard-outline"></i>
                                <span> Quản lí đơn hàng </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTasks">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="index.php?act=donhang">Tất cả đơn hàng</a>
                                    </li>
                                    <li>
                                        <a href="index.php?act=donhang&iddh=3">Chờ xác nhận</a>

                                    </li>
                                    <li>
                                        <a href="index.php?act=donhang&iddh=4">Đang giao hàng</a>
                                    </li>
                                    <li>
                                        <a href="index.php?act=donhang&iddh=5">Đã hoàn thành</a>
                                    </li>
                                    <li>
                                        <a href="index.php?act=donhang&iddh=6">Đơn hàng đã hủy</a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <li>
                            <a href="#sidebarMultilevel3" data-bs-toggle="collapse">
                                <i class="fa fa-user" aria-hidden="true"></i>

                                Quản lý tài khoản <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarMultilevel3">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="index.php?act=taikhoan">Tất cả tài khoản</a></a>
                                    </li>
                                    <li>
                                        <a href="index.php?act=taikhoan&role=2">Tài khoản quản trị viên</a></a>
                                    </li>
                                    <li>
                                        <a href="index.php?act=taikhoan&role=1">Tài khoản người dùng</a></a>
                                    </li>
                                    <li>
                                        <a href="#sidebarMultilevel4" data-bs-toggle="collapse">
                                            Item 2 <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarMultilevel4">
                                            <ul class="nav-second-level">
                                                <li>
                                                    <a href="javascript: void(0);">Item 1</a>
                                                </li>
                                                <li>
                                                    <a href="javascript: void(0);">Item 2</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                </li>
                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->