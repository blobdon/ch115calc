<?php
  error_reporting(E_ALL & E_NOTICE);
  ini_set('display_errors', 'On');
  session_start();
?><!DOCTYPE html>
<?php
  if ( !isset($_SESSION['form']) || !isset($_SESSION['index']) ){
    $_SESSION['form'] = array(
      0 => dirname(__FILE__).'/includes/intro.php',
      1 => dirname(__FILE__).'/includes/vetService.php',
      2 => dirname(__FILE__).'/includes/vetResidence.php',
      3 => dirname(__FILE__).'/includes/applFamily.php',
      4 => dirname(__FILE__).'/includes/applFinances.php',
      5 => dirname(__FILE__).'/includes/applShelter.php',
      6 => dirname(__FILE__).'/includes/results.php'
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

  <div class='container progress-tracker'>
    <br>
    <div class='hide row'>
      <div class='span2 text-center progress-tab <?php echo $_SESSION['index']==1?'current':'';?>'>
        <div class=''>Service<br><i class='icon-star'></i></div>
        <div class='pull-right progress-arrow'><i class='icon-arrow-right'></i></div>
      </div>
      <div class='span2 text-center progress-tab <?php echo $_SESSION['index']==2?'current':'';?>'>
        <div class=''>Residence<br><i class='icon-envelope'></i></div>
        <div class=' pull-right progress-arrow'><i class='icon-arrow-right'></i></div>
      </div>
      <div class='span2 text-center progress-tab <?php echo $_SESSION['index']==3?'current':'';?>'>
        <div class=''>Family<br><i class='icon-user'></i></div>
        <div class=' pull-right progress-arrow'><i class='icon-arrow-right'></i></div>
      </div>
      <div class='span2 text-center progress-tab <?php echo $_SESSION['index']==4?'current':'';?>'>
        <div class=''>Finances<br><i class='icon-briefcase'></i></div>
        <div class=' pull-right progress-arrow'><i class='icon-arrow-right'></i></div>
      </div>
      <div class='span2 text-center progress-tab <?php echo $_SESSION['index']==5?'current':'';?>'>
        <div class=''>Housing<br><i class='icon-home'></i></div>
        <div class=' pull-right progress-arrow'><i class='icon-arrow-right'></i></div>
      </div>
      <div class='span2 text-center progress-tab <?php echo $_SESSION['index']==6?'current':'';?>'>
        <div class=''>Results<br><i class='icon-list'></i></div>
      </div>
    </div>
    <div class='row'>
      <ul class='inline text-center'>
        <li class='progress-tab text-center  <?php echo $_SESSION['index']==0?'current':'';?>'>Intro<br><i class='icon-ok'></i></li>
        <li class=' progress-arrow text-center'><i class='icon-arrow-right'></i></li>
        <li class='progress-tab text-center  <?php echo $_SESSION['index']==1?'current':'';?>'>Service<br><i class='icon-star'></i></li>
        <li class=' progress-arrow text-center'><i class='icon-arrow-right'></i></li>
        <li class='progress-tab text-center  <?php echo $_SESSION['index']==2?'current':'';?>'>Residence<br><i class='icon-envelope'></i></li>
        <li class=' progress-arrow text-center'><i class='icon-arrow-right'></i></li>
        <li class='progress-tab text-center  <?php echo $_SESSION['index']==3?'current':'';?>'>Family<br><i class='icon-user'></i></li>
        <li class=' progress-arrow text-center'><i class='icon-arrow-right'></i></li>
        <li class='progress-tab text-center  <?php echo $_SESSION['index']==4?'current':'';?>'>Financial<br><i class='icon-briefcase'></i></li>
        <li class=' progress-arrow text-center'><i class='icon-arrow-right'></i></li>
        <li class='progress-tab text-center  <?php echo $_SESSION['index']==5?'current':'';?>'>Housing<br><i class='icon-home'></i></li>
        <li class=' progress-arrow text-center'><i class='icon-arrow-right'></i></li>
        <li class='progress-tab text-center  <?php echo $_SESSION['index']==6?'current':'';?>'>Results<br><i class='icon-list'></i></li>
      </ul>
    </div>
      <div class="hide pagination pagination-centered">
      <ul>
        <li><span class='text-center'>Service<br><i class='icon-star'></i></span></li>
        <li><span class='text-center'>Residence<br><i class='icon-envelope'></i></span></li>
        <li><span class='text-center'>Family<br><i class='icon-user'></i></span></li>
        <li><span class='text-center'>Financial<br><i class='icon-briefcase'></i></span></li>
        <li><span class='text-center'>Housing<br><i class='icon-home'></i></span></li>
        <li><span class='text-center'>Results<br><i class='icon-list'></i></span></li>
      </ul>
      </div>
      <div class='reset-button'>
        <form action="process.php" method='GET'>
          <!-- <input type="submit" class='btn btn-warning' name='submitBegin' value='Begin'> -->
          <input type="submit" class='btn btn-warning' name='submitReset' value='Reset'>
        </form>
      </div>
    </div> <!-- end of navigation div -->





  <div class='container'>
  <div class='row'>
    <div class='span2'>

    </div>
    <div class='span8' id='questions'>
      <form class='form-horizontal' action="process.php" method='GET'>
        <?php
          include($_SESSION['form'][$_SESSION['index']]);
          echo '<hr>';
          echo $_SESSION['index']>0?"<input type='submit' class='btn btn-primary btn-large' name='submit' value='Back'>":'';
          echo $_SESSION['index']<6?"<input type='submit' class='btn btn-primary btn-large pull-right' name='submit' value='Continue'>":'';
        ?>
      </form>
    </div>

  </div> <!-- main container row -->
    <div id='header' class='text-center'>

      <?php //echo $_SESSION['index'].'<br>'.$_SESSION['form'][$_SESSION['index']];  ?>
    </div>
      <?php
        //print('<pre>');
        //echo 'Session ';
        //print_r($_SESSION);
        //print('</pre>');
        //session_write_close();
     ?>
  </div> <!-- main container -->


   <script src="http://code.jquery.com/jquery.js"></script>
   <script src="./js/bootstrap.min.js"></script>
   <script type="text/javascript" src="./js/bootstrap-datepicker.js"></script>
   <script type="text/javascript" src="./js/date.js"></script>
   <script type="text/javascript" src="./js/mine.js"></script>

</body>
</html>