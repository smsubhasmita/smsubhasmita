<?php
//include_once '../config/access.php'; 
include_once '../config/settings.php'; 
include_once '../config/DBConfig.php'; 
$db=new DBConfig();
$result=$db->user_logout();
if($result){
    $db->redirect('index.php');
}