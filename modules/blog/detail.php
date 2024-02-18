<?php

    if(!empty($_GET['comment_id'])) {
        $commentId = $_GET['comment_id'];
    }

    $checkLogin = isLoginStudent();

    if($checkLogin) {
        $studentId = isLoginStudent()['student_id'];
        $studentDetail = Student_Info($studentId); 
    }

    $id = $_GET['id'];
    $blogDetail = firstRaw("SELECT * FROM blog WHERE id='$id'");
    $studentId = $blogDetail['student_id'];
    $infoUser = firstRaw("SELECT student.thumbnail, fullname FROM student WHERE id = '$studentId'");

    $commentList = getRaw("SELECT * FROM comments WHERE blog_id = '$id' ORDER BY create_at ASC");

if(isPost()) {
    $body = getBody(); // lấy tất cả dữ liệu trong form
    $errors = []; 

    if(empty(trim($body['content_comment']))) {
        $errors['content_comment']['required'] = '** Bạn chưa nhập nội dung!';
    }

    if(empty($errors)) {

        if(empty($commentId)) {
            $dataInsert = [
                'name' => $studentDetail['fullname'],
                'email' => $studentDetail['email'],
                'thumbnail' => $studentDetail['thumbnail'],
                'content' => trim(strip_tags($body['content_comment'])),
                'parent_id' => 0,
                'blog_id' => $id,
                'user_id' => NULL,
                'status' => 0,
                'create_at' => date('Y-m-d H:i:s')
            ];
        } if(!empty($commentId)) {
            $dataInsert = [
                'name' => $studentDetail['fullname'],
                'email' => $studentDetail['email'],
                'thumbnail' => $studentDetail['thumbnail'],
                'content' => trim(strip_tags($body['content_comment'])),
                'parent_id' => $commentId,
                'blog_id' => $id,
                'user_id' => NULL,
                'status' => 0,
                'create_at' => date('Y-m-d H:i:s')
            ];
        }

        $insertStatus = insert('comments', $dataInsert);
        if($insertStatus) {
            redirect('?module=blog&action=detail&id='.$id.'#comments-list');
        }
    }
}

$data = [
    'pageTitle' => $blogDetail['title']
];



    if (!empty($checkLogin)) {
        layout('last_header', 'client', $data);
    }
    if(empty($checkLogin)) {
        layout('header', 'client', $data);
    }


?>
   <div class="container">
        <div class="main-blog">
                <div class="blog-detail">
                    <h1 class="heading-lv1 title-blog"><?php echo $blogDetail['title']; ?></h1>
                    <div class="info-up">
                        <div class="blog-users__up">
                            <div class="blog-users__thumbnail">
                                <img src="<?php echo $infoUser['thumbnail'] ?>" alt="" class="blog-users__up-avatar">
                            </div>
                            <p>Đào Thu</p>
                            <p>6 người đọc</p>
                        </div>
                    </div>               
                        <div class="blog__content">
                            <?php  echo html_entity_decode($blogDetail['content']) ?>
                        </div>
                </div>

                <hr />  
                
                <!-- Comments -->
                <div class="blog-comments" id="comments-list">
                    <h3 class="heading-lv3 blog-comments-number" ><?php echo count($commentList); ?> bình luận</h3>
                    <?php foreach($commentList as $item):
                        $commentData[$item['id']] = $item; 
                    ?>
                        
                    <!-- Item 1 -->
                    <div class="blog-comments__item">
                        <img src="<?php echo $item['thumbnail'] ?>" alt="" class="blog-comments__avt">
                        <div class="blog-comments-content">
                            <p class="blog-comments__nameReply"><?php echo $item['name'] ?></p>
                            <p class="blog-comments__desc"><?php echo $item['content'] ?></p>
                            <div class="blog-comments-options">
                                <div class="blog-comments__desc blog-comments-options__time">03 May 2023 at 12:20PM,</div>
                                <div class="blog-comments__desc blog-comments-options__rep"><a href="<?php echo _WEB_HOST_ROOT.'?module=blog&action=detail&id='.$id.'&comment_id='.$item['id'] ?>">Trả lời</a></div>
                            </div>
                            </div>


                        <!-- <div class="blog-comments__item-children">
                            <img src="<?php echo $infoUser['thumbnail'] ?>" alt="" class="blog-comments__avt">
                            <div class="blog-comments-content">
                                <p class="blog-comments__nameReply">Bảo Ngọc</p>
                                <p class="blog-comments__desc"> Dạ vây mình thường làm dự án thực tế, có nên nhất thiết phải quy đổi margin hay padding sang đơn vị rem ko ạ?</p>
                                <div class="blog-comments-options">
                                    <div class="blog-comments__desc blog-comments-options__time">03 May 2023 at 12:20PM,</div>
                                    <div class="blog-comments__desc blog-comments-options__rep">Trả lời</div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- End Item -->
                    <?php endforeach; ?>
                </div> 
                <h3 class="heading-lv3" >Viết bình luận</h3>
                <form method="POST">
                    <textarea name="content_comment" id="" wrap="hard" class="blog-comments-createContent" placeholder="Viết bình luận của bạn..."></textarea>
                    <button type="submit" class="btn learning-path__btn">Bình luận</button>
                </form>
        </div>
    </div>

   </div>
<?php
layout('footer', 'client');