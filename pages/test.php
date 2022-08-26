<?php
$name="ARUNDHATI BEHERA";
$phone=9777274090;

$psw_step_one=substr(strtolower($name), 0 ,4);
$psw_step_two=substr(strtolower($phone),6,4);
echo $final_psw= ($psw_step_one.$psw_step_two);
 echo "<br>";
function generate_random_password($name,$phone){
    $psw_step_one=substr(strtolower($name), 0 ,4);
    $psw_step_two=substr(strtolower($phone),6,4);
    $final_psw=md5($psw_step_one.$psw_step_two);
 
     return $final_psw;
}
 $password=generate_random_password($name,$phone);

?>