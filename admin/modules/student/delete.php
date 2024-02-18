<?php

$body = getBody();

if(!empty($body['id'])) {
    $studentId = $body['id'];
    // Kiểm tra Id có tồn tại trong hệ thống hay không
    $userDetail = getRows("SELECT id FROM student WHERE id=$studentId");
    if($userDetail > 0) {
        // Thực hiện xóa
        // 1. Xóa logintoken(vì liên kết khóa ngoại)
        $deleteToken = delete('student_logintoken', "student_id=$studentId");
        if($deleteToken) {
            //2. Xóa user
            $deleteUser = delete('student', "id=$studentId");
            if($deleteUser) {
                setFlashData('msg', 'Xóa học viên thành công');
                setFlashData('msg_type', 'success');
            }else {
                setFlashData('msg', 'Lỗi hệ thống! Vui lòng thử lại sau');
                setFlashData('msg_type', 'danger');
            }
        } else {
                setFlashData('msg', 'Lỗi hệ thống! Vui lòng thử lại sau');
                setFlashData('msg_type', 'danger');
        }
    }else {
        setFlashData('msg', 'Học viên không tồn tại trên hệ thống');
        setFlashData('msg_type', 'danger');
    }
}else {
    setFlashData('msg', 'Liên kết không tồn tại');
    setFlashData('msg_type', 'danger');
}

redirect('admin/?module=student&action=lists');