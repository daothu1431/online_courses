<?php

$checkLogin = isLoginStudent();



$data = [
    'pageTitle' => 'Thanh toán khóa học'
];

    if (!empty($checkLogin)) {
        layout('last_header', 'client', $data);
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
        <div class="checkout-inner">
            <div class="checkout-inner__sucess">
                <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/icon/pass.svg" class="checkout-sucess__icon" alt="">
            </div>
            <h1 class="heading-lv1 title-checkout">Bạn đã đặt hàng thành công!</h1>
            <p class="checkout-desc">Cảm ơn bạn đã đăng ký khóa học. Chúng tôi sẽ kích hoạt khóa học của bạn sau 24 giờ.</p>
            <p class="checkout-noisy">Lưu ý: Nếu sau 24 giờ khóa học vẫn chưa được kích hoạt, hãy liên hệ với chúng tôi qua phần liên hệ.</p>
            <h2 class="heading-lv2 checkout-title__info">Thông tin đơn hàng</h2>
            <div class="checkout-info">
                <div class="checkout-info__item">
                    <p>Họ tên</p>
                    <p class="checkout-main__info"><?php echo $studentInfo['fullname'] ?></p>
                </div>
                <div class="checkout-info__item">
                    <p>Số điện thoại</p>
                    <p class="checkout-main__info"><?php echo $studentInfo['phone'] ?></p>
                </div>
                <div class="checkout-info__item">
                    <p>Email</p>
                    <p class="checkout-main__info"><?php echo $studentInfo['email'] ?></p>
                </div>
                <div class="checkout-info__item">
                    <p>Code</p>
                    <p class="checkout-main__info"><?php echo $courseDetail['active_code'] ?></p>
                </div>
            </div>
                <div class="checkout-summary__info">
                    <div class="checkout__info-left">
                        <h3 class="heading-lv2 order-heading__info checkout-course__buy">Khoá học đặt mua</h3>
                        <div class="order-user__info">
                            <div class="order-infoCourse">
                                    <img src="<?php echo $courseDetail['thumbnail'] ?>" class="order-course__thumb" alt="">
                                    <div class="order-course__name">
                                        <div class="order-course__name"><?php echo $courseDetail['nameCourse'] ?></div>
                                        <div class="order-course__price"><?php echo number_format($courseDetail['price'], 0, ',', '.') ?>đ</div>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="checkout__info-right">
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
    </div>
<?php
layout('footer', 'client');