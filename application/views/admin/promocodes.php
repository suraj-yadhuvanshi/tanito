<div class="content-wrapper">
 <br/>
<section class="content">
<div class="container-fluid">
<div class="row">
		 <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create Promo Codes</h3>
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
                    <div class="col-md-6">
                      <label>Validity</label>
                      <input type="date" class="form-control" name="validity" placeholder="Validity " value="<?=set_value('validity')?>">
					  <?=form_error('validity'); ?>
                    </div>  
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <label>Discription</label>
                        <textarea class="form-control" name="description" placeholder="Discription" ><?=set_value('name')?></textarea>
                        <?=form_error('description'); ?>
                        </div>
                    </div>     
                <br>

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
                </div>
              </form>
            </div>
         </div>
</div>
 </div>
     <div class="col-md-12">

		<div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">View All Promo Codes </h3>
            </div>
			<div class="card-body"> 
				<div class="table-responsive">
			 
					<table id="example" class="display responsive nowrap">
						<thead>
							<tr>
								<th>SR No</th>
								<th>Promo codes</th>
								<th>Validity</th>
								<th>Description</th>
                                <th>Created</th>
                                <th>Action</th>
                </tr>
            </thead>
                <?php 
                    $i=1;
                  foreach ($promocodes as $row) {
                  ?>
                  <tr>					
                    <td><?=$i++?></td>
                    <td><?= $row->promocodes;?></td>
                    <td><?= $row->validity;?></td>
                    <td><?= $row->description;?></td>
                    <td><?= $row->created;?></td>
                     <td> <?php //if ($row->status==0) {?>
                          <!-- <a class="btn btn-danger btn-sm" href="<?php //echo base_url('Admin/block/').base64_encode($row->id);?>">Block</a> |  -->
                         <?php// }else{ ?>
                             <!-- <a class="btn btn-success btn-sm" href="<?php //echo base_url('Admin/block/').base64_encode($row->id);?>">Block</a> |  -->
                         <?php  //} ?> 
                        <!-- <a class="btn btn-info btn-sm" href="<?php //echo base_url('Franchise/franchiselogin/').base64_encode($row->id);?>">Edit</a> |             -->
                        <a class="btn btn-danger btn-sm" onclick="return confirm(' you want to delete?');" href="<?php echo base_url('Admin/deletepromo/').base64_encode($row->id);?>">Delete</a>              
                        <!-- <a class="btn btn-info btn-sm" href="<?php //echo base_url('Franchise/franchiselogin/').base64_encode($row->id);?>">Details</a>                -->
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