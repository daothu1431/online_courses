<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');


$data = [
    'pageTitle' => 'Đăng ký tài khoản'
];


// sendMail('thu86065@st.vimaru.edu.vn', '', 'Xác nhận đăng kí');

// Xử lý đăng ký
if(isPost()) {
    // Validate form
    $body = getBody(); // lấy tất cả dữ liệu trong form
    $errors = [];  // mảng lưu trữ các lỗi
    
    // Valide họ tên: Bắt buộc phải nhập, >=5 ký tự
    if(empty(trim($body['fullname']))) {
        $errors['fullname']['required'] = '** Bạn chưa nhập họ tên!';
    }else {
        if(strlen(trim($body['fullname'])) <= 5) {
        $errors['fullname']['min'] = '** Họ tên phải lớn hơn 5 ký tự!';
        }
    }

    // validate số điện thoại: Bắt buộc phải nhập, định dạng số điện thoại
   if(empty(trim($body['phone']))) {
        $errors['phone']['required'] = '** Bạn chưa nhập số điện thoại!';
   }else {
     if (!isPhone(trim($body['phone']))) {
        $errors['phone']['isPhone'] = '** Số điện thoại không hợp lệ';
     }
   }

   // Validate Email : Bắt buộc phải nhập, định dạng email, k trùng nhau

   if(empty(trim($body['email']))) {
     $errors['email']['required'] = '** Bạn chưa nhập Email!';
   }else {
    //Kiểm tra eamil có hợp lệ không
    if (!isEmail(trim($body['email']))) {
        $errors['email']['isEmail'] = '** Email không hợp lệ!';
    }else {
        //Kiểm tra Email có tồn tại trong DB không
        $email = trim($body['email']);
        $sql = "SELECT id FROM student WHERE email='$email'";
        if(getRows($sql) > 0) {
            $errors['email']['unique'] = '** Địa chỉ email đã tồn tại'; 
        }
    }
   }

   //Validate mật khẩu: Bắt buộc phải nhập, >=8 ký tự
   if(empty(trim($body['password']))) {
        $errors['password']['required'] = '** Bạn chưa nhập mật khẩu !';
   }else {
        if(strlen($body['password']) < 6) {
            $errors['password']['min'] = '** Mật khẩu phải lớn hơn 6 ký tự !';
        }
   }

   //Validate nập lại Password: Bắt buộc phải nhập, giống Password
   if(empty(trim($body['confirm_password']))) {
        $errors['confirm_password']['required'] = '** Bạn chưa xác nhận lại mật khẩu !';
   }else{
        if(trim($body['password']) != trim($body['confirm_password'])) {
            $errors['confirm_password']['match'] = '** Xác nhận lại mật khẩu chưa trùng khớp';
        }
   }
   

   // Kiểm tra mảng error
  if(empty($errors)) {
    // không có lỗi nào
    // $activeToken = sha1(uniqid().time());
    $dataInsert = [
        'email' => $body['email'],
        'fullname' => $body['fullname'],
        'phone' => $body['phone'],
        'password' => password_hash($body['password'], PASSWORD_DEFAULT),
        // 'activeToken' => $activeToken,
        'create_at' => date('Y-m-d H:i:s'),
    ];

    $insertStatus = insert('student', $dataInsert);
   if ($insertStatus) {
    setFlashData('msg', '** Đăng ký tài khoản thành công!');
    setFlashData('msg_type', 'success');
    redirect('?module=auth&action=signin');
}else {
    setFlashData('msg', '** Hệ thống đang gặp sự cố, vui lòng thử lại sau!');
    setFlashData('msg_type', 'danger');
    redirect('?module=auth&action=signup');
}

  }else {
    // Có lỗi xảy ra
    setFlashData('msg', '** Vui lòng kiểm tra dữ liệu nhập vào!');
    setFlashData('msg_type', 'danger');
    setFlashData('errors', $errors);
    setFlashData('old', $body);  // giữ lại các trường dữ liệu hợp lê khi nhập vào
    // redirect('?module=auth&action=signup'); // Load lại trang đki
  }
}

$msg = getFlashData('msg');
$msgType = getFlashData('msg_type');
$old = getFlashData('old');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Đăng ký</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
       <!-- Reset CSS -->
       <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATE?>/assets/css/reset.css" />

        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;1,400&family=Sen:wght@700&display=swap"
            rel="stylesheet"
        />

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
                    <h1 class="auth__heading">Sign Up</h1>
                    <p class="auth__desc">
                        Let’s create your account and Shop like a pro and save
                        money.
                    </p>
                    <form action="" method="post" class="auth__form">
                        <div class="form__text-input">
                            <input
                                type="text"
                                name="fullname"
                                placeholder="Name"
                                class="form__input"
                                required
                                minlength="6"
                            />
                        </div>

                        <div class="form__text-input">
                            <input
                                type="text"
                                name="phone"
                                placeholder="Phone"
                                class="form__input"
                                required
                                maxlength="10"
                            />
                        </div>

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

                        <div class="form__text-input">
                            <input
                                type="password"
                                name="confirm_password"
                                placeholder="Confirm Password"
                                class="form__input"
                                required
                                minlength="6"
                            />
                        </div>

                        <div class="auth__btn-group">
                            <button class="btn-signin">Sign Up</button>
                        </div>
                    </form>
                    <p class="auth__text">
                        You have an account yet?
                        <a href="<?php echo getLinkClient('auth', 'signin') ?>" class="auth__link">Sign In</a>
                    </p>
                </div>
            </div>
        </main>

        <script src="<?php echo _WEB_HOST_TEMPLATE?>/assets/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
    </body>
</html>
