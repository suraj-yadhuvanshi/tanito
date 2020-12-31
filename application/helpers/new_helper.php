<?php
   function pr($data)
   {
       echo "<pre>";
       print_r($data);
       die;
   }
   function pr2($data)
   {
       echo "<pre>";
       print_r($data);

   }
   function checkadminlogin(){
    $ci= & get_instance();
    if(empty($ci->session->userdata('user'))) {
        return redirect('Admin');
    }
    }
   function state()
   {
       $ci= & get_instance();
       return $ci->db->get('state')->result();
   }
   function singlecolomn($tbl,$col,$con)
   {
       $ci= & get_instance();
       $ci->db->select($col);
       $ci->db->from($tbl);
       if ($con)
           $ci->db->where($con);
       $q = $ci->db->get()->row();
       return $q->$col;
   }
   function selectrow($tbl,$con='',$con1='')
   {
       $ci= & get_instance();

       $ci->db->select('*');
       $ci->db->from($tbl);

       if ($con)
           $ci->db->where($con);

           if ($con1)
               $ci->db->where($con1);

       $q = $ci->db->get();
       return $q->row();
   }
   // ---------------------------------------------------------
	function uploadfile($file,$name,$location)  //upload method
	{
        $ci= & get_instance();
      
		if(!empty($file))
		{
			// $this->form_validation->set_rules($name, 'Document', 'required');
		$config['upload_path']          = $location;
        $config['allowed_types']        = 'gif|jpg|png';	
                
		$ci->load->library('upload', $config);
			if (!$ci->upload->do_upload($name))
			{
			echo $ci->upload->display_errors();
			}
			else
			{
				$imgdata = $ci->upload->data();
			return  $img = $imgdata['file_name'];
			}
		}else{
		    return  $img = '';
		}
    }
    
    function uploadvideo($file,$name,$location)  //upload method
	{

        $ci= & get_instance();
        
		if(!empty($file))
		{
			// $this->form_validation->set_rules($name, 'Document', 'required');
		$config['upload_path']          = $location;
        $config['allowed_types']        = 'mp3|mp4|flv|wmv|avi|mov|webm';	   
             
		$ci->load->library('upload', $config);
			if (!$ci->upload->do_upload($name))
			{
			echo $ci->upload->display_errors();
			}
			else
			{
                $imgdata = $ci->upload->data();
               
			return  $img = $imgdata['file_name'];
			}
		}else{
		    return  $img = '';
        }
        
	}
?>