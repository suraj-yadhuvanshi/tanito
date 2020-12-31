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
                <h3 class="card-title">Edit Sub Category</h3>
              </div>
              <?php if($this->session->flashdata('message')){?>
			<div class="alert alert-success">
				<?php echo $this->session->flashdata('message')?>
			</div>
			<?php } ?>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="" method="post" >
                <div class="card-body">
                	<div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
					<?php 
					// pr2($category);
					// 	pr($editcategory);
					?>
					<select name="cat_id" class="form-control" required="">
                    <option disabled selected value>--Select Category--</option>
                    <?php
                    foreach ($category as $row) {
                    ?>
                    <option value="<?php echo $row->id; ?>" <?php echo $row->id==$editcategory->category_id ? 'selected=" "':'';?>><?php echo $row->category;?></option> 
                    <?php } ?>                 	
                   	</select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sub Category Name</label>
					<input type="text" class="form-control" name="subcateegoryname" required="" placeholder="Enter Sub Category Name" value="<?php echo $editcategory->subcategory?>">
					<?php echo form_error('subcateegoryname'); ?>
                  </div>
               
                </div>
                <!-- /.card-body -->

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