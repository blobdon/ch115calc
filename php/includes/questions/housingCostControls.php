<div class='row help-block'>
  <?php if ($_SESSION['shelterType']==='Rent'): ?>
    <div class='span4'>
      Enter your total rent payments for one month
    </div>
  <?php elseif ($_SESSION['shelterType']==='Mortgage'): ?>
    <div class='span4'>
      <b>Include all:</b>
      <ul>
        <li>Mortgage Principal and Interest</li>
        <li>Property Taxes (current and betterment)</li>
        <li>Water and Sewer charges</li>
        <li>Fire insurance premiums</li> 
        <li>Reasonable maintenance expense</li>
      </ul>
    </div>
  <?php elseif ($_SESSION['shelterType']==='Own'): ?>
    <div class='span4'>
      <b>Include all::</b>
      <ul>
        <li>Property Taxes (current and betterment)</li>
        <li>Water and Sewer charges</li>
        <li>Fire insurance premiums</li> 
        <li>Reasonable maintenance expense</li>
        <li>Related community association fees</li>
      </ul>
    </div>
  <?php endif; ?>
</div>
<span class='error'><?php echo isset($_SESSION['errors']['housingCost']) ?$_SESSION['errors']['housingCost']:'';?></span>
<br>
<div class='input-prepend input-append'>
  <span class='add-on'>$</span>
  <input type="text" name='housingCost' id='housingCost' class='span1'
  value='<?php echo isset($_SESSION['housingCost'])?htmlspecialchars($_SESSION['housingCost']):'';?>'>
  <span class='add-on'>per month</span>
  <button class='calc hide' type='button' id="housingCalcButton" class="btn">
    Calculator
  </button>
</div>
<div id='housingCalcContent' class='hide'>
    Under Construction
  <?php //include(dirname(__FILE__).'/includes/housingCalc.php'); ?>
</div>