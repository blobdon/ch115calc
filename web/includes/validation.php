<?php
if (isset($_GET['submitService'])) {
#
#  Entry Validation
#
$anyError = False;
$hasError = array();

foreach ($_GET as $name => $value) {
	if (empty($_GET[$name]) && $_GET[$name] !== '0' && $name != 'results') {
		$hasError[$name] = 'Empty';
		$anyError = True;
	} elseif ($_GET[$name]==='Skipped') {
		$hasError[$name] = 'Error';
		$anyError = True;
	} else {
		$hasError[$name] = '';
	}
}
#
# Date-specific Validation
#
if (!empty($_GET['serviceStart']) && !empty($_GET['serviceEnd'])){
	valid_Date('serviceStart', 'm/d/y');
	valid_Date('serviceEnd', 'm/d/y');
	$serviceStart = new DateTime($_GET['serviceStart']);
	$serviceEnd = new DateTime($_GET['serviceEnd']);
	//fix unix epoch problems with years befor 1970. Any date that comes up 10 years from now, will be set to 1900 version
	$futureCutoff = new DateTime('+10 years');
	if ($serviceStart >= $futureCutoff) { $serviceStart->modify('-100 years');}
	if ($serviceEnd >= $futureCutoff) { $serviceEnd->modify('-100 years');}
	if ($serviceEnd <= $serviceStart) {
		$hasError['serviceStart'] = 'Ended before Began';
		$hasError['serviceEnd'] = 'Ended before Began';
		$anyError = True;
	}
}

} // close of isset SUBMIT
?>







<!-- // $formVars = array(
// 	'results' 	=> array('value' =>'', 'error' => False, 'message' => '',) ,
//     'eligibleService' 	=> array('value' =>'', 'error' => False, 'message' => '',) ,
//     'branch' 			=> array('value' =>'', 'error' => False, 'message' => 'Select Branch',) ,
//     'serviceStart'		=> array('value' =>'', 'error' => False, 'message' => 'Enter a valid Date',) ,
//     'serviceEnd' 		=> array('value' =>'', 'error' => False, 'message' => 'Enter a valid Date',) ,
//     'discharge' 		=> array('value' =>'', 'error' => False, 'message' => 'Select Discharge type',) ,
//     'kdsm' 				=> array('value' =>'', 'error' => False, 'message' => 'Select Yes or NO',) ,
//     'campaigns' 		=> array('value' =>'', 'error' => False, 'message' => '',) ,
//     'purpleHeart' 		=> array('value' =>'', 'error' => False, 'message' => 'Select Yes or NO',) ,
//     'serviceDisability' => array('value' =>'', 'error' => False, 'message' => 'Select Yes or NO',) ,
//     'serviceDeath' 		=> array('value' =>'', 'error' => False, 'message' => 'Select Yes or NO',) ,
//     'eligibleResidence' => array('value' =>'', 'error' => False, 'message' => '',) ,
//     'vetReside'			=> array('value' =>'', 'error' => False, 'message' => 'Select Yes or NO',) ,
//     'vetResidePrior' 	=> array('value' =>'', 'error' => False, 'message' => 'Select Yes or NO',) ,
//     'vetReside3Years' 	=> array('value' =>'', 'error' => False, 'message' => 'Select Yes or NO ',) ,
//     'maritalStatus' 	=> array('value' =>'', 'error' => False, 'message' => 'Select Single or Married',) ,
//     'liveWithSpouse' 	=> array('value' =>'', 'error' => False, 'message' => 'Select Yes or NO',) ,
//     'applChildren' 		=> array('value' =>'', 'error' => False, 'message' => 'Enter # of children',) ,
//     'applEarnedIncome' 	=> array('value' =>'', 'error' => False, 'message' => 'Enter $ Amount or 0',) ,
//     'applOtherIncome' 	=> array('value' =>'', 'error' => False, 'message' => 'Enter $ Amount or 0',) ,
//     'applOtherBenefits' => array('value' =>'', 'error' => False, 'message' => 'Select Yes or NO',) ,
//     'spouseOtherBenefits' => array('value' =>'', 'error' => False, 'message' => 'Select Yes or NO',) ,
//     'applPayMedicareB' 	=> array('value' =>'', 'error' => False, 'message' => 'Select Yes or NO',) ,
//     'spousePayMedicareB' => array('value' =>'', 'error' => False, 'message' => 'Select Yes or NO',) ,
//     'eligibleAssets' 	=> array('value' =>'', 'error' => False, 'message' => '',) ,
//     'applAssetsSingle' 	=> array('value' =>'', 'error' => False, 'message' => 'Select Yes or NO',) ,
//     'applAssetsMarried' => array('value' =>'', 'error' => False, 'message' => 'Select Yes or NO',) ,
//     'applShelterType' 	=> array('value' =>'', 'error' => False, 'message' => 'Select an answer',) ,
//     'applHousingCost' 	=> array('value' =>'', 'error' => False, 'message' => 'Enter $ Amount or 0',) ,
//     'applHeatingCost' 	=> array('value' =>'', 'error' => False, 'message' => 'Enter $ Amount or 0',) 
//     );
// foreach ($formVars as $name => $prop ) {
// 	if (isset($_GET[$name])) {
// 		if ($_GET[$name] === '0') {
// 			$formVars[$name]['error'] = False;
// 			$formVars[$name]['value'] = $_GET[$name];		}
// 		elseif (empty($_GET[$name])) {
// 			$formVars[$name]['error'] = True;
// 		} else {
// 			$formVars[$name]['error'] = False;
// 			$formVars[$name]['value'] = $_GET[$name];
// 		}
// 	} else {
// 		$formVars[$name]['error'] = True;
// 	}
// } -->