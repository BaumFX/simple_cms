<?php

  session_start();

  if(isset($_SESSION['logged_in'])) {
    header("Location: cms.php");
    die();
  }

  if(isset($_POST['username']) && isset($_POST['password'])) {
    include("php/cms/login.php");
    $login = new Login($_POST['username'], $_POST['password']);

    if($login->verifyCredentials()) {
      $_SESSION['logged_in'] = true;
      $_SESSION['aid'] = $login->aid;
      header("Location: cms.php");
      die();
    } else {
      echo "Bad login";
      die();
    }
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" method="post">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="submit" name="submit" value="Login">
    </form>
  </body>
</html>
