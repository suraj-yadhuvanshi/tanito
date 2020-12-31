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
                <h3 class="card-title">Add New Student</h3>
              </div>
              <?php if($this->session->flashdata('message')){?>
                <div class="alert alert-success">
                  <?php echo $this->session->flashdata('message')?>
                </div>
              <?php } ?>


              <form  action="" method="post" >
              <div class="card-body">
                   <div class="form-group">
                    <div class="row">

                        <div class="col-md-12">
                          <label for="exampleInputEmail1">Full Name</label>
                          <input type="text" name="name" class="form-control" value="<?=set_value('name')?>" placeholder="Full Name">
                          <?=form_error('name'); ?>
                        </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                      <label>Mobile No</label>
                      <input type="text" class="form-control" name="mobile" placeholder="Mobile No" value="<?=set_value('mobile')?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                    <?=form_error('mobile'); ?>
                    </div>  

                    <div class="col-md-6">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" name="email" class="form-control" value="<?=set_value('email')?>" placeholder="Email">
                      <?=form_error('email'); ?>
                    </div>
                  </div>

                <div class="row">

                  <div class="col-md-6">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" value="<?=set_value('password')?>" placeholder="Password">
                    <?=form_error('password'); ?>
                  </div>

                  <div class="col-md-6">
                    <label>Confirm Password</label>
                    <input type="text" class="form-control" name="confirm_password" placeholder="Confirm Password" value="<?=set_value('confirm_password')?>" >
                    <?=form_error('confirm_password'); ?>
                  </div>  
                  </div>
                <!-- /.card-body -->
                <br>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
	$('#msg').delay(5000).slideUp(1000);

});
</script>