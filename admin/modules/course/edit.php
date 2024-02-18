<?php
$data = [
    'pageTitle' => 'Cập nhật khóa học'
];

layout('header', 'admin', $data);
layout('sidebar', 'admin', $data);
layout('breadcrumb', 'admin', $data);


// Lấy dữ liệu cũ của người dùng
$body = getBody();

if(!empty($body['id'])) {

    $courseId = $body['id'];

    $courseDetail  = firstRaw("SELECT * FROM course WHERE id=$courseId");

    
    if (!empty($courseDetail)) {
        setFlashData('courseDetail', $courseDetail);
    }else {
        redirect('admin/?module=course&action=lists');
    }
}

// Xử lý sửa người dùng
if(isPost()) {
    // Validate form
    $body = getBody(); // lấy tất cả dữ liệu trong form
    $errors = [];  // mảng lưu trữ các lỗi
    
    // Valide họ tên: Bắt buộc phải nhập, >=5 ký tự
    if(empty(trim($body['nameCourse']))) {
        $errors['nameCourse']['required'] = '** Bạn chưa nhập tên khóa học!';
    }
   // Kiểm tra mảng error
  if(empty($errors)) {
    // không có lỗi nào
    $dataUpdate = [
        'thumbnail' => $body['thumbnail'],
        'nameCourse' => $body['nameCourse'],
        'description' => $body['description'],
        'price' => $body['price'],
        'active_code' => $body['active_code'],
        'update_at' => date('Y-m-d H:i:s'),
    ];

    /////////////////////////////////////
    $condition = "id=$courseId";

    $updateStatus = update('course', $dataUpdate, $condition);
    if ($updateStatus) {
        setFlashData('msg', 'Cập nhật khóa học thành công');
        setFlashData('msg_type', 'success');
        redirect('admin/?module=course&action=lists');
  
    }

  }

  redirect('admin/?module=course&action=edit&id='.$courseId);

}
$msg =getFlashData('msg');
$msgType = getFlashData('msg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');
$courseDetail = getFlashData('courseDetail');

if (!empty($courseDetail) && empty($old)) {
    $old = $courseDetail;
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
                        <label for="name">Ảnh</label>
                        <div class="row ckfinder-group">
                            <div class="col-8">
                                <input type="text" name="thumbnail" id="name" class="form-control image-render" value="<?php echo old('thumbnail', $old); ?>">   
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-success choose-image">Chọn ảnh</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">Tên khóa học</label>
                        <input type="text" name="nameCourse" id="name" class="form-control slug" value="<?php echo old('nameCourse', $old); ?>">
                        <?php echo form_error('title', $errors, '<span class="error">', '</span>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="name">Mô tả ngắn</label>
                        <textarea name="description" class="form-control"><?php echo old('description', $old); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="name">Giá</label>
                        <input type="text" name="price" id="name" class="form-control slug" value="<?php echo old('price', $old); ?>">
                        <?php echo form_error('price', $errors, '<span class="error">', '</span>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="name">Code</label>
                        <input type="text" name="active_code" id="name" class="form-control slug" value="<?php echo old('active_code', $old); ?>">
                        <?php echo form_error('active_code', $errors, '<span class="error">', '</span>'); ?>
                    </div>

                </div>    
             
           <hr />
          
               <div class="d-flex">
                   <button type="submit" class="btn btn-primary">Cập nhật</button>
                   <a style="margin-left: 20px " href="<?php  echo getLinkAdmin('course', 'lists') ?>" class="btn btn-success">Quay lại trang danh sách</a>
                   <input type="hidden" name="id" value="<?php echo $courseId; ?>">
               </div>
         
           </form>
     </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->

<?php
layout('footer', 'admin');