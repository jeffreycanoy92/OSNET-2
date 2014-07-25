<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role_ajax extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function add_role() {
		$role = $this->input->post('new_role');
		
		$this->load->model('role_m');
		
		print_r($this->role_m->insert_role($role));
	}

}