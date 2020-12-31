 <div class="content-wrapper">
 <br/>
<!-- Content Header (Page header) -->
 
<!-- /.content-header -->

<section class="content">
<div class="container-fluid">
<div class="row">
		 <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Create Language</h3>
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
                    <label for="exampleInputEmail1">Language Name</label>
        <input type="text" class="form-control" name="languagename" required="" placeholder="Enter Language Name" value="<?php echo $edit->language_name;?>">
        <?php echo form_error('languagename'); ?>
                  </div>
               
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-danger" name="category">Submit</button>
                </div>
                
              </form>
            </div>
</div>
		<div class="card card-info" style="width: 100%;">
		<div class="container">
			<div class="card-body">
				<div class="table-responsive">
			 
					<table id="example" class="display responsive nowrap" style="width:100%">
						<thead>
							<tr>
								<th>SR No</th>
								<th>Language Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php
						$i=1;
						foreach ($language as $row) {
						?>
						<tr>
							<td><?php echo $i;$i++;?></td>
							<td><?php echo $row->language_name;?></td>
			<td><a href="<?php echo base_url('Admin/edit_language/').$row->language_id; ?>" class="btn btn-primary btn-sm">Edit </a></td>
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