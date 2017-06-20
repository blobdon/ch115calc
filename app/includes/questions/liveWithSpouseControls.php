<div class='span8'>
	<span class='error'><?php echo isset($_SESSION['errors']['liveWithSpouse']) ?$_SESSION['errors']['liveWithSpouse']:'';?></span>
	<label class="radio" for='liveWithSpouse1'>
		<input type='radio' name='liveWithSpouse' id='liveWithSpouse1' value='Yes'
		<?php retain_Radio('liveWithSpouse','Yes');?>>YES
	</label>
	<label class="radio" for='liveWithSpouse0'>
		<input type='radio' name='liveWithSpouse' id='liveWithSpouse0' value='No'
		<?php retain_Radio('liveWithSpouse','No');?>>NO
	</label>
</div>