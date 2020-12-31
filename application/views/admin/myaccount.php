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
                <h3 class="card-title">Personal Details</h3>
              </div>
              <?php if($this->session->flashdata('message')){?>
                <div class="alert alert-success" id='msg'>
                  <?=$this->session->flashdata('message')?>
                </div>
              <?php } ?>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="<?=base_url('Admin/updateprofile')?>" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                   <div class="form-group">
                    <div class="row">

                  <?php 
                    $users=selectrow('users_profile',['user_id'=>$admin->id]);
                    ?>
                        <div class="col-md-3">
                          <b>Upload New Profile</b>
                            <input type="file" class="form-control" name="profile" value="">
                            <img height="200px" src="<?php echo base_url('assets/profile-image/').$users->profile_img?>" alt="">
                        </div>

                        <div class="col-md-9">
                          <div class="row">
                            <div class="col-md-6">
                              <label>Name</label>
                              <input type="text" class="form-control" name="name" value="<?=ucfirst($admin->username)?>" disabled="disabled">
                              <?=form_error('name'); ?>
                            </div>
                           
                          </div>

                          <div class="row">
                              <div class="col-md-6">
                                <label>Email Id</label>
                                <input type="text" class="form-control" value="<?=$admin->email?>" disabled="disabled">
                              </div>
                        
                            
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label>Mobile</label>
                              <input type="text" class="form-control" value="<?=$admin->mobile?>" disabled="disabled">
                            </div>
                          </div>
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
              <!-- ----------------------------------------------------------------------------- -->              
            

              <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Change Password</h3>
                  </div>
                  <div class="card-body">
                      <form  action="<?=base_url('Admin/changepassword')?>" method="post" enctype="multipart/form-data">
                       <div class="form-group">
                        <div class="row">
                                <div class="col-md-4">
                                  <input type="hidden" name="id" id="id" value="<?=$admin->id?>">

                                  <label>Current Password</label> &nbsp;<b class="text text-info" id="errmsg"></b>
                                  <input type="password" class="form-control" name="current_password" id="current_password" value="" placeholder="********">
                                  <?=form_error('current_password'); ?>
                                </div>
                                
                                <div class="col-md-4">
                                  <label >New Password</label>
                                  <input type="password" class="form-control" name="new_password" value="" placeholder="********">
                                  <?=form_error('new_password'); ?>                        
                                </div>

                                <div class="col-md-4">
                                  <label >Confirm Password</label>
                                  <input type="text" class="form-control" name="confirm_password" value="">
                                  <?=form_error('confirm_password'); ?>                        
                                </div>

                         </div>
                       </div>

                  <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
                  </div>
                 </form>

            <!-- ---------------------------------------------------------------------------- -->
</section>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
	   $('#msg').delay(5000).slideUp(1000);

      $("#current_password").blur(function(){  
      var id=$("#id").val();
      var password=$("#current_password").val();
       $.ajax({
          type: "POST",
          url: "<?=base_url('Admin/checkpassword')?>",
          dataType: 'json',
          data: {id: id, password: password },
          success: function(data){
              if (data==0)
               {
                $("#errmsg").html('Current Password Missmatch');
                $('#errmsg').show();

                $('#errmsg').delay(5000).fadeOut(400);
                // $("#current_password").focus();
                $("#current_password").val('');

               }
          }
       });
    });  

});
</script>