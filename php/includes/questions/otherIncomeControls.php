  Include all income from:
<ul>
  <li>Rental property,</li>
  <li>VA benefits or VA pension</li>
  <li>Social Security, Social Security Disability, SSI</li>
  <li>Retirement income</li>
  <li>Unemployment, Worker's Compensation, sick-leave or long-term disability benefits</li>
</ul>
<span class='error'><?php echo isset($_SESSION['errors']['otherIncome']) ?$_SESSION['errors']['otherIncome']:'';?></span>
<br>
<div class='input-prepend input-append'>
  <span class='add-on'>$</span>
  <input type="text" name='otherIncome' id='otherIncome' class='span1'
  value='<?php echo isset($_SESSION['otherIncome'])?htmlspecialchars($_SESSION['otherIncome']):'';?>'>
  <span class='add-on'>per month</span>
  <button class='calc hide' type='button' id="otherIncomeCalcButton" class="btn">
    Calculator
  </button>
</div>
<div id='otherIncomeCalcContent' class='hide'>
  Under Construction
  <?php //include(dirname(__FILE__).'/includes/otherIncomeCalc.php'); ?>
</div>