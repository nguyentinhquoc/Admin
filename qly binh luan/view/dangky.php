<div class="row m10 flex between">
    <img width="25%" class="logo_sign" src="upload/dangky.png" alt="">
    <div class="row mb">
        <h3 class="title_cate">Đăng kí thành viên</h3>
        <div class="boxcontent formtaikhoan ">
            <form action="index.php?act=dangky" enctype="multipart/form-data" method="POST">
                <div class="row mb10">
                    <p class="mb10">Tài khoản</p>
                    <input type="text" name="user" id="" placeholder="Tài khoản phải có ít nhất 8 ký tự" pattern=".{8,}" title="Tài khoản phải có ít nhất 8 ký tự" required>
                </div>
                <div class="row mb10">
                    <p class="mb10">Mật khẩu</p>
                    <input type="password" name="pass" id="" placeholder="Mật khảu phải có ít nhất 8 ký tự" pattern=".{8,}" title="Mật khảu phải có ít nhất 8 ký tự" required>
                </div>
                <div class="row mb10">
                    <p class="mb10">Nhập lại mật khẩu</p>
                    <input type="password" name="repass" id="" placeholder="Mật khảu phải có ít nhất 8 ký tự" pattern=".{8,}" title="Mật khảu phải có ít nhất 8 ký tự" required>
                </div>
                <div class="row mb10">
                    <p class="mb10">Ảnh đại diện</p>
                    <input type="file" name="anh" accept=".jpg, .jpeg, .png, .jfif, .gif" id="" required>
                </div>
                <div class="row mb10">
                    <p class="mb10">Email</p>
                    <input type="email" name="email" id="" placeholder="...@..." pattern="/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/" required>
                </div>
                <div class="row mb10">
                    <p class="mb10">Địa chỉ</p>
                    <input type="text" name="address" placeholder=" ... " id="">
                </div>
                <div class="row mb10">
                    <p class="mb10">SDT</p>
                    <input type="tel" placeholder="034 ..." pattern="034[0-9]{7,8}" name="phone" id="" required>
                </div>
                <?php if (isset($thongbao) && $thongbao != '') { ?>
                    <div class="row">
                        <p style="color: red;"><?= $thongbao ?></p>
                    </div>
                <?php } ?>
                <div class="row mb10">
                    <input type="submit" onclick="" name="dangki" value="Đăng kí">
                </div>
            </form>
            <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
            <li><a href="index.php?act=dangnhap">Đăng nhập</a></li>
        </div>
    </div>
</div>