<?php 
foreach ($_SESSION['campaigns'] as $key => $value) {
	if ($key === 1 || $key === 2) { echo ', ';}
	if ($value === 'Lcampaign' ) {echo 'Lebanese Peacekeeping Force';}
	elseif ($value === 'Gcampaign' ) {echo 'Grenada Rescue Mission';}
	elseif ($value === 'Pcampaign' ) {echo 'Panamanian Intervention Force';}
	else {echo 'No';}
}
?>
