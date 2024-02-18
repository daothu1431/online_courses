<?php
$data = [
    'pageTitle' => 'Thêm bài viết'
];

layout('header', 'admin', $data);
layout('sidebar', 'admin', $data);
layout('breadcrumb', 'admin', $data);


// Lấy userId dăng nhập
$userId = isLogin()['user_id'];

if(isPost()) {
     // Validate form
     $body = getBody(); // lấy tất cả dữ liệu trong form
     $errors = [];  // mảng lưu trữ các lỗi

     // Valide họ tên: Bắt buộc phải nhập, >=5 ký tự
    if(empty(trim($body['title']))) {
        $errors['title']['required'] = '** Bạn chưa nhập tiêu đề bài viết!';
    }else {
        if(strlen(trim($body['title'])) <= 5) {
        $errors['title']['min'] = '** Tiêu đề bài viết phải lớn hơn 5 ký tự!';
        }
    }
    // Kiểm tra mảng error
  if(empty($errors)) {

    $dataInsert = [
        'title' => $body['title'],
        'thumbnail' => $body['thumbnail'],
        'content' => $body['content'],
        'user_id' => $userId,
        'status' => $body['status'],
        'create_at' => date('Y-m-d H:i:s', ),
    ];
    $insertStatus = insert('blog', $dataInsert);
    if ($insertStatus) {
        setFlashData('msg', 'Thêm bài viết thành công');
        setFlashData('msg_type', 'success');
        redirect('admin/?module=blog&action=lists');
    }
  }
}

$msg =getFlashData('msg');
$msgType = getFlashData('msg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');

?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <form action="" method="post">
            <hr/>
            <?php echo getMsg($msg, $msgType);?>

                    <div class="form-group col-8">
                        <label for="name">Tiêu đề</label>
                        <input type="text" name="title" id="name" class="form-control slug" >
                        <?php echo form_error('title', $errors, '<span class="error">', '</span>'); ?>
                    </div>

                    <div class="form-group col-8">
                        <label for="name">Ảnh</label>
                        <div class="row ckfinder-group">
                            <div class="col-8">
                                <input type="text" name="thumbnail" id="name" class="form-control image-render" >   
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-success choose-image">Chọn ảnh</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-8" style="margin-top: 20px;">
                        <label for="name">Nội dung</label>
                        <textarea name="content" class="form-control editor"></textarea>
                    </div>

                    <div class="form-group col-8">
                        <label for="">Trạng thái</label>
                        <select name="status" class="form-control">
                            <option value="">Chọn trạng thái</option>
                            <option value="0" <?php echo (old('status', $old==0)) ? 'selected':false;  ?>>Chưa duyệt</option>
                            <option value="1" <?php echo (old('status', $old==1)) ? 'selected':false; ?>>Đã duyệt</option>
                        </select>
                    </div>

                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary" style="margin-left: 20px; margin-bottom: 20px">Thêm mới</button>
                        <a style="margin-left: 20px; margin-bottom: 20px " href="<?php  echo getLinkAdmin('blog', 'lists') ?>" class="btn btn-success">Quay lại trang danh sách</a>
                    </div>
                    
          
            </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<?php
layout('footer', 'admin');