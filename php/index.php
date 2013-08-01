<?php
  error_reporting(E_ALL & E_NOTICE);
  ini_set('display_errors', 'On');
  session_start();
?><!DOCTYPE html>
<?php
  if ( !isset($_SESSION['current']) ){
    $_SESSION['current'] = 'service';
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
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
  <!-- additional -->
    <link rel="stylesheet" type="text/css" href="./css/datepicker.css">
    <link rel="stylesheet" type="text/css" href="./css/custom.css">
</head>
<body>
<!-- navigatio/progress tracker -->
  <?php include('./includes/navTracker.php'); ?>

  <div class='container'>
    <?php if (isset($_SESSION['answered'])) { foreach ($_SESSION['answered'] as $question) :?>
      <div class='row'>
        <div class='span8 offset2 question-answered'>
          <div class=''><?php include('./includes/questions/'.$question.'Q.php');?></div>
          <div class='answer'><?php include('./includes/questions/'.$question.'Answer.php');?></div>
          <div class='reset-button'>
            <form action="process.php" method='GET'>
              <button type="submit" class='btn btn-link' name='edit' value='edit<?php echo $question ?>'>Change</button>
            </form>
          </div>
        </div>
      </div>
    <?php endforeach; }?>
    <a id='spot'></a>
    <div class='row'>
      <div class='span8 offset2 question-current' id='questions'>
        <form class='form-horizontal' action="process.php" method='GET'>
          <?php if ($_SESSION['current']==='results') :?>
            <?php include('./includes/results.php');?>
          <?php else :?>
            <h4><?php include('./includes/questions/'.$_SESSION['current'].'Q.php');?></h4>
            <?php include('./includes/questions/'.$_SESSION['current'].'Controls.php');?>
            <br>
            <input type='submit' class='btn btn-primary btn-large' name='submit' value='Continue'>
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

<!-- 
   <script src="./js/jquery-1.10.2.min.js"></script>
   <script src="./js/bootstrap.min.js"></script>
   <script type="text/javascript" src="./js/bootstrap-datepicker.js"></script>
   <script type="text/javascript" src="./js/date.js"></script>
   <script type="text/javascript" src="./js/mine.js"></script>
 -->
</body>
</html>