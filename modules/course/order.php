<?php
$data = [
    'pageTitle' => 'Đặt mua khóa học'
];


$checkLogin = isLoginStudent();

    if (!empty($checkLogin)) {
        layout('last_header', 'client',$data);
    }
    if(empty($checkLogin)) {
        layout('header', 'client', $data);
    }

    if(!empty($checkLogin)) {
        $studentId = isLoginStudent()['student_id'];
    }

    $studentInfo = firstRaw("SELECT * FROM student WHERE id = '$studentId'");

$id = getBody()['id'];
$courseDetail = firstRaw("SELECT * FROM course WHERE id='$id'");


?>
     <div class="container">
         <!-- Section 1 -->
         <section class="order">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-12">
                        <div class="order-inner__left">
                            <h3 class="heading-lv2 order-heading__info">Thông tin học viên</h3>
                            <div class="order-user__info">
                                <p class="">Họ tên: <span><?php echo $studentInfo['fullname'] ?></span></p>
                                <p>Số điện thoại: <span><?php echo $studentInfo['phone'] ?></span></p>
                                <p>Email: <span><?php echo $studentInfo['email'] ?></span></p>
                            </div>
                            <h3 class="heading-lv2 order-heading__pay">Phương thức thanh toán</h3>
                            <div class="order-payment">
                                <p class="order-banktranfer">1. Chuyển khoản ngân hàng</p>
                                <div class="order-info__bank">
                                    <p>Tên ngân hàng:</p>
                                    <span>Vietcombank</span>
                                </div>
                                <div class="order-info__bank">
                                    <p>Số tài khoản:</p>
                                    <span>1019049241</span>
                                </div>
                                <div class="order-info__bank">
                                    <p>Chủ tài khoản:</p>
                                    <span>DAO VAN THU</span>
                                </div>
                                <p class="request-qr">Quét mã QR</p>
                                <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/img/QR.png" class="order-qrbank" alt="">
                                
                                <p class="order-banktranfer bank-pt2">2. Thanh toán qua ví momo</p>
                                <p>Truy cập đường dẫn: https://me.momo.vn/paydaothu</p>
                                <p class="request-qr">Quét mã QR</p>
                                <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/img/momo-qr.jpg" class="order-qrbank" alt="">
                                <p class="order-banktranfer bank-pt2">Nội dung thanh toán: <span><?php echo $studentInfo['email'].'_'.$courseDetail['active_code'] ?></span></p>
                                <p class="pass-noisy">Sau khi thanh toán xong bấm nút phía dưới để hoàn tất!</p>
                                <a href="<?php echo getLinkClient('course','checkout', ['id' => $id]) ?>" class="btn btn-pass">Hoàn tất thanh toán</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="order-inner__right">
                            <h3 class="heading-lv2 order-heading__info">Khoá học đặt mua</h3>
                            <div class="order-user__info">
                                <div class="order-infoCourse">
                                    <img src="<?php echo $courseDetail['thumbnail'] ?>" class="order-course__thumb" alt="">
                                    <div class="order-course__name">
                                        <div class="order-course__name"><?php echo $courseDetail['nameCourse'] ?></div>
                                        <div class="order-course__price"><?php echo number_format($courseDetail['price'], 0, ',', '.') ?>đ</div>
                                    </div>
                                </div>
                            </div>

                            <div class="order-payment order-summary">
                                <div class="unit__price">
                                    <p class="unit__price-left">Đơn giá</p>
                                    <p class="unit__price-right"><?php echo number_format($courseDetail['price'], 0, ',', '.') ?>đ</p>
                                </div>
                                <div class="summary__price">
                                    <p class="summary__rice-left">Tổng tiền</p>
                                    <p class="summary__rice-right"><?php echo number_format($courseDetail['price'], 0, ',', '.') ?>đ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
     </div>
<?php
layout('footer', 'client');