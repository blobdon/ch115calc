<div class='span8'>
	<span class='error'><?php echo isset($_SESSION['errors']['applicant']) ?$_SESSION['errors']['applicant']:'';?></span>
  	<label class="radio" for='applicantVet'>
    	<input type='radio' name='applicant' id='applicantVet' value='Veteran'<?php retain_Radio('applicant','Veteran'); ?>>
    	I am the VETERAN
  	</label>
  	<label class="radio" for='applicantDep'>
    	<input type='radio' name='applicant' id='applicantDep' value='Dependent'<?php retain_Radio('applicant', 'Dependent'); ?>>
    	I am a DEPENDENT of the Veteran
  	</label>
</div>