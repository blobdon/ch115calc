<h4>What is your Total MONTHLY income from OTHER sources, after taxes?</h4>
  Include all income from:
<ul>
  <li>Rental property,</li>
  <li>VA benefits or VA pension</li>
  <li>Social Security, Social Security Disability, SSI</li>
  <li>Retirement income</li>
  <li>Unemployment, Worker's Compensation, sick-leave or long-term disability benefits</li>
</ul>
<div class='input-prepend input-append'>
  <span class='add-on'>$</span>
  <input type="text" name='applOtherIncome' id='applOtherIncome' class='span1'
  value='<?php echo isset($_SESSION['applOtherIncome'])?htmlspecialchars($_SESSION['applOtherIncome']):'';?>'>
  <span class='add-on'>per month</span>
  <button class='calc hide' type='button' id="otherIncomeCalcButton" class="btn">
    Calculator
  </button>
</div>
<?php echo isset($_SESSION['errors']['applOtherIncome'])?$_SESSION['errors']['applOtherIncome']:''; ?>

<div id='otherIncomeCalcContent' class='hide'>
  Under Construction
  <?php //include(dirname(__FILE__).'/includes/otherIncomeCalc.php'); ?>
</div>