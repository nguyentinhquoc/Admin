<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                        <?php
                                if (isset($_GET['madh'])) {
                                    $madh = $_GET['madh'];
                                    $chitietdh_sp = chitietdh_sp($madh);
                                    $thongtin=chitietdh_tt($madh);
                                    
                                }
                                ?>

                            <div class="panel-body">
                                <div class="clearfix">
                                    <div class="float-start">
                                        <h3>PANDA SHOP</h3>
                                    </div>
                                    <div class="float-end">
                                        <h4># Mã đơn hàng: 
                                            <strong><?=$thongtin['madh']?></strong>
                                        </h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="float-start mt-3">
                                            <address>
                                                <strong>Người gửi : Nguyễn Quốc Tình</strong><br>
                                                <br>
                                                Số điện thoại:0862201004<br>
                                                <br>

                                                Địa chỉ : FPT Polytechnic - Trịnh Văn Bô - Nam Từ Liên - Hà Nội
                                            </address>
                                          
                                        </div>
                                        <div class="float-end mt-3">
                                        <address>
                                                <strong>Người nhận : <?=$thongtin['hoten']?></strong><br>
                                                <br>
                                                Số điện thoại: <?=$thongtin['sdt']?><br>
                                                <br>

                                                Địa chỉ : <?=$thongtin['diachi']?>
                                            </address>
                                        </div>
                                    </div><!-- end col -->
                                </div>
                             
                                <!-- end row -->
                               
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table mt-4">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Sản phẩm</th>
                                                        <th>Loại</th>
                                                        <th>Giá tiền</th>
                                                        <th>Số lượng</th>
                                                        <th>Thành tiền</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $tongtien=0;
                                                    foreach ($chitietdh_sp as $key => $value) {
                                                    ?>
                                                        <tr>
                                                            <td><?=$key+1?></td>
                                                            <td><?=$value['name']?></td>
                                                            <td><?='Size: '.$value['size']?><br><?="Màu: ".$value['color']?></td>
                                                            <td><?=number_format($value['price'],  0, ",", ".")."đ"?></td>
                                                            <td><?=$value['soluong']?></td>
                                                            <td><?=number_format($value['price']*$value['soluong'],  0, ",", ".")."đ"?></td>
                                                            <?php $tongtien+=$value['price']*$value['soluong'] ?>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-6">
                                        <div class="clearfix mt-4">

                                            <small>
                                                - PANDA SHOP CẢM ƠN QUÝ KHÁCH ĐÃ TIN TƯỞNG VÀ SỬ DỤNG SẢN PHẢM CỦA SHOP: <br>
                                               - Chính sách đổi trả : Quý khách hàng lưu ý khi nhận hàng cần lưu ý quay video quá trình bóc hàng cùng shiper để được hoàn trả nếu sản phẩm lỗi, shop không hỗ trợ đổi trả nếu quý kháhc không thực hiện theo yêu cầu trên


                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-6 offset-xl-3">
                                        <p class="text-end"><b>Tổng tiền hàng: </b><?= number_format($tongtien,  0, ",", ".")."đ"?> </p>
                                        <p class="text-end">Vocher: - <?= number_format($thongtin['sale'],  0, ",", ".")."đ"?></p>
                                        <p class="text-end">Đã thanh toán: <?php
if ( $thongtin['thanhtoan']==1) {
    echo number_format($thongtin['thanhtien'] ,  0, ",", ".")."đ";
}else{
    echo "0đ";
}                                
                                        ?></p>
                                        <hr>
                                        <h3 class="text-end" style="color: red;">Tổng thanh toán: <?php 
                                        if ( $thongtin['thanhtoan']==1) {
                                            echo "0đ";
                                        }else{
                                            echo number_format($thongtin['thanhtien'] ,  0, ",", ".")."đ";
                                        }   
                                        ?></h3>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-print-none">
                                    <div class="float-end">
                                        <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                                        <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!--