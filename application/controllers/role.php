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
				$data['role_type'] = $this->role_m->get_role_type();
				
				foreach($data['role_type'] as $rt) {
					$feature[$rt->role_type] = $this->role_m->get_role_feature($rt->role_type);
					$user[$rt->role_type] = $this->role_m->get_user_per_role($rt->role_type);
				}
				
				$data['features'] = $feature;
				$data['users'] = $user;
				
				$this->load->view('templates/header');
				$this->load->view("templates/jquery-ui-header");
				$this->load->view('templates/nav-sidebar');
				$this->load->view('user/role_manager', $data);
				$this->load->view('templates/footer');
				
			}
			else echo "ERRER";
			
		}
	}
	
	public function delete_role() {
		if($this->session->userdata('role_type') == 'superadmin') {
			$data['role_id'] = $this->uri->segment(3);
			if($this->uri->segment(4) === 'features') {
				$visible_features = array();
				
				$role_type = $this->role_m->get_role_type_by_id($data['role_id']);
				
				$temp = $this->role_m->get_role_feature($role_type);
				
				foreach($temp as $t)
					array_push($visible_features, $t->feature_name);

				
				$data['role_type'] = $role_type;
				$data['visible_features'] = $visible_features;
				
				$this->load->view('templates/header');
				$this->load->view('templates/jquery-ui-header');
				$this->load->view('templates/nav-sidebar');
				$this->load->view('user/delete_role_feature', $data);
				$this->load->view('templates/footer');
			}
			else if($this->uri->segment(4) === 'users') {
				echo "work";
			}
			else if($this->uri->segment(4) === 'role_type') {
			
				$data['role_type'] = $this->role_m->get_role_type_by_id($data['role_id']);
				
				$this->load->view('templates/header');
				$this->load->view('templates/jquery-ui-header');
				$this->load->view('templates/nav-sidebar');
				$this->load->view('user/delete_role_type', $data);
				$this->load->view('templates/footer');
			}
			else echo "ERRER";
		}
	
	}
	
	function delete_role_type() {
		
		$contains = strpos($this->input->post('submit'), 'Delete Features from');
		if($contains !== FALSE) {
			
			$role_type = $this->input->post('role_type');
			$this->role_m->delete_role_type($role_type);
			
			$message = "<p style='color:orange;'> <i class='fa fa-check'></i> <strong>Success!</strong> Successfully deleted role type ".ucfirst($role_type).". </p>";
			$this->session->set_flashdata('message', $message);
			
			redirect('role/role_manager');
		}
	
	}

	function delete_features() {
		$feature_names = $this->input->post('feature');
		$role_type = $this->input->post('role_type');
		
		$feature_id = array();
		
		foreach($feature_names as $f)
			$feature_id[] = $this->role_m->get_id_by_feature_name($f);
		
		$role_id = $this->role_m->get_id_by_role_type($role_type);
		
		foreach($feature_id as $f)
			$this->role_m->delete_role_feature($role_id, $f);
		
		
		$message = "<p style='color:orange;'> <i class='fa fa-check'></i> <strong>Success!</strong> Successfully deleted features from ".ucfirst($role_type).". </p>";
		$this->session->set_flashdata('message', $message);
		
		redirect('role/role_manager');
	}
	
	public function add_role() {
		if($this->session->userdata('role_type') == 'superadmin') {
			$data['role_id'] = $this->uri->segment(3);
			
			if($this->uri->segment(4) === 'features') {
				$visible_features = array();
				$all_features = array();
				$data['non_visible_features'] = array();
				
				$role_type = $this->role_m->get_role_type_by_id($data['role_id']);
				
				$temp = $this->role_m->get_role_feature($role_type);
				
				foreach($temp as $t)
					array_push($visible_features, $t->feature_name);
				
				$temp = $this->user_m->get_all_features();
				
				foreach($temp as $t)
					array_push($all_features, $t->feature_name);
				
				$data['role_type'] = $role_type;
				$data['non_visible_features'] = array_diff($all_features, $visible_features);
				
				$this->load->view('templates/header');
				$this->load->view('templates/jquery-ui-header');
				$this->load->view('templates/nav-sidebar');
				$this->load->view('user/add_role_feature', $data);
				$this->load->view('templates/footer');
			}
			else if($this->uri->segment(4) === 'users') {
				$role_users = array();
			
				$role_type = $this->role_m->get_role_type_by_id($data['role_id']);
				
				$temp = $this->role_m->get_user_per_role($role_type);
				
				foreach($temp as $t)
					array_push($role_users, $t->username);
				
				$temp = $this->user_m->get_all_users($data['role_id']);
				print_r($temp); exit;
				
				$data['role_type'] = $role_type;
				
				$this->load->view('templates/header');
				$this->load->view('templates/jquery-ui-header');
				$this->load->view('templates/nav-sidebar');
				$this->load->view('user/add_role_user', $data);
				$this->load->view('templates/footer');
			}
			
		}
		else echo "ERRER";
	}
	
	public function add_features() {
		$feature_names = $this->input->post('feature');
		$role_type = $this->input->post('role_type');
		
		$feature_id = array();
		
		foreach($feature_names as $f)
			$feature_id[] = $this->role_m->get_id_by_feature_name($f);
		
		$role_id = $this->role_m->get_id_by_role_type($role_type);
		
		foreach($feature_id as $f)
			$this->role_m->insert_role_feature($role_id, $f);
		
		$message = "<p style='color:green;'> <i class='fa fa-check'></i> <strong>Success!</strong> Successfully added features to ".ucfirst($role_type).". </p>";
		$this->session->set_flashdata('message', $message);
		
		redirect('role/role_manager');
	}
	
}
