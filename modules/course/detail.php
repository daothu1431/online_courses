<?php
if (!defined('_INCODE')) die('Access Deined...');

$data = [
    'pageTitle' => ''
];

if(!empty(getBody()['id'])) {
        $id = getBody()['id'];

    // Truy vấn Database
    $chapterCount = getRows("SELECT id FROM chapter WHERE course_id = '$id'");
    $lessonCount = getRows("SELECT id FROM lesson WHERE course_id = '$id'");
    $firstLesson = firstRaw("SELECT id FROM lesson WHERE course_id = '$id'");



    $chapter = getRaw("SELECT * FROM chapter WHERE course_id = '$id'");

    // $listLesson = getRaw("SELECT * FROM lesson WHERE course_id = '$id'");

    $courseDetail = firstRaw("SELECT * FROM course WHERE id='$id'");
    $listLesson = getRaw("SELECT lesson.id, lesson.name, lesson.chapter_id FROM lesson INNER JOIN chapter ON lesson.chapter_id = chapter.id WHERE lesson.course_id = '$id'");
        
    if(empty($courseDetail)) {
        loadErrors();
    }
}


$checkLogin = isLoginStudent();

if(!empty($checkLogin)) {
    $studentId = isLoginStudent()['student_id'];
    $checkOrder = getRaw("SELECT * FROM ordercourse WHERE course_id = $id AND student_id = $studentId AND status=1");
}
$data = [
    'pageTitle' => $courseDetail['nameCourse']
];
    if (!empty($checkLogin)) {
        layout('last_header', 'client', $data);
    }
    if(empty($checkLogin)) {
        layout('header', 'client', $data);
    }

?>
    <!-- Main -->
           <!-- Section 5 -->
           <div class="container">
            <section class="course-inner">
                <div class="row"> 
                    <div class="col-lg-8 col-md-12 col-12" >
                        <div class="course-inner__left course-detail">
                            <h1 class="heading-lv1"><?php echo $courseDetail['nameCourse'] ?></h1>
                            <p class="all-desc"><?php echo $courseDetail['description'] ?></p>
                            <h2 class="heading-lv3">Bạn sẽ học được gì?</h2>
                            <p class="about__checklist">
                                <span class="about__check-item">
                                    <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/icon/pass.svg" class="pass_icon" alt="">
                                    Biết cách cài đặt và tùy biến Windows Terminal
                                </span>
                                <span class="about__check-item">
                                    <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/icon/pass.svg" class="pass_icon" alt="">
                                    Thành thạo sử dụng các lệnh Linux/Ubuntu
                                </span>
                                <span class="about__check-item">
                                    <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/icon/pass.svg" class="pass_icon" alt="">
                                    Biết cài đặt PHP 7.4 và MariaDB trên Ubuntu 20.04
                                </span>
                                <span class="about__check-item">
                                    <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/icon/pass.svg" class="pass_icon" alt="">
                                    Biết sử dụng Windows Subsystem for Linux
                                </span>
                                <span class="about__check-item">
                                    <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/icon/pass.svg" class="pass_icon" alt="">
                                    Biết cài đặt Node và tạo dự án ReactJS/ExpressJS
                                </span>
                                <span class="about__check-item">
                                    <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/icon/pass.svg" class="pass_icon" alt="">
                                    Hiểu về Ubuntu và biết tự cài đặt các phần mềm khác
                                </span>
                               
                            </p>

                            <!-- Nội dung khóa học -->
                            <h2 class="heading-lv3">Nội dung khóa học</h2>
                            <div class="listLesson">
                                <?php foreach($chapter as $chapterItem):?>
                                    <button class="accordion"><?php echo $chapterItem['name']; ?></button>
                                    <div class="panel">              
                                                <?php 
                                                    if(!empty($listLesson)):
                                                        $count = 0;
                                                    foreach($listLesson as $lessonItem):?>
                                                        <?php $count++; ?>
                                                            <?php if($lessonItem['chapter_id'] == $chapterItem['id']): ?>
                                                                <div class="lesson-item">
                                                                    <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/icon/play.svg" alt="" class="play-icon">

                                                                    <?php if(!empty($checkLogin) && !empty($checkOrder)) { ?>
                                                                        <a href="<?php echo getLinkClient('course','learning',['id' => $lessonItem['id']]); ?>"><?php echo 'Bài '.$count.'. '.$lessonItem['name']?></a> 
                                                                    <?php }else { ?>
                                                                        <p><?php echo 'Bài '.$count.'. '.$lessonItem['name']?></p> 
                                                                    <?php } ?>
                                                                </div>
                                                            <?php endif; ?>
                                                    <?php  endforeach; ?>  
                                                <?php endif; ?> 
                                    </div>
                                <?php endforeach; ?>
                            </div>
                          
                            <h2 class="heading-lv3">Yêu cầu</h2>
                            <span class="about__check-item margin">
                                <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/icon/pass.svg" class="pass_icon" alt="">
                                Máy tính kết nối internet (từ Windows 10 trở lên)
                            </span>
                            <span class="about__check-item margin">
                                <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/icon/pass.svg" class="pass_icon" alt="">
                                Đã từng làm việc với Terminal, hiểu Terminal là gì và để làm gì
                            </span>
                            <span class="about__check-item margin">
                                <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/icon/pass.svg" class="pass_icon" alt="">
                                Ý thức cao, trách nhiệm cao trong việc tự học. Thực hành lại sau mỗi bài học
                            </span>
                            <span class="about__check-item margin">
                                <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/icon/pass.svg" class="pass_icon" alt="">
                                Khi học nếu có khúc mắc hãy tham gia hỏi/đáp tại group FB: Học lập trình web (fullstack.edu.vn)
                            </span>
                            <span class="about__check-item margin">
                                <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/icon/pass.svg" class="pass_icon" alt="">
                                Bạn không cần biết gì hơn nữa, trong khóa học tôi sẽ chỉ cho bạn những gì bạn cần phải biết
                            </span>
                        </div>
                    </div>

                    <!-- Media -->
                    <div class="col-lg-4  col-md-12 col-12">
                        <div class="course-inner__right course-inner__right-media">
                        
                            <img src="<?php echo $courseDetail['thumbnail'] ?>" class="course-inner__right-image" alt="">
                            <?php if(!empty($checkLogin) && !empty($checkOrder)) { ?>
                                <a href="<?php echo getLinkClient('course','learning',['id' => $firstLesson['id']]); ?>" class="btn course-buy__btn">Tiếp tục học</a> 
                            <?php } ?>

                            <?php if(!empty($checkLogin) && empty($checkOrder)) { ?>
                                <a href="<?php echo getLinkClient('course','order',['id' => $id]); ?>" class="btn course-buy__btn">Mua khóa học</a> 
                            <?php } ?>
                            
                            <?php if(empty($checkLogin)) { ?>
                                <a href="<?php echo getLinkClient('auth','signin'); ?>" class="btn course-buy__btn">Mua khóa học</a>
                            <?php } ?>
                             
                            <div class="course__buy-desc">
                                <span class="about__check-item margin">
                                    <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/icon/pass.svg" class="pass_icon" alt="">
                                   Trình độ cơ bản
                                </span>
                                <span class="about__check-item margin">
                                    <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/icon/pass.svg" class="pass_icon" alt="">
                                    Tổng số 45 bài học
                                </span>
                                <span class="about__check-item margin">
                                    <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/icon/pass.svg" class="pass_icon" alt="">
                                    Hỗ trợ tận tâm, nhiệt tình
                                </span>
                                <span class="about__check-item margin">
                                    <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/icon/pass.svg" class="pass_icon" alt="">
                                    Học mọi lúc mọi nơi
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
<?php


layout('footer', 'client');