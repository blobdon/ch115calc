
<div class='row'>
<!-- Vet's Mass residence -->
<div class='span8 question <?php echo !empty($_SESSION['errors']['vetReside']) ? 'alert-error' : '';?>'>
  <h4>Do you currently live in Massashusetts?</h4>
  <div class='span8'>
    <input type='radio' name='vetReside' id='vetResideInclude' value='Skipped' class='hide' checked>
    <label class="radio" for='vetReside1'>
      <input type='radio' name='vetReside' id='vetReside1' value='Yes'
      <?php retain_Radio('vetReside','Yes');?>>
      YES, I currently live in Massachusetts
      </label>
    <label class="radio" for='vetReside0'>
      <input type='radio' name='vetReside' id='vetReside0' value='No'
      <?php retain_Radio('vetReside','No');?>>
      NO, I do not live in Massachusetts
    </label>
  </div>
</div>
</div>

<div class='row hide'>
<div class='span8 question <?php echo !empty($_SESSION['errors']['vetResidePrior']) ? 'alert-error' : '';?>' id='vetResidePriorQ'>
  <h4>Did you live in Massachusetts when you began your active duty service?</h4>
  <div class='span8'>
    <input type='radio' name='vetResidePrior' id='vetResidePriorInclude' value='Skipped' class='hide' checked>
    <label class="radio" for='vetResidePrior1'>
      <input type='radio' name='vetResidePrior' id='vetResidePrior1' value='Yes'
      <?php retain_Radio('vetResidePrior','Yes');?>>
      YES, I lived in Massachusetts when I began my active duty service
    </label>
    <label class="radio" for='vetResidePrior0'>
      <input type='radio' name='vetResidePrior' id='vetResidePrior0' value='No'
      <?php retain_Radio('vetResidePrior','No');?>>
      NO, I did not live in Massachusetts when I began my active duty service.
    </label>
  </div>
</div>
</div>

<div class='row hide'>
<div class='span8 question <?php echo !empty($_SESSION['errors']['vetReside3Years']) ? 'alert-error' : '';?>' id='vetReside3YearsQ'>
  <input type='radio' name='vetReside3Years' id='vetReside3YearsInclude' value='Skipped' class='hide' checked>
  <h4>Have you lived, <abbr title="">continuosly</abbr>, in Massachusetts for 3 or more years?</h4>
  <div class='span8'>
    <label class="radio" for='vetReside3Years1'>
      <input type='radio' name='vetReside3Years' id='vetReside3Years1' value='Yes'
      <?php retain_Radio('vetReside3Years','Yes');?>>
      YES, 3 years or more
      </label>
    <label class="radio" for='vetReside3Years0'>
      <input type='radio' name='vetReside3Years' id='vetReside3Years0' value='No'
      <?php retain_Radio('vetReside3Years','No');?>>
      NO, less than 3 years
    </label>
  </div>
</div>
</div>


<!--   <div class='span8'>
  <h4>What is the ZIPCODE of your current residence?</h4>
  <label for='vetResideZip' class='span8'>
    <input class='span2' type="text" name='vetResideZip' id='vetResideZip' placeholder='02138'>
  </label>
</div> -->

<!-- <input type="submit" class='btn btn-primary' name='submitResidence' value='Continue'> -->
