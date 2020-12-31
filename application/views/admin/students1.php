<div class="content-wrapper">
 <br/>
<section class="content">
<div class="container-fluid">
<div class="row">
		 <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add New Student</h3>
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

                    <div class="col-md-3">
                      <label>Student Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Student Name" value="<?=set_value('name')?>">
                      <?=form_error('name'); ?>
                    </div>

                    <div class="col-md-3">
                      <label>Last Name</label>
                      <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="<?=set_value('lastname')?>" >
                      <?=form_error('lastname'); ?>
                    </div>  

                    <div class="col-md-3">
                      <label>Father's Name / Mother's Name</label>
                      <input type="text" class="form-control" name="guardian" placeholder="Father's Name / Mother's Name" value="<?=set_value('guardian')?>">
                      <?=form_error('guardian'); ?>
                    </div>  
                    <div class="col-md-3">
                      <label>Mobile No</label>
                      <input type="text" class="form-control" name="mobile" placeholder="Mobile No" value="<?=set_value('mobile')?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
					  <?=form_error('mobile'); ?>
                    </div>  
          
                </div>     

                <div class="row">   
                  
               

                  <div class="col-md-3">
                        <label >Date Of Birth</label>
                        <input type="date" class="form-control" name="dob" value="<?=set_value('dob')?>">
                        <?=form_error('dob'); ?>
                    </div>  

                    <div class="col-md-3">
                      <label>Gender</label>
                      <select class="form-control" name="gender" value="<?=set_value('gender')?>">
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                      </select>
                      <?=form_error('gender'); ?>
                    </div>  
              
                    <div class="col-md-3">
                      <label>Marital Status</label>
                      <select class="form-control" name="marital_status" value="<?=set_value('marital_status')?>">
                        <option value="">Select</option>
                        <option value="Married">Married</option>
                        <option value="Unmarried">Unmarried</option>
                        <option value="Other">Other</option>
                      </select>
					   <?=form_error('marital_status'); ?>
                    </div>
                    
                    <div class="col-md-3">
                      <label>Profile Image</label>
                      <input type="file" class="form-control" name="profile_image" value="">
                      <?=form_error('profile_image'); ?>
                    </div>
                    
                   
                </div>     
                <br><hr>
                    <b class="text-success">Previous Details</b>
                <br>

                <div class="row">
                     <div class="col-md-3">
                        <label>Previous Class</label>
                        <input type="text" class="form-control" name="previous" placeholder="Previous Class" value="<?=set_value('previous')?>">
                        <?=form_error('qualification'); ?>
                      </div>    

                     <div class="col-md-3">
                          <label>Previous  Collage</label>
                          <input type="text" class="form-control" name="previous_collage" placeholder="Previous  Collage" value="<?=set_value('previous_collage')?>">
                          <?=form_error('previous_collage'); ?>                        
                        </div> 

                     <div class="col-md-6">
                          <label>Collage Address</label>
                          <textarea class="form-control" name="collage_address" placeholder="Collage Address" value="<?=set_value('collage_address')?>"></textarea>
                          <?=form_error('collage_address'); ?>                        
                        </div> 
                     </div>    
                     
                     <div class="row">

                     <div class="col-md-3">
                          <label >State</label>
                          <select class="form-control" name="state" value="<?=set_value('state')?>">
                          <option value="">Select</option>
                              <?php $state=state();
                                foreach($state as $row){?>
                                <option value="<?=$row->state?>"><?=$row->state?></option>
                                <?php }
                              ?>
                              </select>
                          <?=form_error('state'); ?>
                        </div>   

                        <div class="col-md-3">
                              <label >City</label>
                              <input type="text" class="form-control" name="city" placeholder="City" value="<?=set_value('city')?>">
                              <?=form_error('city'); ?>                        
                            </div>

                        <div class="col-md-6">
                              <label >Address</label>
                              <textarea type="text" class="form-control" name="address" placeholder="Full Address"></textarea>
                              <?=form_error('address'); ?>                        
                            </div> 
                        </div>
                  </div>  

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
                </div>
              </form>
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
								<th>Email Id</th>
                                <th>Gender</th>
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
                    <th><?= $row->email;?></th>
                    <td><?= $row->gender;?></td>
                    <td><?= $row->created;?></td>
                    <td> <?php if ($row->status==0) {?>
                          <a class="btn btn-danger btn-sm" href="<?php echo base_url('Admin/block/').base64_encode($row->id);?>">Block</a> | 
                         <?php }else{ ?>
                             <a class="btn btn-success btn-sm" href="<?php echo base_url('Admin/block/').base64_encode($row->id);?>">Block</a> | 
                         <?php  } ?>
                        <a class="btn btn-info btn-sm" href="<?php //echo base_url('Franchise/franchiselogin/').base64_encode($row->id);?>">Edit</a> |            
                        <a class="btn btn-danger btn-sm" onclick="return confirm(' you want to delete?');" href="<?php echo base_url('Admin/deleteuser/').base64_encode($row->id);?>">Del</a>  |             
                        <a class="btn btn-info btn-sm" href="<?php //echo base_url('Franchise/franchiselogin/').base64_encode($row->id);?>">Details</a>               
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