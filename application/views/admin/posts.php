<div class="content-wrapper">
 <br/>
<section class="content">
<div class="container-fluid">
<div class="row">
		 <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add New Plan</h3>
              </div>
              <?php if($this->session->flashdata('message')){?>
                <div class="alert alert-success" id="msg">
                  <?php echo $this->session->flashdata('message')?>
                </div>
              <?php } ?>


              <form  action="" method="post" >
              <div class="card-body">
                <div class="form-group">
                    
                    <div class="row">
                        <div class="col-md-6">
                        <label>From Date</label>
                        <input type="date" class="form-control" name="from_date" value="<?=set_value('from_date')?>">
                        <?=form_error('benefits'); ?>
                        </div>  

                        <div class="col-md-6">
                        <label for="exampleInputEmail1">To Date</label>
                        <input type="date"  class="form-control" name="to_date" value="<?=set_value('to_date')?>">
                        <?=form_error('validity'); ?>
                        </div>
                    </div>
                </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">Search</button> || 
                    <a href="" class="btn btn-info">View Teacher Posts</a> || <a href="" class="btn btn-info">View Students Posts</a>

                  </div>
                
              </form>
            </div>
			</div>
    </div>	
</div>	
    <!-- ---------------- -->
	<div class="col-md-12">
		<div class="card card-info">
            
			<div class="card-header">
				<h3 class="card-title">View All Posts </h3>
			</div>
			<div class="card-body"> 
				<div class="table-responsive">
			 
					<table id="example" class="display responsive nowrap" >
						<thead>
							<tr>
								<th>SR No</th>
								<th>Posts Title</th>
								<th>Tags</th>
								<th>Image / Video</th>
								<th>Description</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php
						$i=1;
						foreach ($posts as $row) {
						?>
						<tr>
							<td><?php echo $i;$i++;?></td>
							<td><?php echo $row->title;?></td>
							<td><?php echo $row->tag;?></td>
							<td><?php echo $row->image_video;?></td>
							<td><?php echo $row->description;?></td>
							<td><a href="<?php //echo base_url('Admin/editplan/').base64_encode($row->id)?>" class="btn btn-primary btn-sm">Edit </a> |
							<a href="<?php //echo base_url('Admin/deleteplan/').base64_encode($row->id)?>" onclick="return confirm('you want to delete?');" class="btn btn-danger btn-sm">Delete </a>
						</td>
						</tr>
					<?php } ?>
					</table>
					 
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