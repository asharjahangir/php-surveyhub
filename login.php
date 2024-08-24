<?php include "login_process.php"; ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles.css">
  <title>Online Survey Web Application</title>
</head>

<body>
  <!-- Navigation Bar -->
  <nav>
    <a class="navbuttons" href="signup.php">Sign Up</a>
    <a class="navbuttons" id="logo" href="index.php">Online Survey Web Application</a>
    <a class="navbuttons" href="login.php">Login</a>
  </nav>

  <div class="signupbackground">
  <div class="box">
    <div class="boxtitle">
      <h1>Login</h1>
      <span>Don't have an account? <a class="account" href="signup.php">Sign Up</a></span>
    </div>
    <?php if(isset($_POST['submit'])){
            switch ($condition) { // a switch case is used to output the appropriate message depending on the condition set in login_process.php
              case "incomplete":
                echo("Required fields are incomplete");
                break;
              case "failed":
                echo("Login failed");
                break;
            }
          }
    ?>
    <div class="signupform">
    <form action="" method="post">
      <input type="text" name="username" id="username" placeholder="Username" />
      <input type="password" name="password" placeholder="Password" id="password" />
      <input name="submit" type="submit" class="button" value="Login">
      </form>
    </div>
  </div>
  </div>

</body>

</html>
<?php require "login_process.php"; ?>