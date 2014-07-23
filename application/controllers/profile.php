<?php

class Profile extends Admin_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('profile_m');
    }
   
	/*
		Branch: KEVIN-employee_list_module_07/14/2014 
		Created methods: render_profile_my_account, render_profile
	*/
	
	
	public function render_profile_my_account() {
		$sub_header_data['profile_active'] = '';
		$sub_header_data['my_account_active'] = 'active';

		$this->load->view('templates/header');
		$this->load->view('templates/nav-sidebar');

		$this->load->view('profile/profile_sub_header_view', $sub_header_data);
		$this->load->view('profile/profile_my_account_view');
		$this->load->view('profile/profile_sub_footer_view');
		$this->load->view('templates/footer');
	}

	public function render_profile() {
		$sub_header_data['profile_active'] = 'active';
		$sub_header_data['my_account_actve'] = '';

		$this->load->view('templates/header');
		$this->load->view('templates/nav-sidebar');

		$this->load->view('profile/profile_sub_header_view', $sub_header_data);
		$this->load->view('profile/profile_content_view');
		$this->load->view('profile/profile_sub_footer_view');
		$this->load->view('templates/footer');
	}
	
    public function modal(){
        $this->load->view('_layout_modal', $this->data);
    }
   
}