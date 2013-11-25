<div class='span8'>
	From  6 Apr 1917 to 11 Nov 1918<br>
    From 16 Sep 1940 to 25 Jul 1947<br>	
    From 25 Jun 1950 to 31 Jan 1955<br>
    From  5 Aug 1964 to  7 May 1975<br>
    From  2 Aug 1990 to Today<br>
    <span class='error'><?php echo isset($_SESSION['errors']['wartime'])?$_SESSION['errors']['wartime']:'';?></span>
    <label class='text-center' for="wartime">
      <select class='span2 inline-input' name='wartime' id='wartime'>
        <option value="blank"></option>
        <option value="Yes"<?php retain_Select('wartime','Yes');?>>Yes</option>
        <option value="No"<?php retain_Select('wartime','No');?>>No</option>
      </select>
  </label>
</div>