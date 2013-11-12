<div class='span8'>
	<span class='error'><?php echo isset($_SESSION['errors']['merchMarineDischarge']) ?$_SESSION['errors']['merchMarineDischarge']:'';?></span>
  	<label class="radio" for='merchMarineDischarge1'>
    	<input type='radio' name='merchMarineDischarge' id='merchMarineDischarge1' value='Yes'<?php retain_Radio('merchMarineDischarge','Yes'); ?>>
    		YES, <?php echo $_SESSION['applicant']==='Dependent'?"the Veteran":'I' ?> received a discharge from the U.S. Coast Guard, Army, or Navy
  	</label>
  	<label class="radio" for='merchMarineDischarge0'>
    	<input type='radio' name='merchMarineDischarge' id='merchMarineDischarge0' value='No'<?php retain_Radio('merchMarineDischarge', 'No'); ?>>
    	NO, <?php echo $_SESSION['applicant']==='Dependent'?"the Veteran":'I' ?> did not receive a discharge from the U.S. Coast Guard, Army, or Navy
  	</label>
</div>