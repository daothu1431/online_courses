<?php
if (!defined('_INCODE')) die('Access Deined...');



$studentId = isLoginStudent()['student_id'];
$studentDetail = Student_Info($studentId); 


if(!empty(getBody()['id'])) {

       
    // Xác định bài học hiện tại dựa trên tham số trong URL
    if (isset($_GET['id'])) {
        $lessonId = $_GET['id'];
    } else {
        // Nếu không có tham số id, mặc định hiển thị bài học đầu tiên
        $lessonId = 1;
    }
    
     // Lấy bài học hiện tại
     $currentLesson = firstRaw("SELECT id, name, video, document, course_id FROM lesson WHERE id = '$lessonId'");
     // Lấy ra ID khóa học hiện tại
     $courseId =  $currentLesson['course_id'];
     $currentCourse = firstRaw("SELECT * FROM course WHERE id = $courseId");

    $chapter = getRaw("SELECT * FROM chapter WHERE course_id = '$courseId'");
    $courseDetail = firstRaw("SELECT * FROM course WHERE id='$courseId'");
    $listLesson = getRaw("SELECT lesson.id, lesson.name, lesson.chapter_id FROM lesson INNER JOIN chapter ON lesson.chapter_id = chapter.id WHERE lesson.course_id = '$courseId'");

 

   

    // Truy vấn cơ sở dữ liệu để lấy thông tin về bài học trước và bài học tiếp theo
    $sqlPrevious = firstRaw("SELECT id, name, video, document,  course_id FROM lesson WHERE id < $lessonId AND course_id = $courseId ORDER BY id DESC LIMIT 1");

    $sqlNext = firstRaw("SELECT id, name, video, document FROM lesson WHERE id > $lessonId AND course_id = $courseId ORDER BY id ASC LIMIT 1");


}
$data = [
    'pageTitle' => $currentLesson['name']
];


?>
    <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $data['pageTitle'] ?></title>

        <!-- Reset CSS -->
        <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATE?>/assets/css/reset.css" />

        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;1,400&family=Sen:wght@700&display=swap"
            rel="stylesheet"
        />

        <!-- Grid -->
        <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATE?>/assets/css/grid_system.css" />

        <!-- Style CSS -->
        <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATE?>/assets/css/style.css" />

        <!-- Responsive -->
        <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATE?>/assets/css/responsive.css" />
    </head>
    <body class="learning__body">

    <!-- Header-learning -->
        <header class="header-learning learning-fixed">
            <div class="header-learning__inner">
                <div class="header-learning__left">
                    <!-- Logo -->
                    
                        <a href="<?php echo _WEB_HOST_ROOT.'?module=home' ?>" class="logo">
                            <img
                                src="<?php echo _WEB_HOST_TEMPLATE?>/assets/img/dt_logo.png"
                                alt=""
                                class="header-learning__logo-image"
                            />
                        </a>
                    
                    <h3 class="header-learning__title"><?php echo $courseDetail['nameCourse'] ?></h3>
                </div>

                <div class="header-learning__right">
                    <div class="header-learning__item">
                        <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/icon/learning_icon1.svg" alt="" class="header-learning__icon">
                    </div>

                    <div class="header-learning__item">
                        <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/icon/learning_icon2.svg" alt="" class="header-learning__icon">
                    </div>

                    <div class="header-learning__item">
                        <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/icon/learning_icon3.svg" alt="" class="header-learning__icon">
                    </div>

                    <div class="header-learning__info">
                        <img src="<?php echo $studentDetail['thumbnail']?>" alt="" class="header-learning__info-avatar">
                        <span class="header-learning__info-name"><?php echo $studentDetail['fullname']?></span>
                    </div>
                </div>
            </div>
        </header>
    
     <!-- Main -->
           <!-- Section 5 -->
           <div class="container">
            <section class="course-inner ">
                <div class="row"> 
                    <div class="col-lg-9 col-md-12 col-12" >
                        <div class="course-inner__left learning__content">
                            <div class="course-inner__content">
                                <video src="<?php echo $currentLesson['video'] ?>" poster="<?php echo $currentCourse['thumbnail'] ?>" controls class="course-inner__video"></video>
                            </div>
                            
                            <div class="course-inner__document">
                                <h2 class="heading-lv2 tick"><?php echo $currentLesson['name'] ?></h2> 
                                <div class="document__lesson">
                                    <?php  echo html_entity_decode($currentLesson['document']) ?>                             
                                </div>                             
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12 col-12">
                        <div class="course-inner__right learning__sidebar">                        
                                <div class="listLesson">
                                    <?php foreach($chapter as $chapterItem):?>
                                        <button class="accordion accordion-learning"><?php echo $chapterItem['name']; ?></button>
                                        <div class="panel">              
                                                    <?php 
                                                        if(!empty($listLesson)):
                                                            $count = 0;
                                                        foreach($listLesson as $lessonItem):?>
                                                            <?php $count++; ?>
                                                                <?php if($lessonItem['chapter_id'] == $chapterItem['id']): ?>
                                                                    <div class="lesson-item">
                                                                        <img src="<?php echo _WEB_HOST_TEMPLATE?>/assets/icon/play.svg" alt="" class="play-icon">
                                                                        <a href="<?php echo getLinkClient('course','learning',['id' => $lessonItem['id']]); ?>" class="lesson-item__name"><?php echo 'Bài '.$count.'. '.$lessonItem['name']?></a> 
                                                                    </div>
                                                                <?php endif; ?>
                                                        <?php  endforeach; ?>  
                                                    <?php endif; ?> 
                                        </div>
                                    <?php endforeach; ?>
                                </div>    
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="footer__learning">
            <a href="" class="btn btn-course__action">?</a>
            <?php if(!empty($sqlPrevious)): ?>
            <a href="<?php echo getLinkClient('course','learning',['id' => $sqlPrevious['id']]); ?>" class="btn btn-course__action">Bài trước</a>
            <?php  endif; ?>

            <?php if(!empty($sqlNext)): ?>
            <a href="<?php echo getLinkClient('course','learning',['id' => $sqlNext['id']]); ?>" class="btn btn-course__action">Bài sau</a>
            <?php  endif; ?>
        </div>
        <script src="<?php echo _WEB_HOST_TEMPLATE?>/assets/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>