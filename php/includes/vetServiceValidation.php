<?php

// if any service time exception, make others not required
if ($_SESSION['purpleHeart']==='Yes') {
  $_SESSION['errors']['serviceDisability'] = '';
  $_SESSION['errors']['serviceDeath'] = '';
} elseif ($_SESSION['serviceDisability']==='Yes') {
  $_SESSION['errors']['purpleHeart'] = '';
  $_SESSION['errors']['serviceDeath'] = '';
} elseif ($_SESSION['serviceDeath']==='Yes') {
  $_SESSION['errors']['serviceDisability'] = '';
  $_SESSION['errors']['purpleHeart'] = '';
}
//have to update session var for campaigns outside loop, doesnt update if empty on later submits
$_SESSION['campaigns'] = $_GET['campaigns'];

// if eligible without detailed questions, make those not required (clear their errors)
if (is_Eligible_Service($serviceStart,$serviceEnd)) {
	$_SESSION['errors']['kdsm'] = '';
	$_SESSION['errors']['purpleHeart'] = '';
	$_SESSION['errors']['serviceDisability'] = '';
	$_SESSION['errors']['serviceDeath'] = '';
}
//!!!!!!!!!!! need to add disqualifier for discharge type, but clarify first.
// End of service validation

?>