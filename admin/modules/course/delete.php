<?php

$body = getBody();

if(!empty($body['id'])) {

    $courseId = $body['id'];
    // Kiểm tra Id có tồn tại trong hệ thống hay không
    $courseDetail = getRows("SELECT id FROM course WHERE id=$courseId");
    if($courseDetail > 0) {
        // Thực hiện xóa
        $condition = "id=$courseId";

        // Kiểm tra xem trong nhóm còn người dùng không
        $userNum = getRows("SELECT id FROM chapter WHERE course_id=$courseId");
        if($userNum > 0) {
            setFlashData('msg', 'Xóa khóa học không thành công. Trong khóa còn '.$userNum.' chương học !');
            setFlashData('msg_type', 'danger');
        }else {
            $deleteStatus = delete('course', $condition);
            if(!empty($deleteStatus)) {
                setFlashData('msg', 'Xóa khóa học thành công');
                setFlashData('msg_type', 'success');
            }else {
                setFlashData('msg', 'Xóa khóa học không thành công. Vui lòng kiểm tra lại !');
                setFlashData('msg_type', 'danger');
            } 
        }

    }
}


redirect('admin/?module=course&action=lists');