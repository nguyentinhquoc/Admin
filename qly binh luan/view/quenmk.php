<div class="row m10 flex between heightmiddlescreen">
    <img width="25%" class="logo_sign" src="upload/quenmk.png" alt="">
    <div class="row mb">
        <h3 class="title_cate">Quên mật khẩu</h3>
        <div class="boxcontent formtaikhoan">
            <form action="index.php?act=quenmk" method="POST">
                <?php if (isset($pass) && $pass != '') { ?>
                    <div class="row mb10">
                        Mật khẩu của bạn <br>
                        <input type="text" name="" value="<?= $pass ?>" disabled>
                    </div>
            </form>
            <a href="index.php?act=dangnhap"><input type="submit" value="Đăng nhập"></a></li>
        <?php } else { ?>
            <div class="row mb10">
                Tên đăng nhập <br>
                <input type="text" name="user" id="">
            </div>
            <div class="row mb10">
                Email / SDT đăng ký<br>
                <input type="text" name="email_phone" id="">
            </div>
            <?php if (isset($thongbao) && $thongbao != '') { ?>
                <div class="row">
                    <p style="color: red;"><?= $thongbao ?></p>
                </div>
            <?php } ?>
            <div class="row mb10">
                <input type="submit" name="getpass" value="Lấy lại mật khẩu">
            </div>
            </form>
            <li><a href="index.php?act=dangnhap">Đăng nhập</a></li>
            <li><a href="index.php?act=dangky">Chưa có tài khoản ? Đăng kí thành viên</a></li>
        <?php } ?>
        </div>
    </div>
</div>