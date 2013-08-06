<span class='span8 help-block'>If someone else pays the Medicare B premium, please select NO</span>
<div class='span7'>
  <?php if ($_SESSION['maritalStatus']==='Married') :?><b>YOU</b><br><?php endif;?>
  <span class='error'><?php echo isset($_SESSION['errors']['payMedicareB']) ?$_SESSION['errors']['payMedicareB']:'';?></span>
  <label class="radio" for='payMedicareB1'>
    <input type='radio' name='payMedicareB' id='payMedicareB1' value='Yes'
    <?php retain_Radio('payMedicareB','Yes');?>>YES, I receive <strong>and</strong> pay for Medicare B
  </label>
  <label class="radio" for='payMedicareB0'>
    <input type='radio' name='payMedicareB' id='payMedicareB0' value='No'
    <?php retain_Radio('payMedicareB','No');?>>NO, I do not receive <strong>and</strong> pay for Medicare B
  </label>
</div>
<?php if ($_SESSION['maritalStatus']==='Married') :?> <!-- display spouse question if married -->
  <div class='span7 spouse'>
    <b>SPOUSE</b><br>
    <span class='error'><?php echo isset($_SESSION['errors']['spousePayMedicareB']) ?$_SESSION['errors']['spousePayMedicareB']:'';?></span>
    <label class="radio" for='spousePayMedicareB1'>
      <input type='radio' name='spousePayMedicareB' id='spousePayMedicareB1' value='Yes'
      <?php retain_Radio('spousePayMedicareB','Yes');?>>YES, my spouse receives <strong>and</strong> pays for Medicare B
    </label>
    <label class="radio" for='spousePayMedicareB0'>
      <input type='radio' name='spousePayMedicareB' id='spousePayMedicareB0' value='No'
      <?php retain_Radio('spousePayMedicareB','No');?>>NO, my spouse does not receive <strong>and</strong> pay for Medicare B
    </label>
  </div>
<?php endif; ?>