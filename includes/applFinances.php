
<div class='row'>
<div class='span8 question <?php echo !empty($_SESSION['errors']['applEarnedIncome']) ? 'alert-error' : '';?>'>
  <h4>What is your Total MONTHLY income from EMPLOYMENT, after taxes?</h4>
  <div class='input-prepend input-append'>
    <span class='add-on'>$</span>
    <input type="text" name='applEarnedIncome' id='applEarnedIncome' class='span1'
    value='<?php echo !empty($_SESSION['applEarnedIncome'])?htmlspecialchars($_SESSION['applEarnedIncome']):'';?>'>
    <span class='add-on'>per month</span>
    <button class='calc hide' type='button' id="earnedIncomeCalcButton" class="btn">
      Calculator
    </button>
  </div>
  <?php echo isset($_SESSION['errors']['applEarnedIncome'])?$_SESSION['errors']['applEarnedIncome']:''; ?>
</div>
<div id='earnedIncomeCalcContent' class='hide'>
  Under Construction
  <?php //include(dirname(__FILE__).'/includes/earnedIncomeCalc.php'); ?>
</div>
</div>


<div class='row'>
<div class='span8 question <?php echo !empty($_SESSION['errors']['applOtherIncome']) ? 'alert-error' : '';?>'>
  <h4>What is your Total MONTHLY income from OTHER sources, after taxes?</h4>
    Include all income from:
  <ul>
    <li>Rental property,</li>
    <li>VA benefits or VA pension</li>
    <li>Social Security, Social Security Disability, SSI</li>
    <li>Retirement income</li>
    <li>Unemployment, Worker's Compensation, sick-leave or long-term disability benefits</li>
  </ul>
  <div class='input-prepend input-append'>
    <span class='add-on'>$</span>
    <input type="text" name='applOtherIncome' id='applOtherIncome' class='span1'
    value='<?php echo !empty($_SESSION['applOtherIncome'])?htmlspecialchars($_SESSION['applOtherIncome']):'';?>'>
    <span class='add-on'>per month</span>
    <button class='calc hide' type='button' id="otherIncomeCalcButton" class="btn">
      Calculator
    </button>
  </div>
  <?php echo isset($_SESSION['errors']['applOtherIncome'])?$_SESSION['errors']['applOtherIncome']:''; ?>
</div>

<div id='otherIncomeCalcContent' class='hide'>
  Under Construction
  <?php //include(dirname(__FILE__).'/includes/otherIncomeCalc.php'); ?>
</div>
</div>


<div class='row'>
<div class='span8 question'>
  <h4>Do you<?php echo $_SESSION['maritalStatus']==='Married'?', and/or your spouse,':'';?> receive any of the following benefits?</h4>
  <ul>
    <li>Social Security, Social Security Disability, Supplemental Social Security Income</li>
    <li>Federal, State, County, City, or Town pension</li>
    <li>VA <em>non-service connected</em> pension or widow's pension </li>
  </ul>
  <div class='span7 <?php echo !empty($_SESSION['errors']['applOtherBenefits']) ? 'question alert-error' : '';?>'>
    <?php if ($_SESSION['maritalStatus']==='Married'):?><b>YOU</b><?php endif;?>
    <input type='radio' name='applOtherBenefits' id='applOtherBenefitsInclude' value='Skipped' class='hide' checked>
    <label class="radio" for='applOtherBenefits1'>
      <input type='radio' name='applOtherBenefits' id='applOtherBenefits1' value='Yes'
      <?php retain_Radio('applOtherBenefits','Yes');?>>YES, I receive one or more of the listed benefits
    </label>
    <label class="radio" for='applOtherBenefits0'>
      <input type='radio' name='applOtherBenefits' id='applOtherBenefits0' value='No'
      <?php retain_Radio('applOtherBenefits','No');?>>NO, I do not receive any of the listed benefits
    </label>
  </div>
  <?php if ($_SESSION['maritalStatus']==='Married'):?> <!-- display spouse question if married -->
  <div class='span7 spouse <?php echo !empty($_SESSION['errors']['spouseOtherBenefits']) ? 'question alert-error' : '';?>'>
    <b>SPOUSE</b>
    <input type='radio' name='spouseOtherBenefits' id='spouseOtherBenefitsInclude' value='Skipped' class='hide' checked>
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
</div>
</div>


<div class='row'>
<div class='span8 question'>
  <h4>Do you<?php echo $_SESSION['maritalStatus']==='Married'?', and/or your spouse,':''; ?> receive and pay for Medicare Part B coverage out of your social security or private pension check?</h4>
  <span class='span8 help-block'>If someone else pays the Medicare B premium, please select NO</span>
  <div class='span7 <?php echo !empty($_SESSION['errors']['applPayMedicareB']) ? 'question alert-error' : '';?>'>
    <?php if ($_SESSION['maritalStatus']==='Married') :?><b>YOU</b><?php endif;?>
    <input type='radio' name='applPayMedicareB' id='applPayMedicareBInclude' value='Skipped' class='hide' checked>
    <label class="radio" for='applPayMedicareB1'>
      <input type='radio' name='applPayMedicareB' id='applPayMedicareB1' value='Yes'
      <?php retain_Radio('applPayMedicareB','Yes');?>>YES, I receive <strong>and</strong> pay for Medicare B
    </label>
    <label class="radio" for='applPayMedicareB0'>
      <input type='radio' name='applPayMedicareB' id='applPayMedicareB0' value='No'
      <?php retain_Radio('applPayMedicareB','No');?>>NO, I do not receive <strong>and</strong> pay for Medicare B
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
</div>
</div>

<!-- ASSETTS, will display appropriate question depending on marital status -->
<?php if ($_SESSION['maritalStatus']==='Single') :?>
    <div class='row'>
    <div class='span8 question <?php echo !empty($_SESSION['errors']['applAssetsSingle']) ? 'alert-error' : '';?>' id='applAssetsSingleQ'>
        <h4>Do you have more than $3200 in assets?</h4>
        <div class='span8 help-block'>
            <span clas='span8'>
                This includes the following (and anything similiar):
            </span>
            <div class='span8'>
                <div class='span3'>
                    <ul>
                        <li>Cash</li>
                        <li>Checking Accounts</li>
                        <li>Savings Accounts</li>
                        <li>IRAs</li>
                        <li>Savings Bonds</li>
                    </ul>
                </div>
                <div class='span3'>
                    <ul>
                        <li>Money Market Accounts</li>
                        <li>Certificates of Deposit</li>
                        <li>401K Accounts</li>
                        <li>any other type of savings, investment or retirement account of any kind</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class='span8'>
            <input type='radio' name='applAssetsSingle' id='applAssetsSingleInclude' value='Skipped' class='hide' checked>
          <label class="radio" for='applAssetsSingle1'>
            <input type='radio' name='applAssetsSingle' id='applAssetsSingle1' value='Yes'
            <?php retain_Radio('applAssetsSingle','Yes');?>>YES, I have more than $3200 in assets.
          </label>
          <label class="radio" for='applAssetsSingle0'>
            <input type='radio' name='applAssetsSingle' id='applAssetsSingle0' value='No'
            <?php retain_Radio('applAssetsSingle','No');?>>NO, I do not have more than $3200 in assets.
          </label>
        </div>
    </div>
    </div>
<?php elseif ($_SESSION['maritalStatus']==='Married') :?>
    <div class='row'>
    <div class='span8 question <?php echo !empty($_SESSION['errors']['applAssetsMarried']) ? 'alert-error' : '';?>' id='applAssetsMarriedQ'>
        <h4>Do you have more than $7000 in assets?</h4>
        <div class='span8 help-block'>
            <span clas='span8'>
                This includes the following (and anything similiar):
            </span>
            <div class='span8'>
                <div class='span3'>
                    <ul>
                        <li>Cash</li>
                        <li>Checking Accounts</li>
                        <li>Savings Accounts</li>
                        <li>IRAs</li>
                        <li>Savings Bonds</li>
                    </ul>
                </div>
                <div class='span3'>
                    <ul>
                        <li>Money Market Accounts</li>
                        <li>Certificates of Deposit</li>
                        <li>401K Accounts</li>
                        <li>any other type of savings, investment or retirement account of any kind</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class='span8'>
            <input type='radio' name='applAssetsMarried' id='applAssetsMarriedInclude' value='Skipped' class='hide' checked>
          <label class="radio" for='applAssetsMarried1'>
            <input type='radio' name='applAssetsMarried' id='applAssetsMarried1' value='Yes'
            <?php retain_Radio('applAssetsMarried','Yes');?>>YES, I have more than $7000 in assets.
          </label>
          <label class="radio" for='applAssetsMarried0'>
            <input type='radio' name='applAssetsMarried' id='applAssetsMarried0' value='No'
            <?php retain_Radio('applAssetsMarried','No');?>>NO, I do not have more than $7000 in assets.
          </label>
        </div>
    </div>
    </div>
<?php endif;?>