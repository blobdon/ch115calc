<div class='span8'>
	<span class='error'><?php echo isset($_SESSION['errors']['kdsm']) ?$_SESSION['errors']['kdsm']:'';?></span>
  	<label class="radio" for='kdsm1'>
    	<input type='radio' name='kdsm' id='kdsm1' value='Yes'<?php retain_Radio('kdsm','Yes'); ?>>
    		YES, <?php echo $_SESSION['applicant']==='Dependent'?"the Veteran":'I' ?> was awarded a Korea Defense Service Medal
  	</label>
  	<label class="radio" for='kdsm0'>
    	<input type='radio' name='kdsm' id='kdsm0' value='No'<?php retain_Radio('kdsm', 'No'); ?>>
    	NO, <?php echo $_SESSION['applicant']==='Dependent'?"the Veteran":'I' ?> was not awarded a Korea Defense Service Medal
  	</label>
</div>