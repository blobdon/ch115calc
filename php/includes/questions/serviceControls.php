<div class='row'>
  <div class='span4'>
    <span class='error'><?php echo isset($_SESSION['errors']['branch'])?$_SESSION['errors']['branch']:'';?></span>
    <label class='text-center' for="branch">
      <span class='span2 inline-label'>Branch of service</span>
      <select class='span2 inline-input' name='branch' id='branch'>
        <option value="blank"></option>
        <option value="Army"<?php retain_Select('branch','Army');?>>Army</option>
        <option value="Navy"<?php retain_Select('branch','Navy');?>>Navy</option>
        <option value="Marines"<?php retain_Select('branch','Marines');?>>Marine Corps</option>
        <option value="Air Force"<?php retain_Select('branch','Air Force');?>>Air Force</option>
        <option value="Active Guard/Reserve"<?php retain_Select('branch','Active Guard/Reserve');?>>Active Guard/Reserve</option>
        <option value="Coast Guard"<?php retain_Select('branch','Coast Guard');?>>Coast Guard</option>
      </select>
  </label>
  </div>
</div>
<div class='row'>
  <div class='span4'>
    <span class='error'><?php echo isset($_SESSION['errors']['serviceStart'])?$_SESSION['errors']['serviceStart']:'';?></span>
      <label class='text-center' for="serviceStart">
        <span class='span2 inline-label'>Date service began</span>
        <input type="text" class="datepicker span2 inline-input" placeholder="mm/dd/yyyy" name='serviceStart' id='serviceStart' value='<?php echo isset($_SESSION['serviceStart'])? htmlspecialchars($_SESSION['serviceStart']):'';?>'>
      </label>
  </div>
</div>
<div class='row'>
  <div class='span4'>
    <span class='error'><?php echo isset($_SESSION['errors']['serviceEnd'])?$_SESSION['errors']['serviceEnd']:'';?></span>
    <label class='text-center' for="serviceEnd">
      <span class='span2 inline-label'>Date service ended</span>
      <input type="text" class="datepicker span2 inline-input" placeholder="mm/dd/yyyy" name='serviceEnd' id='serviceEnd' value='<?php echo isset($_SESSION['serviceEnd'])? htmlspecialchars($_SESSION['serviceEnd']):'';?>'>
    </label>
  </div>
</div>
<div class='row'>
  <div class='span4'>
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
</div>