<?php
include_once '../config/settings.php'; 
include_once '../config/DBConfig.php'; 
$db=new DBConfig();
 
$type=$db->escape_string($_POST['type']);
if($_SERVER['REQUEST_METHOD']=='POST'){



    //unique  Registered Office  Number check 
    if(intval($type)=== 3){
        $ofc_number=$db->escape_string($_POST['regnumber']);
        if($ofc_number != ''){
            $is_unique_offic_num=$db->check_uniq_column_value('tender_mst01','reg_number',$ofc_number);
            if($is_unique_offic_num < 1){
                echo 200;//  $db->redirect('regfrom.php','status=200');
            }else{
                echo 401;// $db->redirect('regfrom.php','status=401');
            }
        }else{
            echo 400;
        }
    }

    //unique  phone  check 
    if(intval($type)=== 2){
        $phone=$db->escape_string($_POST['phone_num']);
        if($phone !=''){
            $is_unique_phone=$db->check_uniq_column_value('tender_mst01','phone',$phone);
            if($is_unique_phone < 1 ){
               // $db->redirect('regfrom.php','status=200');
               echo 200;
            }else{
                echo 401;
                //$db->redirect('regfrom.php','status=401');
            }
        }else{
            echo 400;
        }
    }
    
    //unique email check 
    if(intval($type) === 1){
        $email=$db->escape_string($_POST['emil_id']);
        if($email !=''){
            $is_unique=$db->check_uniq_column_value('tender_mst01','email',$email);
            if($is_unique < 1){
                //$db->redirect('regfrom.php','status=200');
                echo 200;
            }else{
                //$db->redirect('regfrom.php','status=401');
                echo 401;
            }
        }else{
            echo 400;
        }
    } 
 
}

?>