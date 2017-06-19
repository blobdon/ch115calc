<?php 
if ($_SESSION['applicant']==='Dependent') { 
	echo 'YOU - '.$_SESSION['depReside'].';  VETERAN - '.$_SESSION['vetReside']; 
} else {
	echo $_SESSION['vetReside'];
}
?>