<fieldset id='vetService'>
<div class='row'>
<div class='span8 question'>
  <h4 class=''>Please indicate your branch of service,
    dates of service, and which type of discharge you received.</h4>
    <div class='row'>
      <div class='span2 <?php echo !empty($_SESSION['errors']['branch']) ? 'question alert-error' : '';?>'>
        <label class='text-center' for="branch">Branch of service <br>
        <select class='span2' name='branch' id='branch'>
          <option value=""></option>
          <option value="Army"<?php retain_Select('branch','Army');?>>Army</option>
          <option value="Navy"<?php retain_Select('branch','Navy');?>>Navy</option>
          <option value="Marines"<?php retain_Select('branch','Marines');?>>Marine Corps</option>
          <option value="Air Force"<?php retain_Select('branch','Air Force');?>>Air Force</option>
          <option value="Active Guard/Reserve"<?php retain_Select('branch','Active Guard/Reserve');?>>Active Guard/Reserve</option>
          <option value="Coast Guard"<?php retain_Select('branch','Coast Guard');?>>Coast Guard</option>
        </select></label>
      </div>
      <div class='span2 <?php echo !empty($_SESSION['errors']['serviceStart']) ? 'question alert-error' : '';?>'>
        <label class='text-center' for="serviceStart">Date service began <br>
        <input type="text" class="datepicker span2" placeholder="mm/dd/yy" name='serviceStart' id='serviceStart'
        value='<?php echo isset($_SESSION['serviceStart'])? htmlspecialchars($_SESSION['serviceStart']):'';?>'>
        <span><?php echo isset($_SESSION['errors']['serviceStart']) ?$_SESSION['errors']['serviceStart']:'';?></span>
        </label>
      </div>
      <div class='span2 <?php echo !empty($_SESSION['errors']['serviceEnd']) ? 'question alert-error' : '';?>'>
        <label class='text-center' for="serviceEnd">Date service ended <br>
        <input type="text" class="datepicker span2" placeholder="mm/dd/yy" name='serviceEnd' id='serviceEnd'
        value='<?php echo isset($_SESSION['serviceEnd'])? htmlspecialchars($_SESSION['serviceEnd']):'';?>'>
        <span><?php echo isset($_SESSION['errors']['serviceEnd'])?$_SESSION['errors']['serviceEnd']:'';?></span>
        </label>
      </div>
      <div class='span2 <?php echo !empty($_SESSION['errors']['discharge']) ? 'question alert-error' : '';?>'>
        <label class='text-center' for="discharge">Type of discharge <br>
        <select class='span2' name="discharge" id="discharge">
          <option value=""></option>
          <option value="Honorable"<?php retain_Select('discharge','Honorable');?>>Honorable</option>
          <option value="General"<?php retain_Select('discharge','General');?>>General</option>
          <option value="OTH"<?php retain_Select('discharge','OTH');?>>Other than Honorable</option>
          <option value="Dishonorable"<?php retain_Select('discharge','Dishonorable');?>>Dishonorable</option>
          <option value="Bad Conduct"<?php retain_Select('discharge','Bad Conduct');?>>Bad Conduct</option>
          <option value="Other"<?php retain_Select('discharge','Other');?>>Other</option>
        </select></label>
      </div>
    </div>
</div>
</div>

<div class='row'>
<!-- KDSM -->
<div class='span8 service-details question <?php echo !empty($_SESSION['errors']['kdsm']) ? 'alert-error' : '';?>'>
  <h4 class=''>Were you awarded a Korea Defense Service Medal?</h4>
  <div class='span8'>
    <input type='radio' name='kdsm' id='kdsmInclude' value='Skipped' class='hide' checked>
    <label class="radio" for='kdsm1'>
      <input type='radio' name='kdsm' id='kdsm1' value='Yes'<?php retain_Radio('kdsm','Yes'); ?>>
      YES, I was awarded a Korea Defense Service Medal
      <?php // retain_Radio('kdsm','Yes'); ?>
    </label>
    <label class="radio" for='kdsm0'>
      <input type='radio' name='kdsm' id='kdsm0' value='No'<?php retain_Radio('kdsm', 'No'); ?>>
      NO, I was not awarded a Korea Defense Service Medal
      <?php //retain_Radio('kdsm', 'No'); ?>
    </label>
  </div>
</div>
</div>

<div class='row'>
<!-- L,G,P campaigns -->
<div class='span8 service-details question <?php //echo !empty($_SESSION['errors']['campaigns']) ? 'alert-error' : '';?>'>
 <h4>Did you serve in any of the following campaigns? (Optional - Check any/all that apply)</h4>
  <div class='span8'>
    <!-- <input type="checkbox" name='campaigns[]' id='campaignsInclude' value='Optional' class='hide' checked> -->
    <label class="checkbox inline" for='Lcampaign'>
      <input type='checkbox' name='campaigns[]' id='Lcampaign' value='Lcampaign'<?php retain_Checkbox('campaigns','Lcampaign'); ?>>Lebanon Campaign
    </label>
    <label class="checkbox inline" for='Gcampaign'>
      <input type='checkbox' name='campaigns[]' id='Gcampaign' value='Gcampaign'<?php retain_Checkbox('campaigns','Gcampaign'); ?>>Grenada Campaign
    </label>
    <label class="checkbox inline" for='Pcampaign'>
      <input type='checkbox' name='campaigns[]' id='Pcampaign' value='Pcampaign'<?php retain_Checkbox('campaigns','Pcampaign'); ?>>Panama Campaign
    </label>
  </div>
</div>
</div>

<div class='row'>
<!-- Exceptions for purple heart -->
<div class='span8 service-details question <?php echo !empty($_SESSION['errors']['purpleHeart']) ? 'alert-error' : '';?>'>
  <h4>Were you awarded a Purple Heart?</h4>
  <div class='span8'>
    <input type='radio' name='purpleHeart' id='purpleHeartInclude' value='Skipped' class='hide' checked>
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
</div>
</div>

<div class='row'>
<!-- Exceptions for service-connected disabality -->
<div class='span8 service-details question <?php echo !empty($_SESSION['errors']['serviceDisability']) ? 'alert-error' : '';?>'>
  <h4>Do you have a service-connected disability?</h4>
  <div class='span8'>
    <input type='radio' name='serviceDisability' id='serviceDisabilityInclude' value='Skipped' class='hide' checked>
    <label class="radio" for='serviceDisability1'>
      <input type='radio' name='serviceDisability' id='serviceDisability1' value='Yes'
      <?php retain_Radio('serviceDisability','Yes');?>>
      YES, I have a service-connected disability
    </label>
    <label class="radio" for='serviceDisability0'>
      <input type='radio' name='serviceDisability' id='serviceDisability0' value='No'
      <?php retain_Radio('serviceDisability','No');?>>
      NO, I do not have a service-connected disability
     </label>
   </div>
</div>
</div>

<div class='row'>
<!-- Exceptions for death in service -->
<!-- <div class='span8 service-details question <?php echo !empty($_SESSION['errors']['serviceDeath']) ? 'alert-error' : '';?>'>
  <h4>Did the veteran die while on active duty? (under conditions other than dishonorable)</h4>
  <div class='span8'>
    <input type='radio' name='serviceDeath' id='serviceDeathInclude' value='Skipped' class='hide' checked>
    <label class="radio inline" for='serviceDeath1'>
      <input type='radio' name='serviceDeath' id='serviceDeath1' value='Yes'
      <?php retain_Radio('serviceDeath','Yes');?>>
      YES
    </label>
    <label class="radio inline" for='serviceDeath0'>
      <input type='radio' name='serviceDeath' id='serviceDeath0' value='No'
      <?php retain_Radio('serviceDeath','No');?>>
      NO
     </label>
   </div>
</div> -->
</div>
<!-- <input type="submit" class='btn btn-primary' name='submitService' value='Continue'> -->
</fieldset>