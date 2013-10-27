<?php
  error_reporting(E_ALL & E_NOTICE);
  ini_set('display_errors', 'On');
  session_start();
?><!DOCTYPE html>
<?php
  if ( !isset($_SESSION['current']) ){
    $_SESSION['current'] = 'intro';
    //require(dirname(__FILE__).'/includes/questions/questionsArray.php');
  }
  require_once(dirname(__FILE__).'/includes/myFunctions.php');
?>

<html lang='en'>
<html>
<head>
  <link rel="icon"
      type="image/png"
      href="/img/calc-favicon.png">
  <title>Ch115 Calc</title>
  <!-- Bootstrap -->
    <link href="./css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/bootstrap-responsive.min.css" rel="stylesheet">
  <!-- additional -->
    <link rel="stylesheet" type="text/css" href="./css/datepicker.css">
    <link rel="stylesheet" type="text/css" href="./css/custom.css">
</head>
<body>
  <div id='header'>
    <div class='container'>
      <div class='row'>
        <span>Veterans Legal Clinic</span>
        &nbsp;<img src="./img/HLSVetClinicLogoHeader.png" alt="HLS Veterans Legal Clinic">&nbsp;
        <span>of the Legal Service Center</span> 
        &nbsp;<img src="./img/HLSLogoHeader.png" alt="Harvard Law School">&nbsp;
        <span>at Harvard Law School</span>
      </div>
    </div>
  </div>

  <div id='content'>
  <div class='container'>
    <div class='row'>
      <div class='span12'>
        <h2>Contact Us with Questions or Concerns</h2>
      </div>
    </div>
    <div class='row'>
      <div id='answers span12'>
        
      </div>
    </div>

    <div class='row'>
      <div class='span12 question-current' id='questions'>
      <?
      if (isset($_GET['a'])) {
		  if($_GET['a'] == "send") {
			  $headers = '';
			  $body = "We have a problem!";
			  $to = $_POST['emailInsert'];
			  $subject = "Request for Help";
			  mail($to, $subject, strip_tags($body), $headers);
	  ?>  
	  <tr><td><h3>Your Request Has Been Sent!</h3></td></tr>

	  <?  
      	}
      }
      else {
      ?>
      	<table border="0">
<!-- 		<tr><td></td></tr> -->
		<tr><td><h3>Visit us</h3></td></tr>
		<tr><td>122 Boylston Street</td></tr>
		<tr><td>Jamaica Plain, MA 02130</td></tr>
		<tr><td><h3>Call Us</h3></td></tr>
		<tr><td>617-522-3003</td></tr>
      	</table>
      	<br>
      	<table border="0">

      	<tr><td><h3>Email Us</h3></td></tr>
        <form class='form' action="contact.php?a=send" method='POST'>
    	<td>First name: </td><td><input type='text' name='firstNameInsert' size=15></td></tr><tr>
    	<td>Last name: </td><td><input type='text' name='lastNameInsert' size=15></td></tr><tr>
    	<td>Email: </td><td><input type='text' name='emailInsert' size=15></td></tr><tr>
    	<td>Phone: </td><td><input type='text' name='phoneInsert' size=15></td></tr><tr>
    	<td>Summary of the problem: </td><td><textarea name="complaintInsert" style="resize: vertical;" size="64"></textarea></td></tr><tr>
		</table><input type="submit" class='btn btn-alert pull-left' name="add" value="Add" />
        </form>
      </div>
	<?
	}
	?>
    </div> <!-- end of main container row -->

      <?php
        // print('<pre>');
        // echo 'Session ';
        // print_r($_SESSION);
        // print('</pre>');
     ?>
  </div> <!-- end of main container -->
  </div>
  <div id='help-banner'>
      Have Questions? Need Help? <a href="contact.php">Contact Us.</a>
  </div>
  <div id='footer'>
    <?php //include('./includes/footer.php'); ?>
    <div class='container'>
      <div class='row'>
        <div class='span3'>
          <b>Veterans Clinic</b>
          <ul>
            <li>Home</li>
            <li>About</li>
            <li>Service</li>
          </ul>
        </div>
        <div class='span3'>
          <b>Legal Services Center</b>
          <ul>
            <li>Home</li>
            <li>About</li>
            <li>Service</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

   <script src="/js/jquery-1.10.2.min.js"></script>
   <script src="/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="/js/bootstrap-datepicker.js"></script>
   <script type="text/javascript" src="/js/date.js"></script>
   <script type="text/javascript" src="/js/mine.js"></script>

</body>
</html>