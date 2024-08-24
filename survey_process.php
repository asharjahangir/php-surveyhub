<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if(isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] === false) { 
  header("Location: signup.php");
  $_SESSION['loggedin'] = false;
}

  $username = $_SESSION['username'];
  //$pdo = new PDO(); // Add your own database for example: 'mysql:host=YourDatabaseHost;port=YourPort;dbname=YourDatabaseName;...etc'
 
$stmt = $pdo->prepare("INSERT INTO answers (survey_id, question_id, answer_text, username) VALUES (?, ?, ?, ?)");

foreach ($_POST['answer'] as $questionId => $answer) {
  $surveyId = $_GET['id']; // Assuming you have the survey ID available in the form

  // Bind the parameters and execute the statement
  $stmt->execute([$surveyId, $questionId, $answer, $username]);
}

header("Location: browse.php");
  
  ?>