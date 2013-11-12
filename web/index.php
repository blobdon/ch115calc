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
        <span>Harvard Law School</span>
      </div>
    </div>
  </div>

  <div id='content'>
  <div class='container'>
    <div class='row'>
      <div class='span12'>
        <h2>Massachusetts Veterans' Benefits Online Eligibility Tool</h2>
      </div>

    </div>
    <div class='row'>
      <div id='answers span12'>
        <?php if (isset($_SESSION['answered'])) { foreach ($_SESSION['answered'] as $question) :?>
          <div class='row'>
            <div class='span8 offset1 question-answered'>
              <div class=''><?php include('./includes/questions/'.$question.'Q.php');?></div>
              <div class='answer'><?php include('./includes/questions/'.$question.'Answer.php');?></div>
              <div class='reset-button'>
                <form action="process.php" method='GET'>
                  <button type="submit" class='btn btn-link' name='edit' value='<?php echo $question ?>'>Edit</button>
                </form>
              </div>
            </div>
          </div>
        <?php endforeach; }?>
      </div>
    </div>

    <a id='spot'></a>
    <div class='row'>
      <div class='span12 question-current' id='questions'>
        <form class='form' action="process.php" method='GET'>
          <?php if ($_SESSION['current']==='intro') :?>
            <?php include('./includes/intro.php');?>
            <br>
            <button type="submit" class='btn btn-large btn-block btn-primary' name='begin' value='begin'>I have read and understand the Important Notes above and I wish to CONTINUE to the tool</button>
          <?php elseif ($_SESSION['current']==='results') :?>
            <?php include('./includes/results.php');?>
            <input type="submit" class='btn btn-warning pull-right' name='reset' value='reset'>
          <?php else :?>
            <div class='row'>
              <div class='span11 offset1'>
                <h4><?php include('./includes/questions/'.$_SESSION['current'].'Q.php');?></h4>
                <?php include('./includes/questions/'.$_SESSION['current'].'Controls.php');?>                
              </div>
            </div>
            <br>
            <div class='row'>
              <div class='span8 offset1'>
                <button type="submit" class='btn btn-large btn-primary' name='submit' value='<?php echo $_SESSION['current'];?>'>Continue</button>
                <input type="submit" class='btn btn-warning pull-right' name='reset' value='reset'>
              </div>
            </div>
          <?php endif; ?>
        </form>
      </div>

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