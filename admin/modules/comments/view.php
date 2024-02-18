<?php

if(!defined('_INCODE'))
die('Access denied...');


$data = [
    'pageTitle' => 'Xem chi tiết'
];

layout('header', 'admin', $data);
layout('sidebar', 'admin', $data);
layout('breadcrumb', 'admin', $data);


// Xử lý hiện dữ liệu cũ của người dùng


$body = getBody();

if(!empty($body['id'])) {
    $commentsId = $body['id'];   
    $commentsDetail  = firstRaw("SELECT * FROM comments WHERE id=$commentsId");
    if (!empty($commentsDetail)) {
        // Tồn tại
        // Gán giá trị commentsDetail vào setFalsh
        setFlashData('commentsDetail', $commentsDetail);
    
    }else {
        redirect('admin/?module=comments&action=lists');
    }
}


?>
    <div class="container">
        <form action="" method="post">           
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Nội dung bình luận</label>
                        <textarea name="" class="form-control" readonly><?php echo $commentsDetail['content'] ?></textarea>
                    </div>        
                </div>         
            <a style="margin-left: 10px " href="?module=comments&action=lists" class="btn btn-success">Quay lại danh sách</a>
        </form>
    </div>


<?php
layout('footer', 'admin');





 