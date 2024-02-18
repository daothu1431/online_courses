<?php

if(!defined('_INCODE'))
die('Access denied...');


$data = [
    'pageTitle' => 'Cập nhật thông tin học viên'
];

layout('header', 'admin', $data);
layout('sidebar', 'admin', $data);
layout('breadcrumb', 'admin', $data);


// Xử lý hiện dữ liệu cũ của người dùng
$body = getBody();
if(!empty($body['id'])) {
    $studentId = $body['id'];
   
    $userDetail  = firstRaw("SELECT * FROM student WHERE id=$studentId");
    if (!empty($userDetail)) {
        // Tồn tại
        // Gán giá trị userDetail vào setFalsh
        setFlashData('userDetail', $userDetail);
    
    }else {
    redirect('admin/?module=student&action=lists');
    }
}


// Xử lý sửa người dùng
if(isPost()) {
    // Validate form
    $body = getBody(); // lấy tất cả dữ liệu trong form
    $errors = [];  // mảng lưu trữ các lỗi
    
    // Valide họ tên: Bắt buộc phải nhập, >=5 ký tự
    if(empty(trim($body['fullname']))) {
        $errors['fullname']['required'] = '** Bạn chưa nhập họ tên!';
    }else {
        if(strlen(trim($body['fullname'])) <= 5) {
        $errors['fullname']['min'] = '** Họ tên phải lớn hơn 5 ký tự!';
        }
    }

   // Validate Email : Bắt buộc phải nhập, định dạng email, k trùng nhau

   if(empty(trim($body['email']))) {
     $errors['email']['required'] = '** Bạn chưa nhập Email!';
   }else {
    //Kiểm tra eamil có hợp lệ không
    if (!isEmail(trim($body['email']))) {
        $errors['email']['isEmail'] = '** Email không hợp lệ!';
    }else {
        //Kiểm tra Email có tồn tại trong DB không
        $email = trim($body['email']);
        $sql = "SELECT id FROM student WHERE email='$email' AND id<>$studentId";
        if(getRows($sql) > 0) {
            $errors['email']['unique'] = '** Địa chỉ email đã tồn tại'; 
        }
    }
   }

   //Validate nhập lại Password: Bắt buộc phải nhập, giống Password
   if (!empty(trim($body['password']))) {
    // Chỉ validate comfirm_password nếu password được nhập 
       if(empty(trim($body['confirm_password']))) {
            $errors['confirm_password']['required'] = '** Bạn chưa xác nhận lại mật khẩu !';
       }else{
            if(trim($body['password']) != trim($body['confirm_password'])) {
                $errors['confirm_password']['match'] = '** Xác nhận lại mật khẩu chưa trùng khớp';
            }
       }
   }
   
   // Kiểm tra mảng error
  if(empty($errors)) {
    // không có lỗi nào
    $dataUpdate = [
        'email' => $body['email'],
        'phone' => $body['phone'],
        'thumbnail' => $body['thumbnail'],
        'fullname' => $body['fullname'],
        'update_at' => date('Y-m-d H:i:s'),
    ];

    // Trường hợp password được sửa
    if (!empty(trim($body['password']))) { 
        $dataUpdate['password'] = password_hash($body['password'], PASSWORD_DEFAULT);
    }
    /////////////////////////////////////
    $condition = "id=$studentId";
    $updateStatus = update('student', $dataUpdate, $condition);
    if ($updateStatus) {
        setFlashData('msg', 'Cập nhật thông tin học viên thành công');
        setFlashData('msg_type', 'success');
        redirect('admin/?module=student');
    }else {
    setFlashData('msg', 'Hệ thống đang gặp sự cố, vui lòng thử lại sau');
    setFlashData('msg_type', 'danger');
}

  }else {
    // Có lỗi xảy ra
    setFlashData('msg', 'Vui lòng kiểm tra chính xác thông tin nhập vào');
    setFlashData('msg_type', 'danger');
    setFlashData('errors', $errors);
    setFlashData('old', $body);  // giữ lại các trường dữ liệu hợp lê khi nhập vào
  }

  redirect('admin/?module=student&action=edit&id='.$studentId);

}
$msg =getFlashData('msg');
$msgType = getFlashData('msg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');
// $userDetail = getFlashData('userDetail');

if (!empty($userDetail) && empty($old)) {
    $old = $userDetail;
}

?>
    <div class="container">
        <hr/>
        <hr/>
        <?php
            getMsg($msg, $msgType);
        ?>

        <form action="" method="post">
            <div class="row">
                <div class="col">

                    <div class="form-group">
                        <label for="name">Ảnh</label>
                        <div class="row ckfinder-group">
                            <div class="col-8">
                                <input type="text" name="thumbnail" id="name" class="form-control image-render" value="<?php echo old('thumbnail', $old); ?>">   
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-success choose-image"><i class="nav-icon fas fa-solid fa-upload"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Họ tên</label>
                        <input type="text" name="fullname" id="" class="form-control" value="<?php echo old('fullname', $old); ?>">
                        <?php echo form_error('fullname', $errors, '<span class="error">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" id="" class="form-control"  value="<?php echo old('email', $old); ?>">
                        <?php echo form_error('email', $errors, '<span class="error">', '</span>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" name="phone" id="" class="form-control" value="<?php echo old('phone', $old); ?>">
                        <?php echo form_error('phone', $errors, '<span class="error">', '</span>'); ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input type="password" name="password" id="" class="form-control" placeholder="Không nhập nếu không thay đổi...">
                        <?php echo form_error('password', $errors, '<span class="error">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="">Nhập lại mật khẩu</label>
                        <input type="password" name="confirm_password" id="" class="form-control" placeholder="Không nhập nếu không thay đổi...">
                        <?php echo form_error('confirm_password', $errors, '<span class="error">', '</span>'); ?>
                    </div>
                </div>              
            </div>
            <div class="col">
                <div class="btn-row">
                    <button type="submit" class="btn btn-primary">Cập nhật học viên</button>
                    <a style="margin-left: 40px " href="?module=student&action=lists" class="btn btn-success">Trở về</a>
                    <input type="hidden" name="id" value="<?php echo $studentId; ?>">
                </div>
            </div>
        </form>
    </div>


<?php
layout('footer', 'admin');





