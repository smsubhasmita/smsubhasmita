<?php 
include_once '../config/access.php'; 
include_once '../config/settings.php'; 
include_once '../config/DBConfig.php'; 
$db=new DBConfig();
$db_table="tender_mst01";
$login_id=$_SESSION['login_id'];
$localIp = gethostbyname(gethostname());
 
 //print_r($_SERVER['REQUEST_METHOD']);
if(isset($_SERVER['REQUEST_METHOD'])=='POST'){
    // print_r($_POST);
    $org_name=$db->escape_string($_POST['name']);
    $reg_num=$db->escape_string($_POST['reg_num']);
    $phone=$db->escape_string($_POST['phone']);
    $email=$db->escape_string($_POST['email']);
    $distric_name=$db->escape_string($_POST['distict_id']);
    $block_name=$db->escape_string($_POST['block_id']);
    $gp_name=$db->escape_string($_POST['gp_id']);
    $village_name=$db->escape_string($_POST['vlg_id']);
    $address=$db->escape_string($_POST['address']);
    $pin=$db->escape_string($_POST['pin']);
    
    $password=generate_random_password($org_name,$phone);
    

    $insert_fields=array('org_name','reg_number','phone','email','distric_id','block_id','gp_id','vlg_id','address','pin','password','date_time','ip_address','operation_type');
    $insert_valuse=array($org_name,$reg_num,$phone,$email,$distric_name,$block_name,$gp_name,$village_name,$address,$pin,$password,$cur_date,$localIp,'Registered');
    $res=$db->insert($db_table,$insert_fields,$insert_valuse);
      
    if($res){ 			
  	  $db->redirect('login.php','status=200');
    }else{
        				
    	$db->redirect('regfrom.php','status=500');
    }
}
?>