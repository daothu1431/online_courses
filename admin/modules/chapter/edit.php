<?php
$data = [
    'pageTitle' => 'Cập nhật học phần'
];

layout('header', 'admin', $data);
layout('sidebar', 'admin', $data);
layout('breadcrumb', 'admin', $data);

// Truy vấn lấy ra danh sách nhóm
$allCourse = getRaw("SELECT id, nameCourse FROM course ORDER BY id");


// Lấy dữ liệu cũ của người dùng
$body = getBody();

if(!empty($body['id'])) {

    $chapterId = $body['id'];

    $chapterDetail  = firstRaw("SELECT * FROM chapter WHERE id=$chapterId");

    
    if (!empty($chapterDetail)) {
        setFlashData('chapterDetail', $chapterDetail);
    }else {
        redirect('admin/?module=chapter&action=lists');
    }
}

// Xử lý sửa người dùng
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
    $dataUpdate = [
        'name' => $body['name'],
        'course_id' => $body['course_id'],
        'update_at' => date('Y-m-d H:i:s'),
    ];

    /////////////////////////////////////
    $condition = "id=$chapterId";

    $updateStatus = update('chapter', $dataUpdate, $condition);
    if ($updateStatus) {
        setFlashData('msg', 'Cập nhật chương học thành công');
        setFlashData('msg_type', 'success');
        redirect('admin/?module=chapter&action=lists');
    }

  }

  redirect('admin/?module=chapter&action=edit&id='.$chapterId);

}
$msg =getFlashData('msg');
$msgType = getFlashData('msg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');
$chapterDetail = getFlashData('chapterDetail');

if (!empty($chapterDetail) && empty($old)) {
    $old = $chapterDetail;
}

?>

     <!-- Main content -->
     <section class="content">
     <div class="container-fluid">
           <form action="" method="post">
           <hr/>
               <?php echo getMsg($msg, $msgType);  ?>
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
                               <option value="<?php echo $item['id'] ?>" <?php  echo (old('course_id', $old) == $item['id'])?'selected':false; ?>><?php echo $item['nameCourse'] ?></option> 
                            
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group d-flex">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <a style="margin-left: 20px " href="<?php  echo getLinkAdmin('chapter', 'lists') ?>" class="btn btn-success">Quay lại trang danh sách</a>
                        <input type="hidden" name="id" value="<?php echo $chapterId; ?>">
                    </div>
                </div>    
                       
         
           </form>
     </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->

<?php
layout('footer', 'admin');