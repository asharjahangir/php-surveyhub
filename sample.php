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
      $email = $_SESSION['username'];

      echo("<nav>
        <a class='navbuttons' href='profile.php'>Profile</a>
        <a class='navbuttons' id='logo' href='index.php'>Online Survey Web Application</a>
        <a class='navbuttons' href='logout.php'>Logout</a>
      </nav>");
    }
  ?>


</body>

</html>