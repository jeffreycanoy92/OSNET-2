<?php

class Leave extends Admin_Controller{
  
	public function __construct(){
		parent::__construct();
	}
	
	function check_default($post_string){
		$this->form_validation->set_message('check_default', 'Nature field is required.');
		return $post_string == '0' ? FALSE : TRUE;
	}
	
	public function leave_apply(){
		$username = $this->session->userdata('username');
		$user_id = $this->user_m->get_user_id($username);
		    
		foreach($user_id as $id)
			$id = $id->user_id;
		
		$rules = $this->leave_m->rules;
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE){
			$data = $this->leave_m->array_from_post(array('leave_confirmation', 'leave_reason', 'leave_nature', 'leave_duration', 'leave_total_days'));
			$data['user_id'] = $id;
			$this->leave_m->save_application($data);
			
			redirect('leave/leave_apply?alert=success');
		}
		
		$this->data['user_info'] = $this->leave_m->get_user_info($id);
		$this->data['nature'] = $this->leave_m->nature;
		$this->data['paid_leave'] = $this->leave_m->get_paid_leave($id);
		
		$this->load->view("templates/header");
		$this->load->view("templates/nav-sidebar");
		$this->load->view('leave/leave_header');
		$this->load->view('leave/leave_apply_view', $this->data);
		$this->load->view("templates/footer");
	}

	
	
	public function leave_statistics(){
		$this->load->view("templates/header");
		$this->load->view("templates/nav-sidebar");
		$this->load->view('leave/leave_header');
		$this->load->view('leave/leave_statistics_view');
		$this->load->view("templates/footer");
	}

	
	
	public function leave_list($department = 'all', $status = 'all', $page = 1){
		$this->load->library('pagination');
		$this->load->model('department_model');
		
		if($department == 'all')
			$department_2 = NULL;
		else
			$department_2 = $this->get_dept_id($department);
		
		if($status == 'all')
			$status_2 = NULL;
		else
			$status_2 = $status;
		
		$config['base_url'] = site_url().'leave/leave_list/'.$department.'/'.$status.'/';
		$config['total_rows'] = $this->leave_m->count_leave($status_2, $department_2);
		$config['per_page'] = 15;
		$config['uri_segment'] = 5;
		$config['use_page_numbers']  = TRUE;
		$config['prev_link'] = '&#8592;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&#8594;';
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
		
		$dept_data = $this->department_model->get_all_department();
		$this->data['departments'] = $dept_data;
		$this->data['status'] = $this->leave_m->status;
		$this->data['selected_status'] = $status;
		$this->data['selected_department'] = $department;
			
		$this->data['leave_list'] = $this->leave_m->get_leave_list(NULL, $config['per_page'], $config['per_page'] * ($page - 1), $status_2, $department_2);
		
	
		$this->load->view("templates/header");
		$this->load->view("templates/nav-sidebar");
		$this->load->view('leave/leave_header');
		$this->load->view('leave/leave_list_view', $this->data);
		$this->load->view("templates/footer");
	}
	
	public function get_dept_id($dept){
		$this->load->model('department_model');
		$dept_data = $this->department_model->get_all_department();
		
		foreach($dept_data as $data_arr_val){
			$data_arr = strtr ($data_arr_val->department_name, array ('-' => '', ' ' => ''));
			$data_arr = strtolower($data_arr);
			if($data_arr == $dept){
				return $data_arr_val->department_id;
			}
		}
	}
	
  
}