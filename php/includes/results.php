<?php
#
#  6 - RESULTS CALCULATION
#
//make sure calling from correct file - DIR is from calling script, in this case already in /inlcudes
require_once(dirname(__FILE__).'/resultsCalc.php');
?>
<div class='row'>
<div class='span8'>
  <h3>Based on your answers above, you might<?php echo $_SESSION['eligibleAll']==='No'?' NOT':'';?> be eligible for Chapter 115 financial assistance.<i class='icon-exclamation-sign'></i></h3>
</div>
</div>

<div class='row'>
<div class='span8 hide' id='serviceResults'>
	<h4>Veteran's service</h4>
	<?php

	 echo $_SESSION["serviceStart"]." - ".$_SESSION["serviceEnd"]." is ".$_SESSION["serviceDays"]." days of service";
  //     	echo '<div class="span8">'.(is_Eligible_Service($serviceStart,$serviceEnd) ?
  //         'This service meets the MA definition of veteran.<br>'.is_Eligible_Service($serviceStart,$serviceEnd)
  //         : ' This service DOES NOT meet the MA definition of veteran.<br>
  //         <i class="icon-remove"></i> (>=180 days Active Duty)<br>
  //         <i class="icon-remove"></i> (>=90 days Active Duty, at least 1 during wartime)<br>
  //         <i class="icon-remove"></i> (Less days than required, but Purple Heart, Service-Connected Disbility, or Service Death'
  //       ).'</div><br>';

//   if ($_SESSION['index'] === count($_SESSION['form'])) {

  ?>
</div>
</div>

<div class='row'>
<div class='span5 offset1' id='budgetResults'>
  <h4>Estimated Benefit Calculation</h4>


  <table class='table table-condensed'>
    <thead>
      <tr>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Personal Allowance</td>
        <td>+ $ <?php echo $personalAllowance;?></td>
      </tr>
      <tr class=''>
        <td><?php echo $children;?> child(ren)</td>
        <td>+ $ <?php echo $childAllowance;?></td>
      </tr>
      <tr>
        <td><?php echo $numREBA;?> REBA allowance(s)</td>
        <td>+ $ <?php echo $REBA;?></td>
      </tr>
      <tr>
        <td><?php echo $numMedicareAllowance;?> Medicare allowance(s)</td>
        <td>+ $ <?php echo $medicareAllowance;?></td>
      </tr>
      <tr>
        <td>Fuel allowance</td>
        <td>+ $ <?php echo $fuelAllowance;?></td>
      </tr>
      <tr>
        <td>Shelter Allowance</td>
        <td>+ $ <?php echo $shelterAllowance;?></td>
      </tr>
      <tr class='total'>
        <td>Total budget</td>
        <td>= $ <?php echo $budget;?></td>
      </tr>
              <tr>
        <td>Total Income (less 200 as work incentive)</td>
        <td>- $ <?php echo $totalIncome;?></td>
      </tr>
      <tr class='total <?php echo $_SESSION['eligibleAll']==='Yes'?'success':'error';?>'
          <?php echo ($benefitsPayable>0 && $_SESSION['eligibleAll']==='No')?'style="text-decoration:line-through"':'';?> >
        <td><b>Approximate monthly benefit</b></td>
        <td><b>= $ <?php echo money_format('%.2n', $benefitsPayable);?></b></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
  <div class='row'>
  <div class='well alert alert-info'>
    <i class='icon-exclamation-sign'></i>This in only an estimate, a final determination of your benefits can only be made by the Department of Veteran's Services. You must apply through your local Veterans' Service Officer (VSO).
  </div>
  </div>

</div>
</div>

<div class='row'>
<div class='span8' id='discretionaryFaults'>
  <h4>You <em>may</em> be denied this benefit for the following reasons:</h4>
    <span class='help-block'>If you are denied the benefit for any of these reasons, remember that you have to right to appeal the decision. Contact us if you need assistance with your appeal.</span>
  <ul>
    <li>Conviction of some crimes</li>
    <li>Failure to support your dependents</li>
    <li>Voluntary unemployemnt</li>
    <li>Continuous "unwholesome habits"</li>
    <li>Need is based solely on your willful acts</li>
    <li>Dishonorably discharged from a national soldiers'/sailors home</li>
    <li>Dishonorably discharged from a Massachusetts soldiers' home</li>
  </ul>

</div>
</div>

<div class='row'>
<div class='span8' id='medOnlyResults'>

</div>
</div>

<div class='row'>
<div class='span8' id='additionalBenefitsResults'>
  <h4>You may also be eligible for these other benefits:</h4>
  <!-- Payments in cases of 100% disability or service death -->
  <!-- welcome home payments based on wartime service -->
</div>
</div>
