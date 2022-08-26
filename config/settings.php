<?php
include_once 'DBConfig.php';
$base_url="http://localhost/tender/pages/";

$cur_date=date('Y-m-d');

function generate_random_password($name,$phone){
    $psw_step_one=substr(strtolower($name), 0 ,4);
    $psw_step_two=substr(strtolower($phone),6,4);
    $final_psw=md5($psw_step_one.$psw_step_two);
 
     return $final_psw;
}
?>  