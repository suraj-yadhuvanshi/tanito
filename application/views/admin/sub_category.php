 <div class="content-wrapper">
 <br/>
<!-- Content Header (Page header) -->
 
<!-- /.content-header -->

<section class="content">
<div class="container-fluid">
<div class="row">
		  <div class="col-md-6">
            
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create Sub Category</h3>
              </div>
              <?php if($this->session->flashdata('message')){?>
				<div class="alert alert-success">
					<?php echo $this->session->flashdata('message')?>
				</div>
				<?php } ?>

              <form  action="" method="post" >
                <div class="card-body">
                	<div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
					<?php // pr($category);?>
					
					<select name="cat_id" class="form-control">
                    	<option disabled selected value>--Select Category--</option>
						<?php
						foreach ($category as $row) {
						?>
							<option value="<?=$row->id;?>"><?php echo $row->category;?></option> 
						<?php } ?>                 	
                   	</select>
                   	<?php echo form_error('cat_id'); ?>
				  </div>
				  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sub Category Name</label>
					<input type="text" class="form-control" name="subcateegoryname" placeholder="Enter Sub Category Name" value="">
					<?php echo form_error('subcateegoryname'); ?>
                  </div>
               
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-info" name="category">Submit</button>
                </div>
                
              </form>
            </div>
</div>
<div class="col-md-12">

		<div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">View Sub Category </h3>
            </div>
			<div class="card-body"> 
				<div class="table-responsive">
					<table id="example" class="display responsive nowrap" style="width:100%">
						<thead>
							<tr>
								<th>SR No</th>
								<th>Category Name</th>
								<th>Sub Category Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php
						$i=1;
						foreach ($subcategory as $row) {
							$cat= $this->Admin_Model->selectrow('category',array('id'=>$row->category_id));
						?>
						<tr>
							<td><?php echo $i;$i++;?></td>
							<td><?php echo $cat->category;?></td>
							<td><?php echo $row->subcategory;?></td>
							<td><a href="<?php echo base_url('Admin/editsubcategory/').base64_encode($row->id)?>" class="btn btn-primary btn-sm">Edit </a> |
							<a href="<?php echo base_url('Admin/delectsubcategory/').base64_encode($row->id)?>" onclick="return confirm('you want to delete?');" class="btn btn-danger btn-sm">Delete </a>
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