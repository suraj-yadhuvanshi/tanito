 <div class="content-wrapper">
 <br/>
<!-- Content Header (Page header) -->
 
<!-- /.content-header -->

<section class="content">
<div class="container-fluid">
<div class="row">
		 
		<div class="card card-info" style="width: 100%;">
		<div class="container">
			<div class="card-body">
				<div class="table-responsive">
			 
					<table id="example" class="display responsive nowrap" style="width:100%">
						<thead>
							<tr>
								<th>SR No</th>
								<th>Name</th>
								<th>DOB</th>
								<th>Mobile</th>
								<th>Gender</th>
								<th>Email</th>
                <th>Subscriber</th>
								<th>Usertype</th>
								<!--<th>Password</th>-->
								<th>Action</th>
							</tr>
						</thead>
						<?php 
						$i=1;
							foreach ($users as $row)
							 {
							?>
						<tr>
					 
							<td><?php echo $i;$i++;?></td>
							<td><?php echo $row->username;?></td>
							<td><?php echo $row->dob;?></td>
							<td><?php echo $row->mobile;?></td>
							<td><?php echo $row->gender;?></td>
							<td><?php echo $row->email;?></td>
               <?php
              $dataa = $this->Admin_Model->select('subscribe',array('admin_id'=>$row->id));
              if(!empty($dataa))
              {
              ?>
              <td><?php echo count($dataa);?></td>
              <?php
            }
              else
              {
              ?>
            <td>0</td>
          <?php } ?>
							<td><?php if($row->usertype==1){
								echo 'Admin';
							}
							elseif($row->usertype==2)
							{
								echo 'User';
							}
              else
              {
                echo 'Super Admin';
              }

							?></td>
							<!--<td>a</td>-->
							
<?php
      if($row->status==0)
      {
      ?>				
<td><a href="<?php echo base_url('Admin/edit_users/').$row->id; ?>" class="btn btn-primary btn-sm">Edit </a> <!-- <a href="<?php echo base_url('Admin/active_users/').$row->id.'/'.$row->status; ?>" class="btn btn-success btn-sm">Active </a> --> <a href="<?php echo base_url('Admin/deleteuser/').$row->id; ?>" class="btn btn-danger btn-sm">Delete </a></td>
<?php } 
	else
	{
	?>
	<td><a href="<?php echo base_url('Admin/edit_users/').$row->id; ?>" class="btn btn-primary btn-sm">Edit </a> <!-- <a href="<?php echo base_url('Admin/active_users/').$row->id.'/'.$row->status; ?>" class="btn btn-warning btn-sm">Deactive </a> --> <a href="<?php echo base_url('Admin/deleteuser/').$row->id; ?>" class="btn btn-danger btn-sm">Delete </a></td>
	<?php
	}
?>
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

