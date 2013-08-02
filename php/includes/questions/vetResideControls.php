<div class='span8'>
  <span class='error'><?php echo isset($_SESSION['errors']['vetReside']) ?$_SESSION['errors']['vetReside']:'';?></span>
  <label class="radio" for='vetReside1'>
    <input type='radio' name='vetReside' id='vetReside1' value='Yes'
    <?php retain_Radio('vetReside','Yes');?>>
    YES, I currently live in Massachusetts
    </label>
  <label class="radio" for='vetReside0'>
    <input type='radio' name='vetReside' id='vetReside0' value='No'
    <?php retain_Radio('vetReside','No');?>>
    NO, I do not live in Massachusetts
  </label>
</div>