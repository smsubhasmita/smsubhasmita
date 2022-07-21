<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class WelcomeModel extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function get_country(){
        $sql="SELECT COM_COCD,COM_CONM,COM_CODE FROM cou_mst WHERE COM_CANC=1";
        $query=$this->db->query($sql);
        return $query;
    }
    function get_state($countryId){
        $sql="SELECT STM_STCD,STM_STNM FROM sta_mst WHERE STM_CANC=1 AND STM_COCD=$countryId";
        $query=$this->db->query($sql);
        return $query;
    }
    function get_district($stateId){
        $sql="SELECT DSM_DSCD,DSM_DSNM FROM dst_mst WHERE DSM_CANC=1 AND DSM_STCD=$stateId";
        $query=$this->db->query($sql);
        return $query;
    }
    function get_insert($insert_data){
        $this->db->insert('user_details',$insert_data);
        return $this->db->insert_id();
    }
    function get_update($insupdateta){
        $this->db->where('user_id',$update_data['user_id']);
        $this->update('user_details');
        return true;
    }
    function get_user_data(){
        $sql="SELECT `user_id`, `user_name`, `user_psw`, `user_cpsw`, `user_gender`, `user_profile`, `user_dob`, `user_email`, `user_number`, `user_country`, `user_state`, `user_district`, `user_pin`, `user_checked`, `user_cancel`, `user_status`,
         FROM `user_details` WHERE user_cancel=1";
        $query=$this->db->query($sql);
        return $query;
    }
}