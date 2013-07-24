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
$REBA = 315;
$medicareAllowance = 99.90;
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
$applPersonalAllowance = 0;
if ($_SESSION['applShelterType']==='Institutional') {
  $applPersonalAllowance = $personalAllowanceInstitutional;
} elseif ($_SESSION['applShelterType']==='Transitional') {
  $applPersonalAllowance = $personalAllowanceTransitional;
} elseif ($_SESSION['applShelterType']==='Rent' || $_SESSION['applShelterType']==='Mortgage' || $_SESSION['applShelterType']==='Own'){
  if ($_SESSION['maritalStatus']==='Single') {
  $applPersonalAllowance = $personalAllowanceSingle;
  } elseif ($_SESSION['maritalStatus']==='Married' && $_SESSION['liveWithSpouse']==='Yes') {
  $applPersonalAllowance = $personalAllowanceMarried;
  } elseif ($_SESSION['maritalStatus']==='Married' && $_SESSION['liveWithSpouse']==='No') {
  $applPersonalAllowance = $personalAllowanceSingle;
  }
} else {
  $applPersonalAllowance = 'ERROR';
}

// Calculate child allowance
$applChildAllowance = 0;
$applChildren = $_SESSION['applChildren'] +0; //adding zero ensures integer type
if ($applChildren < 3) {
  $applChildAllowance = $applChildren * $childAllowanceFirstTwo;
} else {
  $applChildAllowance = (2 * $childAllowanceFirstTwo) +
            (($applChildren - 2) * $childAllowanceAfterTwo);
}

// Calculate REBA allowance
$applREBA = 0;
$numREBA = 0;
if ($_SESSION['applOtherBenefits']==='Yes') {
  $applREBA += $REBA;
  $numREBA ++;
}
if ($_SESSION['maritalStatus']==='Married'){
  if ($_SESSION['spouseOtherBenefits']==='Yes' && $_SESSION['liveWithSpouse']==='Yes') {
    $applREBA += $REBA;
    $numREBA ++;
  }
}

// Calculate Medicare B allowance
$applMedicareAllowance = 0;
$numMedicareAllowance = 0;
if ($_SESSION['applPayMedicareB']==='Yes') {
  $applMedicareAllowance += $medicareAllowance;
  $numMedicareAllowance ++;
}
if ($_SESSION['maritalStatus']==='Married'){
  if ($_SESSION['spousePayMedicareB']==='Yes' && $_SESSION['liveWithSpouse']==='Yes') {
    $applMedicareAllowance += $medicareAllowance;
    $numMedicareAllowance ++;
  }
}


//Calculate Fuel Allowance
$applFuelAllowance = min($maxFuelAllowance, $_SESSION['applHeatingCost']+0);

//Calculate Shelter Allowance
$applShelterAllowance = 0;
$applHousingCost = $_SESSION['applHousingCost'] +0; //adding zero ensures integer type
if ($applFuelAllowance > 0) {
  $applShelterAllowance = min($maxShelterAllowanceUnheated,$applHousingCost);
} elseif ($applFuelAllowance === 0) {
  $applShelterAllowance = min($maxShelterAllowanceHeated,$applHousingCost);
} else {
  $applShelterAllowance = "Missing fuel or housing cost";
}


//calculate earned income, include - as work incentive per 108 CMR 6.01(5)(d), minimum of zero
$applEarnedIncome = max($_SESSION['applEarnedIncome'] - $workIncentive, 0);
$applOtherIncome = $_SESSION['applOtherIncome'] +0;

//Calculate total income
$applTotalIncome = $applEarnedIncome + $applOtherIncome;

//calc overall budget by summing all allowances
$applBudget = $applPersonalAllowance +
        $applShelterAllowance +
        $applChildAllowance +
        $applFuelAllowance +
        $applREBA +
        $applMedicareAllowance;

//calc benefits payments by budget minus income
$applBenefitsPayable = max($applBudget - $applTotalIncome,0);

#
#  Overall eligibility
#
if ($_SESSION['eligibleService'] === "No" ||
    $_SESSION['eligibleResidence'] === "No" ||
    $_SESSION['eligibleAssets'] === "No" ||
    $applBenefitsPayable == 0){
  $_SESSION['eligibleAll'] = 'No';
} else {
  $_SESSION['eligibleAll'] = 'Yes';
}




?>