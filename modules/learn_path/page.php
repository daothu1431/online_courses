<?php
if (!defined('_INCODE')) die('Access Deined...');

$data = [
    'pageTitle' => 'Lộ trình học'
];

$checkLogin = isLoginStudent();

    if (!empty($checkLogin)) {
        layout('last_header', 'client', $data);
    }
    if(empty($checkLogin)) {
        layout('header', 'client', $data);
    }

?>

<div class="container">
            <div class="learning-path">
                <h1 class="heading-lv1 learning-path__heading">Lộ trình học</h1>
                <div class="all-desc learning-path__desc-wrapper">
                    <p>Để bắt đầu một cách thuận lợi, bạn nên tập trung vào một lộ trình học. Ví dụ: Để đi làm với vị trí "Lập trình viên Front-end" bạn nên tập trung vào lộ trình "Front-end".</p>
                </div>

                <div class="learning-path__list">
                    <!-- Item 1 -->
                    <div class="learning-path__item">
                        <div class="learning-path-item__body">
                            <div class="learning-path-item__body-info">
                                <h2 class="heading-lv2 learning-path-item__title">Lộ trình học Front-end</h2>
                                <p class="learning-path-item__desc">Lập trình viên Front-end là người xây dựng ra giao diện websites. Trong phần này F8 sẽ chia sẻ cho bạn lộ trình để trở thành lập trình viên Front-end nhé.</p>
                            </div>
                            <div class="learning-path-item__body-thumb">
                                <div class="learning-path-item__thumb-round">
                                    <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/img/learning-path-thumb.png" alt="" class="learning-path__thumb">
                                </div>
                            </div>
                        </div>
                        <div class="learning-path__cta">
                            <div class="learning-path__cta-item">
                                <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/img/learn-cta-icon1.png" alt="" class="learning-path__cta-icon">
                            </div>
                            <div class="learning-path__cta-item">
                                <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/img/learn-cta-icon2.png" alt="" class="learning-path__cta-icon">
                            </div>
                            <div class="learning-path__cta-item">
                                <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/img/learn-cta-icon3.png" alt="" class="learning-path__cta-icon">
                            </div>
                            <div class="learning-path__cta-item">
                                <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/img/learn-cta-icon4.png" alt="" class="learning-path__cta-icon">
                            </div>
                            <div class="learning-path__cta-item">
                                <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/img/learn-cta-icon5.png" alt="" class="learning-path__cta-icon">
                            </div>
                            <div class="learning-path__cta-item">
                                <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/img/learn-cta-icon6.png" alt="" class="learning-path__cta-icon">
                            </div>
                        </div>

                        <div>
                            <a href="" class="btn learning-path__btn">Xem chi tiết</a>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="learning-path__item">
                        <div class="learning-path-item__body">
                            <div class="learning-path-item__body-info">
                                <h2 class="heading-lv2 learning-path-item__title">Lộ trình học Back-end</h2>
                                <p class="learning-path-item__desc">Trái với Front-end thì lập trình viên Back-end là người làm việc với dữ liệu, công việc thường nặng tính logic hơn. Chúng ta sẽ cùng tìm hiểu thêm về lộ trình học Back-end nhé.</p>
                            </div>
                            <div class="learning-path-item__body-thumb">
                                <div class="learning-path-item__thumb-round">
                                    <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/img/learning-path-thumb2.png" alt="" class="learning-path__thumb">
                                </div>
                            </div>
                        </div>
                        <div class="learning-path__cta">
                            <div class="learning-path__cta-item">
                                <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/img/learn-cta-icon1.png" alt="" class="learning-path__cta-icon">
                            </div>
                            <div class="learning-path__cta-item">
                                <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/img/learn-cta-icon2.png" alt="" class="learning-path__cta-icon">
                            </div>
                            <div class="learning-path__cta-item">
                                <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/img/learn-cta-icon3.png" alt="" class="learning-path__cta-icon">
                            </div>
                            <div class="learning-path__cta-item">
                                <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/img/learn-cta-icon4.png" alt="" class="learning-path__cta-icon">
                            </div>
                            <div class="learning-path__cta-item">
                                <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/img/learn-cta-icon5.png" alt="" class="learning-path__cta-icon">
                            </div>
                            <div class="learning-path__cta-item">
                                <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/img/learn-cta-icon6.png" alt="" class="learning-path__cta-icon">
                            </div>
                        </div>

                        <div>
                            <a href="" class="btn learning-path__btn">Xem chi tiết</a>
                        </div>
                    </div>
                </div>

                <div class="susgestion">
                    <div class="susgestion__info">
                        <h2 class="susgestion__heading">Tham gia cộng đồng học viên trên Facebook</h2>
                        <p class="susgestion__desc">Hàng nghìn người khác đang học lộ trình giống như bạn. Hãy tham gia hỏi đáp, chia sẻ và hỗ trợ nhau trong quá trình học nhé.</p>
                        <a href="#!" class="susgestion__cta">Tham gia nhóm</a>
                    </div>
                    <div class="susgestion__media">
                        <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/img/sus_image.png" class="susgestion__image" alt="">
                    </div>
                </div>
            </div>

        </div>

<?php


layout('footer', 'client');