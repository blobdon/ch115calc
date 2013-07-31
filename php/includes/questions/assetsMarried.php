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
    <input type='radio' name='assetsMarried' id='assetsMarriedInclude' value='Skipped' class='hide' checked>
  <label class="radio" for='assetsMarried1'>
    <input type='radio' name='assetsMarried' id='assetsMarried1' value='Yes'
    <?php retain_Radio('assetsMarried','Yes');?>>YES, I have more than $7000 in assets.
  </label>
  <label class="radio" for='assetsMarried0'>
    <input type='radio' name='assetsMarried' id='assetsMarried0' value='No'
    <?php retain_Radio('assetsMarried','No');?>>NO, I do not have more than $7000 in assets.
  </label>
</div>