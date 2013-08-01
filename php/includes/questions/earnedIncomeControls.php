<div class='input-prepend input-append'>
  <span class='add-on'>$</span>
  <input type="text" name='earnedIncome' id='earnedIncome' class='span1'
  value='<?php echo isset($_SESSION['earnedIncome'])?htmlspecialchars($_SESSION['earnedIncome']):'';?>'>
  <span class='add-on'>per month</span>
  <button class='calc hide' type='button' id="earnedIncomeCalcButton" class="btn">
    Calculator
  </button>
</div>
<?php echo isset($_SESSION['errors']['earnedIncome'])?$_SESSION['errors']['earnedIncome']:''; ?>

<div id='earnedIncomeCalcContent' class='hide'>
  Under Construction
  <?php //include(dirname(__FILE__).'/includes/earnedIncomeCalc.php'); ?>
</div>