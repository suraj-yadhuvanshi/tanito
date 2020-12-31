 <div class="content-wrapper">
 <br/>

<section class="content">
<div class="container-fluid">
<div class="row">
		 <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Tags</h3>
              </div>
                <?php if($this->session->flashdata('message')){?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('message')?>
                    </div>
			    <?php } ?>

                <form  action="" method="post" >
                <div class="card-body">
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tags Name</label>
					<input type="text" class="form-control" name="tags" required="" placeholder="Enter Tags Name" value="<?=$tags->tags?>">
					<?php echo form_error('tags'); ?>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
                </div>
                
              </form>
            </div>
			</div>
		</div>		
		
	</div>
</section>
</div>