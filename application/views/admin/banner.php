<div class="content-wrapper">
 <br/>
<!-- Content Header (Page header) -->
<!-- /.content-header -->

<section class="content">
<div class="container-fluid">
<div class="row">
		  <div class="col-md-6">
            <!--  general form elements --> 
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add Banner</h3>
              </div>
              <?php if($this->session->flashdata('message')){?>
				<div class="alert alert-success" id="msg">
					<?php echo $this->session->flashdata('message')?>
				</div>
				<?php } ?>
              <form  action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Banner</label>
					<input type="file" class="form-control" name="banner" value="">
					<?php echo form_error('banner'); ?>
                  </div>
               
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-info" name="category">Submit</button>
                </div>
                
              </form>
            </div>
</div>

		<div class="col-md-12">

		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">View All Banner <span class="pull-right"></span></h3>
			</div>
			<div class="card-body"> 
				<div class="table-responsive">
			 
					<table id="example" class="display responsive nowrap" >
						<thead>
							<tr>
								<th>SR No</th>
								<th>Banner</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php
						$i=1;
						foreach ($banner as $row) {
						?>
						<tr>
							<td><?php echo $i;$i++;?></td>
							<td><img height="100" src="<?=base_url('assets/banner/').$row->banner;?>" alt=""></td>
							<td><a onclick="return confirm('you want to delete?');" href="<?php echo base_url('Admin/deletebanner/'.base64_encode($row->id))?>" class="btn btn-danger btn-sm">Del </a></td>
						</tr>
					<?php } ?>
					</table>
					 
			</div>
			</div>
			</div>
		</div>
		</div>
		
		
	</div>
</section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
		$('#msg').delay(5000).slideUp(1000);
</script>