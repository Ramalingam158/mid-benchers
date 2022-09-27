<?php

include_once "db.php";
	$name = mysqli_real_escape_string($_GLOBALS['conn'], $_POST['name']);
	$regno = mysqli_real_escape_string($_GLOBALS['conn'], $_POST['regno']);
	$mail = mysqli_real_escape_string($_GLOBALS['conn'], $_POST['email']);
	$dept = mysqli_real_escape_string($_GLOBALS['conn'], $_POST['dept']);
	$year = mysqli_real_escape_string($_GLOBALS['conn'], $_POST['year']);
	$pPass = mysqli_real_escape_string($_GLOBALS['conn'], $_POST['password']);
if ($name === "" || $regno === "" || $mail === "" || $dept === "" || $year === "" || $pPass === "")
{
	echo($name);
	echo($regno);
	echo($mail);
	echo($dept);
	echo($year);
	echo($pass);
}
session_start();

$query = "SELECT * FROM students WHERE mail = '$mail' OR rNo = '$regno'";
$res = mysqli_query($_GLOBALS['conn'], $query);
if(mysqli_num_rows($res) > 0){
	header("Location: ../register.php?q=aes");
	exit();
}

$pass = password_hash($pPass, PASSWORD_DEFAULT);

//Student verification
$query = "INSERT INTO students(name, rNo, mail, dept, year, pwd) VALUES('$name', '$regno', '$mail', '$dept', '$year', '$pass')";
$res = mysqli_query($_GLOBALS['conn'], $query);

header("Location: ../login.php");

?>