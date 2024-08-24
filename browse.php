<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if(isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] === false) { 
  header("Location: signup.php");
}
//$pdo = new PDO(); // Add your own database for example: 'mysql:host=YourDatabaseHost;port=YourPort;dbname=YourDatabaseName;...etc'
$username = $_SESSION['username'];

$sql = "SELECT survey_id, survey_name, username FROM surveys WHERE username = :username";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->execute();

$yourSurveys = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT survey_id, survey_name, username FROM surveys";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Fetch the survey names and usernames
$publicSurveys = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <a class='navbuttons' href='build.php'>Build</a>
        <a class='navbuttons' id='logo' href='index.php'>Online Survey Web Application</a>
        <a class='navbuttons' href='logout.php'>Logout</a>
      </nav>");
    }

      
  ?>
      <div class="boxcontainter">
        <div class="box">
          <h1>Your Surveys:</h1>
          <hr>
          <?php
          // Display your surveys
              foreach ($yourSurveys as $survey) {
                  $surveyID = $survey['survey_id'];
                  $surveyName = $survey['survey_name'];
                  echo "<a class='button' href='survey.php?id=$surveyID'>$surveyName</a>";
              }
          ?>
        </div>
        <div class="box">
          <h1>Public Surveys:</h1>
          <hr>
          <?php
          // Display public surveys
          foreach ($publicSurveys as $survey) {
              $surveyName = $survey['survey_name'];
              $surveyCreator = $survey['username'];
              $survey_id = $survey['survey_id'];
              echo "<a class='button' href='survey.php?id=$survey_id'>$surveyName - Made by $surveyCreator</a>";
          }
          ?>
        </div>
      </div>
      
  

  


</body>

</html>