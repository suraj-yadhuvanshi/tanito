<?php
class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_Model');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->form_validation->set_rules('email','Email Address','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run()===FALSE){
			$date=$this->session->set_flashdata('message', 'Plz Fill All Fiels Corectly');
			redirect('Controller/index');
		}
		else{
			$con=array(
				'email'=>$this->input->post('email'),
				'password'=>$this->input->post('password'),
				'status'=>0
			);
			$check = $this->Admin_Model->selectrow('users',$con);
			if(!empty($check))
			{
				if($check->usertype==2)
				{
					$this->session->set_userdata('userlogin',$check);
					redirect('Controller/index');
				}
				else
				{
					redirect('Controller/index');
				}
			}
			else
			{
				redirect('Controller/index');
			}
		}
	}
	public function dashboard()
	{
		$this->load->view('User/header');
		$this->load->view('User/index');
		$this->load->view('User/footer');
	}
	public function save_user()
	{
		$this->form_validation->set_rules('username','Enter User Name','required');
		$this->form_validation->set_rules('mobile','Mobile Number unique','required|is_unique[users.mobile]');
		$this->form_validation->set_rules('email','Enter Email unique','required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password','Password Minimum 6 Digit','required|min_length[6]|max_length[12]');
		$this->form_validation->set_rules('gender','Choose Gender','required');
		if($this->form_validation->run()===FALSE)
		{
			$data=$this->session->set_flashdata('message', 'Not Successfully Registration.');
			redirect('Controller/index');
		}else{
			$email=$this->input->post('email');
			$save=array(
				'username'=>$this->input->post('username'),
				'email'=>$email,
				'mobile'=>$this->input->post('mobile'),
				'password'=>$this->input->post('password'),
				'gender'=>$this->input->post('gender'),
				'usertype'=>2,
				'status'=>0
			);
			//mail.sineflix.in
			//smtp.WebSiteLive.net
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

         $this->load->library('email', $config);
$this->email->initialize($config);
$this->email->set_newline("\r\n");
$this->email->from('info@sineflix.in'); // change it to yours
$this->email->to($email);// change it to yours
$this->email->subject('Sineflix');
$this->email->message('You have successfully registered.');
if($this->email->send()){ 
			$insert = $this->Admin_Model->insert('users',$save);
			if(!empty($insert))
			{
				$con=array(
				'email'=>$this->input->post('email'),
				'password'=>$this->input->post('password'),
				'status'=>0
			);
			$check = $this->Admin_Model->selectrow('users',$con);
			if(!empty($check))
			{
				if($check->usertype==2)
				{
					$this->session->set_userdata('userlogin',$check);
					redirect('Controller/index');
				}
				else
				{
					redirect('Controller/index');
				}
			}
				$this->session->flashdata('message', 'Successfully Saved.');
				redirect('Controller/index');
				
			}
		}
		else
		{
			$this->session->flashdata('message', 'Email Id not correct.');
				redirect('Controller/index');
		}
	}
	}
	public function mailverify()
	{

		$email=$this->input->post('email');
		$con=array(
				'email'=>$email,
				'usertype'=>2
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
if(!empty($insert))
{
	echo "1";
}
else
{
	echo "0";
}
		}
	}

	public function otpmatch()
	{
		$otp=$this->input->post('otp');
		$password=$this->input->post('npassword');
		$con=array(
				'otp'=>$otp,
				'usertype'=>2
			);
		$check = $this->Admin_Model->selectrow('users',$con);
		if(!empty($check))
		{
$insert = $this->Admin_Model->update('users',array('otp'=>0,'password'=>$password),array('id'=>$check->id));
	echo "successfully";
		}
	}
	public function update_profile()
	{
		$id = $this->input->post('id');
		$this->form_validation->set_rules('email','Number','required');
		$this->form_validation->set_rules('username','Username','required');
		if($this->form_validation->run()===FALSE)
		{
			$data=$this->session->set_flashdata('message', 'Number Exist');
			redirect('User/profile');
		}else{
			$profile_image='';
            if(!empty($_FILES['profile_image']['name']))
			{
			$config['upload_path']          = 'profile/';
            $config['allowed_types']        = 'gif|jpg|png|mp4';

           $this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('profile_image'))
                {
                  echo $this->upload->display_errors();
                }
                else
                {
	                $data = $this->upload->data();
					$profile_image = $data['file_name'];
                }

			}
            	$save=array(
					'username'=>$this->input->post('username'),
					'email'=>$this->input->post('email'),
					'gender'=>$this->input->post('gender'),
					'profile_image'=>$profile_image,
					'dob'=>$this->input->post('dob'),
					'usertype'=>2,
					'status'=>0
				);
				$insert = $this->Admin_Model->update('users',$save,array('id'=>$id));
				if(!empty($insert))
				{
					$this->session->flashdata('message', 'Successfully Saved.');
					redirect('User/logout_user');
				}
		}
	}
	public function profile()
	{
		$this->load->view('user/header');
		$this->load->view('user/profile');
		$this->load->view('user/footer');
	}
	public function watch_list()
	{
		$user_id = $this->uri->segment(3);
		$video_id = $this->uri->segment(3);
		if(!empty($user_id) && !empty($video_id))
		{
			$save=array(
			'user_id'=>$user_id,
			'video_id'=>$video_id
			);
			$insert = $this->Admin_Model->insert('playlist',$save);
			if(!empty($insert))
			{
				$this->session->flashdata('message', 'Successfully Saved.');
				redirect('Controller/index');
			}
		}
		else
		{
			$this->session->flashdata('message', 'Not Successfully Video Playlist Add.');
				redirect('Controller/index');
		}
	}
	public function logout_user()
	{
		$this->session->sess_destroy();
		redirect('Controller/index');
	}
}
?>