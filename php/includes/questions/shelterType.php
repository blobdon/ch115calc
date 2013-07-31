<h4>Select the option that best describes your housing situation:</h4>
<div class='span8'>
  <input type='radio' name='shelterType' id='shelterTypeInclude' value='Skipped' class='hide' checked>
  <label class="radio" for='shelterTypeRent'>
    <input type='radio' name='shelterType' id='shelterTypeRent' value='Rent'
    <?php retain_Radio('shelterType','Rent');?>>I rent
  </label>
  <label class="radio" for='shelterTypeMortgage'>
    <input type='radio' name='shelterType' id='shelterTypeMortgage' value='Mortgage'
    <?php retain_Radio('shelterType','Mortgage');?>>I pay a mortgage
  </label>
  <label class="radio" for='shelterTypeOwn'>
    <input type='radio' name='shelterType' id='shelterTypeOwn' value='Own'
    <?php retain_Radio('shelterType','Own');?>>I own my home mortgage-free
  </label>
  <label class="radio" for='shelterTypeIns'>
    <input type='radio' name='shelterType' id='shelterTypeIns' value='Institutional'
    <?php retain_Radio('shelterType','Institutional');?>>
    I am an 
    <abbr title='examples include someone living in a homeless shelter, hospital, nursing home, Soldier&apos;s Home at Chelsea or Holyoke, U.S. Department of Veterans Affairs residential home, or other facility at which the person receives shelter, food and other services for free'>
    institutional resident
    </abbr>
  </label>
  <label class="radio" for='shelterTypeTrans'>
    <input type='radio' name='shelterType' id='shelterTypeTrans' value='Transitional'
    <?php retain_Radio('shelterType','Transitional');?>>
    I am living in
    <abbr title='an example would be someone who lives in a facility where residents pay for shelter or food and they return to the same bed each night'>
    transitional housing
    </abbr>
  </label>
</div>