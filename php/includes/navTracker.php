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