<?php
class Home extends Admin_Controller {
  
	public function __construct() {
		parent::__construct();
	}
	
	/*
		Branch: MONIQUE-user_login_07/10/2014
		Created methods: index, login, login_validation, logout, home_page and sess_destroy
	*/
	
	
	public function index() {
		redirect('home/home_page');
	}
	
	public function login(){
		if($this->session->userdata('logged_in') == 1)
			redirect('home/home_page');			
        else
			$this->load->view('user/login');
    }
	
	public function login_validation() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$result = $this->user_m->user_exists($username, md5($password));
		
		if(!$result) {
				
			$data['login_error_message'] = 'Invalid username or password,<br> please log in again.';
			$this->session->set_userdata('logged_in', 0);
			
			$this->load->view('user/login', $data);
		}
		else {
		
			foreach($result as $r)
				$user_id = $r->user_id;
				
			$result = $this->user_m->get_user_role($user_id);
			
			foreach($result as $r)
				$role_type = $r->role_type;
			
			$newdata = array(
				'username' => $username,
				'logged_in' => 1,
				'role_type' => $role_type
			);
			
			$this->session->set_userdata($newdata);
			redirect('home/home_page');
		}
	}
	

	
	public function logout() {
		$this->sess_destroy();
		redirect('home/login');
	}
	
	public function home_page ($page = 1){
		$this->load->library('pagination');
		
		$config['base_url'] = site_url().'home/home_page/';
		$config['total_rows'] = $this->announcement_m->count_announcement();
		$count = $this->announcement_m->count_announcement();
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		$config['use_page_numbers']  = TRUE;
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		
		$this->pagination->initialize($config);	
		$this->data["pagination_helper"]   = $this->pagination;
			
		$username = $this->session->userdata('username');
		/*
			Branch: JEFFREY-announcements_table_db_change_07/11/2014
			Added:  data['announcement'], view('home', $this->data)  
			*/
			
		//announcement module
	   $this->data['announcement'] = $this->announcement_m->get_announcement(NULL, $config['per_page'], $config['per_page'] * ($page - 1));
	   $user_id = $this->user_m->get_user_id($username);
	   
		foreach($user_id as $id)
			$id = $id->user_id;
		/*
		$user_role = $this->user_m->get_user_role($id);
					
		foreach($user_role as $role)
			$usertype = $role->usertype;

		$this->data['usertype'] =	$usertype;
		*/
		$this->load->view("templates/header");
		$this->load->view("templates/nav-sidebar");
		$this->load->view('home', $this->data);
		$this->load->view("templates/footer");
	}
	
	
	/* ********************************************** */
	public function modal() {
		$this->load->view('_layout_modal');
	}
	
	private function sess_destroy() {
		$this->session->sess_destroy();
	}
}