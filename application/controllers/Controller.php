<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Admin_Model');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index(){
		$data['logo'] = $this->Admin_Model->selectlogo('logo');
		$data['img'] = $this->Admin_Model->selectimg('video',array('top_slider'=>2));
		$data['must_watch'] = $this->Admin_Model->selectvideomustwatch('video',array('must_watch'=>1));
		$data['watch_again'] = $this->Admin_Model->selectvideowatchagain('video');
		$data['movies'] = $this->Admin_Model->selectvideo('video',array('category_id'=>1));
		$data['web_show'] = $this->Admin_Model->selectvideo('video',array('category_id'=>2));
		$data['videos'] = $this->Admin_Model->selectvideo('video',array('category_id'=>3));
		$data['languages'] = $this->Admin_Model->seleclanguage('language');
		$data['video'] = $this->Admin_Model->selectvideo('video');
		$data['maxcounter'] = $this->Admin_Model->selectvideocount('video');
		$data['category'] = $this->Admin_Model->select('category');
		$data['sub_category'] = $this->Admin_Model->selectrow('category');
		$this->load->view('header',$data);
		$this->load->view('index',$data);
		$this->load->view('footer',$data);
	}
	public function single(){
		$id = $this->uri->segment(3);
		$data['logo'] = $this->Admin_Model->selectlogo('logo');
		$data['category'] = $this->Admin_Model->select('category');
		$data['sub_category'] = $this->Admin_Model->selectrow('category');
		$data['languages'] = $this->Admin_Model->seleclanguage('language');
		$this->load->view('header',$data);
		$this->load->view('single');
		$this->load->view('footer',$data);
	}
	
	public function view($id){
		//$id = $this->uri->segment(3);
		$user_ses=$this->session->userdata('userlogin');
		$data['video'] = $this->Admin_Model->selectrow('video',array('videoid'=>$id));
		$data['logo'] = $this->Admin_Model->selectlogo('logo');
		$data['category'] = $this->Admin_Model->select('category');
		$data['sub_category'] = $this->Admin_Model->selectrow('category');
		$data['languages'] = $this->Admin_Model->seleclanguage('language');
		$data['maxcounter'] = $this->Admin_Model->selectvideocount('video');
		$data['videoo'] = $this->Admin_Model->selectvideo('video');
		$dataa = $this->Admin_Model->selectrow('video_views',array('video_id'=>$id));
		if(empty($dataa))
		{
		$save=array(
				'video_id'=>$id,
				'views'=>1
			);
			$insert = $this->Admin_Model->insert('video_views',$save);
		}
		else
		{
			$this->db->set('views', 'views+1', FALSE);
			$this->db->where('video_id', $id);
			$this->db->update('video_views');
		}
		$this->db->set('counter', 'counter+1', FALSE);
		$this->db->where('videoid', $id);
		$this->db->update('video');
		$this->load->view('header',$data);
		$this->load->view('view',$data);
		$this->load->view('footer',$data);
	}
	public function movielist($id){
		//$id = $this->uri->segment(3);
		$data['logo'] = $this->Admin_Model->selectlogo('logo');
		$data['category'] = $this->Admin_Model->select('category');
		$data['sub_category'] = $this->Admin_Model->selectrow('category');
		$data['subcategory_name'] = $this->Admin_Model->selectrow('sub_category',array('subcategory_id'=>$id));
		$data['languages'] = $this->Admin_Model->seleclanguage('language');
		$data['allvideos'] = $this->Admin_Model->allvideos('video',array('subcategory_id'=>$id));
		$data['video'] = $this->Admin_Model->selectvideo('video');
		$this->load->view('header',$data);
		$this->load->view('movielist',$data);
		$this->load->view('footer',$data);
	}
	public function chanellist($id){
		//$id = $this->uri->segment(3);
		$data['logo'] = $this->Admin_Model->selectlogo('logo');
		$data['category'] = $this->Admin_Model->select('category');
		$data['sub_category'] = $this->Admin_Model->selectrow('category');
		$data['username'] = $this->Admin_Model->selectrow('users',array('id'=>$id));
		$data['subcategory_name'] = $this->Admin_Model->selectrow('sub_category',array('subcategory_id'=>$id));
		$data['languages'] = $this->Admin_Model->seleclanguage('language');
		$data['allvideos'] = $this->Admin_Model->allvideos('video',array('admin_id'=>$id));
		$data['video'] = $this->Admin_Model->selectvideo('video');
		$this->load->view('header',$data);
		$this->load->view('movielist',$data);
		$this->load->view('footer',$data);
	}
	public function bylanguage($id){
		$language_id=$id;
		$data['logo'] = $this->Admin_Model->selectlogo('logo');
		$data['img'] = $this->Admin_Model->selectimg('video',array('top_slider'=>2));
		$data['allvideos'] = $this->Admin_Model->select('video',array('lang_id'=>$language_id));
		$data['language_pirnt'] = $this->Admin_Model->selectrow('language',array('language_id'=>$language_id));
		$data['languages'] = $this->Admin_Model->seleclanguage('language');
		$data['category'] = $this->Admin_Model->select('category');
		$data['sub_category'] = $this->Admin_Model->selectrow('category');
		$data['video'] = $this->Admin_Model->selectvideo('video');
		$this->load->view('header',$data);
		$this->load->view('bylanguage',$data);
		$this->load->view('footer',$data);
	}
	public function watchlist(){
		$user_ses=$this->session->userdata('userlogin');
		if(!empty($user_ses))
		{
			$data['logo'] = $this->Admin_Model->selectlogo('logo');
			$data['category'] = $this->Admin_Model->select('category');
			$data['sub_category'] = $this->Admin_Model->selectrow('category');
			$data['languages'] = $this->Admin_Model->seleclanguage('language');
			$data['allvideos'] = $this->Admin_Model->selectjoinwatch('playlist',array('user_id'=>$user_ses->id));
			$data['video'] = $this->Admin_Model->selectvideo('video');
			$this->load->view('header',$data);
			$this->load->view('watchlist',$data);
			$this->load->view('footer',$data);
		}
		else
		{
			redirect('Controller/index');	
		}
	}
	public function store_languge()
	{
		$newdata = $this->input->post('language');
		$this->session->set_userdata('lang',$newdata);
		redirect('Controller/index');	
	}
	public function faq()
	{
		$data['logo'] = $this->Admin_Model->selectlogo('logo');
		$data['category'] = $this->Admin_Model->select('category');
		$data['sub_category'] = $this->Admin_Model->selectrow('category');
		$data['languages'] = $this->Admin_Model->seleclanguage('language');
		$this->load->view('header',$data);
		$this->load->view('faq',$data);
		$this->load->view('footer',$data);
	}
	public function about()
	{
		$data['logo'] = $this->Admin_Model->selectlogo('logo');
		$data['category'] = $this->Admin_Model->select('category');
		$data['sub_category'] = $this->Admin_Model->selectrow('category');
		$data['languages'] = $this->Admin_Model->seleclanguage('language');
		$this->load->view('header',$data);
		$this->load->view('about',$data);
		$this->load->view('footer',$data);
	}
	public function privacy()
	{
		$data['logo'] = $this->Admin_Model->selectlogo('logo');
		$data['category'] = $this->Admin_Model->select('category');
		$data['sub_category'] = $this->Admin_Model->selectrow('category');
		$data['languages'] = $this->Admin_Model->seleclanguage('language');
		$this->load->view('header',$data);
		$this->load->view('privacy',$data);
		$this->load->view('footer',$data);
	}
	public function searchvideo()
	{
		$data['logo'] = $this->Admin_Model->selectlogo('logo');
		$data['category'] = $this->Admin_Model->select('category');
		$data['sub_category'] = $this->Admin_Model->selectrow('category');
		$data['languages'] = $this->Admin_Model->seleclanguage('language');
		$search=  $this->input->get('search');
		$dd = $this->Admin_Model->selectvideos(array('title'=>$search,'description'=>$search));
		if(empty($dd))
		{
			$cat = $this->Admin_Model->selectcat(array('category_name'=>$search));
			if(!empty($cat))
			{
				$dd= $this->Admin_Model->select('video',array('category_id'=>$cat->category_id));
			}
			else
			{
				$subcat = $this->Admin_Model->selectsubcat(array('subcategory_name'=>$search));
				if(!empty($subcat))
				{
					$dd= $this->Admin_Model->select('video',array('subcategory_id'=>$subcat->subcategory_id));
				}
				else
				{
					$chanel = $this->Admin_Model->selectuser(array('username'=>$search));
					if(!empty($chanel))
				{
					$dd= $this->Admin_Model->select('video',array('admin_id'=>$chanel->id));
				}
				}
			}
		}
		$data['searchv']=$dd;
		$this->load->view('header',$data);
		$this->load->view('search',$data);
		$this->load->view('footer',$data);
		
	}

	public function videolike()
  {
    $user_id = $this->input->post('user_id');
      //$admin_id = $this->input->post('admin_id');
      $video_id = $this->input->post('video_id');

    if(!empty($user_id) && !empty($video_id))
    {
      $check = $this->Admin_Model->select('vlike',array('user_id'=>$user_id,'video_id'=>$video_id, 'vlike'=>1,));
      if(empty($check))
      {
        $data = array(
      'user_id'=>$user_id,
      'video_id'=>$video_id,
      'vlike'=>1
      );
      $datadis = array(
      'user_id'=>$user_id,
      'video_id'=>$video_id
      );
        $insert = $this->Admin_Model->insert('vlike',$data);
        $update = $this->Admin_Model->update('vlike',array('deslike'=>0),$datadis);
        //$sdata=array('status'=>'true','msg'=>'Video Like');
      //echo json_encode($sdata);
        $dataalikec = $this->Admin_Model->select('vlike',array('video_id'=>$video_id,'vlike'=>1));
        $dataadislikec = $this->Admin_Model->select('vlike',array('video_id'=>$video_id,'deslike'=>1));
        $likec=count($dataalikec);
        $dislikec=count($dataadislikec);
        $cdata=array('vlike'=>$likec,'dislike'=>$dislikec);
        echo json_encode($cdata);
      }
      else
      {
        $data = array(
      'user_id'=>$user_id,
      'video_id'=>$video_id
      );
        $update = $this->Admin_Model->update('vlike',array('vlike'=>0),$data);
        //$sdata=array('status'=>'true','msg'=>'Video Dislike');
      //echo json_encode($sdata);
        $dataalikec = $this->Admin_Model->select('vlike',array('video_id'=>$video_id,'vlike'=>1));
        $dataadislikec = $this->Admin_Model->select('vlike',array('video_id'=>$video_id,'deslike'=>1));
        $likec=count($dataalikec);
        $dislikec=count($dataadislikec);
        $cdata=array('vlike'=>$likec,'dislike'=>$dislikec);
        echo json_encode($cdata);
      }
    }
    else
    {
      //$sdata=array('status'=>'false','msg'=>'Video Not Like');
      //echo json_encode($sdata);
    	echo 'id not matched';
    }
  }

  public function videodislike()
  {
    $user_id = $this->input->post('user_id');
      //$admin_id = $this->input->post('admin_id');
      $video_id = $this->input->post('video_id');
    if(!empty($user_id) && !empty($video_id))
    {
      $check = $this->Admin_Model->select('vlike',array('user_id'=>$user_id,'video_id'=>$video_id, 'deslike'=>1,));
      if(empty($check))
      {
        $data = array(
      'user_id'=>$user_id,
      'video_id'=>$video_id,
      'deslike'=>1
      );
      $datadis = array(
      'user_id'=>$user_id,
      'video_id'=>$video_id
      );
        $insert = $this->Admin_Model->insert('vlike',$data);
        $update = $this->Admin_Model->update('vlike',array('vlike'=>0),$datadis);
        $dataalikec = $this->Admin_Model->select('vlike',array('video_id'=>$video_id,'vlike'=>1));
        $dataadislikec = $this->Admin_Model->select('vlike',array('video_id'=>$video_id,'deslike'=>1));
        $likec=count($dataalikec);
        $dislikec=count($dataadislikec);
        $cdata=array('vlike'=>$likec,'dislike'=>$dislikec);
        echo json_encode($cdata);
      }
      else
      {
        $data = array(
      'user_id'=>$user_id,
      'video_id'=>$video_id
      );
        $update = $this->Admin_Model->update('vlike',array('deslike'=>0),$data);
        $dataalikec = $this->Admin_Model->select('vlike',array('video_id'=>$video_id,'vlike'=>1));
        $dataadislikec = $this->Admin_Model->select('vlike',array('video_id'=>$video_id,'deslike'=>1));
        $likec=count($dataalikec);
        $dislikec=count($dataadislikec);
        $cdata=array('vlike'=>$likec,'dislike'=>$dislikec);
        echo json_encode($cdata);
      }
    }
    else
    {
      echo 'not dislike';
    }
  }

  public function subscibeclick()
  {
  	  $id = $this->input->post('user_id');
  	  $admin_id = $this->input->post('admin_id');
  	  if(!empty($id))
  	  {
  	  		$con = array(
          'user_id'=>$id,
          'admin_id'=>$admin_id
        );
      	$data = $this->Admin_Model->select('subscribe',$con);
      	if(empty($data))
      	{
       		$insert = $this->Admin_Model->insert('subscribe',$con);
      		echo 'true';
      	}
      	else
      	{
      		$delete=$this->Admin_Model->delete('subscribe',$con);
      		echo 'false';
      	}
  	  }
  }
  public function comments()
  {
      $user_id = $this->input->post('user_id');
      $video_id = $this->input->post('video_id');
      $comments = $this->input->post('comments');
      $data = array(
      'user_id'=>$user_id,
      'video_id'=>$video_id,
      'comments'=>$comments
      );
      
          $insert = $this->Admin_Model->insert('comments',$data);
          $check = $this->Admin_Model->selectcomments('comments',array('video_id'=>$video_id,'comments!='=>'0'));
          if(!empty($check))
          {
          	foreach ($check as $row)
          	 {
          		echo '
          			<div class="nmd">
              <div class="row">
                <div class="col-6">
                  <p class="user"><span>
                  	
                  	
                  	<img style="width: 50px; height: 50px; border-radius: 50%;" src=" '.base_url().'profile/'.$row->profile_image.'">
                  
                  </span>   &nbsp;<b style="font-size: 20px;">'.$row->username.'<b></p>
                  
                </div>
                <div class="col-12">
                  <p class="text-justify" style="margin-left: 120px;">'. $row->comments.'.</p>
                </div>
              </div>
            </div>
          		';
          	}
          }
  }
}	