<?php
//include_once '../config/access.php'; 
include_once '../config/settings.php'; 
include_once '../config/DBConfig.php'; 
$db=new DBConfig();
$db_table="tender_mst01";
if(isset($_SERVER['REQUEST_METHOD'])=='POST'){
  
      $email=$db->escape_string($_POST['emailid']);
     $password=$db->escape_string($_POST['pasw']);
    if($email =='' && $password ==''){
        $db->redirect('index.php','status=400');
    }else{
        $result= $db->check_login($email, $password);
  
        if($result){
         $db->redirect('tender_apply.php?');
        }else{
         $db->redirect('index.php','status=500');
        }
    }
}

?>