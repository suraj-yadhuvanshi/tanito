 <div class="content-wrapper">
 <br/>
<!-- Content Header (Page header) -->
 
<!-- /.content-header -->

<section class="content">
<div class="container-fluid">
<div class="row">
		 <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Create Chanel</h3>
              </div>
              <?php if($this->session->flashdata('message')){?>
  <div class="alert alert-success">

    <?php echo $this->session->flashdata('message')?>
  </div>
<?php } ?>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="" method="post" enctype="multipart/form-data">
               <input type="hidden"  name="id">
                <div class="card-body">
               
                  <div class="form-group">
                  <div class="row">
                  	<div class="col-md-3">
                  		 <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Chanel Name">
                    <?php echo form_error('name'); ?>
                  	</div>
                  	<div class="col-md-3">
                  		 <label for="exampleInputEmail1">Dob</label>
                    <input type="date" class="form-control" name="dob">
                    <?php echo form_error('dob'); ?>
                  	</div>
                 
                  	<div class="col-md-3">
                  		 <label for="exampleInputEmail1">Mobile Number</label>
                    <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile Number" pattern="[0-9]*" maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
                    <?php echo form_error('mobile'); ?>
                  	</div>
                  	<div class="col-md-3">
                  		 <label for="exampleInputEmail1">password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password">
                    <?php echo form_error('password'); ?>
                  	</div>
                  </div>
                  </div>
                  
                   <div class="form-group">
                  <div class="row">
                <div class="col-md-3">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Email">
                    <?php echo form_error('email'); ?>
                  
                    </div>
                  	<div class="col-md-3">
                  		 <label for="exampleInputEmail1">Gender</label>
                   <select name="gender" class="form-control">
                   	<option value="1">Male</option>
                   	<option value="2">FeMale</option>
                   	<option value="3">Other</option>
                   	
                   </select>
                  	</div>
                  	<div class="col-md-3">
                  		 <label for="exampleInputEmail1">Type</label>
                   <select name="type" class="form-control">
                   	<option value="1">Creator</option>           	
                   </select>
                  	</div>
                  	
                  <div class="col-md-3">
                  	<label for="exampleInputEmail1">Profile Picture</label>
                    <input type="file" class="form-control" name="profilepic">
                  	</div>
                  	
                  	
                  </div>
                  </div>   
                  </div>   
                  
                     
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-danger" name="new_user">Submit</button>
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
								<th>Name</th>
								<th>DOB</th>
								<th>Mobile</th>
								<th>Gender</th>
								<th>Email</th>
                <th>Subscriber</th>
								<th>Usertype</th>
								<!--<th>Password</th>-->
								<th>Action</th>
							</tr>
						</thead>
						<?php 
						$i=1;
							foreach ($users as $row)
							 {
							?>
						<tr>
					 
							<td><?php echo $i;$i++;?></td>
							<td><?php echo $row->username;?></td>
							<td><?php echo $row->dob;?></td>
							<td><?php echo $row->mobile;?></td>
							<td><?php echo $row->gender;?></td>
							<td><?php echo $row->email;?></td>
               <?php
              $dataa = $this->Admin_Model->select('subscribe',array('admin_id'=>$row->id));
              if(!empty($dataa))
              {
              ?>
              <td><?php echo count($dataa);?></td>
              <?php
            }
              else
              {
              ?>
            <td>0</td>
          <?php } ?>
							<td><?php if($row->usertype==1){
								echo 'Admin';
							}
							elseif($row->usertype==2)
							{
								echo 'User';
							}
              else
              {
                echo 'Super Admin';
              }

							?></td>
							<!--<td>a</td>-->
							
<?php
      if($row->status==0)
      {
      ?>				
<td><a href="<?php echo base_url('Admin/edit_users/').$row->id; ?>" class="btn btn-primary btn-sm">Edit </a> <a href="<?php echo base_url('Admin/active_users/').$row->id.'/'.$row->status; ?>" class="btn btn-success btn-sm">Active </a> <a href="<?php echo base_url('Admin/deleteuser/').$row->id; ?>" class="btn btn-danger btn-sm">Delete </a></td>
<?php } 
	else
	{
	?>
	<td><a href="<?php echo base_url('Admin/edit_users/').$row->id; ?>" class="btn btn-primary btn-sm">Edit </a> <a href="<?php echo base_url('Admin/active_users/').$row->id.'/'.$row->status; ?>" class="btn btn-warning btn-sm">Deactive </a> <a href="<?php echo base_url('Admin/deleteuser/').$row->id; ?>" class="btn btn-danger btn-sm">Delete </a></td>
	<?php
	}
?>
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

