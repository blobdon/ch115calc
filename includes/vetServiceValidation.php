<?php
  // error_reporting(E_ALL);
  // ini_set('display_errors', 'On');
$_SESSION['test'] = dirname(__FILE__).'/includes/test';
#
# service date Validation and modification for unix epoch
#      - would like to rework this to consitently use dateTime object, currently saves back to string in session
#
service_Date_Validate('serviceStart'); //valid date, proper format, +10, -100 years
service_Date_Validate('serviceEnd'); //valid date, proper format, +10, -100 years
// if both valid dates, check if end before beginning
if (empty($_SESSION['errors']['serviceStart']) && empty($_SESSION['errors']['serviceEnd']) ) {
	$_SESSION['test'] = new DateTime($_SESSION['serviceStart']);
	$serviceStart = new DateTime($_SESSION['serviceStart']);
	$serviceEnd = new DateTime($_SESSION['serviceEnd']);
 	if ($serviceEnd <= $serviceStart) {
    	$_SESSION['errors']['serviceStart'] = 'Ended before Began';
    	$_SESSION['errors']['serviceEnd'] = 'Ended before Began';
 	}
}
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
//Service eligibility
if ((empty($_SESSION['errors']['serviceStart']) && empty($_SESSION['errors']['serviceEnd']) )) {
	$_SESSION['serviceDays'] = date_diff($serviceStart, $serviceEnd)->days;
	if ( is_Wartime($serviceStart, $serviceEnd) ) {
		$_SESSION['serviceEra'] = is_Wartime($serviceStart,$serviceEnd);
	} else {
		$_SESSION['serviceEra'] = 'Peacetime';
	}
	if (is_Eligible_Service($serviceStart,$serviceEnd)) {
		$_SESSION['eligibleService'] = is_Eligible_Service($serviceStart,$serviceEnd);
	} else {
		$_SESSION['eligibleService'] = 'No';
	}
}
// if eligible without detailed questions, make those not required (clear their errors)
if (is_Eligible_Service($serviceStart,$serviceEnd)) {
	$_SESSION['errors']['kdsm'] = '';
	$_SESSION['errors']['purpleHeart'] = '';
	$_SESSION['errors']['serviceDisability'] = '';
	$_SESSION['errors']['serviceDeath'] = '';
}
//!!!!!!!!!!! need to add disqualifier for discharge type, but clarify first.
// End of service validation
#
#  Service Calculations
#
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
				return $name; //leave function because met wartime service threshold		}
			}
		}
		else { // extra input needed to meet threshold
			if (is_array($_GET[$wars[$name]['extraInputName']])) { // campaign checkboxes are in array
				foreach ($_GET[$wars[$name]['extraInputName']] as $value) {
					if ( $value === $wars[$name]['extraInputValue'] &&
						!( $serviceStart > $wars[$name]['end'] || $wars[$name]['begin'] > $serviceEnd) ) {
						// inverse of No overlap = overlap = wartime service
						return $name; //leave function because met wartime service threshold		}
					}
				}
			}
			else { //kdsm is not in array
				if ( $_GET[$wars[$name]['extraInputName']] === $wars[$name]['extraInputValue'] &&
					!( $serviceStart > $wars[$name]['end'] || $wars[$name]['begin'] > $serviceEnd) ) {
					// inverse of No overlap = overlap = wartime service
					return $name; //leave function because met wartime service threshold		}
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
?>