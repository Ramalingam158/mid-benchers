<?php

include_once "db.php";
	$name = mysqli_real_escape_string($_GLOBALS['conn'], $_POST['name']);
	$facId = mysqli_real_escape_string($_GLOBALS['conn'], $_POST['id']);
	$mail = mysqli_real_escape_string($_GLOBALS['conn'], $_POST['mail']);
	$dept = mysqli_real_escape_string($_GLOBALS['conn'], $_POST['dept']);
	$designation = mysqli_real_escape_string($_GLOBALS['conn'], $_POST['designation']);
	$pPass = mysqli_real_escape_string($_GLOBALS['conn'], $_POST['password']);
if ($name === "" || $facId === "" || $mail === "" || $dept === "" || $designation === "" || $pPass === "") {
	echo($name);
	echo($regno);
	echo($mail);
	echo($dept);
	echo($year);
	echo($pPass);
	//header("Location: ../register.php?q=ae");
}

$query = "SELECT * FROM teachers WHERE mail = '$mail'";
$res = mysqli_query($_GLOBALS['conn'], $query);
if(mysqli_num_rows($res) > 0){
	header("Location: ../register.php?q=ae");
	exit();
}

$pass = password_hash($pPass, PASSWORD_DEFAULT);


session_start();
//Student verification
$query = "INSERT INTO teachers(name, fac_id, dept, designation, mail, pwd) VALUES('$name', '$facId', '$dept', '$designation', '$mail', '$pass')";
$res = mysqli_query($_GLOBALS['conn'], $query);

header("Location: ../login.php");

?>