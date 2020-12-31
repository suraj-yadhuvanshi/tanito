  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <?php if($this->session->userdata('user')) {
              $admin=$this->session->userdata('user');
               }
                  if($admin->usertype==0)
                  {
          ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=($teacher)?count($teacher):0?></h3>
                <p>All Teacher</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('Admin/showteachers') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=($student)?count($student):0?></h3>
                <p>All Student</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('Admin/showstudents') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  <?=($category)?count($category):0?></h3>
                <p>All Category</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('Admin/category') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=($revenue)?count($revenue):0?></h3>
                <p>All Revenue</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo base_url('Admin/upload_video') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php } ?>
          <?php
          if($admin->usertype==1)
        {
?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $data= $this->Admin_Model->select('video',array('admin_id'=>$admin->id));
                ?>
                <h3><?php if(!empty($data))
                echo count($data);
                else
                  0
                ?></h3>

                <p>All Video</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('Admin/upload_video') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                $data= $this->Admin_Model->select('subscribe',array('admin_id'=>$admin->id));
                ?>
                <h3><?php if(!empty($data))
                echo count($data);
                else
                  0
                ?></h3>

                <p>All Subscriber</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('Admin/upload_video') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php } ?>
        
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

          <br><br>
            <div class="row">
                <div class="col-md-12">
                 

                          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                          <?php  if (!empty($banner)) { ?>
                            <ol class="carousel-indicators">
                              <?php $i=0; foreach ($banner as $key) {?>
                                  <li data-target="#carouselExampleIndicators" data-slide-to="<?=$i++?>" class="<?=($i==0)?'active':''?>"></li>
                              <?php } ?>
                            </ol>
                            <div class="carousel-inner">
                            <?php foreach ($banner as $key) {?>

                              <div class="carousel-item <?=($key->id==1)?'active':''?>">
                                <img class="d-block w-100" height="300px" src="<?=base_url('assets/banner/').$key->banner?>" alt="Image Not Found">
                              </div>
                              <?php } ?>

                            </div>

                      
                      <?php  }else{ ?>
                            <ol class="carousel-indicators">
                              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img class="d-block w-100" height="300px" src="https://mondaymorning.nitrkl.ac.in/uploads/post/2%20(1).jpeg" alt="First slide">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100" height="300px" src="https://gcsonline.amserp.in/public/usermedia/Logo/blank_banner2.jpg" alt="Second slide">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100" height="300px" src="https://www.ndtv.com/education/cache-static/media/presets/625X400/article_images/2020/6/12/Rida_t3GYAtl.webp" alt="Third slide">
                              </div>
                            </div>
                            <?php } ?>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
             

            </div>
            </div>
        <br>
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  