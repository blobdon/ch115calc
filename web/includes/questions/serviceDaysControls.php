<div class='span8'>
    <span class='error'><?php echo isset($_SESSION['errors']['serviceDays'])?$_SESSION['errors']['serviceDays']:'';?></span>
    <label class='text-center' for="serviceDays">
      <select class='span2 inline-input' name='serviceDays' id='serviceDays'>
        <option value="blank"></option>
        <option value="1 to 89 days"<?php retain_Select('serviceDays','less90');?>>1 to 89 days</option>
        <option value="90 to 179 days"<?php retain_Select('serviceDays','more90less180');?>>90 to 179 days</option>
        <option value="180 days or more"<?php retain_Select('serviceDays','more180');?>>180 days or more</option>
      </select>
  </label>
</div>