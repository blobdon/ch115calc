<?php
#
# Calculate benefit amount
#
//Preset variable amounts, these should come from Secretary's Budget Directive
//currently all from 2012 Melrose-Wakefield-Saugus chart
$maxShelterAllowance = 0;
$maxShelterAllowanceUnheated = 440;
$maxShelterAllowanceHeated = 590;
$maxFuelAllowance = 265;
$perREBA = 315;
$perMedicareAllowance = 99.90;
$childAllowanceFirstTwo = 285;
$childAllowanceAfterTwo = 150;
//$maxAssetsSingle = 3200;  //not used - YES/NO question instead
//$maxAssetsMarried = 7000; //not used - YES/NO question instead
$personalAllowanceInstitutional = 175;
$personalAllowanceTransitional = 650;
$personalAllowanceSingle = 655;
$personalAllowanceMarried = 885;
$workIncentive = 200; //per 108 CMR 6.01(5)(d)

//  Calculate correct personal allowance based on housing situation (Budgets #1-4 2102 Melrose-Wakefield)
$personalAllowance = 0;
if ($_SESSION['shelterType']==='Institutional') {
  $sersonalAllowance = $personalAllowanceInstitutional;
} elseif ($_SESSION['shelterType']==='Transitional') {
  $personalAllowance = $personalAllowanceTransitional;
} elseif ($_SESSION['shelterType']==='Rent' || $_SESSION['shelterType']==='Mortgage' || $_SESSION['shelterType']==='Own'){
  if ($_SESSION['maritalStatus']==='Single') {
  $personalAllowance = $personalAllowanceSingle;
  } elseif ($_SESSION['maritalStatus']==='Married' && $_SESSION['liveWithSpouse']==='Yes') {
  $personalAllowance = $personalAllowanceMarried;
  } elseif ($_SESSION['maritalStatus']==='Married' && $_SESSION['liveWithSpouse']==='No') {
  $personalAllowance = $personalAllowanceSingle;
  }
} else {
  $personalAllowance = 'ERROR';
}

// Calculate child allowance
$childAllowance = 0;
$children = $_SESSION['children'] +0; //adding zero ensures integer type
if ($children < 3) {
  $childAllowance = $children * $childAllowanceFirstTwo;
} else {
  $childAllowance = (2 * $childAllowanceFirstTwo) +
            (($children - 2) * $childAllowanceAfterTwo);
}

// Calculate REBA allowance
$REBA = 0;
$numREBA = 0;
if ($_SESSION['otherBenefits']==='Yes') {
  $REBA += $perREBA;
  $numREBA ++;
}
if ($_SESSION['maritalStatus']==='Married'){
  if ($_SESSION['spouseOtherBenefits']==='Yes' && $_SESSION['liveWithSpouse']==='Yes') {
    $REBA += $perREBA;
    $numREBA ++;
  }
}

// Calculate Medicare B allowance
$medicareAllowance = 0;
$numMedicareAllowance = 0;
if ($_SESSION['payMedicareB']==='Yes') {
  $medicareAllowance += $perMedicareAllowance;
  $numMedicareAllowance ++;
}
if ($_SESSION['maritalStatus']==='Married'){
  if ($_SESSION['spousePayMedicareB']==='Yes' && $_SESSION['liveWithSpouse']==='Yes') {
    $medicareAllowance += $perMedicareAllowance;
    $numMedicareAllowance ++;
  }
}


//Calculate Fuel Allowance
$fuelAllowance = min($maxFuelAllowance, $_SESSION['heatingCost']+0);

//Calculate Shelter Allowance
$ShelterAllowance = 0;
$housingCost = $_SESSION['housingCost'] +0; //adding zero ensures integer type
if ($fuelAllowance > 0) {
  $shelterAllowance = min($maxShelterAllowanceUnheated,$housingCost);
} elseif ($fuelAllowance === 0) {
  $shelterAllowance = min($maxShelterAllowanceHeated,$housingCost);
} else {
  $shelterAllowance = "Missing fuel or housing cost";
}


//calculate earned income, include - as work incentive per 108 CMR 6.01(5)(d), minimum of zero
$earnedIncome = max($_SESSION['earnedIncome'] - $workIncentive, 0);
$otherIncome = $_SESSION['otherIncome'] +0;

//Calculate total income
$totalIncome = $earnedIncome + $otherIncome;

//calc overall budget by summing all allowances
$budget = $personalAllowance +
        $shelterAllowance +
        $childAllowance +
        $fuelAllowance +
        $REBA +
        $medicareAllowance;

//calc benefits payments by budget minus income
$benefitsPayable = max($budget - $totalIncome,0);

#
#  Overall eligibility
#
if ($_SESSION['eligibleService'] === "No" ||
    $_SESSION['eligibleResidence'] === "No" ||
    $_SESSION['eligibleAssets'] === "No" ||
    $BenefitsPayable == 0){
  $_SESSION['eligibleAll'] = 'No';
} else {
  $_SESSION['eligibleAll'] = 'Yes';
}




?>