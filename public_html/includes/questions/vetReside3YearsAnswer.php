<?php 
if ($_SESSION['applicant']==='Dependent') { 
	echo 'YOU - '.$_SESSION['depReside3Years'].';  VETERAN - '.$_SESSION['vetReside3Years']; 
} else {
	echo $_SESSION['vetReside3Years'];
}
?>
