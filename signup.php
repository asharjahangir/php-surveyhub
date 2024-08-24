<?php include 'signup_process.php'; ?>
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
      <h1>Create Account</h1>
      <span>Already have an account? <a class="account" href="login.php">Login</a></span>
    </div>
    <div class="signupform">
      <?php if(isset($_POST['submit'])){
              switch ($condition) { // a switch case is used to output the appropriate message depending on the condition set in signup_process.php
                case "incomplete":
                  echo("Required fields are incomplete");
                  break;
                case "registered":
                  echo("Username already exists");
                  break;
                case "mismatch":
                  echo("Passwords do not match");
                  break;
                case "weak":
                  echo("Password does not meet the requirements");
                  break;
              }
            }
      ?>
    <form action="" method="post">
      <input type="text" name="username" id="username" placeholder="Username" />
      <input type="password" name="password" placeholder="Password (at least 8 alphanumeric characters, a combination of uppercase letters, lowercase letters and numbers)" id="password" />
      <input type="password" name="repeatpassword" placeholder="Repeat password" id="repeatpassword" />
      <input name="submit" type="submit" class="button" value="Sign Up">
      <!-- <button>Sign Up</button> -->
      </form>
    </div>
  </div>
  </div>

</body>

</html>