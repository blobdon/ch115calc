<?php 
echo 'YOU - '.$_SESSION['payMedicareB'];
if ($_SESSION['maritalStatus']==='Married') { echo ';  SPOUSE - '.$_SESSION['spousePayMedicareB']; }
?>