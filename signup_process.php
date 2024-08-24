<?php
if (session_status() == PHP_SESSION_NONE) { // if session has already been started(index.php) no need to start again
    session_start();
}
//$pdo = new PDO(); // Add your own database for example: 'mysql:host=YourDatabaseHost;port=YourPort;dbname=YourDatabaseName;...etc'
$_SESSION["loggedin"] = false;

if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $repeatpassword = $_POST['repeatpassword'];

  $condition = ""; // this variable is used to check the condition of an input.

  if(empty($username) or empty($password) or empty($repeatpassword)){ // if any of the input is empty, then condition is set to "incomplete".
    $condition = "incomplete"; 
  }
  else if($password != $repeatpassword){ // if password and repeat password are not the same, then condition is set
    $condition = "mismatch";
  }
  else if (strlen($password) < 8 or !preg_match('/[A-Z]/', $password) or !preg_match('/[a-z]/', $password) or !preg_match('/\d/', $password)) {
      $condition = "weak"; // weak password
  }
  else{
    $sql = "SELECT COUNT(*) FROM users WHERE username = '$username'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $count = $stmt->fetchColumn();

    if($count > 0){ // if email is already registered, then condition is set to "registered".
      $condition = "registered";
    }
    else{
      $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$username, $password]);

      $_SESSION["username"] = $username; // using email for session as it will also be used in login_process.php
      $_SESSION["loggedin"] = true;
      header("Location: index.php");
    }
  }
}
?>