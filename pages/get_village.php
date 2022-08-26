<?php
include_once '../config/settings.php'; 
include_once '../config/DBConfig.php';
	$db=new DBConfig();
    $gp_id=$_POST['gp']; 

	$block=$db->getalldata('vlg_mst01','VLM_VLCD,VLM_VLNM',"VLM_GPCD=$gp_id and VLM_CANC=0"); 
	echo '<option value="">SELECT  VILLAGE </option>';
	
	foreach($block  as $rowg){ 
		echo '<option value="'.$rowg->VLM_VLCD.'">'.$rowg->VLM_VLNM.'</option>'	;
	 
	} 
?>