<div class='row'>
  <div class='span2'>
    <span class='error'><?php echo isset($_SESSION['errors']['branch'])?$_SESSION['errors']['branch']:'';?></span>
    <div class='<?php echo !empty($_SESSION['errors']['branch']) ? 'question alert-error' : '';?>'>
      <label class='text-center' for="branch">Branch of service <br>
      <select class='span2' name='branch' id='branch'>
        <option value="blank"></option>
        <option value="Army"<?php retain_Select('branch','Army');?>>Army</option>
        <option value="Navy"<?php retain_Select('branch','Navy');?>>Navy</option>
        <option value="Marines"<?php retain_Select('branch','Marines');?>>Marine Corps</option>
        <option value="Air Force"<?php retain_Select('branch','Air Force');?>>Air Force</option>
        <option value="Active Guard/Reserve"<?php retain_Select('branch','Active Guard/Reserve');?>>Active Guard/Reserve</option>
        <option value="Coast Guard"<?php retain_Select('branch','Coast Guard');?>>Coast Guard</option>
      </select></label>
    </div>
  </div>
  <div class='span2'>
    <span class='error'><?php echo isset($_SESSION['errors']['serviceStart'])?$_SESSION['errors']['serviceStart']:'';?></span>
    <div class=' <?php echo !empty($_SESSION['errors']['serviceStart']) ? 'question alert-error' : '';?>'>
      <label class='text-center' for="serviceStart">Date service began <br>
      <input type="text" class="datepicker span2" placeholder="mm/dd/yy" name='serviceStart' id='serviceStart' value='<?php echo isset($_SESSION['serviceStart'])? htmlspecialchars($_SESSION['serviceStart']):'';?>'>
      </label>
    </div>
  </div>
  <div class='span2'>
    <span class='error'><?php echo isset($_SESSION['errors']['serviceEnd'])?$_SESSION['errors']['serviceEnd']:'';?></span>
    <div class='<?php echo !empty($_SESSION['errors']['serviceEnd']) ? 'question alert-error' : '';?>'>
      <label class='text-center' for="serviceEnd">Date service ended <br>
      <input type="text" class="datepicker span2" placeholder="mm/dd/yy" name='serviceEnd' id='serviceEnd' value='<?php echo isset($_SESSION['serviceEnd'])? htmlspecialchars($_SESSION['serviceEnd']):'';?>'>
      </label>
    </div>
  </div>
  <div class='span2'>
    <span class='error'><?php echo isset($_SESSION['errors']['discharge'])?$_SESSION['errors']['discharge']:'';?></span>
    <div class='<?php echo !empty($_SESSION['errors']['discharge']) ? 'question alert-error' : '';?>'>
      <label class='text-center' for="discharge">Type of discharge <br>
      <select class='span2' name="discharge" id="discharge">
        <option value="blank"></option>
        <option value="Honorable"<?php retain_Select('discharge','Honorable');?>>Honorable</option>
        <option value="General"<?php retain_Select('discharge','General');?>>General</option>
        <option value="OTH"<?php retain_Select('discharge','OTH');?>>Other than Honorable</option>
        <option value="Dishonorable"<?php retain_Select('discharge','Dishonorable');?>>Dishonorable</option>
        <option value="Bad Conduct"<?php retain_Select('discharge','Bad Conduct');?>>Bad Conduct</option>
        <option value="Other"<?php retain_Select('discharge','Other');?>>Other</option>
      </select></label>
    </div>
  </div>
</div>