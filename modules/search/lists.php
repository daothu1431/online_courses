<?php
if (!defined('_INCODE')) die('Access Deined...');

$data = [
    'pageTitle' => 'Kết quả tìm kiếm'
];


$checkLogin = isLoginStudent();

    if (!empty($checkLogin)) {
        layout('last_header', 'client', $data);
    }
    if(empty($checkLogin)) {
        layout('header', 'client', $data);
    }

$keyword = $_POST['keyword'];

$listCourse = getRaw("SELECT * from course WHERE nameCourse like N'%$keyword%'");


?>

<div class="container">
     <!-- List-courses -->
     <?php
        if(!empty($listCourse)):
    ?>
     <section>
                <div class="row">
                    <div class="col">
                        <h1 class="course-heading">Kết quả tìm kiếm</h1>
                    </div>
                </div>

                <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1">
                    <!-- Item 1 -->
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
                                    <span class="course__rice"><?php echo number_format($item['price'], 0, ',', '.') ?>đ</span>
                                </div>
                            </div>
                        <?php endforeach;?>
                </div>
            </section>
            <?php endif; ?>

            <?php if(empty($listCourse)): ?>
                <section class="not-found__search">
                    <h1 class="notice-notfound">Không tìm thấy khóa học</h1>
                    <img src="<?php echo _WEB_HOST_TEMPLATE ?>/assets/img/not-found.jpg" class="image__notFound" alt="">
                </section>
            <?php endif; ?>
</div>

<?php
layout('footer', 'client');