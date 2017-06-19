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


