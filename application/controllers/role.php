<?php


/*
	BRANCH: ROLE MANAGER
	Created method: feedback 
*/
class Role extends Admin_Controller {


	public function __construct(){
		parent::__construct();
	}

	public function role_manager() {
		if($this->session->userdata('logged_in') == 0)
			redirect('home/login');
		else {
			if($this->session->userdata('role_type') == 'superadmin') {
				$data['role_type'] = $this->user_m->get_role_type();
				
				foreach($data['role_type'] as $rt) {
					$feature[$rt->role_type] = $this->user_m->get_role_feature($rt->role_type);
					$user[$rt->role_type] = $this->user_m->get_user_per_role($rt->role_type);
				}
				
				$data['features'] = $feature;
				$data['users'] = $user;
				
				$this->load->view('templates/header');
				$this->load->view('templates/nav-sidebar');
				$this->load->view('user/role_manager', $data);
				$this->load->view('templates/footer');
				
			}
			else echo "ERRER";
			
		}
	}
}
