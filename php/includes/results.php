<?php
#
#  6 - RESULTS CALCULATION
#
//make sure calling from correct file - DIR is from calling script, in this case already in /inlcudes
require_once(dirname(__FILE__).'/resultsCalc.php');
?>
<div class='row'>
<div class='span11'>
  <h3>Based on your answers above, you might<?php echo $_SESSION['eligibleAll']==='No'?' NOT':'';?> be eligible for Chapter 115 financial assistance.<i class='icon-exclamation-sign'></i></h3>
</div>
</div>


<div class='row'>
<div class='span5 well' id='budgetResults'>
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
  <hr>
  <div class='alert alert-info'>
    <i class='icon-exclamation-sign'></i>This in only an estimate, a final determination of your benefits can only be made by the Department of Veteran's Services. You must apply through your local Veterans' Service Officer (VSO).
  </div>

</div>
<!-- </div> -->

<!-- <div class='row'> -->
<div class='span5 well' id='discretionaryFaults'>
  <h4>You <em>may</em> be denied this benefit for the following reasons:</h4>
  <ul>
    <li>Conviction of some crimes</li>
    <li>Failure to support your dependents</li>
    <li>Voluntary unemployemnt</li>
    <li>Continuous "unwholesome habits"</li>
    <li>Need is based solely on your willful acts</li>
    <li>Dishonorably discharged from a national soldiers'/sailors' home</li>
    <li>Dishonorably discharged from a Massachusetts soldiers' home</li>
  </ul>
  <span class='help-block'>If you are denied the benefit for any of these reasons, remember that you have to right to appeal the decision. Contact us if you need assistance with your appeal.</span>
</div>
<div class='span5 well'>
  <h4>You have a right to appeal.</h4>
  <p>If you have applied for this benefit through your local VSO, but feel that you did not receive the correct determination from them, remember that you have the right to appeal the decision. Initial determinations have been modified or reversed on appeal. We are available to aid you in your appeal.</p>
</div>
</div>

<div class='row'>
<div class='span8' id='medOnlyResults'>

</div>
</div>

<div class='row'>
<div class='span9'>
  <h3>You may also be eligible for:</h3>
  <div class='row'>
    <div class='span4 well'>
      <b>Bonuses (single payment $100 - $1000)</b><br>
      To VETERAN if:
      <ul>
        <li>Lived in MA when entered service</li>
        <li>Active service:</li>
        <ul>
          <li><a href='http://www.mass.gov/veterans/benefits-and-services/bonus/bonuses-only/bonus.html'>Since Sep 11, 2001 ($500-1000)</a></li>
            <ul>
              <li>50% for subsequent deployments</li>
            </ul>
          <li><a href='http://www.mass.gov/veterans/benefits-and-services/bonus/bonuses-only/persian-gulf-war.html'>Persian Gulf War ($300-500)</a></li>
          <li><a href='http://www.mass.gov/veterans/benefits-and-services/bonus/bonuses-only/vietnam-war.html'>Vietnam War ($200-300)</a></li>
          <li><a href='http://www.mass.gov/veterans/benefits-and-services/bonus/bonuses-only/korean-war.html'>Korean War ($100-300)</a></li>
          <li><a href='http://www.mass.gov/veterans/benefits-and-services/bonus/bonuses-only/world-war-ii.html'>WWII ($100-300)</a></li>
        </ul>
      </ul>
      To FAMILY if:
      <ul>
        <li>Veteran qualified above</li>
        <li>Veteran deceased</li>
      </ul>      
    </div>
    <div class='span4 well'>
      <b>Annuity ($2000 each year)</b><br>
      To VETERAN if:
      <ul>
        <li>Met service requirement above <b>AND</b></li> <!-- ONLY SHOW THIS DIV IF THEY MEET SERVICE REQ -->
        <li>Other than dishonorable discharge <b>AND</b></li>
        <li>MA resident <b>AND</b></li>
        <li>Service-connected Blindness, paraplegia, double amputation, or 100% disability rating</li>
      </ul>
      To PARENT and SPOUSE of Deceased Veteran if:
      <ul>
        <li>Service-connected death</li>
        <li>Parent/Spouse is MA resident</li>
        <li>Spouse is not remarried</li>
      </ul>
    </div>
  </div>
</div>
</div>
