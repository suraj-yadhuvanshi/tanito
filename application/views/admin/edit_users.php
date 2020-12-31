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
                <h3 class="card-title">Edit Chanel</h3>
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
                    <input type="text" class="form-control" value="<?php echo $editusers->username;?>" name="name" placeholder="Enter Chanel Name">
                    <?php echo form_error('name'); ?>
                  	</div>
                  	<div class="col-md-3">
                  		 <label for="exampleInputEmail1">Dob</label>
                    <input type="date" class="form-control" name="dob" value="<?php echo $editusers->dob;?>">
                    <?php echo form_error('dob'); ?>
                  	</div>
                  	<div class="col-md-3">
                  	     <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" value="<?php echo $editusers->email;?>" name="email" placeholder="Enter Email" readonly>
                    <?php echo form_error('email'); ?>
                  	</div>
                  	<div class="col-md-3">
                  	     <label for="exampleInputEmail1">Mobile Number</label>
                    <input type="text" class="form-control" value="<?php echo $editusers->mobile;?>" name="mobile" placeholder="Enter Mobile Number" pattern="[0-9]*" maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
                    <?php echo form_error('mobile'); ?>
                  	</div>
                  </div>
                   
                  <div class="row">
                  	<div class="col-md-3">
                  		<label for="exampleInputEmail1">password</label>
                    <input type="password" class="form-control" value="<?php echo $editusers->password;?>" name="password" placeholder="Enter Password">
                    <?php echo form_error('password'); ?>
                  	</div>
                  	<div class="col-md-3">
                  		 <label for="exampleInputEmail1">Gender</label>
                   <select name="gender" class="form-control">
                   	<option value="1" <?php echo $editusers->gender=='1' ? 'selected=" "':'';?>>Male</option>
                   	<option value="2" <?php echo $editusers->gender=='2' ? 'selected=" "':'';?>>FeMale</option>
                   	<option value="3" <?php echo $editusers->gender=='3' ? 'selected=" "':'';?>>Other</option>
                   	
                   </select> 
                  	</div>
                  		<!-- <div class="col-md-3">
                  		 <label for="exampleInputEmail1">Type</label>
                   <select name="type" class="form-control">
                   	<option value="1">Creator</option>           	
                   </select>
                  		</div> -->
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
</div>
		</div>
	</div>
</section>

</div>

