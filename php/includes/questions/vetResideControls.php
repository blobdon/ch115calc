<?php if ($_SESSION['applicant']==='Dependent') :?>
  <div class='span8'>
    <b>YOU</b><br>
    <span class='error'><?php echo isset($_SESSION['errors']['depReside']) ?$_SESSION['errors']['depReside']:'';?></span>
    <label class="radio" for='depReside1'>
      <input type='radio' name='depReside' id='depReside1' value='Yes'
      <?php retain_Radio('depReside','Yes');?>>YES, I currently live in Massachusetts
    </label>
    <label class="radio" for='depReside0'>
      <input type='radio' name='depReside' id='depReside0' value='No'
      <?php retain_Radio('depReside','No');?>>NO, I do not currently live in Massachusetts
    </label>
  </div>
<?php endif; ?>
<div class='span8'>
  <?php if ($_SESSION['applicant']==='Dependent') :?><b>VETERAN</b><br><?php endif;?>
  <span class='error'><?php echo isset($_SESSION['errors']['vetReside']) ?$_SESSION['errors']['vetReside']:'';?></span>
  <label class="radio" for='vetReside1'>
    <input type='radio' name='vetReside' id='vetReside1' value='Yes'
    <?php retain_Radio('vetReside','Yes');?>>
    YES, <?php echo $_SESSION['applicant']==='Dependent'?'the VETERAN currently lives':'I currently live'; ?> in Massachusetts
    </label>
  <label class="radio" for='vetReside0'>
    <input type='radio' name='vetReside' id='vetReside0' value='No'
    <?php retain_Radio('vetReside','No');?>>
    NO,  <?php echo $_SESSION['applicant']==='Dependent'?'the VETERAN does not':'I do not'; ?> currently live in Massachusetts
  </label>
</div>