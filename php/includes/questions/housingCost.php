<h4>How much are your MONTHLY housing costs?</h4>
<div class='row help-block'>
  <div class='span2'>
    <b>If you RENT, include:</b>
    <ul>
      <li>Rent Payment</li>
    </ul>
  </div>
  <div class='span3'>
    <b>If you pay a MORTGAGE, Include:</b>
    <ul>
      <li>Mortgage Principal and Interest</li>
      <li>Property Taxes (current and betterment)</li>
      <li>Water and Sewer charges</li>
      <li>Fire insurance premiums</li> 
      <li>Reasonable maintenance expense</li>
    </ul>
  </div>
  <div class='span3'>
    <b>If you OWN your home mortgage-free, include:</b>
    <ul>
      <li>Property Taxes (current and betterment)</li>
      <li>Water and Sewer charges</li>
      <li>Fire insurance premiums</li> 
      <li>Reasonable maintenance expense</li>
      <li>Related community association fees</li>
    </ul>
  </div>
</div>
<div class='input-prepend input-append'>
  <span class='add-on'>$</span>
  <input type="text" name='housingCost' id='housingCost' class='span1'
  value='<?php echo isset($_SESSION['housingCost'])?htmlspecialchars($_SESSION['housingCost']):'';?>'>
  <span class='add-on'>per month</span>
  <button class='calc hide' type='button' id="housingCalcButton" class="btn">
    Calculator
  </button>
</div>
<?php echo isset($_SESSION['errors']['housingCost'])?$_SESSION['errors']['housingCost']:''; ?>

<div id='housingCalcContent' class='hide'>
    Under Construction
  <?php //include(dirname(__FILE__).'/includes/housingCalc.php'); ?>
</div>