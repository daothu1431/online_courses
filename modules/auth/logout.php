<?php
if (!defined('_INCODE')) die('Access Deined...');
/*File này chứa chức năng đăng xuất*/
if (isLoginStudent()){
    $token = getSession('student_loginToken');
    delete('student_logintoken', "token='$token'");
    removeSession('student_loginToken');
    redirect('?module=auth&action=signin');
}


