<?php 
echo 'YOU - '.$_SESSION['otherBenefits'];
if ($_SESSION['maritalStatus']==='Married') { echo ';  SPOUSE - '.$_SESSION['spouseOtherBenefits']; }
?>