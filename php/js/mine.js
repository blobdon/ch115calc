$(document).ready(function() {
//Javascript visual differnces
	//$('#question-group').css('background-color', '#ffffff');
// Navigation
// Veteran Service
	// if ( $('#serviceStart').val() && $('#serviceEnd').val() ) {
	//	//checkService();
	//	if ( checkService()==='yes') {
	//		//hide any detailed questions that havent been answered yet b/c not necessary
	//		$('.service-details:not(:has(input:checked))').hide();
	//		//alert($('#serviceDays').val()+' during '+serviceEra+' is qualifying service. You may proceeed to next section');
	//	}
	//	else {
	//		$('.service-details').show();
	//	}
	//}
	//$('.service-details').hide();
	// defaults for serviceStart datepicker
	$('#serviceStart').datepicker({
		format: 'mm/dd/yy',
		startView: 'decade',
        endDate: '+0d',
        autoclose: true
    });
	// defaults for serviceEnd datepicker
	$('#serviceEnd').datepicker({
		format: 'mm/dd/yy',
		startView: 'decade',
        endDate: '+3y',
        autoclose: true
    });
	// when serviceStart/End, KDSM, or campaign checkboxes are changed
	$('#serviceStart, #serviceEnd')
		.change( function() {
			// change limits on other datepicker to prevent end before start
			$('#serviceEnd').datepicker('setStartDate',$('#serviceStart').val());
			$('#serviceStart').datepicker('setEndDate',$('#serviceEnd').val());

	});
	// $('.vetService :input')
	//	.change( function() {
	//		//check number of days and show/hide additional questions as appropriate
	//		if ( $('#serviceStart').val() && $('#serviceEnd').val() ) {
	//			//checkService();
	//			if ( checkService()==='yes') {
	//				//hide any detailed questions that havent been answered yet b/c not necessary
	//				//$('.service-details:not(:has(input:checked))').hide();
	//				//alert($('#serviceDays').val()+' during '+serviceEra+' is qualifying service. You may proceeed to next section');
	//			}
	//			else {
	//				$('.service-details').show();
	//			}
	//		}
	// });
//Veteran Residence
	//$('#vetResidePriorQ, #vetReside3YearsQ').hide(); //Hide question(s) not needed yet in this section
	$('#vetResidence :input')
		.change( function() {
			//check residence and show/hide additional questions as appropriate
			if ( checkResidence()==='yes' ) {
				//hide any detailed questions that havent been answered yet b/c not necessary
				$('#vetReside3YearsQ:not(:has(input:checked))').hide();
				$('#vetResidePriorQ:not(:has(input:checked))').hide();
				//alert('Qualifying residence. You may proceeed to next section');
				$('#vetResidenceNav').removeClass('alert-error').addClass('alert-success');
			}
			else {
				$('#vetResidenceNav').removeClass('alert-success').addClass('alert-error');
			}
	});
//Applicant Family
	//$('#liveWithSpouseQ').hide();
	// if married, ask appl whether lives with spouse
	$('[name=maritalStatus]')
		.click(function() {
			if ( $('#maritalStatusMarried').is(':checked')){
				$('#liveWithSpouseQ').show();
				$('#applAssetsMarriedQ').show();
				$('#applAssetsSingleQ').hide();
				//$('[name=applAssetsSingle]').prop('checked',false);
				//$('[name=applAssetsSingle]').val('');
			}
			else {
				$('#liveWithSpouseQ').hide();
				$('#applAssetsSingleQ').show();
				$('#applAssetsMarriedQ').hide();
				//$('[name=applAssetsMarried]').prop('checked',false);
				//$('[name=applAssetsMarried]').val('');
			}
		});
	// hide and show spouse related inccome questions based on married/single/living w/spouse
	$('[name=liveWithSpouse], [name=maritalStatus]')
		.click(function() {
			if ( $('#maritalStatusSingle').is(':checked')){
				$('.spouse').hide();
				//$("[name=liveWithSpouse]").prop('checked', false);
			}
			else if ( $('#liveWithSpouse0').is(':checked')){
				$('.spouse').hide();
			}
			else {
				$('.spouse').show();
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
// Applicant Assets
	// $('#applAssets :input')
	//	.click( function() {
	//		checkAssets();
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

var wars = [ /*These dates reflect MGL c4 s7 cl43rd, not including campaigns or merchant marines, as of 6/11/2013*/
    { name: 'WWI', begin: Date.parse('6-Apr-1917'), end: Date.parse('11-Nov-1918') },
    { name: 'WWII', begin: Date.parse('16-Sep-1940'), end: Date.parse('25-Jul-1947') },
    { name: 'KOREA', begin: Date.parse('25-Jun-1950'), end: Date.parse('31-Jan-1955') },
    { name: 'VIETNAM II', begin: Date.parse('5-Aug-1964'), end: Date.parse('7-May-1975') },
    { name: 'PERSIAN GULF', begin: Date.parse('2-Aug-1990'), end: Date.today() }
	],
	otherWars = [
    { name: 'Korea Defense Service Medal', begin: Date.parse('28-Jul-1954'), end: Date.today() },
    { name: 'Lebanese Peacekeeping Force', begin: Date.parse('25-Aug-1982'), end: Date.parse('1-Dec-1987') },
    { name: 'Grenada Rescue Mission', begin: Date.parse('25-Oct-1983'), end: Date.parse('15-Dec-1983') },
    { name: 'Panamanian Intervention Force', begin: Date.parse('20-Dec-1989'), end: Date.parse('31-Jan-1990') }
	],
	qualifyingDays = 0,
	wartimeService = 0,
	serviceEra = 'PEACETIME';


function isWarTime(){ // check user service dates against MGL definition of veteran
	var serviceStart = Date.parse($("#serviceStart").val()),
		serviceEnd = Date.parse($("#serviceEnd").val());
	// loop through war date ranges looking for overlap with service
	for (var i = wars.length - 1; i >= 0; i--) {
		if ( !( serviceStart > wars[i].end || wars[i].begin > serviceEnd) ) {
			// inverse of No overlap = overlap = wartime service
			wartimeService = 1;
			serviceEra = wars[i].name;
			return 1; //leave function because met wartime service threshold
		}
		else {
			wartimeService = 0;
			serviceEra = 'PEACETIME';
		}
	}
	//if no wartime service above, check cases of KDSM or campagin medals
	// -only need one to reach 'wartime' threshold, so exit if any satisfied
	// -I used if's here because each period must be matched to its own date range
	if ($('#kdsm1').is(':checked')) {
		if (!(serviceStart > Date.today() || Date.parse('28-Jul-1954') > serviceEnd)) {
			wartimeService = 1;
			serviceEra = "Korean Defense";
			return 1;
		}
	}
	else if ($('#Lcampaign').is(':checked')) {
		if (!(serviceStart > Date.parse('1-Dec-1987') || Date.parse('25-Aug-1982') > serviceEnd)) {
			// This date is what ends expeditionary medal dates for Lebanon
			// per (2008) 32 CFR §578.25 Armed Forces Expeditionary Medal
			// best official source i found
			wartimeService = 1;
			serviceEra = "Lebanon Campaign";
			return 1;
		}
	}
	else if ($('#Gcampaign').is(':checked')) {
		if (!(serviceStart > Date.parse('15-Dec-1983') || Date.parse('25-Oct-1983') > serviceEnd)) {
			wartimeService = 1;
			serviceEra = "Grenada Campaign";
			return 1;
		}
	}
	else if ($('#Pcampaign').is(':checked')) {
		if (!(serviceStart > Date.parse('31-Jan-1990') || Date.parse('20-Dec-1989') > serviceEnd)) {
			wartimeService = 1;
			serviceEra = "Panama Campaign";
			return 1;
		}
	}
}

// !!! Doesnt include disqualifiers yet
function checkService(){
	daysBT();
	if ( ($('#serviceDays').val()>=180) ||	// 180 days service in any Era = veteran
		($('#serviceDays').val()>=90 && isWarTime()===1) || // 90 days, at least one during wartime = veteran
		// not enough days for wartime or peacetime service, but meets exceptions.
		($('#serviceDays').val()<=180 && ( $('#purpleHeart1').is(':checked') ||
										$('#serviceDisability1').is(':checked') ||
										$('#serviceDeath1').is(':checked')
										))
		) {
		$('#eligibleService').val('yes');
		return 'yes';
	}
	else { // does not meet any of service thresholds = not veteran
		$('#eligibleService').val('no');
		return 'no';
	}
}

function daysBT() { //gives number of days between user service dates and returns to #serviceDays
    var a = new Date($("#serviceStart").val()),
        b = new Date($("#serviceEnd").val()),
        c = 24*60*60*1000, //milliseconds per day
        diffDays = Math.round(Math.abs((a - b)/(c)));
    $("#serviceDays").val(diffDays);
}

function checkResidence(){
	if ($('#vetReside1').is(':checked')) {
		$('#eligibleResidence').val('yes');
		return 'yes';
	}
	else {
		$('#eligibleResidence').val('no');
		return 'no';
	}
}
// compares assets answers (and marital status) to eligibility standards
// -updates eligibleAssets and colors nav tab as appropriate


