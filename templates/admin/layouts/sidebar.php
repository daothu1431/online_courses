 <?php
  $userId = isLogin()['user_id'];
  $userDetail = getUserInfo($userId);

  // Kiểm tra phân quyền
$groupId = getGroupId();

$permissionData = getPermissionData($groupId);


?>
 
 
 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo _WEB_HOST_ROOT_ADMIN.'/?module='; ?>" class="brand-link">
      <span class="brand-text font-weight-light text-uppercase">EDUCATION</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo _WEB_HOST_ADMIN_TEMPLATE; ?>/assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo getLinkAdmin('users','profile') ?>" class="d-block"><?php echo $userDetail['fullname'];  ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo  _WEB_HOST_ROOT_ADMIN.'/?module=' ?>" class="nav-link  <?php echo (activeMenuSidebar('')) ? 'active':false;  ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <?php if(checkPermission($permissionData, 'course', 'lists')): ?>
          <li class="nav-item has-treeview <?php echo activeMenuSidebar('course')?'menu-open':false; ?>">
            <a href="#" class="nav-link <?php echo activeMenuSidebar('course')?'active':false; ?>">
              <i class="nav-icon fas fa-star"></i>
              <p>
                <?php $numCourse = getRows("SELECT id FROM course") ?>
                Quản lý khóa học
                <i class="right fas fa-angle-left"></i>
                <span class="badge badge-danger"><?php echo $numCourse ?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo getLinkAdmin('course', 'lists'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo getLinkAdmin('course', 'add'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>

          <?php if(checkPermission($permissionData, 'chapter', 'lists')): ?>
          <li class="nav-item has-treeview <?php echo activeMenuSidebar('chapter')?'menu-open':false; ?>">
            <a href="#" class="nav-link <?php echo activeMenuSidebar('chapter')?'active':false; ?>">
              <i class="nav-icon fas fa-palette"></i>
              <p>
                Quản lý học phần
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo getLinkAdmin('chapter', 'lists'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo getLinkAdmin('chapter', 'add'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>


          <?php if(checkPermission($permissionData, 'lesson', 'lists')): ?>
          <li class="nav-item has-treeview <?php echo activeMenuSidebar('lesson')?'menu-open':false; ?>">
            <a href="#" class="nav-link <?php echo activeMenuSidebar('lesson')?'active':false; ?>">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Quản lý bài học
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo getLinkAdmin('lesson', 'lists'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo getLinkAdmin('lesson', 'add'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>


          <?php if(checkPermission($permissionData, 'blog', 'lists')): ?>
          <li class="nav-item has-treeview <?php echo activeMenuSidebar('blog')?'menu-open':false; ?>">
            <a href="#" class="nav-link <?php echo activeMenuSidebar('blog')?'active':false; ?>">
              <i class="nav-icon fas fa-solid fa-blog"></i>
              <p>
                <?php $numBlog = getRows("SELECT id FROM blog WHERE status=0") ?>
                Quản lý bài viết
                <i class="right fas fa-angle-left"></i>
                <span class="badge badge-danger"><?php echo $numBlog ?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo getLinkAdmin('blog', 'lists'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo getLinkAdmin('blog', 'add'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>


          <?php if(checkPermission($permissionData, 'orderCourse', 'lists')): ?>
          <li class="nav-item has-treeview <?php echo activeMenuSidebar('orderCourse')?'menu-open':false; ?>">
            <a href="#" class="nav-link <?php echo activeMenuSidebar('orderCourse')?'active':false; ?>">
              <i class="nav-icon fas fa-solid fa-blog"></i>
              <p>
                Quản lý đơn hàng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo getLinkAdmin('orderCourse', 'lists'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo getLinkAdmin('orderCourse', 'add'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>

          
          <li class="nav-item has-treeview <?php echo activeMenuSidebar('comments')?'menu-open':false; ?>">
            <a href="#" class="nav-link <?php echo activeMenuSidebar('comments')?'active':false; ?>">
              <i class="nav-icon fas fa-solid fa-blog"></i>
              <p>
                <?php $numComments = getRows("SELECT id FROM comments")  ?>
                Quản lý bình luận
                <i class="right fas fa-angle-left"></i>
                <span class="badge badge-danger"><?php echo $numComments ?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo getLinkAdmin('comments', 'lists'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo getLinkAdmin('comments', 'add'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
            </ul>
          </li>
          
          <?php if(checkPermission($permissionData, 'student', 'lists')): ?>
          <li class="nav-item has-treeview <?php echo activeMenuSidebar('student')?'menu-open':false; ?>">
            <a href="#" class="nav-link <?php echo activeMenuSidebar('student')?'active':false; ?>">
              <i class="nav-icon fas fa-solid fa-blog"></i>
              <p>
                <?php $numStudent = getRows("SELECT id FROM student")  ?>
                Quản lý học viên
                <i class="right fas fa-angle-left"></i>
                <span class="badge badge-danger"><?php echo $numStudent ?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo getLinkAdmin('student', 'lists'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo getLinkAdmin('student', 'add'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>

          <li class="nav-item has-treeview <?php echo activeMenuSidebar('revenue')?'menu-open':false; ?>">
            <a href="#" class="nav-link  <?php echo activeMenuSidebar('revenue')?'active':false; ?>">
              <i class="nav-icon fas fa-user"></i>           
              <p>
                 Thống kê
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo getLinkAdmin('revenue', 'lists'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Doanh thu</p>
                </a>
              </li>
            </ul>
          </li>
          

          <?php if(checkPermission($permissionData, 'groups', 'lists')): ?>
          <li class="nav-item has-treeview <?php echo activeMenuSidebar('groups')?'menu-open':false; ?>">
            <a href="#" class="nav-link <?php echo activeMenuSidebar('groups')?'active':false; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Nhóm người dùng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo getLinkAdmin('groups', 'lists'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo getLinkAdmin('groups', 'add'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
         

          <?php if(checkPermission($permissionData, 'users', 'lists')): ?>
          <li class="nav-item has-treeview <?php echo activeMenuSidebar('users')?'menu-open':false; ?>">
            <a href="#" class="nav-link  <?php echo activeMenuSidebar('users')?'active':false; ?>">
              <i class="nav-icon fas fa-user"></i>
             
              <p>
                <?php $numUser = getRows("SELECT id FROM users")  ?>
                 Quản lý User
                <i class="right fas fa-angle-left"></i>
                <span class="badge badge-danger"><?php echo $numUser ?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo getLinkAdmin('users', 'lists'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo getLinkAdmin('users', 'add'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">