<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if(isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] === false) { 
  header("Location: signup.php");
}
$username = $_SESSION["username"];
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
    if(isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] === true and isset($_SESSION['username'])){
  

      echo("<nav>
        <a class='navbuttons' href='browse.php'>Browse</a>
        <a class='navbuttons' id='logo' href='index.php'>Online Survey Web Application</a>
        <a class='navbuttons' href='logout.php'>Logout</a>
      </nav>");
    }
  ?>

  <div class="section">
    <h1>Build a Survey</h1>
  </div>
  
    <div>
      <form method="POST" action="build_process.php">
        <div class="section">
          <label for="title">Title:</label>
          <input type="text" id="title" name="survey_name" required><br><br>

          <label for="description">Description:</label><br>
          <textarea id="description" name="survey_description" rows="4" cols="50" required></textarea><br><br>
        </div>

        <?php
          for($i = 1; $i <= 10; $i++) {
            echo("<div class='section'>
                    <label for='questions'>$i.</label>
                    <input id='questions' name='question[$i]' placeholder='Type your question here'><br><br>
          
                    <label for='options'>&emsp;</label>
                    <input id='options' name='option[$i][1]'  placeholder='Option'><br>
                    <label for='options'>&emsp;</label>
                    <input id='options' name='option[$i][2]'  placeholder='Option'><br>
                    <label for='options'>&emsp;</label>
                    <input id='options' name='option[$i][3]'  placeholder='Option'><br>
                    <label for='options'>&emsp;</label>
                    <input id='options' name='option[$i][4]'  placeholder='Option'><br>
                    <label for='options'>&emsp;</label>
                    <input id='options' name='option[$i][5]'  placeholder='Option'><br>
                  </div>");
          }
        ?>
        
        <div class="section">
          <input type="submit" value="Publish" class="button">
        </div>
        
      </form>
    </div>
 
  

  

</body>

</html>