<?php 
if ($_SESSION['maritalStatus']==='Married') { 
	echo 'YOU - '.$_SESSION['payMedicareB'].';  SPOUSE - '.$_SESSION['spousePayMedicareB']; 
} else {
	echo $_SESSION['payMedicareB'];
}
?>