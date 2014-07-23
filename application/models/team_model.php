<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team_model extends CI_Model {


	function get_all_team() {
		$this->db->select('*');
		$this->db->from('team');
		$query = $this->db->get();

		if($query->result() != NULL)
			return $query->result();
		else return FALSE;
	}
	
	function get_all_department() {
		$this->db->select('*');
		$this->db->from('department');
		$query = $this->db->get();

		if($query->result() != NULL)
			return $query->result();
		else return FALSE;
	}
  

}