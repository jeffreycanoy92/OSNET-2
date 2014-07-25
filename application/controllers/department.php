<?php
class Department extends Admin_Controller{
  
  public function __construct(){
    parent::__construct();
  }
  
	/*
		Branch: KEVIN-department_list_module_07/14/2014 
		Created methods: render_department_list
	*/
	
	public function render_department_list() {
		if($this->session->userdata('logged_in') == 0)
			redirect('home/login');
		else {
		  $this->load->model('department_model');

		  $view_data['title'] = "Department List";
		  $view_data['department_list'] = $this->department_model->get_all_department();

		  $this->load->view("templates/header");
		  $this->load->view("templates/jquery-ui-header");
		  $this->load->view("templates/nav-sidebar");
		  $this->load->view("department/dept_list_view", $view_data);
		  $this->load->view("templates/footer");
		}
	}
	
  
  public function modal(){
    $this->load->view('_layout_modal', $this->data);
  }
  
}