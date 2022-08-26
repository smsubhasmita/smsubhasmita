<?php
	include_once '../config/settings.php'; 
	include_once '../config/DBConfig.php';
	$db=new DBConfig();
	$block_id=$_POST['block'];

	$block=$db->getalldata('gp_mst01','GPM_GPNM,GPM_GPCD',"GPM_BLCD=$block_id and GPM_CANC=0"); 
	echo '<option value="">SELECT GRAMPACHAYATA</option>';
	foreach($block  as $rowb){ 
		echo '<option value="'.$rowb->GPM_GPCD.'">'.$rowb->GPM_GPNM.'</option>';
	}	 
?> 