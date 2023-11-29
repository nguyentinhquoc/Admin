<div class="row m10 flex between heightmiddlescreen">
    <img width="25%" class="logo_sign" src="upload/dangnhap.png" alt="">
    <div class="row mb">
        <h3 class="title_cate">Đăng nhập</h3>
        <div class="boxcontent formtaikhoan">
            <form action="#" method="POST">
                <div class="row mb10">
                    Tên đăng nhập <br>
                    <input type="text" name="user" id="">
                </div>
                <div class="row mb10">
                    Mật khẩu <br>
                    <input type="password" name="pass" id="">
                </div>
                <div class="row mb10">
                    <input type="checkbox"> Ghi nhớ tài khoản?
                </div>
                <?php if (isset($thongbao) && $thongbao != '') { ?>
                    <div class="row">
                        <p style="color: red;"><?= $thongbao ?></p>
                    </div>
                <?php } ?>
                <div class="row mb10">
                    <input type="submit" name="dangnhap" value="Đăng nhập">
                </div>
            </form>
            <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
            <li><a href="index.php?act=dangky">Chưa có tài khoản ? Đăng kí thành viên</a></li>
        </div>
    </div>
</div>