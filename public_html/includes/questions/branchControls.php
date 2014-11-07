<div class='span8'>
    <span class='error'><?php echo isset($_SESSION['errors']['branch'])?$_SESSION['errors']['branch']:'';?></span>
    <label class='text-center' for="branch">
      <select class='span2 inline-input' name='branch' id='branch'>
        <option value="blank"></option>
        <option value="Army"<?php retain_Select('branch','Army');?>>Army</option>
        <option value="Navy"<?php retain_Select('branch','Navy');?>>Navy</option>
        <option value="Marines"<?php retain_Select('branch','Marines');?>>Marine Corps</option>
        <option value="Air Force"<?php retain_Select('branch','Air Force');?>>Air Force</option>
        <option value="Active Guard/Reserve"<?php retain_Select('branch','Active Guard/Reserve');?>>Active Guard/Reserve</option>
        <option value="Coast Guard"<?php retain_Select('branch','Coast Guard');?>>Coast Guard</option>
        <option value="Merchant Marine"<?php retain_Select('branch','Merchant Marine');?>>Merchant Marine</option>
      </select>
  </label>
</div>