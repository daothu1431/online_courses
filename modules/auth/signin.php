<?php
if (!defined('_INCODE')) die('Access Deined...');

//Xử lý đăng nhập
if (isPost()){
    $body = getBody();

    if (!empty(trim($body['email'])) && !empty(trim($body['password']))){
        //Kiểm tra đăng nhập
        $email = $body['email'];
        $password = $body['password'];

        //Truy vấn lấy thông tin user theo email
        $userQuery = firstRaw("SELECT id, password FROM student WHERE email='$email'");

        if (!empty($userQuery)){

            $passwordHash = $userQuery['password'];
            $studentId = $userQuery['id'];
            if (password_verify($password, $passwordHash)){

                //Tạo token login
                $tokenLogin = sha1(uniqid().time());

                //Insert dữ liệu vào bảng login_token
                $dataToken = [
                    'student_id' => $studentId,
                    'token' => $tokenLogin,
                    'create_at' => date('Y-m-d H:i:s')
                ];

                $insertTokenStatus = insert('student_logintoken', $dataToken);
                if ($insertTokenStatus){
                    //Insert token thành công       
                    //Lưu loginToken vào session
                    setSession('student_loginToken', $tokenLogin);
                    //Chuyển hướng qua trang quản lý users
                    redirect('?module=home&action=lists');
                }else{
                    setFlashData('msg', '** Vui lòng kiểm tra lại thông tin !');
                    setFlashData('msg_type', 'danger');
                }

            }else{
                setFlashData('msg', '** Mật khẩu chưa chính xác !');
                setFlashData('msg_type', 'danger');
            }
        }else{
            setFlashData('msg', '** Email chưa tồn tại trong hệ thống !');
            setFlashData('msg_type', 'danger');
        }
    }

    redirect('?module=auth&action=signin');
}

$msg = getFlashData('msg');
$msgType = getFlashData('msg_type');
$old = getFlashData('old');


?>


<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Đăng nhập</title>

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
                    <h1 class="auth__heading">Hello Again!</h1>
                    <p class="auth__desc">
                        Welcome back to sign in. As a returning customer, you have access to your previously saved all information.
                    </p>
                    <form action="" method="post" class="auth__form">
                        
                        <div class="form__text-input">
                            <input
                                type="email"
                                name="email"
                                placeholder="Email"
                                class="form__input"
                                required
                            />
                        </div>

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

                        <div class="auth__btn-group">
                            <button type="submit" class="btn-signin">Login</button>
                        </div>
                    </form>
                    <p class="auth__text">
                        You have an account yet?
                        <a href="<?php echo getLinkClient('auth', 'signup') ?>" class="auth__link">Sign Up</a>
                    </p>
                    <a href="<?php echo getLinkClient('auth', 'forgot') ?>" class="forgot-signin">Quên mật khẩu?</a>
                </div>
            </div>
        </main>

        <script src="./assets/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
    </body>
</html>
