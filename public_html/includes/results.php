<?php
//  Overall eligibility
if ($_SESSION['eligibleService'] === "No" || $_SESSION['eligibleResidence'] === "No" || $_SESSION['eligibleAssets'] === "No" || $_SESSION['eligibleDep']==='No') {
  $_SESSION['eligibleAll'] = 'No';
} else {
  $_SESSION['eligibleAll'] = 'Yes';
}
?>
<div class='row'>
<div class='span11'>
  <h2>Based on your answers above, you might<?php echo $_SESSION['eligibleAll']==='No'?' NOT':'';?> be eligible for Chapter 115 financial assistance.<i class='icon-exclamation-sign'></i></h2>
</div>
</div>
<?php if ($_SESSION['eligibleDep']==='No'):?>
  <div>
    <h4>It appears that you are not a type of Dependent eligible to receive this benefit.</h4>
    In order to be eligible, you must be one of the following:
    <ul>
      <li>Spouse of the veteran</li>
      <li>Widow or widower of the veteran</li>
      <li>Dependent parent of the veteran</li>
      <li>Any person who acted as a parent to the veteran for five years immediately preceding the commencement of the veteran's wartime service</li>
      <li>Child of the veteran until his or her 19th birthday</li>
      <li>Child of the veteran between 19 years and 23 years of age while the child is attending high school, an institution of higher learning or some other accredited educational institution provided that the applicant is in receipt of benefits under the provisions of M.G.L. c. 115</li>
      <li>Child of the veteran 19 years of age or older who is mentally or physically unable to support himself or herself and was affected by the disability prior to his or her 18th birthday</li>
      <li>Legally adopted child of the veteran</li>
    </ul>
  </div>
<?php elseif ($_SESSION['eligibleService']==='No'):?>
  <div>
    <h4>It appears that <?php echo $_SESSION['applicant']==='Dependent'?"the Veteran's":'your';?> service does not meet the eligibility standards for this benefit.</h4>
    In order to be eligible, <?php echo $_SESSION['applicant']==='Dependent'?"the Veteran's":'your';?> active service must meet one of the following:
    <ul>
      <li>Minimum of 180 days service during peacetime, <b>OR</b></li>
      <li>Minimum of 90 days service, at least one day during wartime, <b>OR</b></li>
      <li>Merchant Marine service in armed conflict between December 7, 1941 and December 31, 1946, with honorable discharge from the U.S. Coast Guard, Army, or Navy, <b>OR</b></li>
      <li>Any of these exceptions to minimum days requirement:</li>
        <ul>
          <li>Purple Heart</li>
          <li>Service-Connected Disability</li>
          <li>Service-Related Death</li>
        </ul>
    </ul>
  </div>
<?php elseif ($_SESSION['eligibleResidence']==='No'):?>
  <h4>It appears that you have not met the residence requirements for this benefit.</h4>
  <?php if ($_SESSION['submit']==='vetReside'):?>
    <?php echo $_SESSION['applicant']==='Dependent'?'Both you and the Veteran':'You';?> must be living in Massachusetts to be eligible for this benefit.
  <?php elseif ($_SESSION['submit']==='vetReside3Years'):?>
    For a DEPENDENT to be eligible, one of the following must be true:
    <ul>
      <li>Veteran lived in Massachusetts when they entered active service, <b>OR</b></li>
      <li>Both the Veteran and Dependent have lived in Massachusetts continuously for at least 3 years</li>
    </ul>
  <?php endif; ?>
  You must continue to live in Massachusetts in order to continue receiving this benefit
<?php else :?>
  <?php require_once(dirname(__FILE__).'/resultsCalc.php');?>
  <?php if ($_SESSION['eligibleAssets']==='No'):?>
  <h4>Your current assets are above the maximum allowable for this need-based benefit.</h4>
  <p>Once your assets fall below <?php echo $_SESSION['maritalStatus']==='Single'?'$3200':"7000";?>, if everything else remains the same, you may be eligible for the estimated benefit detailed below.</p>
  <?php endif; ?>
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
        <td>Total Needs</td>
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
</div>
<div class='span5 well' id='discretionaryFaults'>
  <h4>You <em>may</em> be denied this benefit for the following reasons:</h4>
  <ul>
    <li>Conviction of some crimes</li>
    <li>Failure to support your dependents</li>
    <li>Voluntary unemployment</li>
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
<?php endif; ?>
<div class='row'>
<div class='span9'>
  <h2>You may also be eligible for:</h2>
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
<div class='alert alert-info'>
  <i class='icon-exclamation-sign'></i>This in only an estimate, a final determination of your benefits can only be made by the Department of Veteran's Services. You must apply through your local Veterans' Service Officer (VSO).
</div>
