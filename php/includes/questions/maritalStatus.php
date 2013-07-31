<h4>Are you Married or Single?</h4>
<div class='span8'>
		<input type='radio' name='maritalStatus' id='maritalStatusInclude' value='Skipped' class='hide' checked>
		<label class="radio" for='maritalStatusMarried'>
		<input type='radio' name='maritalStatus' id='maritalStatusMarried' value='Married'
		<?php retain_Radio('maritalStatus','Married');?>>MARRIED
		</label>
	<label class="radio" for='maritalStatusSingle'>
		<input type='radio' name='maritalStatus' id='maritalStatusSingle' value='Single'
		<?php retain_Radio('maritalStatus','Single');?>>SINGLE
	</label>
</div>