<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Infraction_m extends CI_Model { 
  
  function getInfractionList() {
    $query = 
        "SELECT
        infraction_id as i_id,
        ui.user_id as u_id,
        department_name as department,
        CONCAT(last_name, ', ', first_name, ' ', LEFT(middle_name, 1) , '.') as name,
        SUM(CASE WHEN infraction_type_id != 2 THEN 1 ELSE 0 END) as infractions_count,
        SUM(CASE WHEN infraction_type_id = 1 THEN 1 ELSE 0 END) as unexcused_absence_count,
        SUM(CASE WHEN infraction_type_id = 2 THEN 1 ELSE 0 END) as excused_absence_count,
        SUM(CASE WHEN infraction_type_id = 3 THEN 1 ELSE 0 END) as ncns_count,
        SUM(CASE WHEN infraction_type_id = 4 THEN 1 ELSE 0 END) as no_notification_count,
        SUM(CASE WHEN infraction_type_id = 5 THEN 1 ELSE 0 END) as late_count

        FROM user_information as ui
        LEFT JOIN infractions as i 
        ON ui.user_id = i.user_id
        LEFT JOIN department as d
        ON ui.department_id = d.department_id

        GROUP BY ui.user_id 
        ORDER BY last_name
        ";

    $result = $this->db->query($query);

    return $result->result();
  }
  
  function getInfractionListByQuarter($start, $end, $id){
  
    $query = 
        "SELECT * FROM `infractions` 
        left join infraction_type on 
        infraction_type.infraction_type_id=infractions.infraction_type_id 
        WHERE `user_id`=".$id." AND date BETWEEN '" . date('Y-m-d', strtotime($start)) . "' AND '" . date('Y-m-d', strtotime($end)) . "'
      ";
    $result = $this->db->query($query);

    return $result->result();
    
  }
  
  function getInfractionCountByQuarter($start, $end, $id) {
    //if($action=="infraction_counter"){
    $query = 
        "SELECT
        infraction_id as i_id,
        ui.user_id as u_id,
        ui.first_name as firstname,
        department_name as department,
        CONCAT(last_name, ', ', first_name, ' ', LEFT(middle_name, 1) , '.') as name,
        SUM(CASE WHEN infraction_type_id != 2 THEN 1 ELSE 0 END) as infractions_count,
        SUM(CASE WHEN infraction_type_id = 1 THEN 1 ELSE 0 END) as unexcused_absence_count,
        SUM(CASE WHEN infraction_type_id = 2 THEN 1 ELSE 0 END) as excused_absence_count,
        SUM(CASE WHEN infraction_type_id = 3 THEN 1 ELSE 0 END) as ncns_count,
        SUM(CASE WHEN infraction_type_id = 4 THEN 1 ELSE 0 END) as no_notification_count,
        SUM(CASE WHEN infraction_type_id = 5 THEN 1 ELSE 0 END) as late_count

        FROM user_information as ui
        LEFT JOIN infractions as i 
        ON ui.user_id = i.user_id
        LEFT JOIN department as d
        ON ui.department_id = d.department_id
        
        WHERE i.date BETWEEN '" . date('Y-m-d', strtotime($start)) . "' AND '" . date('Y-m-d', strtotime($end)) . "'
        AND ui.user_id=".$id."
        GROUP BY ui.user_id 
        ORDER BY last_name
      ";

    $result = $this->db->query($query);

    return $result->row_array();
  }
  
  
  
  function getInfractionType(){
    
    $query = "SELECT * FROM infraction_type ORDER BY infraction_type_id";
    $result = $this->db->query($query);
    
    return $result->result();
  }
  
  function save_infraction($user_id, $infraction_type, $date, $details){
  
    $data['user_id'] = $user_id;
    $data['infraction_type_id'] = $infraction_type;
    $data['date'] = date('Y-m-d',strtotime($date));
    $data['details'] = $details;
    //Insert data to 'infraction' table
    $this->db->insert('infractions', $data);
    $id = $this->db->insert_id();
  
  }

}