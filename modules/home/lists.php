<?php
if (!defined('_INCODE')) die('Access Deined...');

$data = [
    'pageTitle' => 'Trang chủ'
];

// Truy vấn Database
$listCourse = getRaw("SELECT * FROM course");
$listblog = getRaw("SELECT blog.id, title, blog.thumbnail, blog.create_at, student.thumbnail as avatar, fullname, blog.status FROM blog INNER JOIN student ON blog.student_id = student.id WHERE blog.status = 1 ORDER BY blog.create_at DESC");

$checkLogin = isLoginStudent();

    if (!empty($checkLogin)) {
        layout('last_header', 'client', $data);
    }
    if(empty($checkLogin)) {
        layout('header', 'client', $data);
    }


    if(!empty($checkLogin)) {
        $studentId = isLoginStudent()['student_id'];
        $checkOrder = getRaw("SELECT * FROM ordercourse WHERE student_id = $studentId AND status=1");
    }
?>
<!-- <div class="snowfall"></div> -->

  <!-- Main -->
  <div class="container">
            <!-- Slide-show -->
            <div class="slideshow">
                <div class="slideshow__inner">
                    <!-- Swiper Slide -->
                    <swiper-container
                        class="mySwiper" pagination="true" space-between="0"
                         autoplay-delay="3000" autoplay-disable-on-interaction="true"
                    >
                        <!-- Item 1 -->
                        <swiper-slide>                                 
                            <div class="slideshow__item slide-item1">
                                <!-- Info -->
                                <div class="slideshow-info">
                                    <h1 class="slideshow-info__heading">Học HTML CSS cho người mới</h1>
                                    <p class="slideshow-info__desc">Thực hành dự án với Figma, hàng trăm bài tập và thử thách, hướng dẫn 100% bởi Đào Thu, tặng kèm Flashcards, v.v.</p>
                                    <div >
                                        <a href="" class="slideshow-info__btn" target="_blank">Ủng hộ tác giả</a>
                                    </div>
                                </div>
                                <!-- Media -->
                                <div class="slideshow-media">
                                    <img src="<?php echo _WEB_HOST_TEMPLATE ?>/assets/img/slideIcon1.png" alt="" class="slideshow-media__image">
                                </div>
                            </div>
                        </swiper-slide>

                        <!-- Item 2 -->
                        <swiper-slide>                                 
                            <div class="slideshow__item slide-item2">
                                <!-- Info -->
                                <div class="slideshow-info">
                                    <h1 class="slideshow-info__heading">Đăng ký học Offline tại Hải Phòng</h1>
                                    <p class="slideshow-info__desc">Hình thức học Offline phù hợp nếu bạn muốn được hướng dẫn và hỗ trợ trực tiếp tại lớp.</p>
                                    <div >
                                        <a href="" class="slideshow-info__btn" target="_blank">Nhận tư vấn</a>
                                    </div>
                                </div>
                                <!-- Media -->
                                <div class="slideshow-media">
                                    <img src="<?php echo _WEB_HOST_TEMPLATE ?>/assets/img/slideicon2.png" alt="" class="slideshow-media__image">
                                </div>
                            </div>
                        </swiper-slide>

                         <!-- Item 3 -->
                         <swiper-slide>                                 
                            <div class="slideshow__item slide-item3">
                                <!-- Info -->
                                <div class="slideshow-info">
                                    <h1 class="slideshow-info__heading">Thành Quả của Học Viên</h1>
                                    <p class="slideshow-info__desc">Để đạt được kết quả tốt trong mọi việc ta cần xác định mục tiêu rõ ràng cho việc đó. Học lập trình cũng không là ngoại lệ.</p>
                                    <div >
                                        <a href="" class="slideshow-info__btn" target="_blank">Xem thành quả</a>
                                    </div>
                                </div>
                                <!-- Media -->
                                <div class="slideshow-media">
                                    <img src="<?php echo _WEB_HOST_TEMPLATE ?>/assets/img/slideIcon3.png" alt="" class="slideshow-media__image">
                                </div>
                            </div>
                        </swiper-slide>

                         <!-- Item 4 -->
                         <swiper-slide>                                 
                            <div class="slideshow__item slide-item4">
                                <!-- Info -->
                                <div class="slideshow-info">
                                    <h1 class="slideshow-info__heading">Đào Thu trên Youtube</h1>
                                    <p class="slideshow-info__desc">Đào Thu được nhắc tới ở mọi nơi, ở đâu có cơ hội việc làm cho nghề IT và có những con người yêu thích lập trình tớ sẽ ở đó.</p>
                                    <div >
                                        <a href="" class="slideshow-info__btn" target="_blank">Truy cập kênh</a>
                                    </div>
                                </div>
                                <!-- Media -->
                                <div class="slideshow-media">
                                    <img src="<?php echo _WEB_HOST_TEMPLATE ?>/assets/img/slideIcon4.png" alt="" class="slideshow-media__image">
                                </div>
                            </div>
                        </swiper-slide>
                    </swiper-container>
                    
                </div>
            </div>

            <!-- List-courses -->
            <section>
                <div class="row">
                    <div class="col course-popular__block">
                        <h1 class="course-heading">Khóa học phổ biến</h1>
                        <span class="label-course__popular">Mới</span>
                    </div>
                </div>

                <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1">
                    <!-- Item 1 -->
                        <?php
                            if(!empty($listCourse)):
                        ?>
                        <?php foreach($listCourse as $item): ?>
                    <div class="col">
                        <div class="course__item">
                            
                            <a href="<?php echo _WEB_HOST_ROOT.'?module=course&action=detail&id='.$item['id']; ?>" class="course__imageLink">
                                <img
                                    src="<?php echo $item['thumbnail'] ?>"
                                    alt=""
                                    class="course__image"
                                />
                                <button class="course__btn">Xem khóa học</button>                     
                            </a>
                           
                            <h3 class="course__name"><a href="<?php echo _WEB_HOST_ROOT.'?module=course&action=detail&id='.$item['id']; ?>"><?php echo $item['nameCourse'] ?></a></h3>
                            <div class="course-pro__icon">
                                <img src="<?php echo _WEB_HOST_TEMPLATE ?>/assets/icon/pro-icon.svg" alt="">
                            </div>
                            <span class="course__rice"><?php echo number_format($item['price'], 0, ',', '.') ?>đ</span>
                        </div>
                    </div>
                    <?php endforeach; endif;?>
                </div>
            </section>

             <!-- List-Blog -->
             <section>
                <div class="row">
                    <div class="col blog-title">
                        <h1 class="blog-heading" >Bài viết nổi bật</h1>
                        <a href="<?php echo _WEB_HOST_ROOT.'?module=blog' ?>" class="blog-title__view ">Xem tất cả ></a>
                    </div>
                </div>

                <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1">
                    <!-- Item 1 -->
                    <?php foreach($listblog as $item): ?>
                        <div class="col">
                            <div class="blog__item">
                                <a href="<?php echo getLinkClient('blog','detail',['id' => $item['id']]); ?>" class="blog__imageLink">
                                    <img
                                        src="<?php echo $item['thumbnail'] ?>"
                                        alt=""
                                        class="blog__image"
                                    />
                                    <button class="blog__btn">Xem bài viết</button>
                                </a>
                                <h3 class="blog__name text-wrap"><a href="#!"><?php echo $item['title'] ?></a></h3>
                                <div class="blog__info">
                                    <img src="<?php echo $item['avatar'] ?>" alt="" class="blog__userAvatar">
                                    <p class="blog__userName"><?php echo $item['fullname'] ?></p>
                                    <span class="blog__time">2 phút đọc</span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </section>

        </div>
<?php


layout('footer', 'client');