<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
ob_start();
#
# if submitted via Reset button - resets session and returns to begin page
#
if (isset($_GET['submitReset'])){
  session_destroy();
  session_start();
  session_unset();
  session_regenerate_id(true);
  header("Location: index.php"); /* Redirect browser */
  exit(0);
}
#
# submitted via begin button - resets session and moves to first form
#
elseif (isset($_GET['submitBegin'])) { //if coming from Begin/Intro
  session_unset();                 //clear old session vars
  session_regenerate_id(true);     //new session id, clear old
  $_SESSION['index'] = 1;
  header("Location: index.php"); /* Redirect browser */
  exit(0);
}
#
# submitted from any input forms - runs validation and navigates appropriately
#
elseif (isset($_GET['submit'])) {
  //session_start();
#
#  Entry Validation for all forms
#
//loop through submission and mark blank or skipped required questions.
foreach ($_GET as $name => $value) {
  if (empty($_GET[$name]) && $_GET[$name] !== '0') {
    $_SESSION['errors'][$name] = 'Required';
  } elseif ($_GET[$name]==='Skipped') { //this is how I make radios required, hidden checked value = Skipped
    $_SESSION['errors'][$name] = 'Required';
  } else {
    $_SESSION['errors'][$name] = '';
  }
}
//save submitted values to SESSION
foreach ($_GET as $name => $value) {
  $_SESSION[$name] = $value;
}
#
#  set some shortcut variables
#

#
#  1 - SERVICE-SPECIFIC VALIDATION
#
// if ($_SESSION['index'] === 1) {
//   require_once(dirname(__FILE__).'/includes/vetServiceValidation.php');
// }
if ($_SESSION['questions']['service']['status']==='current') {
  $_SESSION['questions']['service']['status']='answered';
  $_SESSION['questions']['kdsm']['status']='current';
}

# 2 - RESIDENCE VALIDATION
#
if ($_SESSION['index'] === 2) {
  if ($_SESSION['vetReside'] === 'Yes'){
    $_SESSION['eligibleResidence'] = 'Yes';
  } else {
    $_SESSION['eligibleResidence'] = 'No';
  }
}
#
# 3 - FAMILY VALIDATION
#
if ($_SESSION['index'] === 3) {
  $_SESSION['applChildren'] = filter_var($_GET['applChildren'], FILTER_VALIDATE_INT,array('options'=>array('min_range'=>0)));
  if (empty($_SESSION['applChildren']) && $_SESSION['applChildren'] !== 0){
    $_SESSION['errors']['applChildren'] = 'Please enter a valid number (eg 0,1,2...)';
    $_SESSION['applChildren'] = $_GET['applChildren'];
  }
  if ($_SESSION['maritalStatus']==='Single') {
    $_SESSION['errors']['liveWithSpouse'] = '';
  }
}
#
# 4 - FINANCE VALIDATION
#
if ($_SESSION['index'] === 4) {
  $_SESSION['applEarnedIncome'] = filter_var($_GET['applEarnedIncome'], FILTER_VALIDATE_INT,array('options'=>array('min_range'=>0)));
  if (empty($_SESSION['applEarnedIncome']) && $_SESSION['applEarnedIncome'] !== 0){
    $_SESSION['errors']['applEarnedIncome'] = 'Please enter a valid dollar amount (0 is OK)';
    $_SESSION['applEarnedIncome'] = $_GET['applEarnedIncome'];
  }
  $_SESSION['applOtherIncome'] = filter_var($_GET['applOtherIncome'], FILTER_VALIDATE_INT,array('options'=>array('min_range'=>0)));
  if (empty($_SESSION['applOtherIncome']) && $_SESSION['applOtherIncome'] !== 0){
    $_SESSION['errors']['applOtherIncome'] = 'Please enter a valid dollar amount (0 is OK)';
    $_SESSION['applOtherIncome'] = $_GET['applOtherIncome'];
  }
  if ($_SESSION['maritalStatus']==='Single' && $_SESSION['applAssetsSingle']==='Yes'){
    $_SESSION['eligibleAssets']='No';
  } elseif ($_SESSION['maritalStatus']==='Married' && $_SESSION['applAssetsMarried']==='Yes'){
    $_SESSION['eligibleAssets']='No';
  } else {
    $_SESSION['eligibleAssets']='Yes';
  }
}
#
# 5 - SHELTER VALIDATION
#
if ($_SESSION['index'] === 5) {
  //validate numerical inputs and update errors
  $_SESSION['applHousingCost'] = filter_var($_GET['applHousingCost'], FILTER_VALIDATE_INT,array('options'=>array('min_range'=>0)));
  if (empty($_SESSION['applHousingCost']) && $_SESSION['applHousingCost'] !== 0){
    $_SESSION['errors']['applHousingCost'] = 'Please enter a valid dollar amount (0 is OK)';
    $_SESSION['applHousingCost'] = $_GET['applHousingCost'];
  }
  $_SESSION['applHeatingCost'] = filter_var($_GET['applHeatingCost'], FILTER_VALIDATE_INT,array('options'=>array('min_range'=>0)));
  if (empty($_SESSION['applHeatingCost']) && $_SESSION['applHeatingCost'] !== 0){
    $_SESSION['errors']['applHeatingCost'] = 'Please enter a valid dollar amount (0 is OK)';
    $_SESSION['applHeatingCost'] = $_GET['applHeatingCost'];
  }
  //clear error of omitted housing/heating cost if institutional resident
  // zero submitted housing/heating costs
  // **** MAY WANT TO THROW MESSAGE TO CLARIFY IN CASES WHERE USER SELECT INST'L AND ENTERED COSTS
  if ($_SESSION['applShelterType'] === 'Institutional') {
    $SESSION['errors']['applHousingCost'] = '';
    $_SESSION['applHousingCost'] = 0;
    $SESSION['errors']['applHeatingCost'] = '';
    $_SESSION['applHeatingCost'] = 0;
  }
}
#
# determine if individual validations resulted in errors
#
$_SESSION['hazError'] = False;
foreach ($_SESSION['errors'] as $value) {
  if ($value){
    $_SESSION['hazError'] = True;
  }
}
#
#  NAVIGATION HANDLING
#
# NAVIGATION AFTER ALL VALIDATION AND CALCULATIONS
// modify index based on Back/Continut submission and presence of errors
// if (!$_SESSION['hazError'] && $_GET['submit']==='Continue') {
//   $_SESSION['index'] += 1;
// } elseif (!$_SESSION['hazError'] && $_GET['submit']==='Back') {
//   $_SESSION['index'] -= 1;
// }
//redirect to user page
session_write_close();
header("Location: index.php"); /* Redirect browser */
exit(0);
// print('<pre>');
// echo 'Session ';
// print_r($_GET);
// print_r($_SESSION);
// print('</pre>');


ob_flush();
} // End of isset submit
?>