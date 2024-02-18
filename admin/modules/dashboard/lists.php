<?php


$data = [
    'pageTitle' => 'Tổng quan'
];

layout('header', 'admin', $data);
layout('sidebar', 'admin', $data);

layout('breadcrumb', 'admin', $data);

?>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                
                <h3>6</h3>

                <p>Học viên</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php $numCourse = getRows("SELECT id FROM course"); ?>
                <h3><?php echo $numCourse ?></h3>

                <p>Khóa học</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              
                <h3>6</h3>

                <p>Bài viết</p>
              </div>
              <div class="icon">
                <i class="ion ion-home"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
             
              <?php $numOrder = getRows("SELECT id FROM ordercourse"); ?>
                <h3><?php echo $numOrder; ?></h3>

                <p>Đơn hàng</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row --> 
       <!-- /.row (main row) -->
       <!-- <img style="height: 450px; width: 100%; object-fit: cover" src="<?php echo _WEB_HOST_ADMIN_TEMPLATE ?>/assets/img/baner-dash.jpg" alt=""> -->
        <!-- <img style="height: 400px; width: 100%; object-fit: cover" src="https://engbreaking.com/wp-conten+t/uploads/2021/06/Top-25-Trung-Tam-Tieng-Anh-Tot-Nhat-2021.jpg" alt=""> -->
        <!-- <video src="/assets/img/phg.mp4" controls muted autoplay class="video-dashboard"></video> -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
<?php
layout('footer', 'admin');