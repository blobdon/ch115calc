<div class='span8'>
  <span class='error'><?php echo isset($_SESSION['errors']['vetResidePrior']) ?$_SESSION['errors']['vetResidePrior']:'';?></span>
  <label class="radio" for='vetResidePrior1'>
    <input type='radio' name='vetResidePrior' id='vetResidePrior1' value='Yes'
    <?php retain_Radio('vetResidePrior','Yes');?>>
    YES, the Veteran lived in Massachusetts when they began their active duty service
  </label>
  <label class="radio" for='vetResidePrior0'>
    <input type='radio' name='vetResidePrior' id='vetResidePrior0' value='No'
    <?php retain_Radio('vetResidePrior','No');?>>
    NO, the Veteran did not live in Massachusetts when they began their active duty service
  </label>
</div>