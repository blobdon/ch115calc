<?php
$_SESSION['questions'] = array(
  'service'           => array('status' => 'current', 'filename' => 'service.php', 'routing'=>array()),
  'purpleHeart'       => array('status' => 'none', 'filename' => 'purpleHeart.php',
                              'routing' => array('Yes'=>'vetReside','No'=>'serviceDisability')),
  'serviceDisability' => array('status' => 'none', 'filename' => 'serviceDisability.php', 'routing'=>array()),
  'kdsm'              => array('status' => 'none', 'filename' => 'kdsm.php', 'routing'=>array()),
  'campaigns'         => array('status' => 'none', 'filename' => 'campaigns.php', 'routing'=>array()),
  'serviceDeath'      => array('status' => 'none', 'filename' => 'serviceDeath.php', 'routing'=>array()),
  'vetReside'         => array('status' => 'none', 'filename' => 'vetReside.php', 'routing'=>array()),
  'vetResidePrior'    => array('status' => 'none', 'filename' => 'vetResidePrior.php', 'routing'=>array()),
  'vetReside3Years'   => array('status' => 'none', 'filename' => 'vetReside3Years.php', 'routing'=>array()),
  'maritalStatus'     => array('status' => 'none', 'filename' => 'maritalStatus.php', 'routing'=>array()),
  'liveWithSpouse'    => array('status' => 'none', 'filename' => 'liveWithSpouse.php', 'routing'=>array()),
  'children'          => array('status' => 'none', 'filename' => 'children.php', 'routing'=>array()),
  'earnedIncome'      => array('status' => 'none', 'filename' => 'earnedIncome.php', 'routing'=>array()),
  'otherIncome'       => array('status' => 'none', 'filename' => 'otherIncome.php', 'routing'=>array()),
  'otherBenefits'     => array('status' => 'none', 'filename' => 'otherBenefits.php', 'routing'=>array()),
  'payMedicareB'      => array('status' => 'none', 'filename' => 'payMedicareB.php', 'routing'=>array()),
  'assetsSingle'      => array('status' => 'none', 'filename' => 'assetsSingle.php', 'routing'=>array()),
  'assetsMarried'     => array('status' => 'none', 'filename' => 'assetsMarried.php', 'routing'=>array()),
  'shelterType'       => array('status' => 'none', 'filename' => 'shelterType.php', 'routing'=>array()),
  'housingCost'       => array('status' => 'none', 'filename' => 'housingCost.php', 'routing'=>array()),
  'heatingCost'       => array('status' => 'none', 'filename' => 'heatingCost.php', 'routing'=>array())
  );
$_SESSION['index'] = 0;
?>