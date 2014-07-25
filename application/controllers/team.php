<?php

class Team extends Admin_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('profile_m');
    }

    /*
		Branch: KEVIN-team_list_module_07/11/2014  
		Created methods: render_team_list
	*/
	
	public function render_team_list() {
		$this->load->model('team_model');

		$data['title'] = 'Team List';
		$data['team_list'] = $this->team_model->get_all_team();
		$data['department_list'] = $this->team_model->get_all_department();

		$this->load->view('templates/header');
		$this->load->view("templates/jquery-ui-header");
		$this->load->view('templates/nav-sidebar');
		$this->load->view('team/team_list_view', $data);
		$this->load->view('templates/footer');
	}

    public function my_profile(){
        $this->load->view('profile/my-profile', $this->data);
    }
  
    public function modal(){
        $this->load->view('_layout_modal', $this->data);
    }
   
}