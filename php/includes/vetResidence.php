
<div class='row'>
<!-- Vet's Mass residence -->
<div class='span8 question <?php echo !empty($_SESSION['errors']['vetReside']) ? 'alert-error' : '';?>'>

</div>
</div>
<!-- next two questions only necessary for dependents - must also ask about dependents residence -->
<?php if (isset($_SESSION['applicant'])):?>
<div class='row hide'>
<div class='span8 question <?php echo !empty($_SESSION['errors']['vetResidePrior']) ? 'alert-error' : '';?>' id='vetResidePriorQ'>

</div>
</div>

<div class='row hide'>
<div class='span8 question <?php echo !empty($_SESSION['errors']['vetReside3Years']) ? 'alert-error' : '';?>' id='vetReside3YearsQ'>
  <input type='radio' name='vetReside3Years' id='vetReside3YearsInclude' value='Skipped' class='hide' checked>

</div>
</div>
<?php endif;?>

<!--   <div class='span8'>
  <h4>What is the ZIPCODE of your current residence?</h4>
  <label for='vetResideZip' class='span8'>
    <input class='span2' type="text" name='vetResideZip' id='vetResideZip' placeholder='02138'>
  </label>
</div> -->

<!-- <input type="submit" class='btn btn-primary' name='submitResidence' value='Continue'> -->
