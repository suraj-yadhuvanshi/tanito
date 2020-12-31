<div class="content-wrapper">
 <br/>
<section class="content">
<div class="container-fluid">
<div class="row">
		 <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Search Student</h3>
              </div>
      <?php if($this->session->flashdata('message')){?>
        <div class="alert alert-success" id='msg'>
          <?=$this->session->flashdata('message')?>
        </div>
      <?php } ?>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                   <div class="form-group">
                    <div class="row">

                    <div class="col-md-6">
                      <label>Student Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Student Name" value="<?=set_value('name')?>">
                      <?=form_error('name'); ?>
                    </div>

                    <div class="col-md-6">
                      <label>Mobile No</label>
                      <input type="text" class="form-control" name="mobile" placeholder="Mobile No" value="<?=set_value('mobile')?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
					  <?=form_error('mobile'); ?>
                    </div>  
                </div>     
                <br>

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Search</button>
                </div>
              </form>
            </div>
         </div>
</div>
 </div>
     <div class="col-md-12">

		<div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">View All Students </h3>
            </div>
			<div class="card-body"> 
				<div class="table-responsive">
			 
					<table id="example" class="display responsive nowrap">
						<thead>
							<tr>
								<th>SR No</th>
								<th>Name</th>
								<th>Mobile No</th>
                                <th>Created</th>
                                <th>Action</th>
                </tr>
            </thead>
                <?php 
                    $i=1;
                  foreach ($student as $row) {
                  ?>
                  <tr>					
                    <td><?=$i++?></td>
                    <td><?= $row->username;?></td>
                    <td><?= $row->mobile;?></td>
                    <td><?= $row->created;?></td>
                    <td> <?php if ($row->status==0) {?>
                          <a class="btn btn-danger btn-sm" href="<?php echo base_url('Admin/block/').base64_encode($row->id);?>">Block</a> | 
                         <?php }else{ ?>
                             <a class="btn btn-success btn-sm" href="<?php echo base_url('Admin/block/').base64_encode($row->id);?>">Block</a> | 
                         <?php  } ?>
                        <a class="btn btn-info btn-sm" href="<?php //echo base_url('Franchise/franchiselogin/').base64_encode($row->id);?>">Edit</a> |            
                        <a class="btn btn-danger btn-sm" onclick="return confirm(' you want to delete?');" href="<?php echo base_url('Admin/deleteuser/').base64_encode($row->id);?>">Del</a>  |             
                        <a class="btn btn-info btn-sm" href="<?php echo base_url('Admin/studentprofile/').base64_encode($row->id);?>">Profile</a>               
                    </td>
                </tr>
					<?php
				  }
					?>
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