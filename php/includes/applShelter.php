
<div class='row'>
<div class='span8 question <?php echo !empty($_SESSION['errors']['applShelterType']) ? 'alert-error' : '';?>'> <!-- Housing -->
  <h4>Select the option that best describes your housing situation:</h4>
  <div class='span8'>
    <input type='radio' name='applShelterType' id='applShelterTypeInclude' value='Skipped' class='hide' checked>
    <label class="radio" for='applShelterTypeRent'>
      <input type='radio' name='applShelterType' id='applShelterTypeRent' value='Rent'
      <?php retain_Radio('applShelterType','Rent');?>>I rent
    </label>
    <label class="radio" for='applShelterTypeMortgage'>
      <input type='radio' name='applShelterType' id='applShelterTypeMortgage' value='Mortgage'
      <?php retain_Radio('applShelterType','Mortgage');?>>I pay a mortgage
    </label>
    <label class="radio" for='applShelterTypeOwn'>
      <input type='radio' name='applShelterType' id='applShelterTypeOwn' value='Own'
      <?php retain_Radio('applShelterType','Own');?>>I own my home mortgage-free
    </label>
    <label class="radio" for='applShelterTypeIns'>
      <input type='radio' name='applShelterType' id='applShelterTypeIns' value='Institutional'
      <?php retain_Radio('applShelterType','Institutional');?>>
      I am an 
      <abbr title='examples include someone living in a homeless shelter, hospital, nursing home, Soldier&apos;s Home at Chelsea or Holyoke, U.S. Department of Veterans Affairs residential home, or other facility at which the person receives shelter, food and other services for free'>
      institutional resident
      </abbr>
    </label>
    <label class="radio" for='applShelterTypeTrans'>
      <input type='radio' name='applShelterType' id='applShelterTypeTrans' value='Transitional'
      <?php retain_Radio('applShelterType','Transitional');?>>
      I am living in
      <abbr title='an example would be someone who lives in a facility where residents pay for shelter or food and they return to the same bed each night'>
      transitional housing
      </abbr>
    </label>
  </div>
</div>
</div>

<div class='row'>
<div class='span8 question <?php echo !empty($_SESSION['errors']['applHousingCost']) ? 'alert-error' : '';?>'>
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
    <input type="text" name='applHousingCost' id='applHousingCost' class='span1'
    value='<?php echo isset($_SESSION['applHousingCost'])?htmlspecialchars($_SESSION['applHousingCost']):'';?>'>
    <span class='add-on'>per month</span>
    <button class='calc hide' type='button' id="housingCalcButton" class="btn">
      Calculator
    </button>
  </div>
  <?php echo isset($_SESSION['errors']['applHousingCost'])?$_SESSION['errors']['applHousingCost']:''; ?>
</div>

<div id='housingCalcContent' class='hide'>
    Under Construction
  <?php //include(dirname(__FILE__).'/includes/housingCalc.php'); ?>
</div>
</div>

<div class='row'>
<div class='span8 question <?php echo !empty($_SESSION['errors']['applHeatingCost']) ? 'alert-error' : '';?>'>
  <h4>If you pay the costs of heating the dwelling where you live, list the MONTHLY amount here.</h4>
  <div class='help-block'>
    If you do not pay for heating, leave this value as 0 (zero).
  </div>
  <div class='input-prepend input-append'>
    <span class='add-on'>$</span>
    <input type="text" name='applHeatingCost' id='applHeatingCost' class='span1' 
            value='<?php echo isset($_SESSION['applHeatingCost'])?htmlspecialchars($_SESSION['applHeatingCost']):'';?>' >
    <span class='add-on'>per month</span>
  </div>
  <?php echo isset($_SESSION['errors']['applHeatingCost'])?$_SESSION['errors']['applHeatingCost']:''; ?>
</div>
</div>

<!--   <button class="btn btn-large btn-block btn-primary" type="submit" name ='results'>
    Check your eligibility &crarr;
  </button> -->