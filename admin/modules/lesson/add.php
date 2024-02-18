<?php

if(!defined('_INCODE'))
die('Access denied...');


$data = [
    'pageTitle' => 'Thêm bài học'
];

layout('header', 'admin', $data);
layout('sidebar', 'admin', $data);
layout('breadcrumb', 'admin', $data);

// Truy vấn lấy ra danh sách nhóm
$allCourse = getRaw("SELECT id, nameCourse FROM course ORDER BY id");
$allChapter = getRaw("SELECT id, name FROM chapter ORDER BY id");

// Xử lý thêm người dùng
if(isPost()) {
    // Validate form
    $body = getBody(); // lấy tất cả dữ liệu trong form
    $errors = [];  // mảng lưu trữ các lỗi
    
    // Valide họ tên: Bắt buộc phải nhập, >=5 ký tự
    if(empty(trim($body['name']))) {
        $errors['name']['required'] = '** Bạn chưa nhập tên bài học!';
    }

   // Kiểm tra mảng error
  if(empty($errors)) {
    // không có lỗi nào
    $dataInsert = [
        'name' => $body['name'],
        'video' => $body['video'],
        'document' => $body['document'],
        'course_id' => $body['course_id'],
        'chapter_id' => $body['chapter_id'],
        'create_at' => date('Y-m-d H:i:s'),
    ];

    $insertStatus = insert('lesson', $dataInsert);
    if ($insertStatus) {
        setFlashData('msg', 'Thêm bài học thành công');
        setFlashData('msg_type', 'success');
        redirect('admin/?module=lesson&action=lists');
    }

  }

}
$msg =getFlashData('msg');
$msgType = getFlashData('msg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');
   

?>
    <div class="container">
        <hr/>
        <?php
            getMsg($msg, $msgType);
        ?>

        <form action="" method="post">
                <div class="col-8">

                    <div class="form-group">
                        <label for="name">Tên bài học</label>
                        <input type="text" name="name" id="name" class="form-control slug" value="<?php echo old('name', $old); ?>">
                        <?php echo form_error('name', $errors, '<span class="error">', '</span>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="name">Video</label>
                        <div class="row ckfinder-group">
                            <div class="col-8">
                                <input type="text" name="video" id="name" class="form-control image-render" value="<?php echo old('video', $old); ?>">   
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-success choose-image"><i class="nav-icon fas fa-solid fa-upload"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-12" style="margin-top: 20px;">
                        <label for="name">Tài liệu bài học</label>
                        <textarea name="document" class="form-control editor"><?php echo old('document', $old); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="course">Khóa học</label>
                        <select name="course_id" id="course" class="form-select">
                        <option value="">Chọn khóa học</option>
                        <?php

                            if(!empty($allCourse)) {
                                foreach($allCourse as $item) {
                            ?>
                                <option value="<?php echo $item['id'] ?>" <?php  echo (!empty($courseId) && $courseId == $item['id'])?'selected':false; ?>><?php echo $item['nameCourse'] ?></option> 
                            
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Chương học</label>
                        <select name="chapter_id" id="" class="form-select">
                        <option value="">Chọn học phần</option>
                        <?php

                            if(!empty($allChapter)) {
                                foreach($allChapter as $item) {
                            ?>
                                <option value="<?php echo $item['id'] ?>" <?php  echo (!empty($courseId) && $courseId == $item['id'])?'selected':false; ?>><?php echo $item['name'] ?></option> 
                            
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-8">
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary">Thêm bài học</button>
                            <a style="margin-left: 20px " href="<?php echo getLinkAdmin('lesson', 'lists') ?>" class="btn btn-success">Quay lại trang danh sách</a>
                        </div>
                    </div>
                </div>              
        </form>
    </div>






<?php
layout('footer', 'admin');





