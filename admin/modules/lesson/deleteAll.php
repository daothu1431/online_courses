<?php



    // Kiểm tra Id có tồn tại trong hệ thống hay không
    $lessonDetail = getRows("SELECT id FROM lesson");
    if($lessonDetail > 0) {
        // Thực hiện xóa
           
   
            $deleteStatus = delete('lesson', $condition='');
            if(!empty($deleteStatus)) {
                setFlashData('msg', 'Xóa bài học thành công');
                setFlashData('msg_type', 'success');
            }else {
                setFlashData('msg', 'Xóa bài học không thành công. Vui lòng kiểm tra lại !');
                setFlashData('msg_type', 'danger');
            } 
    }


redirect('admin/?module=lesson&action=lists');