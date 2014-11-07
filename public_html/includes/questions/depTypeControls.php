<div class='span8'>
  <span class='error'><?php echo isset($_SESSION['errors']['depType']) ?$_SESSION['errors']['depType']:'';?></span>
  <label class="radio" for='depTypeSpouse'>
    <input type='radio' name='depType' id='depTypeSpouse' value='Spouse'
    <?php retain_Radio('depType','Spouse');?>>Spouse
  </label>
  <label class="radio" for='depTypeWidow'>
    <input type='radio' name='depType' id='depTypeWidow' value='Widow'
    <?php retain_Radio('depType','Widow');?>>Widow/Widower
  </label>
  <label class="radio" for='depTypeParent'>
    <input type='radio' name='depType' id='depTypeParent' value='Parent'
    <?php retain_Radio('depType','Parent');?>>Dependent Parent (including person who acted as a parent to the veteran for five years immediately preceding the commencement of the veteran's wartime service)
  </label>
  <label class="radio" for='depTypeChild'>
    <input type='radio' name='depType' id='depTypeChild' value='Child'
    <?php retain_Radio('depType','Child');?>>
    Child (including legally adopted children)
    </abbr>
  </label>
  <label class="radio" for='depTypeOther'>
    <input type='radio' name='depType' id='depTypeOther' value='Other'
    <?php retain_Radio('depType','Other');?>>
    Other
    </abbr>
  </label>
</div>