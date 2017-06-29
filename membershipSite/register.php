<?php
require_once 'includes/constants.php';
session_start();


if($_POST && !EMPTY($_POST['new_username']) && !empty($_POST['new_userpwd'])){

    $db= new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or 
            die('There was a problem connecting to the database.');

    $NEWUSER = $_POST['new_username'];
    $NEWUSER_PWD = $_POST['new_userpwd'];
    $NEWUSER_PWD = md5($NEWUSER_PWD);

     $check = mysqli_query($db,"SELECT * FROM users WHERE username = '$NEWUSER'"); 
     if ($check->num_rows > 0) echo "Username already taken";
     
     else{
        $sql = "INSERT INTO users(username,password) VALUES ('$NEWUSER','$NEWUSER_PWD')";
        mysqli_query($db, $sql);
        echo "insert complete";
  }

}
?>

<!DOCTYPE html
<html>
<head>
  <title>register a new user</title>
  <link rel = "stylesheet" type ="text/css" href="css/defaultcss.css">
  </head>

    <body>
  <div id = "login">
      <form method="post" action="">
          <h2>Welcome <small>register a new user</small></h2>
      <p>
        <label for="name">Enter Username:</label>
        <input type="text" name = "new_username"/>
        </p>
      <p>
        <label for="pwd">Enter Password:</label>
        <input type="password" name = "new_userpwd"/>
      </p>
      <p>
        <input type='submit' id = "register" name='register' value='Register'>
      </form>