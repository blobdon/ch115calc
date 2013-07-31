
<div class='row'>
<div class='span8 question <?php echo !empty($_SESSION['errors']['applEarnedIncome']) ? 'alert-error' : '';?>'>

</div>

</div>


<div class='row'>
<div class='span8 question <?php echo !empty($_SESSION['errors']['applOtherIncome']) ? 'alert-error' : '';?>'>

</div>


</div>


<div class='row'>
<div class='span8 question'>

</div>
</div>


<div class='row'>
<div class='span8 question'>

</div>
</div>

<!-- ASSETTS, will display appropriate question depending on marital status -->
<?php if ($_SESSION['maritalStatus']==='Single') :?>
    <div class='row'>
    <div class='span8 question <?php echo !empty($_SESSION['errors']['applAssetsSingle']) ? 'alert-error' : '';?>' id='applAssetsSingleQ'>
        
    </div>
    </div>
<?php elseif ($_SESSION['maritalStatus']==='Married') :?>
    <div class='row'>
    <div class='span8 question <?php echo !empty($_SESSION['errors']['applAssetsMarried']) ? 'alert-error' : '';?>' id='applAssetsMarriedQ'>
        
    </div>
    </div>
<?php endif;?>