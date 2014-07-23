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
	
	public function update_employee_profile(array $updated_employee_profile, $profile_id) {
		$secure_data = array();

		foreach($updated_employee_profile as $key => $value) {
		  $secure_data[$key] = $this->db->escape_str($value);
		}

		$this->db->update("user_information", $updated_employee_profile, array("user_id" => $profile_id));
	}

	
	function add_new_employee(array $employee_information) {

		foreach($employee_information as $key => $value) {
			$data[$key] = $this->db->escape_str($value);
		}

		$this->db->insert("user_information", $data);
		$this->_createEmployeeLoginAccount();
	}
	
	private function _createEmployeeLoginAccount() {
		$profile = $this->_getLatestEmployeeProfile();
		$profile_row = $profile[0];

		$data = array(
		  "user_id" => $this->_getLatestEmployeeId(),
		  "username" => strtolower($profile_row->first_name[0]). strtolower($profile_row->last_name),
		  "password" => md5("1234")
		);

		$this->db->insert('user_login', $data);
	}

	private function _getLatestEmployeeProfile() {
		$this->db->select('*');
		$this->db->from('user_information');
		$this->db->order_by('user_id', 'desc');
		$query = $this->db->get();

		return $query->result();
	}

	private function _getLatestEmployeeId() {

		$this->db->select('*');
		$this->db->from('user_information');
		$this->db->order_by('user_id', 'desc');
		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row()->user_id;
	}
		
}