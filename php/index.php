<?php
  error_reporting(E_ALL & E_NOTICE);
  ini_set('display_errors', 'On');
  session_start();
?><!DOCTYPE html>
<?php
  if ( !isset($_SESSION['questions']) ){
    include(dirname(__FILE__).'/includes/questions/questionsArray.php');
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
   <!--  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/bootstrap-responsive.css" rel="stylesheet"> -->
  <!-- additional -->
    <link rel="stylesheet" type="text/css" href="./css/datepicker.css">
    <link rel="stylesheet" type="text/css" href="./css/custom.css">
</head>
<body>
<!-- navigatio/progress tracker -->
  <?php include('./includes/navTracker.php'); ?>

  <div class='container'>
  <?php foreach ($_SESSION['questions'] as $name => $array) {
          if ($array['status']==='answered') : ?>
            <div class='row'>
              <div class='span8 offset2 question-answered'>
                <?php include('./includes/questions/'.$array['filename']);?>
                  <div class='reset-button'>
                    <form action="process.php" method='GET'>
                      <input type="submit" class='btn' name='Edit' value='Edit'>
                    </form>
                  </div>
              </div>
            </div>
          <?php endif;
        }?>
  <div class='row'>
    <div class='span8 offset2 question-current' id='questions'>
      <form class='form-horizontal' action="process.php" method='GET'>
        <?php foreach ($_SESSION['questions'] as $name => $array) {
                if ($array['status']==='current') {
                  include('./includes/questions/'.$array['filename']);
                }
              }
        ?><br><br><br>
        <?php echo $_SESSION['index']<6?"<input type='submit' class='btn btn-primary btn-large' name='submit' value='Continue'> ":'';?>
        <?php echo $_SESSION['index']>0?"<button type='submit' class='btn btn-large' name='submit' value='Back'>Go Back</button>":'';?>
      </form>
    </div>

  </div> <!-- main container row -->
    <div id='header' class='text-center'>

      <?php //echo $_SESSION['index'].'<br>'.$_SESSION['form'][$_SESSION['index']];  ?>
    </div>
      <?php
        print('<pre>');
        echo 'Session ';
        print_r($_SESSION);
        print('</pre>');
     ?>
  </div> <!-- main container -->

<!-- 
   <script src="./js/jquery-1.10.2.min.js"></script>
   <script src="./js/bootstrap.min.js"></script>
   <script type="text/javascript" src="./js/bootstrap-datepicker.js"></script>
   <script type="text/javascript" src="./js/date.js"></script>
   <script type="text/javascript" src="./js/mine.js"></script>
 -->
</body>
</html>