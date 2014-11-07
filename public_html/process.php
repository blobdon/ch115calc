<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
ob_start();
#
# if submitted via Reset button - resets session and returns to begin page
#
if (isset($_GET['reset'])){
  session_destroy();
  session_start();
  session_unset();
  session_regenerate_id(true);
  header("Location: index.php"); /* Redirect browser */
  exit(0);
}
#
# submitted via begin button - resets session and moves to first question
#
elseif (isset($_GET['begin'])) { //if coming from Begin/Intro
  session_unset();                 //clear old session vars
  session_regenerate_id(true);     //new session id, clear old
  $_SESSION['current']='applicant';
  $_SESSION['eligibleDep']='No';
  $_SESSION['eligibleService']='No';
  $_SESSION['eligibleResidence']='No';
  $_SESSION['eligibleAssets']='No';
  $_SESSION['eligibleAll']='No';
  header("Location: index.php"); /* Redirect browser */
  exit(0);
}
#
# submitted edit button on previous question
#
elseif (isset($_GET['edit'])) {
  $position = array_search($_GET['edit'], $_SESSION['answered']);
  $_SESSION['position'] = $position;
  if ($position !== False) {
    array_splice($_SESSION['answered'], $position);
  }
  $_SESSION['current'] = $_GET['edit'];
  header("Location: index.php#spot"); /* Redirect browser to question */
  exit(0);
}
#
# submitted from any input forms - runs validation and navigates appropriately
#
elseif (isset($_GET['submit'])) {
#
#  Entry Validation for all forms
#
//save submitted values to SESSION
foreach ($_GET as $name => $value) {
  $_SESSION[$name] = $value;
}
// clear previous error - new errors checked within each
unset($_SESSION['errors']);
## veteran or dependent - applicant.php
if ($_GET['submit']==='applicant') {
  if (isset($_SESSION['applicant'])) {
    $_SESSION['answered'][]='applicant';
    if ($_SESSION['applicant']==='Veteran') {
      $_SESSION['eligibleDep']='Not Applicable';
      $_SESSION['current']='branch';
    } else {
      $_SESSION['current']='depType';
    }
  }
    else {$_SESSION['errors']['applicant']='Please select VETERAN or DEPENDENT';}
}
## type of dependent - depType.php
elseif ($_GET['submit']==='depType') {
  if (isset($_SESSION['depType'])) {
      $_SESSION['answered'][]='depType';
      if ($_SESSION['depType']==='Other') {
          $_SESSION['eligibleDep'] = 'No';
          $_SESSION['current']='results';
      } else {
          $_SESSION['eligibleDep'] = 'Yes'; // Need to add questions for children (age, school, disabled)
          $_SESSION['current']='branch';
          if ($_SESSION['depType']==='Spouse') {$_SESSION['maritalStatus']='Married';} //must be true, dont ask again
      }
    } else {$_SESSION['errors']['depType']='Please select the option that best describes your relation to the Veteran';}
}
## branch of service - branchX.php
elseif ($_GET['submit']==='branch') {
  if (isset($_SESSION['branch'])) {
    $_SESSION['answered'][]='branch';
    if ($_SESSION['branch']==="Merchant Marine") {
      $_SESSION['current']='merchMarineConflict';
    } else {
      $_SESSION['current']='serviceDays';
    }
  } else {$_SESSION['errors']['branch']='Please select branch of service';}
}
## days of service - serviceDaysX.php
elseif ($_GET['submit']==='serviceDays') {
  if (isset($_SESSION['serviceDays'])) {
    $_SESSION['answered'][]='serviceDays';
    if ($_SESSION['serviceDays']==="180 days or more") {
      $_SESSION['eligibleService']='Yes';
      $_SESSION['current']='discharge';
    } elseif ($_SESSION['serviceDays']==="90 to 179 days") {
      $_SESSION['current']='wartime';
    } elseif ($_SESSION['serviceDays']==="1 to 89 days") {
      $_SESSION['current']='purpleHeart';
    }
  } else {$_SESSION['errors']['serviceDays']='Please select days of service';}
}
## wartime service - wartimeX.php
elseif ($_GET['submit']==='wartime') {
  if (isset($_SESSION['wartime'])) {
    $_SESSION['answered'][]='wartime';
    if ($_SESSION['wartime']==="Yes") {
      $_SESSION['eligibleService']='Yes';
      $_SESSION['current']='discharge';
    } elseif ($_SESSION['wartime']==="No") {
      $_SESSION['current']='kdsm';
    } 
  } else {$_SESSION['errors']['wartime']='Please select Yes or No';}
}
## discharge - dischargeX.php
elseif ($_GET['submit']==='discharge') {
  if (isset($_SESSION['discharge'])) {
    $_SESSION['answered'][]='discharge';
    if ($_SESSION['discharge']==="Dishonorable") {
      $_SESSION['eligibleService']='No';
      $_SESSION['current']='results';
    } else { $_SESSION['current']='vetReside';} 
  } else {$_SESSION['errors']['discharge']='Please select the type of discharge received';}
}
## kdsm - kdsmX.php
elseif ($_GET['submit']==='kdsm') {
  if (isset($_SESSION['kdsm'])) {
    $_SESSION['answered'][]='kdsm';
    if ($_SESSION['kdsm']==='Yes') {
      $_SESSION['eligibleService'] = 'Korean Defense Service Medal';
      $_SESSION['current']='vetReside';
    } else {
      $_SESSION['eligibleService'] = 'No';
      $_SESSION['current']='campaigns';
    }
  } else {$_SESSION['errors']['kdsm']='Please select YES or NO';}
}
## campaigns -campaignsX.php
//have to update session var for campaigns outside loop, doesnt update if empty on later submits
elseif ($_GET['submit']==='campaigns') {
  $_SESSION['answered'][]='campaigns';
  $_SESSION['campaigns'] = $_GET['campaigns'];
  if (is_array($_SESSION['campaigns'])) { // campaign checkboxes are in an array
    foreach ($_SESSION['campaigns'] as $value) {
      if (isset($value)) {
        $_SESSION['eligibleService'] = 'Campaign wartime service';
        $_SESSION['current'] = 'vetReside';
      } else {
        $_SESSION['current'] = 'purpleHeart';
      }
    }
  } else { $_SESSION['current'] = 'purpleHeart'; }
}
// ## service basics - service.php NOT CURRENTLY IN USE (replaced with seperate questions for each)
// elseif ($_GET['submit']==='service') {
//   #
//   # service date Validation and modification for unix epoch
//   #      - would like to rework this to consitently use dateTime object, currently saves back to string in session
//   if ($_SESSION['branch']==='blank') {
//     $_SESSION['errors']['branch']='Please select branch of service';
//   }
//   if ($_SESSION['discharge']==='blank') {
//     $_SESSION['errors']['discharge']='Please select the type of discharge received';
//   }
//   if (isset($_GET['serviceStart']) && isset($_GET['serviceEnd'])) {
//     service_Date_Validate('serviceStart'); //valid date, proper format, +10, -100 years
//     service_Date_Validate('serviceEnd'); //valid date, proper format, +10, -100 years
//     // if both valid dates, check if end before beginning
//     if (empty($_SESSION['errors']['serviceStart']) && empty($_SESSION['errors']['serviceEnd']) ) {
//       $serviceStart = new DateTime($_SESSION['serviceStart']);
//       $serviceEnd = new DateTime($_SESSION['serviceEnd']);
//       if ($serviceEnd <= $serviceStart) {
//         $_SESSION['errors']['serviceStart'] = 'Ended before Began';
//         $_SESSION['errors']['serviceEnd'] = 'Ended before Began';
//       }
//     }
//   }
//   if (empty($_SESSION['errors']['branch']) && empty($_SESSION['errors']['serviceStart']) && empty($_SESSION['errors']['serviceEnd']) && empty($_SESSION['errors']['discharge']) ) {
//     $_SESSION['answered'][]='service';
//     //Service eligibility
//     $_SESSION['serviceDays'] = date_diff($serviceStart, $serviceEnd)->days;
//     if ( is_Wartime($serviceStart, $serviceEnd) ) {
//       $_SESSION['serviceEra'] = is_Wartime($serviceStart,$serviceEnd);
//     } else {
//     $_SESSION['serviceEra'] = 'Peacetime';
//     }
//     if ($_SESSION['branch']==='Merchant Marine') {
//         if (is_Wartime($serviceStart,$serviceEnd)) {
//           $_SESSION['current']='merchMarineConflict';
//         } else {
//           $_SESSION['eligibleService'] = 'No';
//           $_SESSION['current']='results';
//         }
//     } else {
//       if (is_Eligible_Service($serviceStart,$serviceEnd)) {
//         $_SESSION['eligibleService'] = is_Eligible_Service($serviceStart,$serviceEnd);
//         $_SESSION['current']='vetReside';
//       } else {
//         $_SESSION['eligibleService'] = 'No';
//         $_SESSION['current']='purpleHeart';
//       }
//     }
//   } // end of if no errors
// } // end of if service
## service details - purpleHeart
elseif ($_GET['submit']==='purpleHeart') {
  if (isset($_SESSION['purpleHeart'])) {
      $_SESSION['answered'][]='purpleHeart';
      if ($_SESSION['purpleHeart']==='Yes') {
          $_SESSION['eligibleService'] = 'Purple Heart';
          $_SESSION['current']='vetReside';
      } else {
          $_SESSION['eligibleService'] = 'No';
          $_SESSION['current']='serviceDisability';
      }
    } else {$_SESSION['errors']['purpleHeart']='Please select YES or NO';}
}
## service details - serviceDisability
elseif ($_GET['submit']==='serviceDisability') {
  if (isset($_SESSION['serviceDisability'])) {
    $_SESSION['answered'][]='serviceDisability';
    if ($_SESSION['serviceDisability']==='Yes') {
      $_SESSION['eligibleService'] = 'Service-Connected Disability';
      $_SESSION['current']='vetReside';
    } else {
      if ($_SESSION['applicant']==='Dependent') {
        $_SESSION['eligibleService'] = 'No';
        $_SESSION['current']='serviceDeath';
      } else {
        $_SESSION['eligibleService'] = 'No';
        $_SESSION['current']='results';
      }
    }
  } else {$_SESSION['errors']['serviceDisability']='Please select YES or NO';}
}
## service details - serviceDeath
elseif ($_GET['submit']==='serviceDeath') {
  if (isset($_SESSION['serviceDeath'])) {
    $_SESSION['answered'][]='serviceDeath';
    if ($_SESSION['serviceDeath']==='Yes') {
      $_SESSION['eligibleService'] = 'Death in service';
      $_SESSION['current']='vetReside';
    } else {
      $_SESSION['eligibleService'] = 'No';
      $_SESSION['current']='results';
    }
  } else {$_SESSION['errors']['serviceDeath']='Please select YES or NO';}
}
## service details - merchMarineConflict
elseif ($_GET['submit']==='merchMarineConflict') {
  if (isset($_SESSION['merchMarineConflict'])) {
    $_SESSION['answered'][]='merchMarineConflict';
    if ($_SESSION['merchMarineConflict']==='Yes') {
      $_SESSION['current']='merchMarineDischarge';
    } else {
      $_SESSION['current']='results';
    }
  } else {$_SESSION['errors']['merchMarineConflict']='Please select YES or NO';}
}
## service details - merchMarineDischarge
elseif ($_GET['submit']==='merchMarineDischarge') {
  if (isset($_SESSION['merchMarineDischarge'])) {
    $_SESSION['answered'][]='merchMarineDischarge';
    if ($_SESSION['merchMarineDischarge']==='Yes') {
      $_SESSION['eligibleService'] = 'Qualifying American Merchant Marine service';
      $_SESSION['current']='vetReside';
    } else {
      $_SESSION['eligibleService'] = 'No';
      $_SESSION['current']='results';
    }
  } else {$_SESSION['errors']['merchMarineDischarge']='Please select YES or NO';}
}
## residence - currently
elseif ($_GET['submit']==='vetReside') {
  //dependent applicant
  if ($_SESSION['applicant']==='Dependent') {
    if (isset($_SESSION['vetReside']) && isset($_SESSION['depReside'])) {
      $_SESSION['answered'][]='vetReside';
      if ($_SESSION['vetReside'] === 'Yes' && $_SESSION['depReside']==='Yes'){
        $_SESSION['current']='vetResidePrior';
      } else {
        $_SESSION['eligibleResidence']='No';
        $_SESSION['current']='results';
      }
    } else {
      if (!isset($_SESSION['vetReside'])) {
        $_SESSION['errors']['vetReside'] = 'Please select YES or NO for the VETERAN';
      }
      if (!isset($_SESSION['depReside'])) {
        $_SESSION['errors']['depReside'] = 'Please select YES or NO for yourself (DEPENDENT)';
      }
    }
  } 
  // veteran applicant
  elseif ($_SESSION['applicant']==='Veteran') {
    if (isset($_SESSION['vetReside'])) {
      $_SESSION['answered'][]='vetReside';
      if ($_SESSION['vetReside']==='Yes') {
        $_SESSION['eligibleResidence']='Yes';
        $_SESSION['current']='maritalStatus';
      } else {
        $_SESSION['eligibleResidence']='No';
        $_SESSION['current']='results';
      }      
    } else {
      $_SESSION['errors']['vetReside'] = 'Please select YES or NO';
    }
  }
}
## residence - prior to service
elseif ($_GET['submit']==='vetResidePrior') {
    if (isset($_SESSION['vetResidePrior'])) {
    $_SESSION['answered'][]='vetResidePrior';
    if ($_SESSION['vetResidePrior']==='Yes') {
      $_SESSION['eligibleResidence'] = 'Yes';
      if ($_SESSION['depType']==='Spouse') {
        $_SESSION['current']='liveWithSpouse';
      } else {
        $_SESSION['current']='maritalStatus';
      }
    } else {
      $_SESSION['current']='vetReside3Years';
    }
  } else {
    $_SESSION['errors']['vetResidePrior'] = 'Please select YES or NO';
  }
}
## residence - 3 years continuous
elseif ($_GET['submit']==='vetReside3Years') {
    //dependent applicant
  if ($_SESSION['applicant']==='Dependent') {
    if (isset($_SESSION['vetReside3Years']) && isset($_SESSION['depReside3Years'])) {
      $_SESSION['answered'][]='vetReside3Years';
      if ($_SESSION['vetReside3Years'] === 'Yes' && $_SESSION['depReside3Years']==='Yes'){
        $_SESSION['eligibleResidence']='Yes';
        if ($_SESSION['depType']==='Spouse') {
          $_SESSION['current']='liveWithSpouse';
        } else {
          $_SESSION['current']='maritalStatus';
        }
      } else {
        $_SESSION['eligibleResidence']='No';
        $_SESSION['current']='results';
      }
    } else {
      if (!isset($_SESSION['vetReside3Years'])) {
        $_SESSION['errors']['vetReside3Years'] = 'Please select YES or NO for the VETERAN';
      }
      if (!isset($_SESSION['depReside3Years'])) {
        $_SESSION['errors']['depReside3Years'] = 'Please select YES or NO for yourself (DEPENDENT)';
      }
    }
  }
  // veteran applicant -- WONT BE ASKED THIS QUESTION
  // elseif ($_SESSION['applicant']==='Veteran') {
  //   if (isset($_SESSION['vetReside3Years'])) {
  //     $_SESSION['answered'][]='vetReside3Years';
  //     if ($_SESSION['vetReside3Years']==='Yes') {
  //       $_SESSION['eligibleReside3Yearsnce']='Yes';
  //       $_SESSION['current']='maritalStatus';
  //     } else {
  //       $_SESSION['eligibleReside3Yearsnce']='No';
  //       $_SESSION['current']='results';
  //     }      
  //   } else {
  //     $_SESSION['errors']['otherBenefits'] = 'Please select YES or NO';
  //   }
  // }
}
## family - marital status
elseif ($_GET['submit']==='maritalStatus') {
  if (isset($_SESSION['maritalStatus'])) {
    $_SESSION['answered'][]='maritalStatus';
    if ($_SESSION['maritalStatus']==='Married') {
      $_SESSION['current']='liveWithSpouse';
    } else {
      $_SESSION['current']='children';
    }
  } else {
    $_SESSION['errors']['maritalStatus'] = 'Please select MARRIED or SINGLE';
  }
}
## family - if married, live with spouse
elseif ($_GET['submit']==='liveWithSpouse') {
  if (isset($_SESSION['liveWithSpouse'])) {
    $_SESSION['answered'][]='liveWithSpouse';
    $_SESSION['current']='children';
  } else {
    $_SESSION['errors']['liveWithSpouse'] = 'Please select YES or NO';
  }
}
## family - children
elseif ($_GET['submit']==='children') {
  $_SESSION['children'] = filter_var($_GET['children'], FILTER_VALIDATE_INT,array('options'=>array('min_range'=>0)));
  if (empty($_SESSION['children']) && $_SESSION['children'] !== 0){
    $_SESSION['errors']['children'] = 'Please enter a valid number of children (eg 0,1,2...)';
    $_SESSION['children'] = $_GET['children'];
  } else {
    $_SESSION['answered'][]='children';
    $_SESSION['current']='earnedIncome';
  }
}
## finances - earned income
elseif ($_GET['submit']==='earnedIncome') {
  $_SESSION['earnedIncome'] = filter_var($_GET['earnedIncome'], FILTER_VALIDATE_INT,array('options'=>array('min_range'=>0)));
  if (empty($_SESSION['earnedIncome']) && $_SESSION['earnedIncome'] !== 0){
    $_SESSION['errors']['earnedIncome'] = 'Please enter a valid dollar amount (0 is OK)';
    $_SESSION['earnedIncome'] = $_GET['earnedIncome'];
  } else {
    $_SESSION['answered'][]='earnedIncome';
    $_SESSION['current']='otherIncome';
  }
}
## finances - other income
elseif ($_GET['submit']==='otherIncome') {
  $_SESSION['otherIncome'] = filter_var($_GET['otherIncome'], FILTER_VALIDATE_INT,array('options'=>array('min_range'=>0)));
  if (empty($_SESSION['otherIncome']) && $_SESSION['otherIncome'] !== 0){
    $_SESSION['errors']['otherIncome'] = 'Please enter a valid dollar amount (0 is OK)';
    $_SESSION['otherIncome'] = $_GET['otherIncome'];
  } else {
    $_SESSION['answered'][]='otherIncome';
    $_SESSION['current']='otherBenefits';
  }
}
## finances - other/REBA benefits
elseif ($_GET['submit']==='otherBenefits') {
  if ($_SESSION['maritalStatus']==='Married') {
    if (isset($_SESSION['otherBenefits']) && isset($_SESSION['spouseOtherBenefits'])) {
      $_SESSION['answered'][]='otherBenefits';
      $_SESSION['current']='payMedicareB';
    } else {
      if (!isset($_SESSION['otherBenefits'])) {
        $_SESSION['errors']['otherBenefits'] = 'Please select YES or NO';
      }
      if (!isset($_SESSION['spouseOtherBenefits'])) {
        $_SESSION['errors']['spouseOtherBenefits'] = 'Please select YES or NO for your SPOUSE';
      }
    }
  } elseif ($_SESSION['maritalStatus']==='Single') {
    if (isset($_SESSION['otherBenefits'])) {
      $_SESSION['answered'][]='otherBenefits';
      $_SESSION['current']='payMedicareB';
    } else {
      $_SESSION['errors']['otherBenefits'] = 'Please select YES or NO';
    }
  }
}
## finances - pay medicare B premiums
elseif ($_GET['submit']==='payMedicareB') {
  if ($_SESSION['maritalStatus']==='Married') {
    if (isset($_SESSION['payMedicareB']) && isset($_SESSION['spousePayMedicareB'])) {
      $_SESSION['answered'][]='payMedicareB';
      $_SESSION['current']='assetsMarried';
    } else {
      if (!isset($_SESSION['payMedicareB'])) {
        $_SESSION['errors']['payMedicareB'] = 'Please select YES or NO';
      }
      if (!isset($_SESSION['spousePayMedicareB'])) {
        $_SESSION['errors']['spousePayMedicareB'] = 'Please select YES or NO for your SPOUSE';
      }
    }
  } elseif ($_SESSION['maritalStatus']==='Single') {
    if (isset($_SESSION['payMedicareB'])) {
      $_SESSION['answered'][]='payMedicareB';
      $_SESSION['current']='assetsSingle';
    } else {
      $_SESSION['errors']['payMedicareB'] = 'Please select YES or NO';
    }
  }
}
## finances - assets if single
elseif ($_GET['submit']==='assetsSingle') {
  if (isset($_SESSION['assetsSingle'])) {
    $_SESSION['answered'][]='assetsSingle';
    if ($_SESSION['maritalStatus']==='Single' && $_SESSION['assetsSingle']==='Yes'){
      $_SESSION['eligibleAssets']='No'; // GO TO RESULTS ???? No, need to complete for spendown & medical
    } else {
      $_SESSION['eligibleAssets']='Yes';
    }
    $_SESSION['current']='shelterType';
  } else {
    $_SESSION['errors']['assetsSingle'] = 'Please select YES or NO';
  }
}
## finances - assets if married
elseif ($_GET['submit']==='assetsMarried') {
  if (isset($_SESSION['assetsMarried'])) {
    $_SESSION['answered'][]='assetsMarried';
    if ($_SESSION['maritalStatus']==='Married' && $_SESSION['assetsMarried']==='Yes'){
      $_SESSION['eligibleAssets']='No'; // GO TO RESULTS ???? No, need to complete for spendown & medical
    } else {
      $_SESSION['eligibleAssets']='Yes';
    }
    $_SESSION['current']='shelterType';
  } else {
    $_SESSION['errors']['assetsMarried'] = 'Please select YES or NO';
  }
}
## housing - shelter type
elseif ($_GET['submit']==='shelterType') {
  if (isset($_SESSION['shelterType'])) {
    $_SESSION['answered'][]='shelterType';
    if ($_SESSION['shelterType']==='Institutional') {
      $_SESSION['housingCost']=0;
      $_SESSION['heatingCost']=0;
      $_SESSION['current']='results'; // GO TO RESULTS ??? do not need housing/heating costs because = 0
    } else {
      $_SESSION['current']='housingCost';
    }
  } else {
    $_SESSION['errors']['shelterType'] = 'Please select your type of housing';
  }

}
## housing - housing cost
elseif ($_GET['submit']==='housingCost') {
  $_SESSION['housingCost'] = filter_var($_GET['housingCost'], FILTER_VALIDATE_INT,array('options'=>array('min_range'=>0)));
  if (empty($_SESSION['housingCost']) && $_SESSION['housingCost'] !== 0){
    $_SESSION['errors']['housingCost'] = 'Please enter a valid dollar amount (0 is OK)';
    $_SESSION['housingCost'] = $_GET['housingCost'];
  } else {
    $_SESSION['answered'][]='housingCost';
    $_SESSION['current']='heatingCost';
  }
}
## housing - heating cost
elseif ($_GET['submit']==='heatingCost') {
  $_SESSION['heatingCost'] = filter_var($_GET['heatingCost'], FILTER_VALIDATE_INT,array('options'=>array('min_range'=>0)));
  if (empty($_SESSION['heatingCost']) && $_SESSION['heatingCost'] !== 0){
    $_SESSION['errors']['heatingCost'] = 'Please enter a valid dollar amount (0 is OK)';
    $_SESSION['heatingCost'] = $_GET['heatingCost'];
  } else {
    $_SESSION['answered'][]='heatingCost';
    $_SESSION['current']='results'; // GO TO RESULTS
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
header("Location: index.php#spot"); /* Redirect browser */
exit(0);
// print('<pre>');
// echo 'Session ';
// print_r($_GET);
// print_r($_SESSION);
// print('</pre>');


ob_flush();
} // End of isset submit
#
#  FUNCTIONS - NO LONGER IN USE
#     switched to select dropdown of <90, 90-180, or >180 days. don't need date calculations
#     keep somewhere for use in date calculations if needed for form filling/checking results with detailed info
#
// // date validation for PHP >=5.3
// function service_Date_Validate($dateName){
//   date_default_timezone_set('America/New_York');
//   $date = DateTime::createFromFormat('m/d/Y', $_SESSION[$dateName]);
//   $date_errors = DateTime::getLastErrors();
//   if ($date_errors['warning_count'] + $date_errors['error_count'] > 0) {
//     $_SESSION['errors'][$dateName] = 'Invalid Date (format as mm/dd/yyyy)';
//     return;
//   }
//   $futureCutoff = new DateTime('+10 years');
//   $pastCutoff = new DateTime('-100 years');
//   //fix unix epoch problems with years befor 1970. Any date that comes up 10 years from now, will be set to 1900 version
//   if ($date >= $futureCutoff) { $date->modify('-100 years');}
//   if ($date > $futureCutoff || $date < $pastCutoff ){
//     $_SESSION['errors'][$dateName] = 'Date outside reasonable date range';
//   }
//   $_SESSION[$dateName] = $date->format('m/d/Y');
// }
// // check user service dates against MGL definition of veteran
// function is_Wartime($serviceStart, $serviceEnd){
//   //These dates reflect MGL c4 s7 cl43rd, as of 6/11/2013
//   // this array of wars is used by isWartime function
//   $wars = array(
//       'WWI' => array( begin => new DateTime('6-Apr-1917'), end => new DateTime('11-Nov-1918') ),
//       'WWII' => array( begin => new DateTime('16-Sep-1940'), end => new DateTime('25-Jul-1947') ),
//       'Korea' => array( begin => new DateTime('25-Jun-1950'), end => new DateTime('31-Jan-1955') ),
//       'Vetnam II' => array( begin => new DateTime('5-Aug-1964'), end => new DateTime('7-May-1975') ),
//       'Persian Gulf (currently ongoing according to MA)' => array( begin => new DateTime('2-Aug-1990'), end => new DateTime() ),
//       'Korea Defense Service Medal' => array( begin => new DateTime('28-Jul-1954'), end => new DateTime(), extraInputName => 'kdsm', extraInputValue => 'Yes' ),
//       'Lebanese Peacekeeping Force' => array( begin => new DateTime('25-Aug-1982'), end => new DateTime('1-Dec-1987'), extraInputName => 'campaigns', extraInputValue => 'Lcampaign' ),
//       'Grenada Rescue Mission' => array( begin => new DateTime('25-Oct-1983'), end => new DateTime('15-Dec-1983'), extraInputName => 'campaigns', extraInputValue => 'Gcampaign' ),
//       'Panamanian Intervention Force' => array( begin => new DateTime('20-Dec-1989'), end => new DateTime('31-Jan-1990'), extraInputName => 'campaigns', extraInputValue => 'Pcampaign' ),
//       'WWII Merchant Marine' => array( begin => new DateTime('7-Dec-1941'), end => new DateTime('31-Dec-1946'), extraInputName => 'branch', extraInputValue => 'Merchant Marine' )
//   );
//   // loop through war date ranges looking for overlap with service
//   foreach ($wars as $name => $property) {
//     //echo $name." ".$wars[$name]['begin']->format('m/d/Y')."-".$wars[$name]['end']->format('m/d/Y')."<br>";
//     if (empty($wars[$name]['extraInputName'])) { //No extra input needed to meet threshold
//       if ( !( $serviceStart > $wars[$name]['end'] || $wars[$name]['begin'] > $serviceEnd) ) {
//       // inverse of No overlap = overlap = wartime service
//         if ($_SESSION['branch']!=='Merchant Marine') {
//           return $name; //leave function because met wartime service threshold 
//         }
//       }
//     }
//     else { // extra input needed to meet threshold
//       if (is_array($_SESSION[$wars[$name]['extraInputName']])) { // campaign checkboxes are in an array
//         foreach ($_SESSION[$wars[$name]['extraInputName']] as $value) {
//           if ( $value === $wars[$name]['extraInputValue'] &&
//             !( $serviceStart > $wars[$name]['end'] || $wars[$name]['begin'] > $serviceEnd) ) {
//             // inverse of No overlap = overlap = wartime service
//             return $name; //leave function because met wartime service threshold    }
//           }
//         }
//       }
//       else { //kdsm and merchant marine are not in arrays, so I used different loop from campaigns 
//         if ( $_SESSION[$wars[$name]['extraInputName']] === $wars[$name]['extraInputValue'] &&
//           !( $serviceStart > $wars[$name]['end'] || $wars[$name]['begin'] > $serviceEnd) ) {
//           // inverse of No overlap = overlap = wartime service
//           return $name; //leave function because met wartime service threshold    }
//         }
//       }
//     }
//     // Did not meet threshold by three checks above = not wartime service.
//   }
// } // end of function isWartime
// // !!! Doesnt include disqualifiers yet
// function is_Eligible_Service($serviceStart, $serviceEnd){
//   $peacetimeMin = new DateInterval('P180D');
//   $wartimeMin = new DateInterval('P90D');
//   if ($_SESSION['branch']==='Merchant Marine') {
//     if ( is_Wartime($serviceStart,$serviceEnd) && ($_SESSION['merchMarineConflict']==='Yes') && ($_SESSION['merchMarineDischarge']==='Yes') ){
//       Return 'armed conflict as member of Merchant Marine, with discharge from CG, Army, or Navy';
//     }
//   } else {
//     if ($_SESSION['serviceDays'] >= $peacetimeMin->d) {
//       Return '>=180 days Active Duty';
//     }
//     elseif ( is_Wartime($serviceStart,$serviceEnd) && ($_SESSION['serviceDays'] >= $wartimeMin->d) ){
//       Return '>=90 days Active Duty, at least 1 during wartime';
//     }
//     elseif ( $_GET['purpleHeart']   === "Yes" || $_GET['serviceDisability'] === "Yes" || $_GET['serviceDeath'] === "Yes" ) {
//       Return 'Purple Heart, Service-Connected Disability, or Service Death';
//     }
//   }
// } //end of function is_Eligible_Service
?>