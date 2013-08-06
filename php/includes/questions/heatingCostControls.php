<div class='help-block'>
  If you do not pay for heating, leave this value as 0 (zero).
</div>
<span class='error'><?php echo isset($_SESSION['errors']['heatingCost']) ?$_SESSION['errors']['heatingCost']:'';?></span>
<br>
<div class='input-prepend input-append'>
  <span class='add-on'>$</span>
  <input type="text" name='heatingCost' id='heatingCost' class='span1' 
          value='<?php echo isset($_SESSION['heatingCost'])?htmlspecialchars($_SESSION['heatingCost']):'';?>' >
  <span class='add-on'>per month</span>
</div>
<?php echo isset($_SESSION['errors']['heatingCost'])?$_SESSION['errors']['heatingCost']:''; ?>