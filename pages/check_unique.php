<?php
include_once '../config/settings.php'; 
include_once '../config/DBConfig.php';
 $db=new DBConfig();
 $table="creat_account"; 
//unique email check 
	$email=$db->escape_string($_POST['email']);
	if($email!=''){
		$db->redirect('regdrom.php,status:400');
	}else{
		$unique_email=$db->check_uniq_column_value($table,'email',$email)
	 
	if($unique_email < 0){
		echo 200;
	}else{
		echo 500;
	}
}
 

