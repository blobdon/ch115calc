function displayPopup(alert_MSG) {
    var theDetail = document.getElementById('flyBox');
        theDetail.style.display="block";
}
 
function closePopup(alert_MSG) {
    
    var theDetail = document.getElementById('flyBox');
    
    if (theDetail.style.display=="block") {
        theDetail.style.display="none";
    }
}
function modifiedclosePopup(alert_MSG,box) {
    if (box == 'monthly') {
      income = document.getElementById('monthlyweek1');
      submission = document.getElementById('earnedIncome');
      submission.value = income.value;
    }
    if (box == 'twicemonth') {
      week1 = document.getElementById('twicemonthweek1');
      week2 = document.getElementById('twicemonthweek2');
      submission = document.getElementById('earnedIncome');
      submission.value = Number(week1.value) + Number(week2.value);
    }
    if (box == 'biweekly') {
      week1 = document.getElementById('biweeklyweek1');
      week2 = document.getElementById('biweeklyweek2');
      submission = document.getElementById('earnedIncome');
      submission.value = (Number(week1.value) + Number(week2.value))*4.33/4;
    }
    if (box == 'weekly') {
      week1 = document.getElementById('weeklyweek1');
      week2 = document.getElementById('weeklyweek2');
      week3 = document.getElementById('weeklyweek3');
      week4 = document.getElementById('weeklyweek4');

      submission = document.getElementById('earnedIncome');
      submission.value = Math.round((Number(week1.value) + Number(week2.value)+Number(week3.value)+Number(week4.value))*4.33/4);
    }
    var theDetail = document.getElementById(alert_MSG);
    
    if (theDetail.style.display=="block") {
        theDetail.style.display="none";
    }
} 


window.onload=function() {
  document.getElementById("choices").onchange=function() {
    hideAll(this); 
    var id = this.value;
    if (id) show(id);
  }
}

function displayPopup(alert_MSG) {
    var theDetail = document.getElementById('flyBox');
        theDetail.style.display="block";
}
 
function closePopup(alert_MSG) {
    
    var theDetail = document.getElementById('flyBox');
    
    if (theDetail.style.display=="block") {
        theDetail.style.display="none";
    }
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
