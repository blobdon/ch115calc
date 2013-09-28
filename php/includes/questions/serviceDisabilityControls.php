<div class='span8'>
  <span class='error'><?php echo isset($_SESSION['errors']['serviceDisability']) ?$_SESSION['errors']['serviceDisability']:'';?></span>
  <label class="radio" for='serviceDisability1'>
    <input type='radio' name='serviceDisability' id='serviceDisability1' value='Yes'
    <?php retain_Radio('serviceDisability','Yes');?>>
    YES, <?php echo $_SESSION['applicant']==='Dependent'?"the Veteran has":'I have' ?> a service-connected disability
  </label>
  <label class="radio" for='serviceDisability0'>
    <input type='radio' name='serviceDisability' id='serviceDisability0' value='No'
    <?php retain_Radio('serviceDisability','No');?>>
    NO, <?php echo $_SESSION['applicant']==='Dependent'?"the Veteran does":'I do' ?> not have a service-connected disability
   </label>
 </div>