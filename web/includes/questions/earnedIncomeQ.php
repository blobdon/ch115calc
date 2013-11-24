What is your Total MONTHLY income from EMPLOYMENT, after taxes?

<div id="flyBox" style="display:none;">
    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td align="center">
    <table border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td class="borderWindow">
      <div class="container">
    <div id="closeButton"><a href="javascript:closePopup('flyBox')"><img src="http://i1122.photobucket.com/albums/l523/Long_Islander/flyBoxClose.png" width="28" height="28" alt="Close Button" border="0" /></a></div>
    <div class="content">
      <table width="600" border="0" cellspacing="20" cellpadding="0">
        <tr>
        <td>
        <div id="myMessageBox" name="myMessageBox">
        <table width="100%"  border="0" cellspacing="2" cellpadding="0">
        <tr>
        <td class="colheadingL">Income Calculator</td>
        </tr>
        <tr>
        <td class="text1">
            How many times a month are you paid?
            <br>
            <select name="merke" id="choices">
            <option value="0" selected>Please choose</option>
            <option value="weekly" >weekly</option>
            <option value="biweekly">biweekly</option>
            <option value="twicemonth">twice a month</option>
            <option value="monthly">monthly</option>

            </select>
            
          <div id="weekly" class="fillmein" style="display:none;">
          How much were you paid these last four weeks?<br>
          <table>
          <tr>
          <td>First Week:</td><td><input type="text" id="weeklyweek1"></td>
          </tr>
          <tr>
          <td>Second Week:</td><td><input type="text" id="weeklyweek2"></td>
          </tr>
          <tr>
          <td>Third Week:</td><td><input type="text" id="weeklyweek3"></td>
          </tr>
          <tr>
          <td>Fourth Week:</td><td><input type="text" id="weeklyweek4"></td>
          </tr>
          </table>
          <a href="javascript:modifiedclosePopup('flyBox','weekly')"><button type="submit" class='btn btn-primary'>Continue</button></a>

          </div>
          <div id="biweekly" class="fillmein"style="display:none;">
          How much were you paid the last two weeks?<br>
          <table>
          <tr>
          <td>First Week:</td><td><input type="text" id="biweeklyweek1"></td>
          </tr>
          <tr>
          <td>Second Week:</td><td><input type="text" id="biweeklyweek2"></td>
          </tr>
          </table>
          <a href="javascript:modifiedclosePopup('flyBox','biweekly')"><button type="submit" class='btn btn-primary'>Continue</button></a>

          </div>
          <div id="twicemonth" class="fillmein"style="display:none;">
          How much were your last two pay checks?<br>
          <table>
          <tr>
          <td>First Week:</td><td><input type="text" id="twicemonthweek1"></td>
          </tr>
          <tr>
          <td>Second Week:</td><td><input type="text" id="twicemonthweek2"></td>
          </tr>
          </table>          
          <a href="javascript:modifiedclosePopup('flyBox','twicemonth')"><button type="submit" class='btn btn-primary'>Continue</button></a>

          </div>
          <div id="monthly" class="fillmein"style="display:none;">
          How much was your last pay check?<br>
          <table>
          <tr>
          <td>Pay check amount:</td><td><input type="text" id="monthlyweek1"></td>
          </tr>
          </table>
          <a href="javascript:modifiedclosePopup('flyBox','monthly')"><button type="submit" class='btn btn-primary'>Continue</button></a>
          </div>

        </td>
        </tr>
    </table>
  </div>
</td>
</tr>
 
</table>
                </div>
            </div>
        </td>
    </tr>
</table>
</td>

</tr>
    </table>
</div>