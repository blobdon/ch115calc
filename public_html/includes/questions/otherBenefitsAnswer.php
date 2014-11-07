<?php 
if ($_SESSION['otherBenefits']==='Married') { 
	echo 'YOU - '.$_SESSION['otherBenefits'].';  SPOUSE - '.$_SESSION['spouseOtherBenefits']; 
} else {
	echo $_SESSION['otherBenefits'];
}
?>