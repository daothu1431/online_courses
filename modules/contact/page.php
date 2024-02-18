<?php

$data = [
    'pageTitle' => 'Liên hệ'
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
            <!-- Section 1 -->
            <section class="hero">
                <div class="row hero-inner">
                    <div class="col-lg-8 col-md-12 col-12">
                        <div class="hero-inner__left">
                            <span class="hero-inner__info">Hi,</span>
                            <span class="hero-inner__info">Mình là <span class="hero-inner__hight">T</span>hu,</span>
                            <span class="hero-inner__info">web developer</span>
                            <a class="hero-inner__position">Senior Front End Developer / Blogger</a>
                            <div class="hero-inner__link">
                                <a href="https://www.facebook.com/profile.php?id=100010590132155" target="_blank" class="hero-link__item hero-link__facebook">Liên hệ Facebook</a>
                                <a href="https://www.facebook.com/messages/t/100010590132155" target="_blank" class="hero-link__item hero-link__message">Nhắn messenger cho mình</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="hero-inner__right">
                            <div class="hero-inner__image">
                                <img src="<?php echo _WEB_HOST_TEMPLATE ?>/assets/img/contact-imgae.jpg" class="hero-inner__thumb" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="contact-map">
            <iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3728.8635921149084!2d106.69221537608436!3d20.83721408076461!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7a9c2ee478df%3A0x6039ffe1614ede5c!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBIw6BuZyBo4bqjaSBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1694332094477!5m2!1svi!2s"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
<?php
layout('footer', 'client');