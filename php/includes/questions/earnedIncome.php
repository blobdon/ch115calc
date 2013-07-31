<h4>What is your Total MONTHLY income from EMPLOYMENT, after taxes?</h4>
<div class='input-prepend input-append'>
  <span class='add-on'>$</span>
  <input type="text" name='applEarnedIncome' id='applEarnedIncome' class='span1'
  value='<?php echo isset($_SESSION['applEarnedIncome'])?htmlspecialchars($_SESSION['applEarnedIncome']):'';?>'>
  <span class='add-on'>per month</span>
  <button class='calc hide' type='button' id="earnedIncomeCalcButton" class="btn">
    Calculator
  </button>
</div>
<?php echo isset($_SESSION['errors']['applEarnedIncome'])?$_SESSION['errors']['applEarnedIncome']:''; ?>

<div id='earnedIncomeCalcContent' class='hide'>
  Under Construction
  <?php //include(dirname(__FILE__).'/includes/earnedIncomeCalc.php'); ?>
</div>