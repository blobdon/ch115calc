<div class='span8'>
  <span class='error'><?php echo isset($_SESSION['errors']['discharge'])?$_SESSION['errors']['discharge']:'';?></span>
  <label class='text-center' for="discharge">
    <span class='span2 inline-label'>Type of discharge</span>
    <select class='span2 inline-input' name="discharge" id="discharge">
      <option value="blank"></option>
      <option value="Honorable"<?php retain_Select('discharge','Honorable');?>>Honorable</option>
      <option value="General"<?php retain_Select('discharge','General');?>>General</option>
      <option value="OTH"<?php retain_Select('discharge','OTH');?>>Other than Honorable</option>
      <option value="Dishonorable"<?php retain_Select('discharge','Dishonorable');?>>Dishonorable</option>
      <option value="Bad Conduct"<?php retain_Select('discharge','Bad Conduct');?>>Bad Conduct</option>
      <option value="Other"<?php retain_Select('discharge','Other');?>>Other</option>
    </select>
  </label>
</div>