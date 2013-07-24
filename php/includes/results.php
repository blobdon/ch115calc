<?php
#
#  6 - RESULTS CALCULATION
#
  if ($_SESSION['index'] === 6 && !$_SESSION['hazError']) {
    //make sure calling from correct file - DIR is from calling script, in this case already in /inlcudes
    require_once(dirname(__FILE__).'/resultsCalc.php');
  }
?>
<div class='row'>
<div class='span8'>
  <hr>
  <h3>Based on your answers, you might<?php echo $_SESSION['eligibleAll']==='No'?' NOT':'';?> be eligible for Chapter 115 financial assistance.<i class='icon-exclamation-sign'></h3>
  <hr>
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
        <td>+ $ <?php echo $applPersonalAllowance;?></td>
      </tr>
      <tr class=''>
        <td><?php echo $applChildren;?> child(ren)</td>
        <td>+ $ <?php echo $applChildAllowance;?></td>
      </tr>
      <tr>
        <td><?php echo $numREBA;?> REBA allowance(s)</td>
        <td>+ $ <?php echo $applREBA;?></td>
      </tr>
      <tr>
        <td><?php echo $numMedicareAllowance;?> Medicare allowance(s)</td>
        <td>+ $ <?php echo $applMedicareAllowance;?></td>
      </tr>
      <tr>
        <td>Fuel allowance</td>
        <td>+ $ <?php echo $applFuelAllowance;?></td>
      </tr>
      <tr>
        <td>Shelter Allowance</td>
        <td>+ $ <?php echo $applShelterAllowance;?></td>
      </tr>
      <tr class='total'>
        <td>Total budget</td>
        <td>= $ <?php echo $applBudget;?></td>
      </tr>
              <tr>
        <td>Total Income (less 200 as work incentive)</td>
        <td>- $ <?php echo $applTotalIncome;?></td>
      </tr>
      <tr class='total <?php echo $_SESSION['eligibleAll']==='Yes'?'success':'error';?>' 
          <?php echo ($applBenefitsPayable>0 && $_SESSION['eligibleAll']==='No')?'style="text-decoration:line-through"':'';?> >
        <td><b>Approximate monthly benefit</b></td>
        <td><b>= $ <?php echo money_format('%.2n', $applBenefitsPayable);?></b></td>
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
<div class='span8' id='medOnlyResults'>

</div>
</div>
