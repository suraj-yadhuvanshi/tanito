<div class="content-wrapper">
 <br/>
<section class="content">
<div class="container-fluid">
<div class="row">
		 <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Plan</h3>
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

                        <div class="col-md-12">
                          <label for="exampleInputEmail1">Plan Name</label>
                          <input type="text" name="plan" class="form-control" value="<?=$plan->plan?>" placeholder="Plan Name">
                          <?=form_error('plan'); ?>
                        </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                      <label>Benefits</label>
                      <input type="text" class="form-control" name="benefits" value="<?=$plan->benefits?>" placeholder="Benefits">
                      <?=form_error('benefits'); ?>
                    </div>  

                    <div class="col-md-6">
                      <label for="exampleInputEmail1">Validity</label>
                      <input type="text" name="validity" class="form-control" value="<?=$plan->validity?>" placeholder="Validity">
                      <?=form_error('validity'); ?>
                    </div>
                  </div>

                <div class="row">

                  <div class="col-md-12">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="description" class="form-control" > <?=$plan->description?> </textarea>
                    <?=form_error('description'); ?>
                  </div>
                  </div>
                <!-- /.card-body -->
                  <br>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                  </div>
                
              </form>
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