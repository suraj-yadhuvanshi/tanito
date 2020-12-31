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
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="" method="post" enctype="multipart/form-data">
<input type="hidden"  name="id" value="">
                <div class="card-body">
                 <div class="form-group">
                     <div class="row">
                         <div class="col-md-3">
                              <label >Category</label>
                    <select name="category_id" class="form-control" id="category_id">
                    <option disabled selected value>--Select Category--</option>
                    <?php foreach ($category as $row)
                    {
                    ?>
				 				<option value="<?php echo $row->category_id;?>" <?php echo $row->category_id==$videoedit->category_id ? 'selected=" "':'';?>><?php echo $row->category_name ?></option>
				 	<?php } ?>
                   	</select>
                   	<?php echo form_error('category_id'); ?>
                         </div>
                         <div class="col-md-3">
                              <label >Sub Category</label>
                    <select name="subcat_id" class="form-control" id="Sub_category">
                    	<option disabled selected value>--Select Sub Category--</option>
                    	<?php foreach ($subcategory as $subrow)
                    {
                    ?>
				 				<option value="<?php echo $subrow->subcategory_id;?>" <?php echo $subrow->subcategory_id==$videoedit->subcategory_id ? 'selected=" "':'';?>><?php echo $subrow->subcategory_name ?></option>
				 	<?php } ?>
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
				 	<option value="<?php echo $lanrow->language_id;?>" <?php echo $lanrow->language_id==$videoedit->lang_id ? 'selected=" "':'';?>><?php echo $lanrow->language_name ?></option>
				 	<?php } ?>
                   	</select>
                   	<?php echo form_error('lang_id'); ?>
                         </div>
                         <div class="col-md-3">
                            <label >Song & Movie Name</label>
                    <input type="text" class="form-control" name="title" placeholder="Song & Movie Name" value="<?php echo $videoedit->title;?>">
                         </div>
                     </div>
                <div class="row">
                        <div class="col-md-3">
                             <label >Singer Name</label>
                    <input type="text" class="form-control" name="singer" value="<?php echo $videoedit->singer;?>" placeholder="Singer Name">
                        </div> 
                        <div class="col-md-3">
                    <label >Lyrics</label>
                    <input type="text" class="form-control" value="<?php echo $videoedit->lyrics;?>" name="lyrics" placeholder="Lyrics">
                        </div>
                        <div class="col-md-3">
                            <label >Compose</label>
                    <input type="text" class="form-control" value="<?php echo $videoedit->compose;?>" name="compose" placeholder="Compose">
                        </div>
                        <div class="col-md-3">
                            <label >Company Name</label>
                    <input type="text" class="form-control" name="company" value="<?php echo $videoedit->company;?>" placeholder="Company Name">
                        </div>
                     </div>
                  <div class="row">
                  
                  	<div class="col-md-4">
                  		 <label >Date</label>
                    <input type="date" class="form-control" name="cdate"  value="<?php echo $videoedit->cdate;?>">
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
                    <label >Description</label>
                    <textarea class="form-control" name="description"><?php echo $videoedit->description;?></textarea>
                    
                  </div>
                  <div class="row">
                  <div class="col-sm-4">
						<div class="form-group">
							<div class="custom-control custom-switch custom-switch-off-default custom-switch-on-success">
                      		<input type="checkbox" name="slider" value="<?php echo $videoedit->slider;?>" class="custom-control-input" id="customSwitch1">
                     	 <label class="custom-control-label" for="customSwitch1">Slider</label>
                    </div>
						</div>
                  </div>
                  <div class="col-sm-4">
						<div class="form-group">
							<div class="custom-control custom-switch custom-switch-off-default custom-switch-on-success">
                      		<input type="checkbox" name="top_slider" value="<?php echo $videoedit->top_slider;?>" class="custom-control-input" id="customSwitch3">
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