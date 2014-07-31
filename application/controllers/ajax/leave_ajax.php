<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leave_ajax extends CI_Controller {

	public function leave_view() {
		$this->load->model("leave_m");
		$leaveid = $_POST['leaveid'];
		$data = $this->leave_m->get_leave_list($leaveid);

		$result['leave_employee'] = $data[0]['full_name'];
		$result['leave_daterange'] = $data[0]['duration_start'] . " to " . $data[0]['duration_end'];
		$result['leave_status'] = $data[0]['status'];
		$result['leave_details'] = $data[0]['reason'];
		echo json_encode($result);
	}
	
}