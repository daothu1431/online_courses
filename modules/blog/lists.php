<?php
$data = [
    'pageTitle' => 'Danh sách bài viết'
];

$checkLogin = isLoginStudent();

    if (!empty($checkLogin)) {
        layout('last_header', 'client', $data);
    }
    if(empty($checkLogin)) {
        layout('header', 'client', $data);
    }


/// Xử lý phân trang
$allBlog = getRows("SELECT id FROM blog");
// 1. Xác định số lượng bản ghi trên 1 trang
$perPage = 2; // Mỗi trang có 3 bản ghi

//2. Tính số trang
$maxPage = ceil($allBlog / $perPage);

// 3. Xử lý số trang dựa vào phương thức GET
if(!empty(getBody()['page'])) {
    $page = getBody()['page'];
    if($page < 1 and $page > $maxPage) {
        $page = 1;
    }
}else {
    $page = 1;
}

$offset = ($page - 1) * $perPage;

// Lấy dứ liệu blog
$listblog = getRaw("SELECT blog.id, title, blog.thumbnail, blog.create_at, student.thumbnail as avatar, fullname, blog.status FROM blog INNER JOIN student ON blog.student_id = student.id WHERE blog.status = 1 ORDER BY blog.create_at DESC LIMIT $offset, $perPage");

// Xử lý query string tìm kiếm với phân trang
$queryString = null;
if (!empty($_SERVER['QUERY_STRING'])) {
    $queryString = $_SERVER['QUERY_STRING'];
    $queryString = str_replace('module=blog','', $queryString);
    $queryString = str_replace('&page='.$page, '', $queryString);
    $queryString = trim($queryString, '&');
    $queryString = '&'.$queryString;
}

?>


   <!-- Main -->
            <div class="container">
                <section class="blog-pages">
                    <h1 class="heading-lv1">Bài viết nổi bật</h1>
                    <p class="all-desc">Tổng hợp các bài viết chia sẻ về kinh nghiệm tự học lập trình online và các kỹ thuật lập trình web.</p>
                    <div class="row blog-pages__body">
                        <div class="col-lg-9 col-md-12 col-12">
                            <div class="blog-inner__left">
                                <!-- Item 1 -->
                                <?php foreach($listblog as $item): ?>
                                    <div class="blog-pages-item">
                                        <div class="blog-pages-item__info">
                                            <img src="<?php echo $item['avatar'] ?>" class="blog-pages-item__info-avatar" alt="">
                                            <span class="blog-pages-item__info-name"><?php echo $item['fullname'] ?></span>
                                        </div>

                                        <div class="blog-pages-item__media">
                                            <div class="blog-pages-item__author">
                                                <a href="<?php echo _WEB_HOST_ROOT.'?module=blog&action=detail&id='.$item['id']; ?>"><h2 class="heading-lv2 blog-pages-item__title"><?php echo $item['title'] ?></h2></a>
                                                <p class="blog-pages-item__desc desc-wrap">Authentication và Authorization là một phần quan trọng trong việc phát triển phần mềm, giúp chúng ta xác thực và phân quyền</p>
                                            </div>
                                            <div class="blog-pages-item__thumb">
                                                <a href="<?php echo _WEB_HOST_ROOT.'?module=blog&action=detail&id='.$item['id']; ?>">
                                                    <img src="<?php echo $item['thumbnail'] ?>" class="blog-pages-item-image" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                
                
                <nav>
                    <ul class="pagination">
                        <?php
                            if($page > 1) {
                                $prePage = $page - 1;
                            echo '<li class="pagination-item"><a class="pagination-item__link" href="'._WEB_HOST_ROOT.'/?module=blog'.$queryString. '&page='.$prePage.'"><i class="pagination-item__icon"> << </i></a></li>';
                            }
                        ?>


                        <?php 
                            // Giới hạn số trang
                            $begin = $page - 5;
                            $end = $page + 5;
                            if($begin < 1) {
                                $begin = 1;
                            }
                            if($end > $maxPage) {
                                $end = $maxPage;
                            }
                            for($index = $begin; $index <= $end; $index++){  ?>
                        <li class="pagination-item <?php echo ($index == $page) ? 'pagination-item__active' : false; ?> ">
                            <a class="pagination-item__link" href="<?php echo _WEB_HOST_ROOT.'?module=blog'.$queryString.'&page='.$index;  ?>"> <?php echo $index;?> </a>
                        </li>
                        <?php  } ?>
                        
                        <?php
                            if($page < $maxPage) {
                                $nextPage = $page + 1;
                                echo '<li class="pagination-item"><a class="pagination-item__link" href="'._WEB_HOST_ROOT.'?module=blog'.$queryString.'&page='.$nextPage.'"><i class="pagination-item__icon"> >> </i></a></li>';
                            }
                        ?>
                    </ul>
                </nav>                      
                            </div>
                        </div>                    
                    </div>
                </section>

            </div>
<?php
layout('footer', 'client');