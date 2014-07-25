<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class Role_m extends CI_Model {

	public function insert_role($role) {

		$newdata = array(
			'role_type' => $role
		);

		$this->db->insert('role', $newdata);
	}

  }
