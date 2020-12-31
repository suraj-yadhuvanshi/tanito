<?php

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

    }
    
}