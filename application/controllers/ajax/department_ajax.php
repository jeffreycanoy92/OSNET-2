<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Department_ajax extends CI_Controller {

  public function addDepartment() {
    $dept = $this->input->post('new_dept');

    $this->load->model('department_model');

    echo $this->department_model->add_new_OS_department($dept);
  }

  public function search_department() {
    $search_key = $this->input->post('key');

    $this->load->model('department_model');

    $search_results = $this->department_model->search_department_by_name($search_key);

    foreach($search_results as $s) {
      echo "<tr>";
        echo "<td>". $s->department_name ."</td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
      echo "</tr>";
    }
  }

}