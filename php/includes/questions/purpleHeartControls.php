<div class='span8'>
  <span class='error'><?php echo isset($_SESSION['errors']['purpleHeart']) ?$_SESSION['errors']['purpleHeart']:'';?></span>
  <label class="radio" for='purpleHeart1'>
    <input type='radio' name='purpleHeart' id='purpleHeart1' value='Yes'
    <?php retain_Radio('purpleHeart', 'Yes'); ?>>
    YES, I was awarded a Purple Heart
  </label>
  <label class="radio" for='purpleHeart0'>
    <input type='radio' name='purpleHeart' id='purpleHeart0' value='No'
    <?php retain_Radio('purpleHeart', 'No'); ?>>
    NO, I was not awarded a Purple Heart
  </label>
</div>