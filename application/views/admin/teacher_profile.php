<?php 
      $admin=$this->session->userdata('user');
 ?>
<div class="content-wrapper">
 <br/>
<section class="content">
<div class="container-fluid">
		 <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header"> 
                <h3 class="card-title"><?=ucfirst($users->username)?> Details</h3>
              </div>
              <?php if($this->session->flashdata('message')){?>
                <div class="alert alert-success" id='msg'>
                  <?=$this->session->flashdata('message')?>
                </div>
              <?php } ?>
              <!-- /.card-header -->
              <!-- form start -->
               <form  action="<?php //echo base_url('Admin/updateprofile')?>" method="post" enctype="multipart/form-data"> 
                  <div class="card-body">
                   <div class="form-group">
                    <div class="row">

                  <?php 
                    // $users=selectrow('users',['id'=>$admin->id]);
                    ?>
                        <div class="col-md-3">
                          <b>User Profile</b><br>
                            <input type="file" class="form-control" name="profile" value="">
                            <img height="200px" src="<?php echo base_url('assets/user-profile/').@$details->profile_img?>" alt="">
                        </div>

                        <div class="col-md-9">
                          <div class="row">
                                <div class="col-md-6">
                                        <label>Mobile</label>
                                        <input type="text" class="form-control" value="<?=$users->mobile?>" disabled="disabled">
                                    </div> 
                                <div class="col-md-6">
                                    <label>Email Id</label>
                                    <input type="text" class="form-control" value="<?=$users->email?>" disabled="disabled">
                                </div>
                          </div>

                          <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" value="<?=ucfirst($users->username)?>" disabled="disabled">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Class/ Grade</label>
                                        <input type="text" class="form-control" name="class_grade" value="<?=ucfirst(@$details->class_grade)?>">
                                        <?php echo form_error('class_grade'); ?>
                                    </div>
                            </div>

                            <div class="row">
                                     <div class="col-md-6">
                                        <label>Category</label>
                                        <select name="category" class="form-control" id="category">
                                        <option disabled selected value>--Select Category--</option>

                                        <?php foreach ($category as $k) { ?>
                                              <option value="<?=$k->id?>" <?php echo $k->id==@$details->category_id ? 'selected=" "':'';?>><?=$k->category?></option>
                                        <?php  } ?>
                                        </select>
                                        <?php echo form_error('category'); ?>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Sub Categories</label>
                                        <select name="subcategory" class="form-control" id="subcategory">
                                          <?php
                                                  echo "<option disabled selected value>--Select Sub Category--</option>";
                                                  foreach($subcategory as $sub) { ?>
                                                        <option value="<?=$sub->id?>" <?php echo  $sub->id==@$details->subcategory_id ? 'selected=" "':'';?>><?=$sub->subcategory?></option>
                                          <?php  } ?>
                                        </select>
                                        <?php echo form_error('subcategory'); ?>
                                    </div>
                            </div>
                            <div class="row">
                                    <div class="col-md-6">
                                        <label>Upload ID Proof</label>
                                        <input type="file" class="form-control" name="id_proof" value="" >
                                    </div>

                                    <div class="col-md-6">
                                        <label>Upload your own 30 seconds video</label>
                                        <input type="file" class="form-control" name="video" value="" >
                                    </div>
                            </div>
                                          <br>
                            <div class="row">
                                    <div class="col-md-6">
                                        <label></label>
                                        <img height="200px" src="<?php echo base_url('assets/teacher-idproof/').@$details->id_proof?>" alt="">
                                    </div>

                                    <div class="col-md-6">
                                        <label></label>
                                          <?php if (!empty($details->video)) { ?>
                                              <video  height="200" controls>
                                                <source src="<?php echo base_url('assets/teacher-video/').@$details->video?>" type="video/mp4">
                                              </video>
                                          <?php } ?>
                                    </div>
                            </div>
                           
                            <!-- <div class="row">
                                    <div class="col-md-12">
                                        <label>Address</label>
                                        <textarea type="text" class="form-control"  disabled="disabled"><?php //echo @$details->address?></textarea>
                                    </div>
                            </div> -->
                          
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
            
</section>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">           
        $('#msg').delay(5000).slideUp(1000);
        $('#category').on('change',function(){        
          var id=$(this).val();
            $.ajax({
                type: "POST",
                url: "<?=base_url('Admin/getsubcategory')?>",
                data: {id: id},
                success: function(data){
                    if (data)
                    {
                      $("#subcategory").html(data);
                    }
                }
            });

      });
</script>