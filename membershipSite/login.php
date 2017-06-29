<?php
session_start();
require 'classes/Membership.php';
$membership = new Membership();
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

if($conn->ping()){
	echo 'im in the sql';
}

if($_POST && !EMPTY($_POST['username']) && !empty($_POST['pwd'])){
  $response = $membership->validate_user($_POST['username'], $_POST['pwd']);

  $_SESSION['USERNAME'] = $_POST['username'];
  $_SESSION['PASSWORD'] = $_POST['pwd'];

}
?>

<!DOCTYPE html
<html>
<head>
  <title>Login to access the secret files!</title>
  <link rel = "stylesheet" type ="text/css" href="css/defaultcss.css">
  </head>

  <body>
  <div id = "login">
      <form method="post" action="">
          <h2>Login <small>enter your credentials</small></h2>
      <p>
        <label for="name">Username:</label>
        <input type="text" name = "username"/>
        </p>
      <p>
        <label for="pwd">Password:</label>
        <input type="password" name = "pwd"/>
      </p>
      <p>
        <input type='submit' id = "submit" name='submit' value='Login'>
      </form>

      <p><a href="register.php">Register</a></p>

      <?php if(isset($response)) echo "<h4 class='alert'>" . $response . "</h4"; ?>
  </div>
  </body>
  </html>
