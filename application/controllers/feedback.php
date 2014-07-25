<?php
class Feedback extends Admin_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function create_feedback() {
		$data['username'] = $this->input->post('username');
		$data['subject'] = $this->input->post('subject');
		$data['feature_name'] = $this->input->post('feature');
		$data['text'] = $this->input->post('text');
		$data['date_created'] = date('Y-m-d H:i:s');
		$data['status'] = 'pending';
		
		$this->user_m->insert_feedback($data);
		unset($data);
		
		$data['features'] = $this->user_m->get_features($username);
		
		redirect('home/feedback');
	}
	
	
	/*
		BRANCH: SA FEEDBACK (sa regular user)
		Created method: feedback 
	*/
	
	public function feedback_manager() {
		if($this->session->userdata('role_type') == 'superadmin') {			
			if($this->session->userdata('role_type') == 'superadmin') {
				$data['feedback'] = $this->user_m->get_feedback();
				
				$this->load->view('templates/header');
				$this->load->view('templates/nav-sidebar');
				$this->load->view('user/feedback_superadmin', $data);
				$this->load->view('templates/footer');
			}
			else echo 'ERRER';
		}
		else {
			$data['features'] = $this->user_m->get_features($username);
	
			$this->load->view('templates/header');
			$this->load->view('templates/nav-sidebar');
			$this->load->view('user/feedback', $data);
			$this->load->view('templates/footer');
			
		}
		
	}
}