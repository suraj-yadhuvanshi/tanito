<?php if($this->session->userdata('user')) {
		$admin=$this->session->userdata('user');
}
else{
    redirect(base_url('Admin'));
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>School | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- <link href="<?php // echo base_url(); ?>logo/logos.png" rel="icon"> -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<!--datatable js>-->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
	<!--datatable js>-->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('Admin/dashboard') ?>" class="nav-link">Home</a>
      </li>
      
    </ul>
<ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
             <i class="fa fa-user" style="font-size: 25px"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"></span>
          <div class="dropdown-divider"></div>
            <a href="update_profile" class="dropdown-item">
              <i class="fas fa-user mr-2"></i> Update Profile
            </a>
          <div class="dropdown-divider"></div>
            <a href="../change_password" class="dropdown-item">
              <i class="fas fa-lock mr-2"></i> Change Password
            </a>
        <div class="dropdown-divider"></div>
            <a href="<?php echo base_url('Admin/logout') ?>" class="dropdown-item">
              <i class="fas fa-lock mr-2"></i> Logout
            </a>
        </li>
  </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
 

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>assets/img/logo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?php echo base_url('Admin/dashboard') ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="<?php echo base_url('Admin/create_category') ?>" class="nav-link">
                    <i class="nav-icon fa fa-list-alt"></i>
                    <p>
                      Create Category
                    </p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url('Admin/createsub_category') ?>" class="nav-link">
                    <i class="nav-icon fa fa-list-alt"></i>
                    <p>
                      Create Sub Category
                    </p>
                  </a>
                </li>

                  <li class="nav-item">
                    <a href="<?php echo base_url('Admin/create_language') ?>" class="nav-link">
                      <i class="far fa-language nav-icon"></i>
                      <p>Add Language</p>
                    </a>
                  </li>
            </ul>
          </li>
        
        <li class="nav-item">
          <a href="<?php echo base_url('Admin/upload_video') ?>" class="nav-link">
            <i class="nav-icon fa fa-video"></i>
            <p>
              Upload Video
            </p>
          </a>
        </li>
        <?php
        if($admin->usertype==0)
        {
        ?>
          <li class="nav-item">
          <a href="<?php echo base_url('Admin/new_user') ?>" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Create Chanel
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('Admin/userlist') ?>" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              User List
            </p>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a href="<?php echo base_url('Admin/create_logo') ?>" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Logo
            </p>
          </a>
        </li> -->
        <?php } ?>
        
      <!--  <li class="nav-item">
          <a href="my_text" class="nav-link">
            <i class="nav-icon fa fa-address-card"></i>
            <p>
              My Test History
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="institute" class="nav-link">
            <i class="nav-icon fa fa-industry"></i>
            <p>
              Institute
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="profile" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              My Profile
            </p>
          </a>
        </li>-->
        <!--<li class="nav-item">
          <a href="profile" class="nav-link">
            <i class="nav-icon fa fa-award"></i>
            <p>
              Weekly Topper
            </p>
          </a>
        </li>
     
        <li class="nav-item">
          <a href="my_transaction_status" class="nav-link">
            <i class="nav-icon fa fa-wallet"></i>
            <p>
              My Transaction Status
            </p>
          </a>
        </li>-->
      </ul>
    </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>