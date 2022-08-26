<?php
include "dbconn.php";
$state_id=$_POST['stateid'];

$state = mysqli_query($dbconn,"SELECT `DSM_DSCD`, `DSM_DSNM` FROM `dst_mst01` where  DSM_STCD=$state_id and DSM_CANC=0");
echo '<option value="" >select district</option>';

$j=0;
while($rows = mysqli_fetch_array($state)) {

echo '<option value="'.$rows['DSM_DSCD'].'" >'. $rows['DSM_DSNM'].'</option>';

$j++;
}

?>
