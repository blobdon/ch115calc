<div class='span8'>
  <span class='error'><?php echo isset($_SESSION['errors']['serviceDeath']) ?$_SESSION['errors']['serviceDeath']:'';?></span>
  <label class="radio" for='serviceDeath1'>
    <input type='radio' name='serviceDeath' id='serviceDeath1' value='Yes'
    <?php retain_Radio('serviceDeath','Yes');?>>
    YES, the Veteran died while on active duty
  </label>
  <label class="radio" for='serviceDeath0'>
    <input type='radio' name='serviceDeath' id='serviceDeath0' value='No'
    <?php retain_Radio('serviceDeath','No');?>>
    NO, the Veteran did not die while on active duty
   </label>
</div>