<h4>Do you have a service-connected disability?</h4>
<div class='span8'>
  <input type='radio' name='serviceDisability' id='serviceDisabilityInclude' value='Skipped' class='hide' checked>
  <label class="radio" for='serviceDisability1'>
    <input type='radio' name='serviceDisability' id='serviceDisability1' value='Yes'
    <?php retain_Radio('serviceDisability','Yes');?>>
    YES, I have a service-connected disability
  </label>
  <label class="radio" for='serviceDisability0'>
    <input type='radio' name='serviceDisability' id='serviceDisability0' value='No'
    <?php retain_Radio('serviceDisability','No');?>>
    NO, I do not have a service-connected disability
   </label>
 </div>