 <div class="content-wrapper">
 <br/>
<section class="content">
<div class="container-fluid">
<div class="row">
		 <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Upload Video</h3>
              </div>
<?php if($this->session->flashdata('message')){?>
  <div class="alert alert-success">
    <?php echo $this->session->flashdata('message')?>
  </div>
<?php } ?>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="" method="post" enctype="multipart/form-data">
<input type="hidden"  name="id" value="">
                <div class="card-body">
                 <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                         <label>Category</label>
                    <select name="category_id" class="form-control" id="category_id">
                    <option disabled selected value>--Select Category--</option>
                    <?php foreach ($category as $row)
                    {
                    ?>
                    <option value="<?php echo $row->category_id;?>" ><?php echo $row->category_name ?></option>
				 	<?php } ?>
                   	</select>
                   	<?php echo form_error('category_id'); ?>
                    </div>
                <div class="col-md-3">
                    <label >Sub Category</label>
                    <select name="subcat_id" class="form-control" id="Sub_category">
                    	<option disabled selected value>--Select Sub Category--</option>
                   </select>
                  <?php echo form_error('subcat_id'); ?>
                </div>    
                    
                <div class="col-md-3">
                    <label >Language</label>
                    <select name="lang_id" class="form-control">
                    <option disabled selected value>--Select Language--</option>
                    <?php foreach ($language as $lanrow)
                    {
                    ?>
				 				<option value="<?php echo $lanrow->language_id;?>" ><?php echo $lanrow->language_name ?></option>
				 	<?php } ?>
                   	</select>
                   	<?php echo form_error('lang_id'); ?>
                </div>  
                
                 <div class="col-md-3">
                    <label >Song & Movie Name</label>
                    <input type="text" class="form-control" name="title" placeholder="Song & Movie Name" value="">
                </div>  
                </div>     
                     <div class="row">
                        <div class="col-md-3">
                             <label >Singer Name</label>
                    <input type="text" class="form-control" name="singer" placeholder="Singer Name">
                        </div> 
                        <div class="col-md-3">
                    <label >Lyrics</label>
                    <input type="text" class="form-control" name="lyrics" placeholder="Lyrics">
                        </div>
                        <div class="col-md-3">
                            <label >Compose</label>
                    <input type="text" class="form-control" name="compose" placeholder="Compose">
                        </div>
                        <div class="col-md-3">
                            <label >Company Name</label>
                    <input type="text" class="form-control" name="company" placeholder="Company Name">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-4">
                             <label >Date</label>
                    <input type="date" class="form-control" name="cdate"  value="">
                        </div> 
                        <div class="col-md-4">
                    <label >Thumbnails</label>
                    <input type="file" class="form-control" name="thumbnail" >
                        </div>
                        <div class="col-md-4">
                            <label >Video</label>
                    <input type="file" class="form-control" name="video">
                        </div>
                        
                     </div>
                  </div>
                  
                  
                    <div class="form-group">
                   
                 	 </div>
                    <div class="form-group">
                    
                  	</div>
                    <div class="form-group">
                    <label >Description</label>
                    <textarea class="form-control" name="description"></textarea>
                    
                  </div>
                  <div class="row">
                  <div class="col-sm-4">
						<div class="form-group">
							<div class="custom-control custom-switch custom-switch-off-default custom-switch-on-success">
                      		<input type="checkbox" name="slider" value="1" class="custom-control-input" id="customSwitch1">
                     	 <label class="custom-control-label" for="customSwitch1">Slider</label>
                    </div>
						</div>
                  </div>
                  <div class="col-sm-4">
						<div class="form-group">
							<div class="custom-control custom-switch custom-switch-off-default custom-switch-on-success">
                      		<input type="checkbox" name="top_slider" value="2" class="custom-control-input" id="customSwitch3">
                     	 <label class="custom-control-label" for="customSwitch3">Top Slider</label>
                    	</div>
						</div>
                  </div>
                  <div class="col-sm-4">
						<div class="form-group">
							<div class="custom-control custom-switch custom-switch-off-default custom-switch-on-success">
                      		<input type="checkbox" name="must_watch" value="1" class="custom-control-input" id="customSwitch4">
                     	 <label class="custom-control-label" for="customSwitch4">Must Watch</label>
                    	</div>
						</div>
                  </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-danger" name="video">Submit</button>
                </div>
              </form>
            </div>
</div>
 <div class="col-md-6">
  </div>
 </div>
 
		<div class="card card-info" style="width: 100%;">
		<div class="container">
			<div class="card-body">
				<div class="table-responsive">
			 
					<table id="example" class="display responsive nowrap" style="width:100%">
						<thead>
							<tr>
								<th>SR No</th>
								<th>Category Name</th>
								<th>Sub Category Name</th>
								<th>Language</th>
								<th>Title</th>
								<th>Date</th>
                <th>Views</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php 
						$i=1;
						foreach ($video as $vrow) {
						?>
						<tr>					
							<td><?php echo $i;$i++;?></td>
							<td><?php echo $vrow->category_name;?></td>
							<td><?php echo $vrow->subcategory_name;?></td>
							<td><?php echo $vrow->language_name;?></td>
							<td><?php
              if (strlen($vrow->title) > 1)
              {
   $str = substr($vrow->title, 0, 15) . '..';
               echo $str; } ?></td>
							<td><?php echo $vrow->cdate;?></td>
              <?php
              $dataa = $this->Admin_Model->selectrow('video_views',array('video_id'=>$vrow->videoid));
              if(!empty($dataa))
              {
              ?>
              <td><?php echo $dataa->views;?></td>
              <?php
            }
              else
              {
              ?>
            <td>0</td>
          <?php } ?>
			<td><a href="<?php echo base_url('Admin/edit_video/').$vrow->videoid; ?>" class="btn btn-primary btn-sm">Edit </a><a href="<?php echo base_url('Admin/delete_video/').$vrow->videoid; ?>" class="btn btn-danger btn-sm">Delete </a>
        <?php
        if($vrow->vstatus==1)
        {
        ?>
        <a href="<?php echo base_url('Admin/approve/').$vrow->videoid.'/'.$vrow->vstatus; ?>" class="btn btn-success btn-sm">Approve </a>
        <?php
        }
        else
        {
        ?>
        <a href="<?php echo base_url('Admin/approve/').$vrow->videoid.'/'.$vrow->vstatus; ?>" class="btn btn-warning btn-sm">Reject </a>
        <?php
        }
        ?>
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
    //alert('test');
$('#category_id').bind('change keyup',function() {
  var cid = $('#category_id').val();
  //alert(cid);
    $.ajax({
        url: '<?php echo base_url(); ?>/Admin/subcategoryget',
        type: 'POST',
        data: {
            cid: cid
        },
        
        dataType: 'html',
        success: function(data) {

          $("#Sub_category").html(data);
        }
    });
});
});
</script>