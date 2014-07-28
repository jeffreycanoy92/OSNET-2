<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class Role_m extends CI_Model {

	function insert_role($role) {

		$newdata = array(
			'role_type' => $role
		);

		$this->db->insert('role', $newdata);
	}
	
	/*
		BRANCH: Role Manager
		Created method: feedback 
	*/ 
	
	function get_role_feature($role_type) {
		$this->db->select('*');
		$this->db->from('role');
		$this->db->where('role_type', $role_type);
		$this->db->join('role_feature', 'role.role_id = role_feature.role_id');
		$this->db->join('feature', 'role_feature.feature_id = feature.feature_id');
		$query = $this->db->get();
	
		if($query->result() != NULL)
			return $query->result();
		else return FALSE;
	}
	
	function get_user_per_role($role_type) { 
	
		$this->db->select('*');
		$this->db->from('role');
		$this->db->where('role_type', $role_type);
		$this->db->join('user_role', 'role.role_id = user_role.role_id');
		$this->db->join('user_login', 'user_role.user_id = user_login.user_id');
		$query = $this->db->get();
	
		if($query->result() != NULL)
			return $query->result();
		else return FALSE;
	
	}
	
	function get_role_type_by_id($role_id) {
		$this->db->select('role_type');
		$this->db->from('role');
		$this->db->where('role_id', $role_id);
		$this->db->limit(1);
		$query = $this->db->get();
	
		if($query->result() != NULL) {
			foreach($query->result() as $q)
				return $q->role_type;
		}
		else return FALSE;
	}
	
	function get_role_type() {
		$this->db->select('*');
		$this->db->from('role');
		$query = $this->db->get();
	
		if($query->result() != NULL)
			return $query->result();
		else return FALSE;
	}
	
	function get_id_by_feature_name($feature_name) {
		$this->db->select('feature_id');
		$this->db->from('feature');
		$this->db->where('feature_name', $feature_name);
		$query = $this->db->get();
	
		if($query->result() != NULL) {
			foreach($query->result() as $q)
				return $q->feature_id;
		}
		else return FALSE;
	}
	
	function get_id_by_role_type($role_type) {
		$this->db->select('role_id');
		$this->db->from('role');
		$this->db->where('role_type', $role_type);
		$query = $this->db->get();
	
		if($query->result() != NULL) {
			foreach($query->result() as $q)
				return $q->role_id;
		}
		else return FALSE;
	
	}
	
	
	
	function insert_role_feature($role_id, $feature_id) {
	
		$newdata = array(
			'role_id' => $role_id,
			'feature_id' => $feature_id
		);
		
		$this->db->insert('role_feature', $newdata);
	
	}

  }
