<?php
if (!defined('_INCODE')) die('Access Deined...');
/*File này chứa chức năng đặt lại mật khẩu*/

$token = getBody()['token'];

if (!empty($token)){

    //Truy vấn kiểm tra token với database
    $tokenQuery = firstRaw("SELECT id, email FROM student WHERE forget_token='$token'");

    if (!empty($tokenQuery)){
        $user_id = $tokenQuery['id'];
        $email = $tokenQuery['email'];

        if (isPost()){

            $body = getBody();

            $errors = []; //Mảng lưu trữ các lỗi

            //Validate mật khẩu: Bắt buộc phải nhập, >=8 ký tự
            if (empty(trim($body['password']))){
                $errors['password']['required'] = '** Mật khẩu bắt buộc phải nhập!';
            }else{
                if (strlen(trim($body['password'])) < 6){
                    $errors['password']['min'] = '** Mật khẩu không được nhỏ hơn 6 ký tự!';
                }
            }

            //Validate nhập lại mật khẩu: Bắt buộc phải nhập, giống trường mật khẩu
            if (empty(trim($body['confirm_password']))){
                $errors['confirm_password']['required'] = '** Xác nhận mật khẩu không được để trống!';
            }else{
                if (trim($body['password'])!=trim($body['confirm_password'])){
                    $errors['confirm_password']['match'] = '** Mật khẩu không khớp nhau!';
                }
            }

            if (empty($errors)){
                //xử lý update mật khẩu
                $passwordHash = password_hash($body['password'], PASSWORD_DEFAULT);
                
                $dateUpdate = [
                    'password' => $passwordHash,
                    'forget_token' => null,
                    'update_at' => date('Y-m-d H:i:s')
                ];
                $updateStatus = update('student', $dateUpdate, "id=$user_id");
                if ($updateStatus){

                    setFlashData('msg', 'Thay đổi mật khẩu thành công');
                    setFlashData('msg_type', 'success');

                    //Gửi email thông báo khi đổi xong
                    $subject = 'Bạn vừa đổi mật khẩu';
                    $content = '<strong>Chúc mừng bạn đã đổi mật khẩu thành công!</strong>';
                    sendMail($email, $subject, $content);

                    redirect('?module=auth&action=signin');
                }else{
                    setFlashData('msg', 'Lỗi hệ thống! Bạn không thể đổi mật khẩu');
                    setFlashData('msg_type', 'danger');

                    redirect('?module=auth&action=reset&token='.$token);
                }

            }else{
                setFlashData('msg', 'Vui lòng kiểm tra dữ liệu nhập vào');
                setFlashData('msg_type', 'danger');
                setFlashData('errors', $errors);
                redirect('?module=auth&action=reset&token='.$token);
            }

            //redirect('?module=auth&action=reset&token='.$token);
        } //End isPost()

        $msg = getFlashData('msg');
        $msgType = getFlashData('msg_type');
        $errors = getFlashData('errors');

        ?>
        
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Đổi mật khẩu</title>

       <!-- Reset CSS -->
       <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATE?>/assets/css/reset.css" />

        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;1,400&family=Sen:wght@700&display=swap"
            rel="stylesheet"
        />

         <!-- Bootstrap -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

         <!-- Grid -->
         <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATE?>/assets/css/grid_system.css" />

        <!-- Style CSS -->
        <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATE?>/assets/css/style.css" />

        <!-- Responsive -->
        <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATE?>/assets/css/responsive.css" />

       
    </head>
    <body>
        
        <div class="toast-signin">
            <?php echo getMsg($msg, $msgType) ?>
        </div>
        <script>
            let toast = document.querySelector('.toast-signin');
            toast.style.display = 'block';
            setTimeout(function() {
                toast.style.display = 'none';
            }, 4000);
        </script>
        <main class="auth">
            <!-- Auth intro -->
            <div class="auth__intro">
                <img
                    src="<?php echo _WEB_HOST_TEMPLATE?>/assets/icon/auth_img.svg"
                    alt=""
                    class="auth__intro-img"
                />
                
                <p class="auth__intro-text">
                    The best of luxury brand values, high quality products, and
                    innovative services
                </p>
            </div>
            <!-- Auth content -->
            <div class="auth__content">
                <div class="auth__content-inner">
                    <!-- Logo -->
                    <a href="<?php echo _WEB_HOST_ROOT.'?module=home' ?>" class="logo">
                        <img
                            src="<?php echo _WEB_HOST_TEMPLATE?>/assets/img/dt_logo.png"
                            alt=""
                            class="logo__image"
                        />
                    </a>
                    <h1 class="auth__heading">Reset pass</h1>
                    <p class="auth__desc">
                        Welcome back to sign in. As a returning customer, you have access to your previously saved all information.
                    </p>
                    <form action="" method="post" class="auth__form">
                        
                        <div class="form__text-input">
                            <input
                                type="password"
                                name="password"
                                placeholder="Password"
                                class="form__input"
                                required
                                minlength="6"
                            />
                        </div>

                        <div class="form__text-input">
                            <input
                                type="password"
                                name="confirm_password"
                                placeholder="Confirm password"
                                class="form__input"
                                required
                                minlength="6"
                            />
                        </div>

                        <div class="auth__btn-group">
                            <button type="submit" class="btn-signin">Submit</button>
                        </div>
                        <p class="auth__text">
                            You have an account yet?
                            <a href="<?php echo getLinkClient('auth', 'signup') ?>" class="auth__link">Sign Up</a>
                        </p>
                        <input type="hidden" name="token" value="<?php echo $token; ?>">
                    </form>
                </div>
            </div>
        </main>

        <script src="./assets/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
    </body>
</html>
        <?php

    }else{
        getMsg('Liên kết không tồn tại hoặc đã hết hạn', 'danger');
    }
}else{
    getMsg('Liên kết không tồn tại hoặc đã hết hạn', 'danger');
}
