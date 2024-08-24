<?php
session_start(); // starts session
if (!isset($_SESSION['loggedin'])) { // if user is not logged in it sets the loggedin session variable to false
    $_SESSION['loggedin'] = false;
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles.css">
  <title>Online Survey Web Application</title>
</head>

<body>
  <!-- Navigation Bar -->
  <?php 
    if(isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] === false) { // if not logged in, it displays the "Sign Up" and "Login" buttons
      echo("<nav>
            <a class='navbuttons' href='signup.php'>Sign Up</a>
            <a class='navbuttons' id='logo' href='index.php'>Online Survey Web Application</a>
            <a class='navbuttons' href='login.php'>Login</a>
          </nav>");
    }
    elseif(isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] === true and isset($_SESSION['username'])){
      echo("<nav>
        <a class='navbuttons' href='browse.php'>Browse</a>
        <a class='navbuttons' id='logo' href='index.php'>Online Survey Web Application</a>
        <a class='navbuttons' href='logout.php'>Logout</a>
      </nav>");
    }
  ?>
  

  <!-- <div class="loginprompt">
    <h1 class="text">Login or Sign up to proceed</h1>
  </div> -->
  <div class="homechoice">
    <a href="build.php" class="build">
      <span>Build</span>
      <span class="reveal-text">&nbsp;Surveys</span>
    </a>
    <a href="browse.php" class="browse">
      <span>Browse</span>
      <span class="reveal-text">&nbsp;Surveys</span>
    </a>
  </div>
  
  

</body>

</html>