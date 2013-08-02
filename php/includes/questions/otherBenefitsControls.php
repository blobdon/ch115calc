<ul>
  <li>Social Security, Social Security Disability, Supplemental Social Security Income</li>
  <li>Federal, State, County, City, or Town pension</li>
  <li>VA <em>non-service connected</em> pension or widow's pension </li>
</ul>
<div class='span7 <?php echo !empty($_SESSION['errors']['otherBenefits']) ? 'question alert-error' : '';?>'>
  <span class='error'><?php echo isset($_SESSION['errors']['otherBenefits']) ?$_SESSION['errors']['otherBenefits']:'';?></span>
  <?php if ($_SESSION['maritalStatus']==='Married'):?><b>YOU</b><?php endif;?>
  <label class="radio" for='otherBenefits1'>
    <input type='radio' name='otherBenefits' id='otherBenefits1' value='Yes'
    <?php retain_Radio('otherBenefits','Yes');?>>YES, I receive one or more of the listed benefits
  </label>
  <label class="radio" for='otherBenefits0'>
    <input type='radio' name='otherBenefits' id='otherBenefits0' value='No'
    <?php retain_Radio('otherBenefits','No');?>>NO, I do not receive any of the listed benefits
  </label>
</div>
<?php if ($_SESSION['maritalStatus']==='Married'):?> <!-- display spouse question if married -->
<div class='span7 spouse <?php echo !empty($_SESSION['errors']['spouseOtherBenefits']) ? 'question alert-error' : '';?>'>
  <span class='error'><?php echo isset($_SESSION['errors']['spouseOtherBenefits']) ?$_SESSION['errors']['spouseOtherBenefits']:'';?></span>
  <b>SPOUSE</b>
  <label class="radio" for='spouseOtherBenefits1'>
    <input type='radio' name='spouseOtherBenefits' id='spouseOtherBenefits1' value='Yes'
    <?php retain_Radio('spouseOtherBenefits','Yes');?>>YES, my spouse receives one or more of the listed benefits
  </label>
  <label class="radio" for='spouseOtherBenefits0'>
    <input type='radio' name='spouseOtherBenefits' id='spouseOtherBenefits0' value='No'
    <?php retain_Radio('spouseOtherBenefits','No');?>>NO, my spouse does not receive any of the listed benefits
  </label>
</div>
<?php endif; ?>