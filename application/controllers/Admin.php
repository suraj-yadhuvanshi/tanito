<?php

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_Model');
	}

	public function index()
	{
		if(!empty($_POST))
		{
			$this->form_validation->set_rules('email','Email Address','required|valid_email');
			$this->form_validation->set_rules('password','Password','required');
			if($this->form_validation->run() === FALSE)
			{
				$this->session->set_flashdata('message','Email  && Password Missmatch');
				$this->load->view('admin/login');
			}
			else
			{
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$con = array(
					'email'=>$email,
					'password'=>md5($password),
				);
				$check = $this->Admin_Model->selectrow('users',$con);
					if(!empty($check))
					{
						if($check->usertype==0 || $check->usertype==1)
						{
							$this->session->set_userdata('user',$check);
							redirect('Admin/dashboard');
						}	
						else
						{
							redirect('Admin');
						}
					}
					else
					{
						redirect('Admin');	
					}
			}
		}
		else
		{
			$this->load->view('admin/login');
		}
	}
	public function dashboard()
	{
		checkadminlogin();
		$data['banner']   = $this->Admin_Model->select('banner');
		$data['teacher']  = $this->Admin_Model->select('users',['usertype'=>2]);
		$data['student']  = $this->Admin_Model->select('users',['usertype'=>3]);
		$data['category'] = $this->Admin_Model->select('category');
		$data['revenue']  = 0;
		$this->load->view('admin/header');
		$this->load->view('admin/index',$data);
		$this->load->view('admin/footer');
	}
	public function myaccount()
	{
		checkadminlogin();
		$this->load->view('admin/header');
		$this->load->view('admin/myaccount');
		$this->load->view('admin/footer');
	}


	public function teachers()
	{
		checkadminlogin();

		$data['teacher']=$this->Admin_Model->select('users',['usertype'=>2]);

		if (!empty($_POST))
		{
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('email','Email ','required|valid_email');
			$this->form_validation->set_rules('mobile','Mobile ','required|is_unique[users.mobile]');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

			// $this->form_validation->set_rules('title','Title','required');
			// $this->form_validation->set_rules('guardian','Father Name / Husband Name','required');
			// $this->form_validation->set_rules('gender','Gender ','required');
			// $this->form_validation->set_rules('dob','Date Of birth ','required');
			// $this->form_validation->set_rules('marital_status','Marital Status','required');
			// $this->form_validation->set_rules('qualification','Qualification','required');
			// $this->form_validation->set_rules('state','State','required');
			// $this->form_validation->set_rules('city','City','required');
			// $this->form_validation->set_rules('address','Address','required');

			if($this->form_validation->run() === FALSE)
			{
				$this->load->view('admin/header');
				$this->load->view('admin/teachers',$data);
				$this->load->view('admin/footer');
			}
			else
			{

				$insertdata['username'] = ucfirst($this->input->post('name'));
				$insertdata['email'] 	= $this->input->post('email');
				$insertdata['mobile']	= $this->input->post('mobile');
				$insertdata['password'] = md5($this->input->post('password'));
				$insertdata['usertype'] = 2;

				$insert = $this->Admin_Model->insert('users',$insertdata);
				if ($insert) {
					// $lastid=$this->db->insert_id(); 
					// $profile=uploadfile($_FILES['profile_image']['name'],'profile_image','assets/profile-image');  //upload method

					// $profiledata['user_id'] 		= $lastid;
					// $profiledata['profile_img'] 	= $profile;
					// $profiledata['guardian'] 		= $this->input->post('guardian');
					// $profiledata['dob'] 			= $this->input->post('dob');
					// $profiledata['marital_status'] 	= $this->input->post('marital_status');
					// $profiledata['qualification'] 	= $this->input->post('qualification');
					// $profiledata['state'] 			= $this->input->post('state');
					// $profiledata['city'] 			= $this->input->post('city');
					// $profiledata['address'] 		= $this->input->post('address');
					// $insert = $this->Admin_Model->insert('users_profile',$profiledata);



					$this->session->set_flashdata('message','Added Successfully');
					return redirect($_SERVER['HTTP_REFERER']);
				}else{
					$this->session->set_flashdata('message','Not Added');
					return redirect($_SERVER['HTTP_REFERER']);
				}
			}
		}else{		
			$this->load->view('admin/header');
			$this->load->view('admin/teachers',$data);
			$this->load->view('admin/footer');
		}
	}

	public function showteachers()
	{
		checkadminlogin();

		$data['teacher']=$this->Admin_Model->select('users',['usertype'=>2]);
		if (!empty($_POST)) {
			if ($this->input->post('name')!='' && $this->input->post('mobile')=='') {
				$con=['username'=>$this->input->post('name')];

			}
			elseif ($this->input->post('mobile')!='' && $this->input->post('name')=='') {
				$con=['	mobile'=>$this->input->post('mobile')];

			}elseif($this->input->post('name')!='' && $this->input->post('mobile')!=''){
				$con=['username'=>$this->input->post('name'), 'mobile'=>$this->input->post('mobile')];
				
			}elseif($this->input->post('name')=='' && $this->input->post('mobile')==''){
				$this->session->set_flashdata('message','Please Fill The Name Or Mobile');
				return redirect($_SERVER['HTTP_REFERER']);
			}
			$data['teacher'] = $this->Admin_Model->select('users',$con,['usertype'=>2]);
			$this->load->view('admin/header');
			$this->load->view('admin/showteachers',$data);
			$this->load->view('admin/footer');
		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/showteachers',$data);
			$this->load->view('admin/footer');
		}
	}


	public function details($ide)
	{
		checkadminlogin();
		$id=base64_decode($ide);
		$data['details']	= $this->Admin_Model->selectrow('users_profile',['user_id'=>$id]);
		$data['users']		= $this->Admin_Model->selectrow('users',['id'=>$id]);
		$data['category']	= $this->Admin_Model->select('category');
		$data['subcategory']= $this->Admin_Model->select('sub_category');

		if (!empty($_POST)) {
					$this->form_validation->set_rules('class_grade','Class / Grade','required');
					$this->form_validation->set_rules('category','Category','required');
					$this->form_validation->set_rules('subcategory','Sub Category','required');

					if($this->form_validation->run() === FALSE)
					{
						$this->load->view('admin/header');
						$this->load->view('admin/teacher_profile',$data);
						$this->load->view('admin/footer');
					}
					else
					{
						$profile = uploadfile($_FILES['profile']['name'],'profile','assets/user-profile');
						
						if(!empty($profile))
						{
							unlink("assets/user-profile/".$data['details']->profile_img);
							$insertdata['profile_img'] = $profile;
						}

						$id_proof = uploadfile($_FILES['id_proof']['name'],'id_proof','assets/teacher-idproof');
						if(!empty($id_proof))
						{
							unlink("assets/teacher-idproof/".$data['details']->id_proof);
							$insertdata['id_proof'] = $id_proof;
						}

						$video = uploadvideo($_FILES['video']['name'],'video','assets/teacher-video');
						if(!empty($video))
						{
							unlink("assets/teacher-video/".$data['details']->video);
							$insertdata['video'] = $video;
						}
						

						$insertdata['class_grade'] 		= $this->input->post('class_grade');
						$insertdata['category_id']		= $this->input->post('category');
						$insertdata['subcategory_id'] 	= $this->input->post('subcategory');

						if (!empty($data['details'])) 
						{
							$this->Admin_Model->update('users_profile',$insertdata,['user_id'=>$id]);
						}else{
							$insertdata['user_id']		= $id;
							$this->Admin_Model->insert('users_profile',$insertdata);
						}
						$this->session->set_flashdata('message','Updated Successfully');

						return redirect('Admin/details/'.$ide);
					}
			}else{
				$this->load->view('admin/header');
				$this->load->view('admin/teacher_profile',$data);
				$this->load->view('admin/footer');
		
			}
	}

	public function studentprofile($ide)
	{
		checkadminlogin();
		$id=base64_decode($ide);
		$data['details']	= $this->Admin_Model->selectrow('users_profile',['user_id'=>$id]);
		$data['users']		= $this->Admin_Model->selectrow('users',['id'=>$id]);
		$data['category']	= $this->Admin_Model->select('category');
		$data['subcategory']= $this->Admin_Model->select('sub_category');

		if (!empty($_POST)) {
					$this->form_validation->set_rules('class_grade','Class / Grade','required');
					$this->form_validation->set_rules('category','Category','required');
					$this->form_validation->set_rules('subcategory','Sub Category','required');

					if($this->form_validation->run() === FALSE)
					{
						$this->load->view('admin/header');
						$this->load->view('admin/student_profile',$data);
						$this->load->view('admin/footer');
					}
					else
					{
						 $profile = uploadfile($_FILES['profile']['name'],'profile','assets/user-profile');
						
						if(!empty($profile))
						{
							$insertdata['profile_img'] = $profile;
						}
 
						$insertdata['class_grade'] 		= $this->input->post('class_grade');
						$insertdata['category_id']		= $this->input->post('category');
						$insertdata['subcategory_id'] 	= $this->input->post('subcategory');

						if (!empty($data['details'])) 
						{
							unlink("assets/user-profile/".$data['details']->profile_img);
							$this->Admin_Model->update('users_profile',$insertdata,['user_id'=>$id]);

						}else{
							$insertdata['user_id'] = $id;
							$this->Admin_Model->insert('users_profile',$insertdata);
						}
						$this->session->set_flashdata('message','Updated Successfully');

						return redirect('Admin/studentprofile/'.$ide);
					}
			}else{
				$this->load->view('admin/header');
				$this->load->view('admin/student_profile',$data);
				$this->load->view('admin/footer');
		
			}
	}

	public function students()
	{
		checkadminlogin();

		$data['student']=$this->Admin_Model->select('users',['usertype'=>3]);

		if (!empty($_POST))
		{
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('mobile','Mobile ','required|is_unique[users.mobile]');
			$this->form_validation->set_rules('email','Email ','required|valid_email');
			$this->form_validation->set_rules('password','Password ','required');
			$this->form_validation->set_rules('password','Password ','required');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

			// $this->form_validation->set_rules('lastname','Last Name','required|alpha');
			// $this->form_validation->set_rules('guardian','Father Name / Mother Name','required');
			// $this->form_validation->set_rules('gender','Gender ','required');
			// $this->form_validation->set_rules('dob','Date Of birth ','required');
			// $this->form_validation->set_rules('marital_status','Marital Status','required');
			// $this->form_validation->set_rules('qualification','Qualification','required');
			// $this->form_validation->set_rules('state','State','required');
			// $this->form_validation->set_rules('city','City','required');
			// $this->form_validation->set_rules('address','Address','required');

			if($this->form_validation->run() === FALSE)
			{
				$this->load->view('admin/header');
				$this->load->view('admin/students',$data);
				$this->load->view('admin/footer');
			}
			else
			{
				// $insertdata['gender'] 	= $this->input->post('gender');
				$insertdata['email'] 	= $this->input->post('email');
				$insertdata['username'] = ucfirst($this->input->post('name'));
				$insertdata['mobile']	= $this->input->post('mobile');
				$insertdata['password']	= md5($this->input->post('password'));
				$insertdata['usertype'] = 3;

				$insert = $this->Admin_Model->insert('users',$insertdata);
				if ($insert) {
					$this->session->set_flashdata('message','Added Successfully');
					return redirect($_SERVER['HTTP_REFERER']);
				}else{
					$this->session->set_flashdata('message','Not Added');
					return redirect($_SERVER['HTTP_REFERER']);
				}
			}
		}else{	
			$this->load->view('admin/header');
			$this->load->view('admin/students',$data);
			$this->load->view('admin/footer');
		}
	}

	
	public function showstudents()
	{
		checkadminlogin();
		$data['student']=$this->Admin_Model->select('users',['usertype'=>3]);

		if (!empty($_POST)) {
			if ($this->input->post('name')!='' && $this->input->post('mobile')=='') {
				$con=['username'=>$this->input->post('name')];

			}
			elseif ($this->input->post('mobile')!='' && $this->input->post('name')=='') {
				$con=['	mobile'=>$this->input->post('mobile')];

			}
			elseif($this->input->post('name')!='' && $this->input->post('mobile')!=''){
				$con=['username'=>$this->input->post('name'), 'mobile'=>$this->input->post('mobile')];
				
			}elseif($this->input->post('name')=='' && $this->input->post('mobile')==''){
				$this->session->set_flashdata('message','Please Fill The Name Or Mobile');
				return redirect($_SERVER['HTTP_REFERER']);
			}
			$data['student'] = $this->Admin_Model->select('users',$con,['usertype'=>3]);
			$this->load->view('admin/header');
			$this->load->view('admin/showstudents',$data);
			$this->load->view('admin/footer');
		}else{		
			
			$this->load->view('admin/header');
			$this->load->view('admin/showstudents',$data);
			$this->load->view('admin/footer');
		}
	}


	public function checkpassword() //ajax
	{
		checkadminlogin();

		if (!empty($_POST)) {
			$id=$this->input->post('id');
			$password=$this->input->post('password');
		   $data=$this->Admin_Model->selectrow('users',['password'=>md5($password),'id'=>$id]);
		   if ($data) {
			   echo "1";
		   }else{
			   echo "0";
		   }
		}
	}

	public function getsubcategory() //ajax
	{
		checkadminlogin();

		if (!empty($_POST)) {
			$id=$this->input->post('id');
			$str ='';
		    $data=$this->Admin_Model->select('sub_category',['category_id'=>$id]);
			$str .= "<option disabled selected value>--Select Category--</option>";
		   foreach($data as $s)
		   {
			$str .= "<option value=".$s->id.">".$s->subcategory."</option>";
		   }
		   echo $str;
		}
	}

	public function changepassword()
	{
		checkadminlogin();

		if (!empty($_POST)){
			$this->form_validation->set_rules('current_password', 'Current Password', 'trim|required|is_equal[users.password]'); 
			$this->form_validation->set_rules('current_password','Current Password','required');
			$this->form_validation->set_rules('new_password','New Password','required');
		   $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

			   if($this->form_validation->run() === FALSE)
			   {
				$this->load->view('admin/header');
				$this->load->view('admin/myaccount');
				$this->load->view('admin/footer');
			}
			   else
			   {
					$id 			 =$this->input->post('id');
					$current_password=$this->input->post('current_password');
					$new_password	 =$this->input->post('new_password');
				   $this->db->where(['id'=>$id,]);
				   $data=$this->db->update('users', array('password' => md5($new_password)));
					if ($data) {
						$this->session->set_flashdata('message', 'Password Change Successfully.');
						return redirect($_SERVER['HTTP_REFERER']);
					}
					$this->session->set_flashdata('message', 'Not Change.');
				   return redirect($_SERVER['HTTP_REFERER']);
				}
			}
		}

	public function updateprofile()
 	{
		checkadminlogin();

		
			if(!empty($_FILES['profile']['name']))
			{
				$profile=uploadfile($_FILES['profile']['name'],'profile','assets/profile-image');
					if (!empty($profile)) {

						$data['profile_img']= $profile;

						$user=singlecolomn('users_profile','profile_img',['user_id'=>$this->session->userdata('user')->id]);
						if (!empty($user)) { 
							unlink(base_url('assets/profile-image/').$user->profile);
							$userdata=$this->Admin_Model->update('users_profile',$data,['user_id'=>$this->session->userdata('user')->id]);
						}else{
							$data['user_id'] = $this->session->userdata('user')->id;
							$userdata=$this->Admin_Model->insert('users_profile',$data);

						}
					}

				// pr($data);
				// $this->db->where('id',$this->session->userdata('user')->id);	
				// $userdata=$this->db->update('users',$data);
				if ($userdata) {
					$this->session->set_flashdata('message','Updated Successfully');
					return redirect($_SERVER['HTTP_REFERER']);
				}else{
					$this->session->set_flashdata('message','Updated Failled');
					return redirect($_SERVER['HTTP_REFERER']);
				}
				$this->session->set_flashdata('message','Updated Failled');
					return redirect($_SERVER['HTTP_REFERER']);
			}

 	}
	// ------------------------------------------------------------------------------
	public function forgot()
	{
		if(!empty($_POST))
		{

			$this->form_validation->set_rules('email','Email Address','required|valid_email');
			if($this->form_validation->run() === FALSE)
			{
				$this->load->view('admin/forgot');

			}
			else
			{
				$email = $this->input->post('email');
				$con = array(
					'email'=>$email,
					'status'=>0
				);
				$check = $this->Admin_Model->selectrow('users',$con);
				if(!empty($check))
				{
					$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'mail.sineflix.in',
					'smtp_port' => 587,
					'smtp_user' => 'info@sineflix.in', // change it to yours
					'smtp_pass' => 'Adminsineflix', // change it to yours
					'mailtype' => 'html',
					'charset' => 'iso-8859-1',
					'wordwrap' => TRUE
					);
			$otp=rand(1000,10000);
			$message = "<html>
									<head>
										<title>Sineflix OTP</title>
									</head>

									<body>
										<p>OTP: ".$otp."</p>
									</body>
									</html>

								";

         				$this->load->library('email', $config);
						$this->email->initialize($config);
						$this->email->set_newline("\r\n");
						$this->email->from('info@sineflix.in','Sineflix'); // change it to yours
						$this->email->to($email);// change it to yours
						$this->email->subject('Sineflix');
						$this->email->message($message);
						$this->email->send();
						$insert = $this->Admin_Model->update('users',array('otp'=>$otp),array('id'=>$check->id));
						redirect('Admin/otp');	
						//$this->load->view('admin/otp');
				}
				else
				{
					redirect('Admin/forgot');	
				}
			}
		}
		else
		{
			$this->load->view('admin/forgot');
		}
	}
	public function otp()
	{
		if(!empty($_POST))
		{

			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('otp','OTP','required');
			if($this->form_validation->run() === FALSE)
			{
				$this->load->view('admin/otp');

			}
			else
			{
				$otp = $this->input->post('otp');
				$password = $this->input->post('password');
				$con = array(
					'otp'=>$otp,
					'status'=>0
				);
				$check = $this->Admin_Model->selectrow('users',$con);
				if(!empty($check))
				{
					
					$insert = $this->Admin_Model->update('users',array('otp'=>0,'password'=>$password),array('id'=>$check->id));
					$this->session->flashdata('message', 'Password Updated.');
					redirect('Admin/index');
					//$this->load->view('admin/otp');
				}
				else
				{
					redirect('Admin/otp');	
				}
			}
		}
		else
		{
			$this->load->view('admin/otp');
		}
	}
	
	public function category()
	{	
		checkadminlogin();

		$data['category'] = $this->Admin_Model->select('category');
		
		if(!empty($_POST))
		{
			$this->form_validation->set_rules('cateegoryname','Cateegory Name','required');
				if($this->form_validation->run() === FALSE)
				{
					$this->session->set_flashdata('message', 'Not Cateegory Added.');
					$this->load->view('admin/header');
					$this->load->view('admin/category',$data);
					$this->load->view('admin/footer');
				}
				else
				{
					$dataArray['category']	=	$this->input->post('cateegoryname');
					$insert = $this->Admin_Model->insert('category',$dataArray);
					if(!empty($insert))
					{
						$this->session->set_flashdata('message', 'Added Successfully');
						return 	redirect($_SERVER['HTTP_REFERER']);
					}	
				return 	redirect($_SERVER['HTTP_REFERER']);
				}
	}
	else
		{
			$this->load->view('admin/header');
			$this->load->view('admin/category',$data);
			$this->load->view('admin/footer');
		}
	}
	public function editcategory($ide)
	{
		checkadminlogin();

		$id=base64_decode($ide);

		$data['edit'] = $this->Admin_Model->selectrow('category',['id'=>$id]);

		$data['category'] = $this->Admin_Model->select('category');
		if(!empty($_POST))
		{
			$this->form_validation->set_rules('cateegoryname','Cateegory Name','required');
		
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('message', 'Not Cateegory Updated.');
			$this->load->view('admin/header');
			$this->load->view('admin/edit_category',$data);
			$this->load->view('admin/footer');

		}
		else
		{
			$dataArray=array('category'=>$this->input->post('cateegoryname'));
			$update = $this->Admin_Model->update('category',$dataArray,array('id'=>$id));
			if($update >= 1)
				{
					$this->session->set_flashdata('message','Cateegory Updated.');
				}
				else
				{
					$this->session->set_flashdata('message','Not Cateegory Updated.');
				}
				redirect('Admin/category');
		}
	}
	else
	{
		$this->load->view('admin/header');
		$this->load->view('admin/edit_category',$data);
		$this->load->view('admin/footer');	
	}
	}


	public function subcategory()
	{
		checkadminlogin();

		$data['category'] = $this->Admin_Model->select('category');
		$data['subcategory'] = $this->Admin_Model->select('sub_category');

		if(!empty($_POST))
		{
			$this->form_validation->set_rules('subcateegoryname','Sub Cateegory Name','required|is_unique[sub_category.subcategory]');
			$this->form_validation->set_rules('cat_id','Cateegory Choose','required');
		
		if($this->form_validation->run() === FALSE)
		{

			$this->session->set_flashdata('message', 'Not Sub Cateegory Added.');
			$this->load->view('admin/header');
			$this->load->view('admin/sub_category',$data);
			$this->load->view('admin/footer');

		}
		else
		{
			$dataArray['category_id'] 	= $this->input->post('cat_id');
			$dataArray['subcategory']	= $this->input->post('subcateegoryname');

			$insert = $this->Admin_Model->insert('sub_category',$dataArray);
			if(!empty($insert))
			{
				$this->session->set_flashdata('message', 'Successfully Cateegory Added.');
  				return redirect($_SERVER['HTTP_REFERER']);
			}	
			return redirect($_SERVER['HTTP_REFERER']);
		}
	}
	else
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sub_category',$data);
		$this->load->view('admin/footer');
	}
	}
	public function subcategoryget()
	{
		
		$cid= $_POST['cid'];
	$con = array('category_id'=>$cid);
	 $datad = $this->Admin_Model->select('sub_category',$con);
				 			echo '<option disabled selected value>--Select Sub Category--</option>';

										if(!empty($datad))
										{
										 foreach($datad as $d)
										 {
											echo ' <option value='.$d->subcategory_id.'>'.$d->subcategory_name.'</option>';
										 }
										}
	}

	public function editsubcategory($ide)
	{
		checkadminlogin();

		$id=base64_decode($ide);

		$data['category'] = $this->Admin_Model->select('category');
		$data['editcategory'] = $this->Admin_Model->selectrow('sub_category',array('id'=>$id));
		if(!empty($_POST))
		{
			$this->form_validation->set_rules('subcateegoryname','Sub Cateegory Name','required');
			$this->form_validation->set_rules('cat_id','Cateegory Choose','required');
		
				if($this->form_validation->run() === FALSE)
				{
					$this->load->view('admin/header');
					$this->load->view('admin/edit_subcategory',$data);
					$this->load->view('admin/footer');
				}
				else
				{
					$dataArray['category_id'] = $this->input->post('cat_id');
					$dataArray['subcategory'] = $this->input->post('subcateegoryname');
					
					$update = $this->Admin_Model->update('sub_category',$dataArray,['id'=>$id]);
					if($this->db->affected_rows())
						{
							$this->session->set_flashdata('message','Cateegory Updated.');
						}
						else
						{
							$this->session->set_flashdata('message','Not Cateegory Updated.');
						}
						redirect('Admin/subcategory');
				}
	}
	else
	{
		$this->load->view('admin/header');
		$this->load->view('admin/edit_subcategory',$data);
		$this->load->view('admin/footer');
	}	
	}

	public function tags() //==============Tag
	{	
		checkadminlogin();
		$data['tags'] = $this->Admin_Model->select('tags');
		if(!empty($_POST))
		{
			$this->form_validation->set_rules('tags','Tags Name','required');
				if($this->form_validation->run() === FALSE)
				{
					$this->session->set_flashdata('message', 'Not Cateegory Added.');
					$this->load->view('admin/header');
					$this->load->view('admin/tags',$data);
					$this->load->view('admin/footer');
				}
				else
				{
					$dataArray['tags']	=	$this->input->post('tags');
					$insert = $this->Admin_Model->insert('tags',$dataArray);
					if(!empty($insert))
					{
						$this->session->set_flashdata('message', 'Added Successfully');
						return 	redirect($_SERVER['HTTP_REFERER']);
					}	
				return 	redirect($_SERVER['HTTP_REFERER']);
				}
	}
	else
		{
			$this->load->view('admin/header');
			$this->load->view('admin/tags',$data);
			$this->load->view('admin/footer');
		}
	}
	public function deletetags($ide)
	{
		checkadminlogin();
		$id=base64_decode($ide);
		$delete=$this->Admin_Model->delete('tags',['id'=>$id]);
		$this->session->set_flashdata('message', 'Deleted Successfully.');
		return redirect($_SERVER['HTTP_REFERER']);
	}

	public function edittags($ide)
	{
		checkadminlogin();
		$id=base64_decode($ide);
		$data['tags'] = $this->Admin_Model->selectrow('tags',['id'=>$id]);
		if(!empty($_POST))
		{
				$this->form_validation->set_rules('tags','Tags Name','required');
				if($this->form_validation->run() === FALSE)
				{
					$this->load->view('admin/header');
					$this->load->view('admin/edittags',$data);
					$this->load->view('admin/footer');
				}
		else
		{
			$this->Admin_Model->update('tags',['tags'=>($this->input->post('tags'))],['id'=>$id]);
				if($this->db->affected_rows())
				{
					$this->session->set_flashdata('message','Tags Updated.');
				}
				else
				{
					$this->session->set_flashdata('message','Not Updated.');
				}
				redirect('Admin/tags');
		}
	}
	else
		{
			$this->load->view('admin/header');
			$this->load->view('admin/edittags',$data);
			$this->load->view('admin/footer');	
		}
	}

	public function plans()
	{	
		checkadminlogin();

		$data['plans'] = $this->Admin_Model->select('plan');
		if(!empty($_POST))
		{
				$this->form_validation->set_rules('plan','Plan Name','required');
				$this->form_validation->set_rules('benefits','Benefits','required');
				$this->form_validation->set_rules('validity','Validity','required');
				$this->form_validation->set_rules('description','Description','required');
				if($this->form_validation->run() === FALSE)
				{
					$this->session->set_flashdata('message', 'Not Cateegory Added.');
					$this->load->view('admin/header');
					$this->load->view('admin/plan',$data);
					$this->load->view('admin/footer');
				}
				else
				{
					$dataArray['plan']			=	$this->input->post('plan');
					$dataArray['benefits']		=	$this->input->post('benefits');
					$dataArray['validity']		=	$this->input->post('validity');
					$dataArray['description']	=	$this->input->post('description');
					$insert = $this->Admin_Model->insert('plan',$dataArray);
					if(!empty($insert))
					{
						$this->session->set_flashdata('message', 'Added Successfully');
						return 	redirect($_SERVER['HTTP_REFERER']);
					}	
				return 	redirect($_SERVER['HTTP_REFERER']);
				}
	}
	else
		{
			$this->load->view('admin/header');
			$this->load->view('admin/plan',$data);
			$this->load->view('admin/footer');
		}
	}

	public function deleteplan($ide)
	{
		checkadminlogin();
		$id=base64_decode($ide);
		$delete=$this->Admin_Model->delete('plan',['id'=>$id]);
		$this->session->set_flashdata('message', 'Deleted Successfully.');
		return redirect($_SERVER['HTTP_REFERER']);
	}

	public function editplan($ide)
	{
		checkadminlogin();
		$id=base64_decode($ide);
		$data['plan'] = $this->Admin_Model->selectrow('plan',['id'=>$id]);
		if(!empty($_POST))
		{
				$this->form_validation->set_rules('plan','Plan Name','required');
				$this->form_validation->set_rules('benefits','Benefits','required');
				$this->form_validation->set_rules('validity','Validity','required');
				$this->form_validation->set_rules('description','Description','required');
				if($this->form_validation->run() === FALSE)
				{
					$this->session->set_flashdata('message', 'Not Cateegory Added.');
					$this->load->view('admin/header');
					$this->load->view('admin/plan',$data);
					$this->load->view('admin/footer');
				}
				else
				{
					$dataArray['plan']			=	$this->input->post('plan');
					$dataArray['benefits']		=	$this->input->post('benefits');
					$dataArray['validity']		=	$this->input->post('validity');
					$dataArray['description']	=	$this->input->post('description');
					
					$this->Admin_Model->update('plan',$dataArray,['id'=>$id]);
						if($this->db->affected_rows())
						{
							$this->session->set_flashdata('message','Plan Updated.');
						}
						else
						{
							$this->session->set_flashdata('message','Not Updated.');
						}
						redirect('Admin/plans');
				}
	}
	else
		{
			$this->load->view('admin/header');
			$this->load->view('admin/editplan',$data);
			$this->load->view('admin/footer');	
		}
	}

	public function posts()
	{
			checkadminlogin();
			$data['posts'] = $this->Admin_Model->select('posts');
		
			$this->load->view('admin/header');
			$this->load->view('admin/posts',$data);
			$this->load->view('admin/footer');	
		
	}
	
	function captcha($length = 10) {
		checkadminlogin();

		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	public function promocodes()
	{	
		checkadminlogin();

		$data['promocodes'] = $this->Admin_Model->select('promocodes');
		if(!empty($_POST))
		{
				$this->form_validation->set_rules('validity','Validity','required');
				$this->form_validation->set_rules('description','Description','required');
				if($this->form_validation->run() === FALSE)
				{
					$this->session->set_flashdata('message', 'Not Cateegory Added.');
					$this->load->view('admin/header');
					$this->load->view('admin/promocodes',$data);
					$this->load->view('admin/footer');
				}
				else
				{
					$dataArray['promocodes']	=	$this->captcha();
					$dataArray['validity']		=	$this->input->post('validity');
					$dataArray['description']	=	$this->input->post('description');
					$insert = $this->Admin_Model->insert('promocodes',$dataArray);
					if(!empty($insert))
					{
						$this->session->set_flashdata('message', 'Added Successfully');
						return 	redirect($_SERVER['HTTP_REFERER']);
					}	
				return 	redirect($_SERVER['HTTP_REFERER']);
				}
	}
	else
		{
			$this->load->view('admin/header');
			$this->load->view('admin/promocodes',$data);
			$this->load->view('admin/footer');
		}
	}
	public function deletepromo($ide)
	{
		checkadminlogin();
		$id=base64_decode($ide);
		$delete=$this->Admin_Model->delete('promocodes',['id'=>$id]);
		$this->session->set_flashdata('message', 'Deleted Successfully.');
		return redirect($_SERVER['HTTP_REFERER']);
	}

	public function banner()
	{
		checkadminlogin();
		$data['banner']=$this->Admin_Model->select('banner');

		if (!empty($_FILES)) 
		{
				$img=uploadfile($_FILES['banner']['name'],'banner','assets/banner');
				
				
				$insert = $this->Admin_Model->insert('banner',['banner'=>$img]);
				if ($insert ) {
					$this->session->set_flashdata('message','Banner Added Successfully');
					return redirect($_SERVER['HTTP_REFERER']);
				}else{
					$this->session->set_flashdata('message','Bnaner Not Added');
					return redirect($_SERVER['HTTP_REFERER']);
				}
		
	
		}else{		
			$this->load->view('admin/header');
			$this->load->view('admin/banner',$data);
			$this->load->view('admin/footer');
		}
	}

	public function deletebanner($ide)
	{
        checkadminlogin();

		$id=base64_decode($ide);
		$delete=$this->Admin_Model->delete('banner',['id'=>$id]);
		
		$this->session->set_flashdata('message', 'Deleted Successfully.');
		return redirect($_SERVER['HTTP_REFERER']);
	}

	// ------------------------------end Tag Section

	public function create_language()
	{
		$data['language'] = $this->Admin_Model->select('language');
		if(!empty($_POST))
		{
			$this->form_validation->set_rules('languagename','Language Name','required');
		
		if($this->form_validation->run() === FALSE)
		{

			$this->session->set_flashdata('message', 'Not Language Added.');
			$this->load->view('admin/header');
		$this->load->view('admin/create_language',$data);
		$this->load->view('admin/footer');

		}
		else
		{
			$dataArray=array('language_name'=>$this->input->post('languagename'));
			$insert = $this->Admin_Model->insert('language',$dataArray);
			if(!empty($insert))
			{
				$this->session->set_flashdata('message', 'Successfully Language Added.');
  						redirect('Admin/create_language');
			}	
			redirect('Admin/create_language');
		}
	}
	else
	{
		$this->load->view('admin/header');
		$this->load->view('admin/create_language',$data);
		$this->load->view('admin/footer');
	}
	}
	public function edit_language($id)
	{
		$data['edit'] = $this->Admin_Model->selectrow('language',array('language_id'=>$id));
		$data['language'] = $this->Admin_Model->select('language');
		if(!empty($_POST))
		{
			$this->form_validation->set_rules('languagename','Language Name','required');
		
		if($this->form_validation->run() === FALSE)
		{

			$this->session->set_flashdata('message', 'Not Language Updated.');
			$this->load->view('admin/header');
		$this->load->view('admin/edit_language',$data);
		$this->load->view('admin/footer');

		}
		else
		{
			$dataArray=array('language_name'=>$this->input->post('languagename'));
			$update = $this->Admin_Model->update('language',$dataArray,array('language_id'=>$id));
			if($update >= 1)
				{
					$this->session->set_flashdata('message','Language Updated.');
				}
				else
				{
					$this->session->set_flashdata('message','Not Language Updated.');
				}
				redirect('Admin/create_language');
		}
	}
	else
	{
		$this->load->view('admin/header');
		$this->load->view('admin/edit_language',$data);
		$this->load->view('admin/footer');
	}	
	}
	public function create_logo()
	{
		$data['logo'] = $this->Admin_Model->select('logo');
		if(!empty($_FILES['logo']['name']))
		{
			$config['upload_path']          = 'logo/';
            $config['allowed_types']        = 'gif|jpg|png';

           $this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('logo'))
                {
                  echo $this->upload->display_errors();
                }
                else
                {
                $data = $this->upload->data();
				$logo = $data['file_name'];
                }
			
			$dataArray=array('logo'=>$logo);
			$insert = $this->Admin_Model->insert('logo',$dataArray);
			if(!empty($insert))
			{
				$this->session->set_flashdata('message', 'Successfully Logo Added.');
  				redirect('Admin/create_logo');
			}	
		
	}
	else
	{
		$this->load->view('admin/header');
		$this->load->view('admin/create_logo',$data);
		$this->load->view('admin/footer');
	}
	}
	public function upload_video()
	{
		$user_ses=$this->session->userdata('user');
		$data['category'] = $this->Admin_Model->select('category');
		$data['subcategory'] = $this->Admin_Model->select('sub_category');
		$data['language'] = $this->Admin_Model->select('language');
		$data['video'] = $this->Admin_Model->selectjoin('video',array('admin_id'=>$user_ses->id));
		
		if(!empty($_POST))
		{
			$this->form_validation->set_rules('category_id','Cateegory Choose','required');
			$this->form_validation->set_rules('subcat_id','Sub Cateegory Choose','required');
			$this->form_validation->set_rules('lang_id','Language Choose','required');		
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('message', 'Not Video Uploaded.');
			$this->load->view('admin/header');
			$this->load->view('admin/upload_video',$data);
			$this->load->view('admin/footer');
		}
		else
		{
			$thumbnail='';
			if(!empty($_FILES['thumbnail']['name']))
			{
			$config['upload_path']          = 'thumbnail/';
            $config['allowed_types']        = 'flv|mp3|wmv|mp4|avi|mov|webm|gif|jpg|png';
            
            $this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('thumbnail'))
                {
                  echo $this->upload->display_errors();
                }
                else
                {
                $data = $this->upload->data();
				$thumbnail = $data['file_name'];
                }
			}
			$video='';
			if(!empty($_FILES['video']['name']))
			{
			$conf['upload_path']          = 'thumbnail/';
            $conf['allowed_types']        = 'flv|mp3|wmv|mp4|avi|mov|webm';
            $conf['max_size'] = 0;
            $conf['max_width'] = 5024;
            $conf['max_height'] = 2068;
           $this->load->library('upload', $conf);

				if ( ! $this->upload->do_upload('video'))
                {
                  echo $this->upload->display_errors(); 
                }
                else
                {
                $dataa = $this->upload->data();
				$video = $dataa['file_name'];

                }

			}
			$dataArray['admin_id']=$user_ses->id;
			$dataArray['category_id']=$this->input->post('category_id');
			$dataArray['subcategory_id']=$this->input->post('subcat_id');
			$dataArray['lang_id']=$this->input->post('lang_id');
			$dataArray['title']=$this->input->post('title');
			$dataArray['cdate']=$this->input->post('cdate');
			
			if(!empty($this->input->post('singer')))
			$dataArray['singer']=$this->input->post('singer');
			if(!empty($this->input->post('lyrics')))
			$dataArray['lyrics']=$this->input->post('lyrics');
			if(!empty($this->input->post('compose')))
			$dataArray['compose']=$this->input->post('compose');
			if(!empty($this->input->post('company')))
			$dataArray['company']=$this->input->post('company');
			if(!empty($thumbnail))
			$dataArray['video_thumbnail']=$thumbnail;
			if(!empty($video))
			$dataArray['video_file']=$video;
			if(!empty($this->input->post('description')))
			$dataArray['description']=$this->input->post('description');
			if(!empty($this->input->post('slider')))
			$dataArray['slider']=$this->input->post('slider');
			if(!empty($this->input->post('top_slider')))
			$dataArray['top_slider']=$this->input->post('top_slider');
			if(!empty($this->input->post('must_watch')))
			$dataArray['must_watch']=$this->input->post('must_watch');
			
			$insert = $this->Admin_Model->insert('video',$dataArray);
			if(!empty($insert))
			{
				$this->session->set_flashdata('message', 'Successfully Cateegory Added.');
  						redirect('Admin/upload_video');
			}	
			redirect('Admin/upload_video');
		}
	}
		else
		{
		$this->load->view('admin/header');
		$this->load->view('admin/upload_video',$data);
		$this->load->view('admin/footer');
	}
	}

	public function delete_user($id)
	{
		$con = array('id'=>$id);
		$dacheck = $this->Admin_Model->selectrow('users',array('id'=>$id));
		$delete=$this->Admin_Model->delete('users',$con);
		if(!empty($delete))
		{
			$data= $this->Admin_Model->select('video',array('admin_id'=>$id));
			foreach ($data as $row)
			{
				$delete=$this->Admin_Model->delete('playlist',array('video_id'=>$row->videoid));
				$delete=$this->Admin_Model->delete('savevideo',array('video_id'=>$row->videoid));	
				$delete=$this->Admin_Model->delete('video_views',array('video_id'=>$row->videoid));
			}

			$delete=$this->Admin_Model->delete('video',array('admin_id'=>$id));
			$delete=$this->Admin_Model->delete('subscribe',array('admin_id'=>$id));
		}
				if($dacheck->usertype==2)
				{
					$this->session->set_flashdata('message', 'Successfully Users Updated.');
  						redirect('Admin/userlist');
				}
				else
				{
					$this->session->set_flashdata('message', 'Successfully Users Updated.');
  						redirect('Admin/new_user');
				}
		// $this->session->set_flashdata('message', 'Successfully Delete Chanel.');
		// redirect('Admin/new_user');
	}
	public function edit_video($id)
	{
		$user_ses=$this->session->userdata('user');
		$data['video'] = $this->Admin_Model->selectjoin('video',array('admin_id'=>$user_ses->id));
		$data['category'] = $this->Admin_Model->select('category');
		$data['subcategory'] = $this->Admin_Model->select('sub_category');
		$data['language'] = $this->Admin_Model->select('language');
		$data['videoedit'] = $this->Admin_Model->selectrow('video',array('videoid'=>$id));
		if(!empty($_POST))
		{
			$this->form_validation->set_rules('category_id','Cateegory Choose','required');
			$this->form_validation->set_rules('subcat_id','Sub Cateegory Choose','required');
			$this->form_validation->set_rules('lang_id','Language Choose','required');
					
		if($this->form_validation->run() === FALSE)
		{

			$this->session->set_flashdata('message', 'Not Video Uploaded.');
			$this->load->view('admin/header');
			$this->load->view('admin/edit_video',$data);
			$this->load->view('admin/footer');

		}
		else
		{
			$this->load->library('image_lib');
    		if(!empty($_FILES['thumbnail']['name']))
			{
			$config['upload_path']          = 'thumbnail/';
            $config['allowed_types']        = 'flv|mp3|wmv|mp4|avi|mov|gif|jpg|png|mp4|webm';
            //$config['width']    =  '1800';
        	//$config['height'] =  '900';
           $this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('thumbnail'))
                {
                  echo $this->upload->display_errors();
                }
                else
                {
                $data = $this->upload->data();
				$thumbnail = $data['file_name'];

                }

			}

			if(!empty($_FILES['video']['name']))
			{
			$config['upload_path']          = 'thumbnail/';
            $config['allowed_types']        = 'flv|mp3|wmv|mp4|avi|mov|webm';

           $this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('video'))
                {
                  echo $this->upload->display_errors();
                }
                else
                {
                $dataa = $this->upload->data();
				$video = $dataa['file_name'];

                }

			}
			
			$dataArray['category_id']=$this->input->post('category_id');
			$dataArray['subcategory_id']=$this->input->post('subcat_id');
			$dataArray['lang_id']=$this->input->post('lang_id');
			$dataArray['title']=$this->input->post('title');
			$dataArray['cdate']=$this->input->post('cdate');
			if(!empty($thumbnail))
			$dataArray['video_thumbnail']=$thumbnail;
			if(!empty($video))
			$dataArray['video_file']=$video;
			$dataArray['description']=$this->input->post('description');
			$dataArray['slider']=$this->input->post('slider');
			$dataArray['top_slider']=$this->input->post('top_slider');
			if(!empty($this->input->post('singer')))
			$dataArray['singer']=$this->input->post('singer');
			if(!empty($this->input->post('lyrics')))
			$dataArray['lyrics']=$this->input->post('lyrics');
			if(!empty($this->input->post('compose')))
			$dataArray['compose']=$this->input->post('compose');
			if(!empty($this->input->post('company')))
			$dataArray['company']=$this->input->post('company');
			$update = $this->Admin_Model->update('video',$dataArray,array('videoid'=>$id));
			if($update >= 1)
				{
					$this->session->set_flashdata('message','Video Updated.');
				}
				else
				{
					$this->session->set_flashdata('message','Not Video Updated.');
				}
				redirect('Admin/upload_video');	
			}
			redirect('Admin/upload_video');	
		}
		else
		{
		$this->load->view('admin/header');
		$this->load->view('admin/edit_video',$data);
		$this->load->view('admin/footer');
	}	
	}
	public function new_user()
	{
		$data['users'] = $this->Admin_Model->select('users',array('usertype!='=>2));
		if(!empty($_POST))
		{
			$this->form_validation->set_rules('name','Enter Name','required');
			$this->form_validation->set_rules('dob','Enter Date of birth','required');
			$this->form_validation->set_rules('email','Enter Email','required|valid_email|is_unique[users.email]');		
			$this->form_validation->set_rules('mobile','Enter Mobile','required');		
			$this->form_validation->set_rules('password','Enter Password','required');			
		if($this->form_validation->run() === FALSE)
		{

			$this->session->set_flashdata('message', 'Not Users Added.');
			$this->load->view('admin/header');
		$this->load->view('admin/new_user',$data);
		$this->load->view('admin/footer');

		}
		else
		{
			if(!empty($_FILES['profilepic']['name']))
			{
			$config['upload_path'] = 'profile/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';

           $this->load->library('upload', $config);
           //$this->upload->initialize($config);
				if ( ! $this->upload->do_upload('profilepic'))
                {
                  echo $this->upload->display_errors(); die;
                }
                else
                {
                $data = $this->upload->data();
				$profilepic = $data['file_name'];
                }

			}
			
			$dataArray=array('username'=>$this->input->post('name'),
				'dob'=>$this->input->post('dob'),
				'email'=>$this->input->post('email'),
				'mobile'=>$this->input->post('mobile'),
				'password'=>$this->input->post('password'),
				'profile_image'=>$profilepic,
				'gender'=>$this->input->post('gender'),
				'usertype'=>$this->input->post('type')
			);
			$insert = $this->Admin_Model->insert('users',$dataArray);
			if(!empty($insert))
			{
				$this->session->set_flashdata('message', 'Successfully Users Added.');
  						redirect('Admin/new_user');
			}	
		}
	}
		else
		{
		$this->load->view('admin/header');
		$this->load->view('admin/new_user',$data);
		$this->load->view('admin/footer');
	}
	}

	public function userlist()
	{
		$data['users'] = $this->Admin_Model->select('users',array('usertype='=>2));
		$this->load->view('admin/header');
		$this->load->view('admin/userlist',$data);
		$this->load->view('admin/footer');
	}

	
	public function approve()
	{
		$id = $this->uri->segment(3);
		$status = $this->uri->segment(4);
		if($status==0)
		{
			$insert = $this->Admin_Model->update('video',array('vstatus'=>1),array('videoid'=>$id));
			$this->session->set_flashdata('message', 'Approve Video.');
  						redirect('Admin/upload_video');
		}
		else
		{
			$insert = $this->Admin_Model->update('video',array('vstatus'=>0),array('videoid'=>$id));
			$this->session->set_flashdata('message', 'Reject Video.');
  						redirect('Admin/upload_video');	
		}
	}

	public function block($ide)
    {
        checkadminlogin();

        if(!empty($ide))
        {
            $id=base64_decode($ide);
			$check = $this->Admin_Model->selectrow('users',['id'=>$id]);
			$value = ($check->status==1)?0:1;

			$insert = $this->Admin_Model->update('users',['status'=>$value],['id'=>$check->id]);
            $this->session->set_flashdata('message', 'Updated Succesfully.');
            return redirect($_SERVER["HTTP_REFERER"]);

        }else{
            return redirect($_SERVER["HTTP_REFERER"]);
        }
	}
	
	public function deleteuser($ide)
	{
		$id=base64_decode($ide);
		$delete=$this->Admin_Model->delete('users',['id'=>$id]);
		// if(!empty($delete))
		// {
		// 	$delete=$this->Admin_Model->delete('playlist',['user_id'=>$id]);
		// }
		$this->session->set_flashdata('message', 'Deleted Successfully.');
		return redirect($_SERVER['HTTP_REFERER']);
	}

	public function delectcategory($ide)
	{
		$id=base64_decode($ide);
		$delete=$this->Admin_Model->delete('category',['id'=>$id]);
		if(!empty($delete))
		{
			$delete=$this->Admin_Model->delete('sub_category',['category_id'=>$id]);
		}
		$this->session->set_flashdata('message', 'Deleted Successfully.');
		return redirect($_SERVER['HTTP_REFERER']);
	}

	public function delectsubcategory($ide)
	{
		$id=base64_decode($ide);
		$delete=$this->Admin_Model->delete('sub_category',['id'=>$id]);
	
		$this->session->set_flashdata('message', 'Deleted Successfully.');
		return redirect($_SERVER['HTTP_REFERER']);
	}


	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Admin');
	}
}
?>