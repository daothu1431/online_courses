<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $data['pageTitle']; ?></title>

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
        <!-- Style CSS -->
        <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATE?>/assets/css/flake.css" />

        <!-- Responsive -->
        <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATE?>/assets/css/responsive.css" />

        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    </head>
    <body>


        <!-- HEADER PC   -->
        <header class="header fixed">
            <div class="container">
                <div class="top-bar">

                    <!-- B3 -->
                    <!-- Tablet/mobile menu -->
                    <label for="menu-checkbox" class="toggle-menu">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512"
                        >
                            <path
                                d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"
                            />
                        </svg>
                    </label>

                    <!-- Logo -->
                    <a href="<?php echo _WEB_HOST_ROOT.'?module=home' ?>" class="logo">
                        <img
                            src="<?php echo _WEB_HOST_TEMPLATE ?>/assets/img/dt_logo.png"
                            alt=""
                            class="logo__image"
                        />
                    </a>

                    <!-- Navbar -->
                    <nav class="navbar">
                        <ul class="navbar__list">
                            <li class="navbar__item ">
                                <a href="<?php echo _WEB_HOST_ROOT.'?module=home' ?>" class="navbar__link ">
                                    <img src="<?php echo _WEB_HOST_TEMPLATE ?>/assets/icon/home.svg" class="icon-navbar" alt="">
                                    Trang chủ
                                </a>
                            </li>
                            <li class="navbar__item">
                                <a href="<?php echo _WEB_HOST_ROOT.'?module=learn_path&action=page' ?>" class="navbar__link">
                                    <img src="<?php echo _WEB_HOST_TEMPLATE ?>/assets/icon/learn_path-icon.svg" class="icon-navbar" alt="">
                                    Lộ trình
                                </a>
                            </li>
                            <li class="navbar__item">
                                <a href="<?php echo _WEB_HOST_ROOT.'?module=blog&action=lists' ?>" class="navbar__link">
                                    <img src="<?php echo _WEB_HOST_TEMPLATE ?>/assets/icon/blog_icon.svg" class="icon-navbar" alt="">
                                    Bài viết
                                </a>
                            </li>
                            <li class="navbar__item">
                                <a href="<?php echo _WEB_HOST_ROOT.'?module=contact&action=page'?>" class="navbar__link">
                                    <img src="<?php echo _WEB_HOST_TEMPLATE ?>/assets/icon/contact_icon.svg" class="icon-navbar" alt="">
                                    Liên hệ
                                </a>
                            </li>
                        </ul>
                    </nav>

                    

                    <!-- Action -->
                    <div class="action">
                        <form action="<?php echo _WEB_HOST_ROOT.'?module=search&action=lists'?>" method="post" class="form-search__header">
                            <input type="search" name="keyword" class="input-search" placeholder="Tìm kiếm khóa học ..." required>
                            <button class="top-act__btn " type="submit">
                                <img src="<?php echo _WEB_HOST_TEMPLATE ?>/assets/icon/search.svg" alt="search" class="top-act__icon">
                            </button>
                        </form>
                        <a href="<?php echo getLinkClient('auth','signup') ?>" class="action__singup">Đăng ký</a>
                        <a href="<?php echo getLinkClient('auth','signin') ?>" class="action__signin">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- TABLET/ MOBILE HEADER -->
        <header class="mobile-header">
            <!-- Checkbox -->
            <input
            type="checkbox"
            name="menu-checkbox"
            class="menu-checkbox"
            id="menu-checkbox"
            hidden
            />

            <!-- Overlay -->
            <label for="menu-checkbox" class="menu-overlay"></label>

            <!-- Menu-content -->
            <div class="menu-drawer">
                 <!-- Logo -->
                 <a href="<?php echo _WEB_HOST_ROOT.'?module=home' ?>" class="logo">
                    <img
                        src="<?php echo _WEB_HOST_TEMPLATE?>/assets/img/dt_logo.png"
                        alt=""
                        class="menu-drawer__logo"
                    />
                </a>

                <!-- Navbar -->
               
                    <ul class="">
                        <li class="navbar__item">
                            <a href="<?php echo _WEB_HOST_ROOT.'?module=home' ?>" class="navbar__link"
                                >Trang chủ</a
                            >
                        </li>
                        <li class="navbar__item">
                            <a href="<?php echo _WEB_HOST_ROOT.'?module=learn_path&action=page' ?>" class="navbar__link">Lộ trình</a>
                        </li>
                        <li class="navbar__item">
                            <a href="<?php echo _WEB_HOST_ROOT.'?module=blog&action=lists' ?>" class="navbar__link">Bài viết</a>
                        </li>
                        <li class="navbar__item">
                            <a href="<?php echo _WEB_HOST_ROOT.'?module=contact&action=page'?>" class="navbar__link">Liên hệ</a>
                        </li>
                        <div class="space"></div>
                        <li class="navbar__item show-on-mobile">
                            <a href="<?php echo getLinkClient('auth','signin') ?>" class="navbar__link">Đăng nhập</a>
                        </li>
                        <li class="navbar__item show-on-mobile">
                            <a href="<?php echo getLinkClient('auth','signup') ?>" class="navbar__link">Đăng ký</a>
                        </li>
                     
                    </ul>
              

            </div>
        </header>
