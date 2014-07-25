<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Infractions_ajax extends CI_Controller {


  function __construct(){
    parent::__construct();
    $this->data['meta_title'] = 'OSnet';
    $this->load->model('infraction_m');
  }

  public function add() {

    $user_id= $_POST['user_id'];
    $infraction_type= $_POST['infraction_type'];
    $date = $_POST['date'];
    $details = $_POST['details'];
    
    $this->infraction_m->save_infraction($user_id, $infraction_type, $date, $details);
    
  }
  
  public function getEmployeeInfractionCount(){
    //infraction_counter
    $user_id = $_POST['user_id'];

    
    $this->current_quarter = $this->getCurrentQuarter();
    $this->current_start_quarter = $this->getCurrentQuarterStart($this->current_quarter);
    $this->current_end_quarter = $this->getCurrentQuarterEnd($this->current_quarter);
    
    $return_json=$this->infraction_m->getInfractionCountByQuarter($this->current_start_quarter, $this->current_end_quarter, $user_id);
    
    echo json_encode($return_json);
  
  }
  
  public function getEmployeeInfractionList(){
    //infractions_list
    $user_id = $_POST['user_id'];

    
    $this->current_quarter = $this->getCurrentQuarter();
    $this->current_start_quarter = $this->getCurrentQuarterStart($this->current_quarter);
    $this->current_end_quarter = $this->getCurrentQuarterEnd($this->current_quarter);
    
    $return_json=$this->infraction_m->getInfractionListByQuarter($this->current_start_quarter, $this->current_end_quarter, $user_id);
    echo json_encode($return_json);
  
  }
  
  //Custom Date Range
  public function getEmployeeInfractionCountCustomDateRange(){
    //infraction_counter
    $user_id = $_POST['user_id'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];

    $return_json=$this->infraction_m->getInfractionCountByQuarter($date_start, $date_end, $user_id);
    echo json_encode($return_json);
  
  }
  
  public function getEmployeeInfractionListCustomDateRange(){
    //infractions_list
    $user_id = $_POST['user_id'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];

    
    $return_json=$this->infraction_m->getInfractionListByQuarter($date_start, $date_end, $user_id);
    echo json_encode($return_json);
  
  }
  
  
  //Misc
  
  //returns current quarter
  public function getCurrentQuarter(){
    
    $curMonth = date("m", time());
    $curQuarter = ceil($curMonth/3);
    
    return $curQuarter;

  }
  
  //returns current quarter date start
  public function getCurrentQuarterStart($current_quarter){

    $quarter_start_date;
    
    if($current_quarter == 1){
      $quarter_start_date = date("Y") . "-01-01";
    } elseif($current_quarter == 2) {
      $quarter_start_date = date("Y") . "-04-01";
    } elseif($current_quarter == 3){
      $quarter_start_date = date("Y") . "-07-01";
    } elseif($current_quarter == 4){
      $quarter_start_date = date("Y") . "-10-01";
    }
    return $quarter_start_date;
  }
  
  //returns current quarter date end
  public function getCurrentQuarterEnd($current_quarter){

    $quarter_end_date;
    
    if($current_quarter == 1){
      $quarter_end_date = date("Y") . "-03-31";
    } elseif($current_quarter == 2) {
      $quarter_end_date = date("Y") . "-06-30";
    } elseif($current_quarter == 3){
      $quarter_end_date = date("Y") . "-09-30";
    } elseif($current_quarter == 4){
      $quarter_end_date = date("Y") . "-12-31";
    }
    return $quarter_end_date;
  }
  
  

} 