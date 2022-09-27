<?php

include_once "../../includes/db.php";

if(isset($_POST['submit'])){
	$id = mysqli_real_escape_string($_GLOBALS['conn'], $_POST['id']);
	$tname = $_SESSION['name'];
	$answer = mysqli_real_escape_string($_GLOBALS['conn'], $_POST['answer']);
	$mail = mysqli_real_escape_string($_GLOBALS['conn'], $_POST['mail']);
	$tmail = $_SESSION['mail'];
	$query = "SELECT * FROM unanswered WHERE id = $id";
    $res = mysqli_query($_GLOBALS['conn'], $query);
    $row = mysqli_fetch_array($res);

    $title = mysqli_real_escape_string($_GLOBALS['conn'], $row['title']);
    $subject = mysqli_real_escape_string($_GLOBALS['conn'], $row['subject']);
    $question = mysqli_real_escape_string($_GLOBALS['conn'], $row['question']);
	$sqlinsert = "INSERT INTO answered(title, subject, smail, tname, tmail, question, answer) VALUES('$title', '$subject', '$mail', '$tname', '$tmail', '$question', '$answer')";
	$result1 = mysqli_query($_GLOBALS['conn'], $sqlinsert);
	if (!$result1) {
		echo "Query failed ".mysqli_error($conn);
	} else {
		$sql3 = "DELETE FROM unanswered WHERE id = $id";
		$result2 = mysqli_query($_GLOBALS['conn'], $sql3);
		if (!$result2) {
			echo "Couldn't delete from Unanswered ".mysqli_error($conn);
		} else {
			header("Location: ../index.php?q=");
		}	
	}
}

?>