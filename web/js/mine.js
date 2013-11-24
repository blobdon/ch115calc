$(document).ready(function() {
	// defaults for serviceStart datepicker
	$('#serviceStart').datepicker({
		format: 'mm/dd/yyyy',
		startView: 'decade',
        endDate: '+0d',
        autoclose: true
    });
	// defaults for serviceEnd datepicker
	$('#serviceEnd').datepicker({
		format: 'mm/dd/yyyy',
		startView: 'decade',
        endDate: '+3y',
        autoclose: true
    });
	// change limits on either datepicker to avoid 'ending before beginning'
	$('#serviceStart, #serviceEnd')
		.change( function() {
			$('#serviceEnd').datepicker('setStartDate',$('#serviceStart').val());
			$('#serviceStart').datepicker('setEndDate',$('#serviceEnd').val());

	document.getElementById("choices").onchange=function() {
    hideAll(this); 
    var id = this.value;
    if (id) show(id);
  }

  function show(id) {
        var el = document.getElementById(id);
        if (el) el.style.display = "block";
        else alert("No such ID as "+id);
    }

    function hide(id) {
        var el = document.getElementById(id);
        el.style.display  = "none";
    }

    function hideAll(sel) {
      var allSels=document.getElementsByClassName("fillmein");
      for (var i=0;i<allSels.length;i++) {
          if (allSels[i]!=sel) {
              console.log(allSels[i].id)
              allSels[i].style.display='none';
              inputs = allSels[i].getElementsByTagName('input');
              if (inputs.length > 0) {
                var j = 0;
                while (j<inputs.length && typeof inputs[j] !== 'undefined'){
                  inputs[j].value = "";
                  j++;
                }
              }
              
          }    
      }
    }

	});
// Applicant Income
	// $('.getPay').hide();

	// $('#earnedIncomeCalcButton')
	//	.click(function(e) {
	//		e.preventDefault();
	//	})
	//	.popover({
	//		animation: false,
	//		html: true,
	//		placement: 'bottom',
	//		selector: false,
	//		trigger: 'click',
	//		title: 'Earned Income Calculator',
	//		content: function() {
	//			return $('#earnedIncomeCalcContent').html();
	//		},
	//		container: ''
	// });
	// $('#otherIncomeCalcButton')
	//	.click(function(e) {
	//		e.preventDefault();
	//	})
	//	.popover({
	//		animation: false,
	//		html: true,
	//		placement: 'top',
	//		selector: false,
	//		trigger: 'click',
	//		title: 'Other Income Calculator',
	//		content: function() {
	//			return $('#otherIncomeCalcContent').html();
	//		},
	//		container: ''
	// });

// Applicant Shelter

	// $('#housingCalcButton')
	//	.click(function(e) {
	//		e.preventDefault();
	//	})
	//	.popover({
	//		animation: false,
	//		html: true,
	//		placement: 'top',
	//		selector: false,
	//		trigger: 'click',
	//		title: 'Monthly Housing Calculator',
	//		content: function() {
	//			return $('#housingCalcContent').html();
	//		},
	//		container: ''
	// });

}); //end of document ready.


