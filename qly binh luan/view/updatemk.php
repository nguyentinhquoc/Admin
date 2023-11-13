<div class="row m10 flex between heightmiddlescreen">
    <img width="25%" class="logo_sign" src="upload/reset-password.png" alt="">
    <div class="row mb">
        <h3 class="title_cate">Đổi mật khẩu</h3>
        <div class="boxcontent formtaikhoan">
            <form action="index.php?act=updatemk" method="POST" class="">
                <input type="hidden" value="<?= $kh['id'] ?>" name="id" id="">
                <div class="row mb10">
                    <p class="mb10">Mật khẩu cũ</p>
                    <input type="text" value="<?= $kh['pass'] ?>" id="" disabled>
                </div>
                <div class="row mb10">
                    <p class="mb10">Mật khẩu mới</p>
                    <input type="password" name="pass" id="" placeholder="Mật khẩu phải có ít nhất 8 ký tự" pattern=".{8,}" title="Mật khảu phải có ít nhất 8 ký tự" required>
                </div>
                <div class="row mb10">
                    <p class="mb10">Nhập lại mật khẩu</p>
                    <input type="password" name="repass" id="" placeholder="Mật khẩu phải có ít nhất 8 ký tự" pattern=".{8,}" title="Mật khảu phải có ít nhất 8 ký tự" required>
                </div>
                <?php if (isset($thongbao) && $thongbao != '') { ?>
                    <div class="row">
                        <p style="color: red;"><?= $thongbao ?></p>
                    </div>
                <?php } ?>
                <a><input type="submit" name="update" value="Cập nhật"></a>
            </form>
        </div>
    </div>
</div>