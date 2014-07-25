<?php
class Admin_Controller extends MY_Controller {

  function __construct() {
		parent::__construct();
		$this->data['meta_title'] = 'OSnet';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('user_m');
		$this->load->model('announcement_m');
		// $this->load->model('leave_m');
		$this->load->library('session');
		
		$exception_uris = array(
			'home/login',
			'home/logout',
			'home/login_validation',
		);
		
		if(in_array(uri_string(), $exception_uris) == FALSE){
			if($this->session->userdata('logged_in') == 0)
				redirect('home/login');
		}
  }
	
}