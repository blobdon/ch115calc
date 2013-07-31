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
if (is_Ready('service')) {
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
      $_SESSION['questions']['purpleHeart']['status']='current';
    }
  } // end of if no errors
} // end of if service
## service details - purpleHeart
elseif (is_Ready('purpleHeart')) {
  $_SESSION['questions']['purpleHeart']['status']='answered';
  $serviceStart = new DateTime($_SESSION['serviceStart']);
  $serviceEnd = new DateTime($_SESSION['serviceEnd']);
  if (is_Eligible_Service($serviceStart,$serviceEnd)) {
      $_SESSION['eligibleService'] = is_Eligible_Service($serviceStart,$serviceEnd);
      $_SESSION['questions']['vetReside']['status']='current';
  } else {
      $_SESSION['eligibleService'] = 'No';
      $_SESSION['questions']['serviceDisability']['status']='current';
  }
}
## service details - serviceDisability
elseif (is_Ready('serviceDisability')) {
  $_SESSION['questions']['serviceDisability']['status']='answered';
  $serviceStart = new DateTime($_SESSION['serviceStart']);
  $serviceEnd = new DateTime($_SESSION['serviceEnd']);
  if (is_Eligible_Service($serviceStart,$serviceEnd)) {
      $_SESSION['eligibleService'] = is_Eligible_Service($serviceStart,$serviceEnd);
      $_SESSION['questions']['vetReside']['status']='current';
  } else {
      $_SESSION['eligibleService'] = 'No';
      $_SESSION['questions']['kdsm']['status']='current';
  }
}
## service details - kdsm
elseif (is_Ready('kdsm')) {
  $_SESSION['questions']['kdsm']['status']='answered';
  $serviceStart = new DateTime($_SESSION['serviceStart']);
  $serviceEnd = new DateTime($_SESSION['serviceEnd']);
  if ( is_Wartime($serviceStart, $serviceEnd) ) {
    $_SESSION['test'] = 'hello';
    $_SESSION['serviceEra'] = is_Wartime($serviceStart,$serviceEnd);
  } else {
    $_SESSION['serviceEra'] = 'Peacetime';
    $_SESSION['test'] = 'got to else';
  }
  if (is_Eligible_Service($serviceStart,$serviceEnd)) {
      $_SESSION['eligibleService'] = is_Eligible_Service($serviceStart,$serviceEnd);
      $_SESSION['questions']['vetReside']['status']='current';
      $_SESSION['test2'] = 'second if';
  } else {
      $_SESSION['eligibleService'] = 'No';
      $_SESSION['questions']['campaigns']['status']='current';
      $_SESSION['test2'] = 'second else';
  }
}
## service details - campaigns
//have to update session var for campaigns outside loop, doesnt update if empty on later submits
elseif (is_Ready('campaigns')) {
  $_SESSION['questions']['campaigns']['status']='answered';
  $_SESSION['campaigns'] = $_GET['campaigns'];
  $serviceStart = new DateTime($_SESSION['serviceStart']);
  $serviceEnd = new DateTime($_SESSION['serviceEnd']);;
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
      $_SESSION['questions']['vetReside']['status']='current'; //later change to results page showing ineligible.
  }
}
## service details - serviceDeath
elseif (is_Ready('serviceDeath')) {}
## residence - currently
elseif (is_Ready('vetReside')) {
  $_SESSION['questions']['vetReside']['status']='answered';
  if ($_SESSION['vetReside'] === 'Yes'){
    $_SESSION['eligibleResidence'] = 'Yes';
  } else {
    $_SESSION['eligibleResidence'] = 'No';
  }
  $_SESSION['questions']['maritalStatus']['status']='current';
}
## residence - prior to service
elseif (is_Ready('vetResidePrior')) {}
## residence - 3 years continuous
elseif (is_Ready('vetReside3Years')) {}
## family - marital status
elseif (is_Ready('maritalStatus')) {
  $_SESSION['questions']['maritalStatus']['status']='answered';
  if ($_SESSION['maritalStatus']==='Married') {
    $_SESSION['questions']['liveWithSpouse']['status']='current';
  } else {
    $_SESSION['questions']['children']['status']='current';
  }
}
## family - if married, live with spouse
elseif (is_Ready('liveWithSpouse')) {
  $_SESSION['questions']['liveWithSpouse']['status']='answered';
  $_SESSION['questions']['children']['status']='current';
}
## family - children
elseif (is_Ready('children')) {
  $_SESSION['children'] = filter_var($_GET['children'], FILTER_VALIDATE_INT,array('options'=>array('min_range'=>0)));
  if (empty($_SESSION['children']) && $_SESSION['children'] !== 0){
    $_SESSION['errors']['children'] = 'Please enter a valid number (eg 0,1,2...)';
    $_SESSION['children'] = $_GET['children'];
  } else {
    $_SESSION['questions']['children']['status']='answered';
    $_SESSION['questions']['earnedIncome']['status']='current';
  }
}
## finances - earned income
elseif (is_Ready('earnedIncome')) {
  $_SESSION['earnedIncome'] = filter_var($_GET['earnedIncome'], FILTER_VALIDATE_INT,array('options'=>array('min_range'=>0)));
  if (empty($_SESSION['earnedIncome']) && $_SESSION['earnedIncome'] !== 0){
    $_SESSION['errors']['earnedIncome'] = 'Please enter a valid dollar amount (0 is OK)';
    $_SESSION['earnedIncome'] = $_GET['earnedIncome'];
  } else {
    $_SESSION['questions']['earnedIncome']['status']='answered';
    $_SESSION['questions']['otherIncome']['status']='current';
  }
}
## finances - other income
elseif (is_Ready('otherIncome')) {
  $_SESSION['otherIncome'] = filter_var($_GET['otherIncome'], FILTER_VALIDATE_INT,array('options'=>array('min_range'=>0)));
  if (empty($_SESSION['otherIncome']) && $_SESSION['otherIncome'] !== 0){
    $_SESSION['errors']['otherIncome'] = 'Please enter a valid dollar amount (0 is OK)';
    $_SESSION['otherIncome'] = $_GET['otherIncome'];
  } else {
    $_SESSION['questions']['otherIncome']['status']='answered';
    $_SESSION['questions']['otherBenefits']['status']='current';
  }
}
## finances - other/REBA benefits
elseif (is_Ready('otherBenefits')) {
  $_SESSION['questions']['otherBenefits']['status']='answered';
  $_SESSION['questions']['payMedicareB']['status']='current';
}
## finances - pay medicare B premiums
elseif (is_Ready('payMedicareB')) {
  $_SESSION['questions']['payMedicareB']['status']='answered';
  if ($_SESSION['maritalStatus']==='Married') {
    $_SESSION['questions']['assetsMarried']['status']='current';
  } else {
    $_SESSION['questions']['assetsSingle']['status']='current';
  }
}
## finances - assets if single
elseif (is_Ready('assetsSingle')) {
  $_SESSION['questions']['assetsSingle']['status']='answered';
  if ($_SESSION['maritalStatus']==='Single' && $_SESSION['assetsSingle']==='Yes'){
    $_SESSION['eligibleAssets']='No'; // GO TO RESULTS ????
  } else {
    $_SESSION['eligibleAssets']='Yes';
  }
  $_SESSION['questions']['shelterType']['status']='current';
}
## finances - assets if married
elseif (is_Ready('assetsMarried')) {
  $_SESSION['questions']['assetsMarried']['status']='answered';
  if ($_SESSION['maritalStatus']==='Married' && $_SESSION['assetsMarried']==='Yes'){
    $_SESSION['eligibleAssets']='No'; // GO TO RESULTS ????
  } else {
    $_SESSION['eligibleAssets']='Yes';
  }
  $_SESSION['questions']['shelterType']['status']='current';
}
## housing - shelter type
elseif (is_Ready('shelterType')) {
  $_SESSION['questions']['shelterType']['status']='answered';
  if ($_SESSION['shelterType']==='Institutional') {
    $_SESSION['questions']['shelterType']['status']='current'; // GO TO RESULTS
  } else {
    $_SESSION['questions']['housingCost']['status']='current';
  }
}
## housing - housing cost
elseif (is_Ready('housingCost')) {
  $_SESSION['housingCost'] = filter_var($_GET['housingCost'], FILTER_VALIDATE_INT,array('options'=>array('min_range'=>0)));
  if (empty($_SESSION['housingCost']) && $_SESSION['housingCost'] !== 0){
    $_SESSION['errors']['housingCost'] = 'Please enter a valid dollar amount (0 is OK)';
    $_SESSION['housingCost'] = $_GET['housingCost'];
  } else {
    $_SESSION['questions']['housingCost']['status']='answered';
    $_SESSION['questions']['heatingCost']['status']='current';
  }
}
## housing - heating cost
elseif (is_Ready('heatingCost')) {
  $_SESSION['heatingCost'] = filter_var($_GET['heatingCost'], FILTER_VALIDATE_INT,array('options'=>array('min_range'=>0)));
  if (empty($_SESSION['heatingCost']) && $_SESSION['heatingCost'] !== 0){
    $_SESSION['errors']['heatingCost'] = 'Please enter a valid dollar amount (0 is OK)';
    $_SESSION['heatingCost'] = $_GET['heatingCost'];
  } else {
    $_SESSION['questions']['heatingCost']['status']='answered';
    $_SESSION['questions']['heatingCost']['status']='current'; // GO TO RESULTS
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
  $futureCutoff = new DateTime('+10 years');
  $pastCutoff = new DateTime('-100 years');
  //fix unix epoch problems with years befor 1970. Any date that comes up 10 years from now, will be set to 1900 version
  if ($date >= $futureCutoff) { $date->modify('-100 years');}
  if ($date > $futureCutoff || $date < $pastCutoff ){
    $_SESSION['errors'][$dateName] = 'Outside reasonable date range';
  }
  $_SESSION[$dateName] = $date->format('m/d/Y');
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
      if (is_array($_SESSION[$wars[$name]['extraInputName']])) { // campaign checkboxes are in array
        foreach ($_SESSION[$wars[$name]['extraInputName']] as $value) {
          if ( $value === $wars[$name]['extraInputValue'] &&
            !( $serviceStart > $wars[$name]['end'] || $wars[$name]['begin'] > $serviceEnd) ) {
            // inverse of No overlap = overlap = wartime service
            return $name; //leave function because met wartime service threshold    }
          }
        }
      }
      else { //kdsm is not in array
        if ( $_SESSION[$wars[$name]['extraInputName']] === $wars[$name]['extraInputValue'] &&
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
  elseif ( is_Wartime($serviceStart,$serviceEnd) && ($_SESSION['serviceDays'] >= $wartimeMin->d) ){
    Return '>=90 days Active Duty, at least 1 during wartime';
  }
  elseif ( $_GET['purpleHeart']   === "Yes" ||
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
function radio_Router($question, $arrayOfPairs){
  $_SESSION['questions'][$question]['status'] = 'answered';
  foreach ($arrayOfPairs as $answer => $nextQuestion) {
    if ($_SESSION[$question] === $answer) {
      $_SESSION['questions'][$nextQuestion]['status'] = 'current';
    }
  }
}
?>