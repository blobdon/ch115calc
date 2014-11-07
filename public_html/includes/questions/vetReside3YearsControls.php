<?php if ($_SESSION['applicant']==='Dependent') :?>
  <div class='span8'>
    <b>YOU</b><br>
    <span class='error'><?php echo isset($_SESSION['errors']['depReside3Years']) ?$_SESSION['errors']['depReside3Years']:'';?></span>
    <label class="radio" for='depReside3Years1'>
      <input type='radio' name='depReside3Years' id='depReside3Years1' value='Yes'
      <?php retain_Radio('depReside3Years','Yes');?>>YES, I have lived in Massachusetts continuously for at least 3 years
    </label>
    <label class="radio" for='depReside3Years0'>
      <input type='radio' name='depReside3Years' id='depReside3Years0' value='No'
      <?php retain_Radio('depReside3Years','No');?>>NO, I have NOT lived in Massachusetts continuously for at least 3 years
    </label>
  </div>
<?php endif; ?>
<div class='span8'>
  <?php if ($_SESSION['applicant']==='Dependent') :?><b>VETERAN</b><br><?php endif;?>
  <span class='error'><?php echo isset($_SESSION['errors']['vetReside3Years']) ?$_SESSION['errors']['vetReside3Years']:'';?></span>
  <label class="radio" for='vetReside1'>
    <input type='radio' name='vetReside3Years' id='vetReside1' value='Yes'
    <?php retain_Radio('vetReside3Years','Yes');?>>
    YES, <?php echo $_SESSION['applicant']==='Dependent'?'the VETERAN has':'I have'; ?> lived in Massachusetts continuously for at least 3 years
    </label>
  <label class="radio" for='vetReside0'>
    <input type='radio' name='vetReside3Years' id='vetReside0' value='No'
    <?php retain_Radio('vetReside3Years','No');?>>
    NO,  <?php echo $_SESSION['applicant']==='Dependent'?'the VETERAN has':'I have'; ?> NOT lived in Massachusetts continuously for at least 3 years
  </label>
</div>