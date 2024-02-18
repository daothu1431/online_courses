<?php

$body = getBody();

if(!empty($body['id'])) {

    $chapterId = $body['id'];
    // Kiểm tra Id có tồn tại trong hệ thống hay không
    $chapterDetail = getRows("SELECT id FROM comments WHERE id=$chapterId");
    if($chapterDetail > 0) {
        // Thực hiện xóa
            $condition = "id=$chapterId";
   
            $deleteStatus = delete('comments', $condition);
            if(!empty($deleteStatus)) {
                setFlashData('msg', 'Xóa bình luận thành công');
                setFlashData('msg_type', 'success');
            }else {
                setFlashData('msg', 'Xóa bình luận không thành công. Vui lòng kiểm tra lại !');
                setFlashData('msg_type', 'danger');
            } 
    }
}


redirect('admin/?module=comments&action=lists');