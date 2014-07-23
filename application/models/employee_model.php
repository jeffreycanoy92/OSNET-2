<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_model extends CI_Model {
	
	public function get_employee_profile($employee_id) {
		$employee_id = $this->db->escape_str($employee_id);
		$query = $this->db->get_where('user_information', array("user_id" => $employee_id));

		return $query->result();
	}
	
	function get_all_employee() {
		$this->db->select('*');
		$this->db->from('user_information');
		$query = $this->db->get();

		return $query->result();
	}
	
	public function get_employee_by_department($employee, $department) {

		if ($department !== "All") {
		
			$this->db->select('*');
			$this->db->from('user_information');
			$this->db->where('department', $department);
			$this->db->like('full_name', $employee);

		}
		else {
		
			$this->db->select('*');
			$this->db->from('user_information');
			$this->db->like('full_name', $employee);
			
		}
		
		$query = $this->db->get();
		return $query->result();
	}
	
	function add_new_employee(array $employee_information) {

		foreach($employee_information as $key => $value) {
			$data[$key] = $this->db->escape_str($value);
		}

		$this->db->insert("user_information", $data);
	}
}