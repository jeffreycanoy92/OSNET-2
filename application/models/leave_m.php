<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Leave_m extends CI_Model {
		
		public $rules = array(
			'Confirmation' => array(
				'field' => 'leave_confirmation',
				'label' => 'Confirmation',
				'rules' => 'numeric|trim|required',//|max_length[100]|url_title|callback__unique_slug|xss_clean',
			),
			'Duration' => array(
				'field' => 'leave_duration',
				'label' => 'Duration',
				'rules' => 'trim|required',//|max_length[100]|url_title|callback__unique_slug|xss_clean',
			),
			'Reason' => array(
				'field' => 'leave_reason',
				'label' => 'Reason',
				'rules' => 'trim|required',
			),
			'Nature' => array(
				'field' => 'leave_nature',
				'label' => 'Nature',
				'rules' => 'required|callback_check_default',
			),
		);
		
		public $nature = array('Sick Leave', 'Vacation', 'Bereavement', 'Maternity', 'Paternity', 'Unpaid', 'Others');
		
		public $status = array('--All--', 'Pending', 'Denied', 'Approved by TL', 'Approved');
		
		
		public function array_from_post($fields){
			$data = array();
			foreach ($fields as $field){
				$data[$field] = $this->input->post($field);
			}
			return $data;
		}
		
	
		public function get_user_info($id){
			$this->db->select('full_name, department, position');
			$this->db->where('user_id', $id);
			$query = $this->db->get('user_information')->result_array();
			foreach($query as $result)
				$resultdata = $result;
				
			return $resultdata;
		}
		
		
		public function save_application($form_data){
			$data['confirmation'] = $form_data['leave_confirmation'];
			$data['reason'] = $form_data['leave_reason'];
			$data['nature'] = $form_data['leave_nature'];
			$data['date_filed'] = date('Y-m-d');
			$data['status'] = 'Pending';
			$data['user_id'] = $form_data['user_id'];
			$data['total_days'] = $form_data['leave_total_days'];
			
			$duration = $form_data['leave_duration'];
			$duration_token = explode(" ", $duration);
			$data['duration_start'] = date('Y-m-d', strtotime($duration_token[0]));
			$data['duration_end'] = date('Y-m-d', strtotime($duration_token[2]));
			
			$this->db->insert('leave', $data);
		}
		
		
		public function get_leave_list($id = NULL, $start = NULL, $end = NULL, $status = NULL, $department = NULL){
			$this->db->select('user_information.full_name, leave.duration_start, leave.duration_end, leave.reason, leave.status, leave.leave_id');
			$this->db->from('leave');
			$this->db->join('user_information', 'leave.user_id = user_information.user_id', 'left');
			$this->db->join('department', 'department.department_id = user_information.department_id', 'left');
			if($status !== NULL){
					$this->db->where('leave.status', $status);
			}
			
			if($department !== NULL){
				$this->db->where('department.department_id', $department);
			}
			
			if($id !== NULL)
				$this->db->where('leave.leave_id', $id);
			
			$this->db->order_by('leave.date_filed', 'ASC');
			if($start !== NULL && $end !== NULL)
				$this->db->limit($start, $end);
			
			$query = $this->db->get()->result_array();
			return $query;
		}
		
		
		public function count_leave($status, $department){
			$temp_data = $this->get_leave_list(NULL, NULL, NULL, $status, $department);
			$count = 0;
			foreach($temp_data as $data)
				$count++;
			return $count;
		}
		
		
		public function get_paid_leave($id){
			$date_started = $this->get_date_started($id);
			$d1 = new DateTime($date_started['date_started']);
			$d2 = new DateTime();
			$interval = $d2->diff($d1);

			return $interval->format('%m');
		}
		
		
		public function get_date_started($id){
			$this->db->select('date_started');
			$this->db->where('user_id', $id);
			$query = $this->db->get('user_information')->result_array();
			foreach($query as $result)
				$resultdata = $result;
				
			return $resultdata;
		}
		
		
	
	
	}