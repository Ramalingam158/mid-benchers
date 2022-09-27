<?php

session_start();
include_once"db.php";
 if (isset($_POST['submit'])) {
  $subject = mysqli_real_escape_string($_GLOBALS['conn'], $_POST['subject']);
  $title = mysqli_real_escape_string($_GLOBALS['conn'], $_POST['title']);
  $sname = mysqli_real_escape_string($_GLOBALS['conn'], $_SESSION['name']);
  $smail = mysqli_real_escape_string($_GLOBALS['conn'], $_SESSION['mail']);
  $question = mysqli_real_escape_string($_GLOBALS['conn'], $_POST['question']);

 $sql = "INSERT INTO unanswered(subject, title, sname, smail, question) VALUES('$subject', '$title', '$sname', '$smail', '$question')";
 $result = mysqli_query($_GLOBALS['conn'], $sql);
 if (!$result) {
     echo "Query failed ".mysqli_error($conn);
 } else {
     header("Location: ../index.php?q=s");
 } 
 } else {
    echo("Not inserted");
 }

?>