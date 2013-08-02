<div class='span8'>
	<span class='error'><?php echo isset($_SESSION['errors']['maritalStatus']) ?$_SESSION['errors']['maritalStatus']:'';?></span>
	<label class="radio" for='maritalStatusMarried'>
		<input type='radio' name='maritalStatus' id='maritalStatusMarried' value='Married'
		<?php retain_Radio('maritalStatus','Married');?>>MARRIED
	</label>
	<label class="radio" for='maritalStatusSingle'>
		<input type='radio' name='maritalStatus' id='maritalStatusSingle' value='Single'
		<?php retain_Radio('maritalStatus','Single');?>>SINGLE
	</label>
</div>