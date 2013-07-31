<h4>Do you<?php echo $_SESSION['maritalStatus']==='Married'?', and/or your spouse,':''; ?> receive and pay for Medicare Part B coverage out of your social security or private pension check?</h4>
<span class='span8 help-block'>If someone else pays the Medicare B premium, please select NO</span>
<div class='span7 <?php echo !empty($_SESSION['errors']['payMedicareB']) ? 'question alert-error' : '';?>'>
  <?php if ($_SESSION['maritalStatus']==='Married') :?><b>YOU</b><?php endif;?>
  <input type='radio' name='payMedicareB' id='payMedicareBInclude' value='Skipped' class='hide' checked>
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
  <div class='span7 spouse <?php echo !empty($_SESSION['errors']['spousePayMedicareB']) ? 'question alert-error' : '';?>'>
    <b>SPOUSE</b>
    <input type='radio' name='spousePayMedicareB' id='spousePayMedicareBInclude' value='Skipped' class='hide' checked>
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