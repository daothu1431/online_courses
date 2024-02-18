<?php

if(!defined('_INCODE'))
die('Access denied...');


$data = [
    'pageTitle' => 'Thêm học phần'
];

layout('header', 'admin', $data);
layout('sidebar', 'admin', $data);
layout('breadcrumb', 'admin', $data);

// Truy vấn lấy ra danh sách nhóm
$allCourse = getRaw("SELECT id, nameCourse FROM course ORDER BY id");

// Xử lý thêm người dùng
if(isPost()) {
    // Validate form
    $body = getBody(); // lấy tất cả dữ liệu trong form
    $errors = [];  // mảng lưu trữ các lỗi
    
    // Valide họ tên: Bắt buộc phải nhập, >=5 ký tự
    if(empty(trim($body['name']))) {
        $errors['name']['required'] = '** Bạn chưa nhập tên học phần!';
    }

   // Kiểm tra mảng error
  if(empty($errors)) {
    // không có lỗi nào
    $dataInsert = [
        'name' => $body['name'],
        'course_id' => $body['course_id'],
        'create_at' => date('Y-m-d H:i:s'),
    ];

    $insertStatus = insert('chapter', $dataInsert);
    if ($insertStatus) {
        setFlashData('msg', 'Thêm học phần thành công');
        setFlashData('msg_type', 'success');
        redirect('admin/?module=chapter&action=lists');
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
                        <label for="name">Tên học phần</label>
                        <input type="text" name="name" id="name" class="form-control slug" value="<?php echo old('name', $old); ?>">
                        <?php echo form_error('name', $errors, '<span class="error">', '</span>'); ?>
                    </div>

                
                    <div class="form-group">
                        <select name="course_id" id="" class="form-select">
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

                    <div class="form-group col-8">
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                            <a style="margin-left: 20px " href="<?php echo getLinkAdmin('chapter', 'lists') ?>" class="btn btn-success">Quay lại</a>
                        </div>
                    </div>
                </div>              
        </form>
    </div>


<?php
layout('footer', 'admin');





