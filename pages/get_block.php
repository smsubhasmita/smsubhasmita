<?php
include_once '../config/settings.php'; 
include_once '../config/DBConfig.php';
$db=new DBConfig();
$distct_id=$_POST['districtid'];

$district=$db->getalldata('blk_mst01','BLM_BLNM,BLM_BLCD',"BLM_DSCD=$distct_id and BLM_CANC=0"); 
echo '<option value="" >select  block</option>';

foreach($district  as $rowd){ 

echo '<option value="'.$rowd->BLM_BLCD.'" >'. $rowd->BLM_BLNM.'</option>';

} 
?> 