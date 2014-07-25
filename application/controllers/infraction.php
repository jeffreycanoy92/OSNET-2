<?php
	 

class Infraction extends Admin_Controller {
 
	 /*
    ERIC-infractions
    Created methods: infraction_list,
  */
  
	public function infraction_list() {
		$this->load->model("infraction_m");

		$data["title"] = "Infraction List";
		$data["infraction_type"] = $this->infraction_m->getInfractionType();
		$data["infraction_list"] = $this->infraction_m->getInfractionList();


		$this->load->view("templates/header");
		$this->load->view("templates/nav-sidebar");
		$this->load->view("infraction/infraction_list", $data);
		$this->load->view("templates/footer");
	}
	
}