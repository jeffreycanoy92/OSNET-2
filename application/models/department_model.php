<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class Department_model extends CI_Model {

	public function add_new_OS_department($new_dept) {
		
		$newdata = array(
			'department_name' => $new_dept,
		);
		
		$this->db->insert('department', $newdata);
	}

    public function search_department_by_name($department_name) {
		
		$this->db->select('*');
		$this->db->from('department');
		$this->db->like('department_name', $department_name);
		$query = $this->db->get();
		
		return $query->result();
	
    }

    public function get_all_department() {
		$this->db->select('*');
		$this->db->from('department');
		$query = $this->db->get();

		return $query->result();

    }
  }
