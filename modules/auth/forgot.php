<?php
if (!defined('_INCODE')) die('Access Deined...');
/*File này chứa chức năng quên mật khẩu*/
$data = [
    'pageTitle' => 'Đặt lại mật khẩu'
];



//Xử lý đăng nhập
if (isPost()){
    $body = getBody();
    if (!empty($body['email'])){
        $email = $body['email'];
        $queryUser = firstRaw("SELECT id FROM student WHERE email='$email'");

        if (!empty($queryUser)){

            $user_id = $queryUser['id'];

            //Tạo forget_token
            $forget_token = sha1(uniqid().time());

            $dataUpdate = [
                'forget_token' => $forget_token
            ];

            $updateStatus = update('student', $dataUpdate, "id=$user_id");

            if ($updateStatus){

                //Tạo link khôi phục
                $link = _WEB_HOST_ROOT.'/?module=auth&action=reset&token='.$forget_token;

                //Thiết lập gửi email
                $subject = 'Yêu cầu khôi phục mật khẩu';
                $content = '<img src="https://fullstack.edu.vn/static/media/f8-icon.18cd71cfcfa33566a22b.png">'.'<br/>';
                $content .= 'Chào bạn: '.$email.'<br />';
                $content .= 'Chúng tôi nhận được yêu cầu khôi phục mật khẩu từ bạn. Vui lòng click vào link sau để khôi phục'.'<br />';
                $content .= $link.'<br />';
                $content .= 'Trân trọng !';

                //Tiến hành gửi email
                $senStatus = sendMail($email, $subject, $content);
                if (!empty($senStatus)){
                    setFlashData('msg', 'Vui lòng kiểm tra email !');
                    setFlashData('msg_type', 'success');
                }
            }

        }else{
            setFlashData('msg', '** Email chưa được kích hoạt!');
            setFlashData('msg_type', 'danger');
        }
    }

    redirect('/?module=auth&action=forgot');
}

$msg = getFlashData('msg');
$msgType = getFlashData('msg_type');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Forgot</title>

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
            }, 3000);
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
                    <h1 class="auth__heading">Forgot!</h1>
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
                        <div class="auth__btn-group">
                            <button type="submit" class="btn-signin">Submit</button>
                        </div>
                    </form>
                    <p class="auth__text">
                        You have an account yet?
                        <a href="<?php echo getLinkClient('auth', 'signin') ?>" class="auth__link">Sign in</a>
                    </p>
                </div>
            </div>
        </main>

        <script src="./assets/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
    </body>
</html>