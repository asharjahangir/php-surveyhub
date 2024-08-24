<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false) {
    header("Location: signup.php");
}

  //$pdo = new PDO(); // Add your own database for example: 'mysql:host=YourDatabaseHost;port=YourPort;dbname=YourDatabaseName;...etc'

  // Retrieve survey_id from the query string
  $surveyID = $_GET['id'];

  // Retrieve survey details
  $sql = "SELECT survey_name, survey_description FROM surveys WHERE survey_id = :surveyID";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':surveyID', $surveyID);
  $stmt->execute();
  $survey = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($survey) {
      $surveyName = $survey['survey_name'];
      $surveyDescription = $survey['survey_description'];

      // Retrieve questions associated with the survey
      $sql = "SELECT question_id, question_text, option_1, option_2, option_3, option_4, option_5 FROM questions WHERE survey_id = :surveyID";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':surveyID', $surveyID);
      $stmt->execute();
      $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    if(isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] === true and isset($_SESSION['username'])){
      $email = $_SESSION['username'];

      echo("<nav>
        <a class='navbuttons' href='browse.php'>Browse</a>
        <a class='navbuttons' id='logo' href='index.php'>Online Survey Web Application</a>
        <a class='navbuttons' href='logout.php'>Logout</a>
      </nav>");
    }
  ?>
      <div class="boxcontainer">
        <div class="box">
          <form method="post" action="survey_process.php?id=<?php echo $surveyID; ?>">
            <?php foreach ($questions as $question): ?>
              <p><?php echo $question['question_text']; ?></p>
              <?php if ($question['option_1'] === '' && $question['option_2'] === '' && $question['option_3'] === '' && $question['option_4'] === '' && $question['option_5'] === ''): ?>
                <input type="text" name="answer[<?php echo $question['question_id']; ?>]" required><br>
              <?php else: ?>
                <div class="radio-options">
                  <label class="radio-label">
                    <input type="radio" name="answer[<?php echo $question['question_id']; ?>]" value="option_1" <?php if ($question['option_1'] === '') { echo 'style="display:none;"'; } ?>>
                    <?php echo $question['option_1']; ?>
                  </label>
                  <label class="radio-label">
                    <input type="radio" name="answer[<?php echo $question['question_id']; ?>]" value="option_2" <?php if ($question['option_2'] === '') { echo 'style="display:none;"'; } ?>>
                    <?php echo $question['option_2']; ?>
                  </label>
                  <label class="radio-label">
                    <input type="radio" name="answer[<?php echo $question['question_id']; ?>]" value="option_3" <?php if ($question['option_3'] === '') { echo 'style="display:none;"'; } ?>>
                    <?php echo $question['option_3']; ?>
                  </label>
                  <label class="radio-label">
                    <input type="radio" name="answer[<?php echo $question['question_id']; ?>]" value="option_4" <?php if ($question['option_4'] === '') { echo 'style="display:none;"'; } ?>>
                    <?php echo $question['option_4']; ?>
                  </label>
                  <label class="radio-label">
                    <input type="radio" name="answer[<?php echo $question['question_id']; ?>]" value="option_5" <?php if ($question['option_5'] === '') { echo 'style="display:none;"'; } ?>>
                    <?php echo $question['option_5']; ?>
                  </label>
                </div>
              <?php endif; ?>
              <br>
            <?php endforeach; ?>
            </div>
            <div class="box">
              <input class="button" type="submit" value="Submit">
            </div>
          </form>
        
      </div>
  


</body>

</html>