<?php
if (session_status() == PHP_SESSION_NONE) { // if session has already been started(index.php) no need to start again, may not be needed for logout.php
    session_start();
}
  unset($_SESSION['loggedin']); // unsets loggedin session which turns back to false when redirected to index.php
  header("Location: index.php");
?>