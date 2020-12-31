<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Login | Tanito Social Learning</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="login-logo">
			</div>
			<!-- /.login-logo -->
			<div class="card">
				<div class="card-body login-card-body">
					<!-- <div style="text-align: center">
						<img src="<?php //echo base_url(); ?>logo/logos.png" class="logo_main" style="width: 200px">
						<br/>
					</div> -->
					<p class="login-box-msg"><b>Sign in to start your Application</b></p>

					<?php if($this->session->flashdata('message')){?>
  							<div class="alert alert-danger"><?php echo $this->session->flashdata('message')?></div>
					<?php } ?>

					<form action="" method="post">
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Username" name="email">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-user"></span>
								</div>
							</div>
							
						</div>
						<span class="text-center"><b></b></span>
						<div class="input-group mb-3">
							<input type="password" class="form-control" placeholder="Password" name="password">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-lock"></span>
								</div>
							</div>
						</div>
						<span class="text-center"><b></b></span>
						<div class="row">
							
							<!-- /.col -->
							<div class="col-8">
								<button type="submit" name="login-submit" class="btn btn-primary btn-block">Sign In</button>
								<a href="<?php // echo base_url('Admin/forgot') ?>">Forgot password?</a>
							</div>
							<!-- /.col -->
						</div>
					</form>
					
				</div>
				<!-- /.login-card-body -->
			</div>
		</div>
		<!-- /.login-box -->

		<!-- jQuery -->
		<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"> </script>
		<!-- Bootstrap 4 -->
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"> </script>
		<!-- AdminLTE App -->
		<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"> </script>
		<script>
		var alert = document.getElementById('myModal');
		var span = document.getElementsByClassName("close")[0];

		span.onclick = function() {
			alert.style.display = "none";
		}
		window.onclick = function(event) {
			if (event.target == alert) {
				alert.style.display = "none";
			}
		}
		window.setTimeout(function () {
			$(".alert").fadeTo(500, 0).slideUp(500, function () {
				$(this).remove();
			});
		}, 4000);
		</script>
	</body>
</html>

