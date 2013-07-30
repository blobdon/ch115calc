<?php
  error_reporting(E_ALL & E_NOTICE);
  ini_set('display_errors', 'On');
  session_start();
?><!DOCTYPE html>
<?php
  // if ( !isset($_SESSION['form']) || !isset($_SESSION['index']) ){
  //   $_SESSION['form'] = array(
  //     0 => dirname(__FILE__).'/includes/intro.php',
  //     1 => dirname(__FILE__).'/includes/vetService.php',
  //     2 => dirname(__FILE__).'/includes/vetResidence.php',
  //     3 => dirname(__FILE__).'/includes/applFamily.php',
  //     4 => dirname(__FILE__).'/includes/applFinances.php',
  //     5 => dirname(__FILE__).'/includes/applShelter.php',
  //     6 => dirname(__FILE__).'/includes/results.php'
  //     );
  //   $_SESSION['index'] = 0;
  // }
  if ( !isset($_SESSION['questions']) ){
    $_SESSION['questions'] = array(
      'service' => array('status' => 'current', 'filename' => 'service.php'),
      'kdsm' => array('status' => 'none', 'filename' => 'kdsm.php'),
      'campaigns' => array('status' => 'none', 'filename' => 'campaigns.php'),
      'purpleHeart' => array('status' => 'none', 'filename' => 'purpleHeart.php'),
      'serviceDisablility' => array('status' => 'none', 'filename' => 'serviceDisablility.php'),
      'serviceDeath' => array('status' => 'none', 'filename' => 'serviceDeath.php')
      );
    $_SESSION['index'] = 0;
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
              <div class='span8 offset2 answered'>
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
    <div class='span8 offset2' id='questions'>
      <form class='form-horizontal' action="process.php" method='GET'>
        <?php foreach ($_SESSION['questions'] as $name => $array) {
                if ($array['status']==='current') {
                  include('./includes/questions/'.$array['filename']);
                }
              }
        ?>
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