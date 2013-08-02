<div class='span8'>
  <span class='error'><?php echo isset($_SESSION['errors']['vetReside3Years']) ?$_SESSION['errors']['vetReside3Years']:'';?></span>
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