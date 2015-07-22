<?php
  require_once('autoload.php');
  try {
    $template = new Template();
  } catch (Exception $e) {
    echo "Gagal".$e->getMessage();
  }

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sign Up - Traveenation</title>
    <?php echo $template->css(); ?>
  </head>
  <body style="background: #fff">
    <div class="rowback">
      <h3>Sign Up</h3>
      <p>
        Join Traveenation, to stay update!
      </p>
        <a class="btn-floating btn-large waves-effect waves-light red back-btn hide-on-small-only" href="#"><i class="material-icons medium">arrow_back</i></a>
         <a class="btn-floating btn-large waves-effect waves-light blue login-btn hide-on-small-only"><i class="material-icons">person_add</i></a>
    </div>
    <div class="container form-signup">
      <div class="row">
        <div class="col s12 center-align">
        </div>
      </div>
      <form method="post" action="signup-control.php" class="col s12">
        <div class="row">
          <div class="input-field col s12">
            <input id="uname" type="text" name="idname" class="validate" required>
            <label for="unname">Username</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="fullname" type="text" name="fullname" class="validate" required>
            <label for="fullname">Full Name</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="passid" type="password" name="passwd" class="validate" required>
            <label for="passid">Password</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="email" type="email" name="email" class="validate" required>
            <label for="email">Email</label>
          </div>
        </div>
        <p>
          <i>If you click signup button. You automatically agreed our term an condition</i>
        </p>
        <button type="submit" class="waves-effect waves-light btn-large"><i class="material-icons left">send</i>Sign Up</button>
    </form>
    </div>

    <?php echo $template->javas() ?>
  </body>
</html>
