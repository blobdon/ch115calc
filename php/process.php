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
// elseif (isset($_GET['submitBegin'])) { //if coming from Begin/Intro
//   session_unset();                 //clear old session vars
//   session_regenerate_id(true);     //new session id, clear old
//   $_SESSION['index'] = 1;
//   header("Location: index.php"); /* Redirect browser */
//   exit(0);
// }
#
# submitted from any input forms - runs validation and navigates appropriately
#
elseif (isset($_GET['submit'])) {
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
## service basics - service.php
if ($_SESSION['questions']['service']['status']==='current') {
  #
  # service date Validation and modification for unix epoch
  #      - would like to rework this to consitently use dateTime object, currently saves back to string in session
  if (isset($_GET['serviceStart']) && isset($_GET['serviceEnd'])) {
    service_Date_Validate('serviceStart'); //valid date, proper format, +10, -100 years
    service_Date_Validate('serviceEnd'); //valid date, proper format, +10, -100 years
    // if both valid dates, check if end before beginning
    if (empty($_SESSION['errors']['serviceStart']) && empty($_SESSION['errors']['serviceEnd']) ) {
      $serviceStart = new DateTime($_SESSION['serviceStart']);
      $serviceEnd = new DateTime($_SESSION['serviceEnd']);
      if ($serviceEnd <= $serviceStart) {
        $_SESSION['errors']['serviceStart'] = 'Ended before Began';
        $_SESSION['errors']['serviceEnd'] = 'Ended before Began';
      }
    }
  }
  if (empty($_SESSION['errors']['branch']) && empty($_SESSION['errors']['serviceStart']) && empty($_SESSION['errors']['serviceEnd']) && empty($_SESSION['errors']['discharge']) ) {
    $_SESSION['questions']['service']['status']='answered';
    //Service eligibility
    $_SESSION['serviceDays'] = date_diff($serviceStart, $serviceEnd)->days;
    if ( is_Wartime($serviceStart, $serviceEnd) ) {
      $_SESSION['serviceEra'] = is_Wartime($serviceStart,$serviceEnd);
    } else {
    $_SESSION['serviceEra'] = 'Peacetime';
    }
    if (is_Eligible_Service($serviceStart,$serviceEnd)) {
      $_SESSION['eligibleService'] = is_Eligible_Service($serviceStart,$serviceEnd);
      $_SESSION['questions']['vetReside']['status']='current';

    } else {
      $_SESSION['eligibleService'] = 'No';
      $_SESSION['questions']['serviceDisability']['status']='current';
    }
  } // end of if no errors
} // end of if service
## service details - serviceDisability
elseif ($_SESSION['questions']['serviceDisability']['status']==='current' && $_SESSION['errors']) {}
## service details - purpleHeart
elseif ($_SESSION['questions']['purpleHeart']['status']==='current') {}
## service details - campaigns
//have to update session var for campaigns outside loop, doesnt update if empty on later submits
elseif ($_SESSION['questions']['campaigns']['status']==='current') {
  $_SESSION['campaigns'] = $_GET['campaigns'];
}
## service details - kdsm
elseif ($_SESSION['questions']['kdsm']['status']==='current') {}
## service details - serviceDeath
elseif ($_SESSION['questions']['serviceDeath']['status']==='current') {}
## residence - currently
elseif ($_SESSION['questions']['vetReside']['status']==='current') {
    if ($_SESSION['vetReside'] === 'Yes'){
    $_SESSION['eligibleResidence'] = 'Yes';
  } else {
    $_SESSION['eligibleResidence'] = 'No';
  }
}
## residence - prior to service
elseif ($_SESSION['questions']['vetResidePrior']['status']==='current') {}
## residence - 3 years continuous
elseif ($_SESSION['questions']['vetReside3Years']['status']==='current') {}
## family - marital status
elseif ($_SESSION['questions']['maritalStatus']['status']==='current') {}
## family - if married, live with spouse
elseif ($_SESSION['questions']['liveWithSpouse']['status']==='current') {}
## family - children
elseif ($_SESSION['questions']['children']['status']==='current') {
  $_SESSION['applChildren'] = filter_var($_GET['applChildren'], FILTER_VALIDATE_INT,array('options'=>array('min_range'=>0)));
  if (empty($_SESSION['applChildren']) && $_SESSION['applChildren'] !== 0){
    $_SESSION['errors']['applChildren'] = 'Please enter a valid number (eg 0,1,2...)';
    $_SESSION['applChildren'] = $_GET['applChildren'];
  }
}
## finances - earned income
elseif ($_SESSION['questions']['earnedIncome']['status']==='current') {
  $_SESSION['applEarnedIncome'] = filter_var($_GET['applEarnedIncome'], FILTER_VALIDATE_INT,array('options'=>array('min_range'=>0)));
  if (empty($_SESSION['applEarnedIncome']) && $_SESSION['applEarnedIncome'] !== 0){
    $_SESSION['errors']['applEarnedIncome'] = 'Please enter a valid dollar amount (0 is OK)';
    $_SESSION['applEarnedIncome'] = $_GET['applEarnedIncome'];
  }
}
## finances - other income
elseif ($_SESSION['questions']['otherIncome']['status']==='current') {
  $_SESSION['applOtherIncome'] = filter_var($_GET['applOtherIncome'], FILTER_VALIDATE_INT,array('options'=>array('min_range'=>0)));
  if (empty($_SESSION['applOtherIncome']) && $_SESSION['applOtherIncome'] !== 0){
    $_SESSION['errors']['applOtherIncome'] = 'Please enter a valid dollar amount (0 is OK)';
    $_SESSION['applOtherIncome'] = $_GET['applOtherIncome'];
  }
}
## finances - other/REBA benefits
elseif ($_SESSION['questions']['otherBenefits']['status']==='current') {}
## finances - pay medicare B premiums
elseif ($_SESSION['questions']['payMedicareB']['status']==='current') {}
## finances - assets if single
elseif ($_SESSION['questions']['assetsSingle']['status']==='current') {
  if ($_SESSION['maritalStatus']==='Single' && $_SESSION['applAssetsSingle']==='Yes'){
    $_SESSION['eligibleAssets']='No';
  } else {
    $_SESSION['eligibleAssets']='Yes';
  }
}
## finances - assets if married
elseif ($_SESSION['questions']['assetsMarried']['status']==='current') {
  if ($_SESSION['maritalStatus']==='Married' && $_SESSION['applAssetsMarried']==='Yes'){
    $_SESSION['eligibleAssets']='No';
  } else {
    $_SESSION['eligibleAssets']='Yes';
  }
}
## housing - shelter type
elseif ($_SESSION['questions']['shelterType']['status']==='current') {}
## housing - housing cost
elseif ($_SESSION['questions']['housingCost']['status']==='current') {
  $_SESSION['applHousingCost'] = filter_var($_GET['applHousingCost'], FILTER_VALIDATE_INT,array('options'=>array('min_range'=>0)));
  if (empty($_SESSION['applHousingCost']) && $_SESSION['applHousingCost'] !== 0){
    $_SESSION['errors']['applHousingCost'] = 'Please enter a valid dollar amount (0 is OK)';
    $_SESSION['applHousingCost'] = $_GET['applHousingCost'];
  }
}
## housing - heating cost
elseif ($_SESSION['questions']['heatingCost']['status']==='current') {
  $_SESSION['applHeatingCost'] = filter_var($_GET['applHeatingCost'], FILTER_VALIDATE_INT,array('options'=>array('min_range'=>0)));
  if (empty($_SESSION['applHeatingCost']) && $_SESSION['applHeatingCost'] !== 0){
    $_SESSION['errors']['applHeatingCost'] = 'Please enter a valid dollar amount (0 is OK)';
    $_SESSION['applHeatingCost'] = $_GET['applHeatingCost'];
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
#
#  FUNCTIONS
#
// date validation for PHP >=5.3
function service_Date_Validate($dateName){
  $date = DateTime::createFromFormat('m/d/y', $_SESSION[$dateName]);
  $date_errors = DateTime::getLastErrors();
  if ($date_errors['warning_count'] + $date_errors['error_count'] > 0) {
    $_SESSION['errors'][$dateName] = 'Invalid Date <br> (format as mm/dd/yy)';
    return;
  }
  //$_SESSION[$dateName] = new DateTime($_SESSION[$dateName]);
  $futureCutoff = new DateTime('+10 years');
  $pastCutoff = new DateTime('-100 years');
  //fix unix epoch problems with years befor 1970. Any date that comes up 10 years from now, will be set to 1900 version
  if ($date >= $futureCutoff) { $date->modify('-100 years');}
  if ($date > $futureCutoff || $date < $pastCutoff ){
    $_SESSION['errors'][$dateName] = 'Outside reasonable date range';
  }
  $_SESSION[$dateName] = $date->format('m/d/y');
}
// check user service dates against MGL definition of veteran
function is_Wartime($serviceStart, $serviceEnd){
  //These dates reflect MGL c4 s7 cl43rd, not including campaigns or merchant marines, as of 6/11/2013
  // this array of wars is used by isWartime function
  $wars = array(
      'WWI' => array( begin => new DateTime('6-Apr-1917'), end => new DateTime('11-Nov-1918') ),
      'WWII' => array( begin => new DateTime('16-Sep-1940'), end => new DateTime('25-Jul-1947') ),
      'Korea' => array( begin => new DateTime('25-Jun-1950'), end => new DateTime('31-Jan-1955') ),
      'Vetnam II' => array( begin => new DateTime('5-Aug-1964'), end => new DateTime('7-May-1975') ),
      'Persian Gulf (currently ongoing according to MA)' => array( begin => new DateTime('2-Aug-1990'), end => new DateTime() ),
      'Korea Defense Service Medal' => array( begin => new DateTime('28-Jul-1954'), end => new DateTime(), extraInputName => 'kdsm', extraInputValue => 'Yes' ),
      'Lebanese Peacekeeping Force' => array( begin => new DateTime('25-Aug-1982'), end => new DateTime('1-Dec-1987'), extraInputName => 'campaigns', extraInputValue => 'Lcampaign' ),
      'Grenada Rescue Mission' => array( begin => new DateTime('25-Oct-1983'), end => new DateTime('15-Dec-1983'), extraInputName => 'campaigns', extraInputValue => 'Gcampaign' ),
      'Panamanian Intervention Force' => array( begin => new DateTime('20-Dec-1989'), end => new DateTime('31-Jan-1990'), extraInputName => 'campaigns', extraInputValue => 'Pcampaign' )
  );
  // loop through war date ranges looking for overlap with service
  foreach ($wars as $name => $property) {
    //echo $name." ".$wars[$name]['begin']->format('m/d/Y')."-".$wars[$name]['end']->format('m/d/Y')."<br>";
    if (empty($wars[$name]['extraInputName'])) { //No extra input needed to meet threshold
      if ( !( $serviceStart > $wars[$name]['end'] || $wars[$name]['begin'] > $serviceEnd) ) {
      // inverse of No overlap = overlap = wartime service
        return $name; //leave function because met wartime service threshold    }
      }
    }
    else { // extra input needed to meet threshold
      if (is_array($_GET[$wars[$name]['extraInputName']])) { // campaign checkboxes are in array
        foreach ($_GET[$wars[$name]['extraInputName']] as $value) {
          if ( $value === $wars[$name]['extraInputValue'] &&
            !( $serviceStart > $wars[$name]['end'] || $wars[$name]['begin'] > $serviceEnd) ) {
            // inverse of No overlap = overlap = wartime service
            return $name; //leave function because met wartime service threshold    }
          }
        }
      }
      else { //kdsm is not in array
        if ( $_GET[$wars[$name]['extraInputName']] === $wars[$name]['extraInputValue'] &&
          !( $serviceStart > $wars[$name]['end'] || $wars[$name]['begin'] > $serviceEnd) ) {
          // inverse of No overlap = overlap = wartime service
          return $name; //leave function because met wartime service threshold    }
        }
      }
    }
    // Did not meet threshold by three checks above = not wartime service.
  }
} // end of isWartime
// !!! Doesnt include disqualifiers yet
function is_Eligible_Service($serviceStart, $serviceEnd){
  $peacetimeMin = new DateInterval('P180D');
  $wartimeMin = new DateInterval('P90D');
  if ( $_SESSION['serviceDays'] >= $peacetimeMin->d ){
    Return '>=180 days Active Duty';
  }
  elseif ( is_Wartime($serviceStart,$serviceEnd) &&  ($_SESSION['serviceDays'] >= $wartimeMin->d) ){
    Return '>=90 days Active Duty, at least 1 during wartime';
  }
  elseif ( $_GET['purpleHeart']       === "Yes" ||
       $_GET['serviceDisability'] === "Yes" ||
       $_GET['serviceDeath']      === "Yes" ) {
    Return 'Purple Heart, Service-Connected Disbility, or Service Death';
  }
}
function is_Ready($question){
  if ($_SESSION['questions'][$question]['status']==='current' && empty($_SESSION['errors'][$question])) {
    Return True;
  }
}
?>