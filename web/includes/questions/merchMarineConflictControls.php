<div class='span8'>
	From 7 Dec 1941 to 31 Dec 1946
	<span class='error'><?php echo isset($_SESSION['errors']['merchMarineConflict']) ?$_SESSION['errors']['merchMarineConflict']:'';?></span>
  	<label class="radio" for='merchMarineConflict1'>
    	<input type='radio' name='merchMarineConflict' id='merchMarineConflict1' value='Yes'<?php retain_Radio('merchMarineConflict','Yes'); ?>>
    		YES, <?php echo $_SESSION['applicant']==='Dependent'?"the Veteran":'I' ?> served in armed conflict as a member of the American Merchant Marine during this period
  	</label>
  	<label class="radio" for='merchMarineConflict0'>
    	<input type='radio' name='merchMarineConflict' id='merchMarineConflict0' value='No'<?php retain_Radio('merchMarineConflict', 'No'); ?>>
    	NO, <?php echo $_SESSION['applicant']==='Dependent'?"the Veteran":'I' ?> did not serve in armed conflict as a member of the American Merchant  Marine during this period
  	</label>
</div>