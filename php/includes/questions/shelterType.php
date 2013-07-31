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