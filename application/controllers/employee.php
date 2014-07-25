<?php
class Employee extends Admin_Controller{
  
  public function __construct(){
    parent::__construct();
  }
  
  
  /*
	Branch: KEVIN employee list module
	Created methods: render_team_list
*/
  
	public function render_employee_list() {
		$this->load->model("department_model");
		$this->load->model("employee_model");

		$data["title"] = "Employee List";
		$data["department_list"] = $this->department_model->get_all_department();
		$data["employee_list"] = $this->employee_model->get_all_employee();

		$this->load->view("templates/header");
		$this->load->view("templates/jquery-ui-header");
		$this->load->view("templates/nav-sidebar");
		$this->load->view("employee/employee_list_view", $data);
		$this->load->view("templates/footer");
	}
  
	public function render_edit_employee_profile() {
		$employee_id = $this->uri->segment(3);

		$this->load->model("employee_model");
		$this->load->model("department_model");

		$data = array(
			"title" => "Edit Profile",
			"employee_profile" => $this->employee_model->get_employee_profile($employee_id),
			"department_list" => $this->department_model->get_all_department()
		);

		$this->load->view("templates/header");
		$this->load->view("templates/jquery-ui-header");
		$this->load->view("templates/nav-sidebar");
		$this->load->view("employee/edit_employee_profile", $data);
		$this->load->view("templates/footer");
	}
  
  
  
  public function modal(){
    $this->load->view('_layout_modal', $this->data);
  }
  
}