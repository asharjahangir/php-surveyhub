<?php
if (session_status() == PHP_SESSION_NONE) { // if session has already been started(index.php) no need to start again
    session_start();
}
//$pdo = new PDO(); // Add your own database for example: 'mysql:host=YourDatabaseHost;port=YourPort;dbname=YourDatabaseName;...etc'
$_SESSION["loggedin"] = false; // sets loggedin session to false as a default

if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $condition = ""; // this variable is used to check the condition of an input.

  if(empty($username) or empty($password)){ // not required for the task but is their to be consistent with signup_process.php
    $condition = "incomplete";
  }
  else {
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $count = $stmt->rowCount();

    if($count > 0){
      // using email for sessions(will also be used to validate if admin logs in), sets logged in session to true
      $_SESSION["username"] = $username;
      $_SESSION["loggedin"] = true;
      header("Location: index.php");
    }
    else{
      $condition = "failed";
    }
  }
}


?>