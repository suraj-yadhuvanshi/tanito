 <div class="content-wrapper">
 <br/>
<!-- Content Header (Page header) -->
 
<!-- /.content-header -->

<section class="content">
<div class="container-fluid">
<div class="row">
		 <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
              </div>
              <?php if($this->session->flashdata('message')){?>
				<div class="alert alert-success">
					<?php echo $this->session->flashdata('message')?>
				</div>
				<?php } ?>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="" method="post" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
					<input type="text" class="form-control" name="cateegoryname" required="" placeholder="Enter Category Name" value="<?php echo $edit->category;?>">
					<?php echo form_error('cateegoryname'); ?>
                  </div>
                </div>
                <!-- /.card-body -->

				<div class="card-footer">
					<button type="submit" class="btn btn-info" name="category">Submit</button>
				</div>
			
			</form>
            </div>
			</div>
		
		</div>
		
		
	</div>
</section>
</div>