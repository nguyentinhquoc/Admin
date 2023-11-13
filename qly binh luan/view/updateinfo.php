<div class="row m10 flex between heightmiddlescreen">
    <img width="25%" class="logo_sign" src="upload/<?= $kh['img'] != '' ? $kh['img'] : 'user.png' ?>" alt="">
    <div class="row mb">
        <h3 class="title_cate">Sửa thông tin</h3>
        <div class="boxcontent formtaikhoan">
            <form action="index.php?act=updateinfo" enctype="multipart/form-data" method="POST">
                <input type="hidden" value="<?= $kh['id'] ?>" name="id" id="">
                <div class="row mb10">
                    <p>Thay đổi ảnh đại diện</p>
                    <input type="file" name="anh" id="" accept=".jpg, .jpeg, .png, .jfif, .gif">
                    <input type="hidden" name="anh" id="" value="<?= $kh['img'] ?>">
                </div>
                <div class="row mb10">
                    <p class="mb10">Email</p>
                    <input type="email" name="email" id="" pattern="/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/" value="<?= $kh['email'] ?>" required>
                </div>
                <div class="row mb10">
                    <p class="mb10">Địa chỉ</p>
                    <input type="text" value="<?= $kh['address'] ?>" name="address" id="">
                </div>
                <div class="row mb10">
                    <p class="mb10">SDT</p>
                    <input type="tel" pattern="034[0-9]{7,8}" name="phone" id="" value="<?= $kh['tel'] ?>" required>
                </div>
                <input type="submit" name="update" value="Cập nhật">
            </form>
        </div>
    </div>
</div>