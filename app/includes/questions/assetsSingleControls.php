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
    <span class='error'><?php echo isset($_SESSION['errors']['assetsSingle']) ?$_SESSION['errors']['assetsSingle']:'';?></span>
    <label class="radio" for='assetsSingle1'>
        <input type='radio' name='assetsSingle' id='assetsSingle1' value='Yes'
        <?php retain_Radio('assetsSingle','Yes');?>>YES, I have more than $3200 in assets.
    </label>
    <label class="radio" for='assetsSingle0'>
        <input type='radio' name='assetsSingle' id='assetsSingle0' value='No'
        <?php retain_Radio('assetsSingle','No');?>>NO, I do not have more than $3200 in assets.
    </label>
</div>