<?php

if(!defined('_INCODE'))
die('Access denied...');


$data = [
    'pageTitle' => 'Thêm đơn hàng'
];

layout('header', 'admin', $data);
layout('sidebar', 'admin', $data);
layout('breadcrumb', 'admin', $data);

// Truy vấn lấy ra danh sách nhóm
$allCourse = getRaw("SELECT id, nameCourse FROM course ORDER BY id");
$allChapter = getRaw("SELECT id, name FROM chapter ORDER BY id");
$allEmailUser = getRaw("SELECT id, email FROM student");


// Xử lý thêm người dùng
if(isPost()) {
    // Validate form
    $body = getBody(); // lấy tất cả dữ liệu trong form
    $errors = [];  // mảng lưu trữ các lỗi''

    $email = 'Thu86065@st.vimaru.edu.vn';
  
   
   // Kiểm tra mảng error
  if(empty($errors)) {
    // không có lỗi nào
    $dataInsert = [
        'course_id' => $body['course_id'],
        'student_id' => $body['student_id'],
        'status' => $body['status'],
        'create_at' => date('Y-m-d H:i:s'),
    ];


    $insertStatus = insert('orderCourse', $dataInsert);

    if ($insertStatus) {
        setFlashData('msg', 'Thêm đơn hàng thành công');
        setFlashData('msg_type', 'success');
        redirect('admin/?module=orderCourse&action=lists');
    }else {
    setFlashData('msg', 'Hệ thống đang gặp sự cố, vui lòng thử lại sau');
    setFlashData('msg_type', 'danger');
    redirect('admin/?module=orderCourse&action=add'); 
    }

  }else {
    // Có lỗi xảy ra
    setFlashData('msg', 'Vui lòng kiểm tra chính xác thông tin nhập vào');
    setFlashData('msg_type', 'danger');
    setFlashData('errors', $errors);
    setFlashData('old', $body);  // giữ lại các trường dữ liệu hợp lê khi nhập vào
    redirect('admin/?module=orderCourse&action=add'); 
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
                        <label for="course">Chọn Email kích hoạt</label>
                        <select name="student_id" id="course" class="form-select">
                            <option value="">Chọn email</option>
                            <?php

                            if(!empty($allEmailUser)) {
                                foreach($allEmailUser as $item) {
                            ?>
                                <option value="<?php echo $item['id'] ?>" <?php  echo (!empty($userId) && $userId == $item['id'])?'selected':false; ?>><?php echo $item['email'] ?></option> 
                            
                            <?php
                                }
                            }
                            ?>                  
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Trạng thái</label>
                        <select name="status" class="form-control">
                            <option value="">Chọn trạng thái</option>
                            <option value="0" <?php echo (old('status', $old==0)) ? 'selected':false;  ?>>Not Active</option>
                            <option value="1" <?php echo (old('status', $old==1)) ? 'selected':false; ?>>Active</option>
                        </select>
                    </div>

                    <div class="form-group col-8">
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary">Thêm đơn hàng</button>
                            <a style="margin-left: 20px " href="<?php echo getLinkAdmin('orderCourse', 'lists') ?>" class="btn btn-success">Quay lại trang danh sách</a>
                        </div>
                    </div>
                </div>              
        </form>
    </div>






<?php
layout('footer', 'admin');





