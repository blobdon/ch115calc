<span class='help-block'>
	Please include any of your children who:
  	<ul>
    	<li>Live with you, or you regularly pay child support for</li>
  		<b>AND</b>
    	<li>Are under the age of 19 (under 23 if in high school or college)</li>
  	</ul>
</span>
<span class='error'><?php echo isset($_SESSION['errors']['children']) ?$_SESSION['errors']['children']:'';?></span>
<br>
<div class='input-append'>
	<input type="text" class='span1' name='children' id='children' value='<?php echo isset($_SESSION['children'])?htmlspecialchars($_SESSION['children']):'';?>'  >
	<span class='add-on'>Children</span>
</div>