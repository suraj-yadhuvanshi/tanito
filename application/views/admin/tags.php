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
                <h3 class="card-title">Create Tags</h3>
              </div>
              <?php if($this->session->flashdata('message')){?>
		<div class="alert alert-success" id="msg">
			<?php echo $this->session->flashdata('message')?>
		</div>
<?php } ?>
              <form  action="" method="post" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tags Name</label>
					<input type="text" class="form-control" name="tags" placeholder="Enter Tags Name" value="">
					<?php echo form_error('tags'); ?>
                  </div>
               
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
                </div>
                
              </form>
            </div>
</div>

		<div class="col-md-12">

		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">View All Tags <span class="pull-right"></span></h3>
			</div>
			<div class="card-body"> 
				<div class="table-responsive">
			 
					<table id="example" class="display responsive nowrap" >
						<thead>
							<tr>
								<th>SR No</th>
								<th>Tags Name</th>
								<th>Created</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php
						$i=1;
						foreach ($tags as $row) {
						?>
						<tr>
							<td><?php echo $i;$i++;?></td>
							<td><?php echo $row->tags;?></td>
							<td><?php echo $row->created;?></td>
							<td><a href="<?php echo base_url('Admin/edittags/').base64_encode($row->id)?>" class="btn btn-primary btn-sm">Edit </a> |
							<a href="<?php echo base_url('Admin/deletetags/').base64_encode($row->id)?>" onclick="return confirm('you want to delete?');" class="btn btn-danger btn-sm">Delete </a>
						</td>
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
<script type="text/javascript">
  $(document).ready(function(){
	$('#msg').delay(5000).slideUp(1000);

});
</script>