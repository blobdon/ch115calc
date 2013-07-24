
<div class='row'>
<div class='span8 question <?php echo !empty($_SESSION['errors']['maritalStatus']) ? 'alert-error' : '';?>'>
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
</div>
</div>

<div class='row'>
<div class='span8 question <?php echo !empty($_SESSION['errors']['liveWithSpouse']) ? 'alert-error' : '';?>' id='liveWithSpouseQ'>
	<h4>If married, do you live with your spouse?</h4>
		<div class='span8'>
			<input type='radio' name='liveWithSpouse' id='liveWithSpouseInclude' value='Skipped' class='hide' checked>
			<label class="radio" for='liveWithSpouse1'>
			<input type='radio' name='liveWithSpouse' id='liveWithSpouse1' value='Yes'
			<?php retain_Radio('liveWithSpouse','Yes');?>>YES
			</label>
		<label class="radio" for='liveWithSpouse0'>
			<input type='radio' name='liveWithSpouse' id='liveWithSpouse0' value='No'
			<?php retain_Radio('liveWithSpouse','No');?>>NO
		</label>
	</div>
</div>
</div>

<div class='row'>
<div class='span8 question <?php echo !empty($_SESSION['errors']['applChildren']) ? 'alert-error' : '';?>'> <!-- Children -->
	<h4>How many of your children do you currently support?</h4>
	<div class='span8 help-block'>
	  Please include any of your children who:
	  <ul>
	    <li>Live with you, or you regularly pay child support for</li>
	  <b>AND</b>
	    <li>Are under the age of 19 (under 23 if in high school or college)</li>
	  </ul>
	</div>
	<div class='input-append'>
		<input type="text" class='span1' name='applChildren' id='applChildren'
		value='<?php echo isset($_SESSION['applChildren'])?htmlspecialchars($_SESSION['applChildren']):'';?>'  >
		<span class='add-on'>Children</span>
	</div>
	<?php echo isset($_SESSION['errors']['applChildren'])?$_SESSION['errors']['applChildren']:''; ?>
</div>
</div>