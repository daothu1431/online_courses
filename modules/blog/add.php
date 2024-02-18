<?php

$checkLogin = isLoginStudent();


if($checkLogin) {
    $studentId = isLoginStudent()['student_id'];
    $studentDetail = Student_Info($studentId); 
}

if(isPost()) {
    $body = getBody();
    $errors = []; 
    if(empty(trim($body['title']))) {
        $errors['title']['required'] = '** Bạn chưa nhập tiêu đề!';
    }
    if(empty($errors)) {
        $dataInsert = [
            'title' => $body['title'],
            'thumbnail' => $body['thumbnail'],
            'content' => $body['content'],
            'student_id' => $studentId,
            'user_id' => '',
            'create_at' => date('Y-m-d H:i:s', ),
        ];
        $insertStatus = insert('blog', $dataInsert);
        if($insertStatus) {
            echo "<script>alert('Đăng bài thành công, vui lòng chờ duyệt!')</script>";
        }
    }
    
}


$data = [
    'pageTitle' => 'Viết blog'
];


if (!empty($checkLogin)) {
    layout('last_header', 'client', $data);
}
if(empty($checkLogin)) {
    layout('header', 'client', $data);
}

?>

<body>
 <div class="container">
        <!-- Main content -->
    <section class="written-blog">
        <div class="container-fluid">
                <form class="add-blog" action="" method="post">
                        <div class="form-group col-8">
                            <label for="name">Tiêu đề</label>
                            <input type="text" name="title" id="name" class="input__blog slug" required>
                        </div>

                        <div class="form-group col-8">
                            <label for="name">Ảnh</label>
                            <div class="ckfinder-group ">
                                <div class="col-8">
                                    <input type="text" name="thumbnail" id="name" class="input__blog image-render" required>   
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-upload__imageBlog choose-image">Chọn ảnh</button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-8" style="margin-top: 20px;">
                            <label for="name">Nội dung</label>
                            <textarea name="content" class="editor" required></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" id="nut-dang-bai" class="btn btn__upload">Xuất bản</button>
                        </div>
                        
            
                </form>
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
 </div>
 </body>

<?php
layout('footer', 'client');