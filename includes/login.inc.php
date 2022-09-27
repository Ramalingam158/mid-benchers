<?php

include_once "db.php";

$mail = "";
$pass = "";
$role = "";
if (isset($_POST['mail']) && isset($_POST['pass'])) {
	$mail = mysqli_real_escape_string($_GLOBALS['conn'], $_POST['mail']);
	$pass = mysqli_real_escape_string($_GLOBALS['conn'], $_POST['pass']);
	$role = mysqli_real_escape_string($_GLOBALS['conn'], $_POST['role']);
} 
if ($mail === "" || $pass === "" || $role === "") 
{
	echo($mail);
	echo($pass);
	echo($role);
	?>
<script type="text/javascript">
	window.location = "../login.php?passId=null";
</script>
	<?php
}
session_start();
// echo $regno."<br>";
// echo $pass."<br>";
// echo $dept."<br>";

//Student verification

if($role == "student"){
	$query = "SELECT * FROM students WHERE mail = '$mail'";
	$res = mysqli_query($_GLOBALS['conn'], $query);
	if($res) {
		$row = mysqli_fetch_array($res);
		if($mail === $row['mail']){
			if(password_verify($pass, $row['pwd'])) {
				$_SESSION['name'] = $row['name'];
				$_SESSION['whoisit'] = "student";
				$_SESSION['dept'] = $row['dept'];
				$_SESSION['year'] = $row['year'];
				$_SESSION['mail'] = $row['mail'];
				// He or She is a student
				?>
				<script type="text/javascript">
					window.location = "../index.php";
				</script>
				<?php
			} else {
				// Wrong password
				?>
				<script type="text/javascript">
					window.location = "../login.php?passId=Wrong Password";
				</script>
				<?php
			}
		} else {
			// Mail id is wrong

			echo $mail;
			?>
			<script type="text/javascript">
				window.location = "../login.php?passId=Invalid Mail ID";
			</script>
			<?php
		}
	} else {
		// Mail id is wrong

		echo $mail;
		?>
		<script type="text/javascript">
			window.location = "../login.php?passId=Invalid Mail ID";
		</script>
		<?php
	}
		
} elseif($role == "faculty"){

	// Staff verification

	$query = "SELECT * FROM teachers WHERE mail = '$mail' || pwd = '$pass'";
	$res = mysqli_query($_GLOBALS['conn'], $query) OR mysqli_error($_GLOBALS['conn']);
	if($res) {

		$row1 = mysqli_fetch_array($res);

		if($row1['mail'] === $mail)
		{

			if(password_verify($pass, $row1['pwd']))
			{
				// He or She is a staff
					?>
					<?php
					// Storing values in Session variables
					$_SESSION['name'] = $row1['name'];
					$_SESSION['ID'] = $row1['facultyId'];
					$_SESSION['dept'] = $row1['dept'];
					$_SESSION['designation'] = $row1['designation'];
					$_SESSION['contact'] = $row1['contact'];
					$_SESSION['mail'] = $row1['email'];
					$_SESSION['whoisit'] = "teacher";

				?>
				<script type="text/javascript">
					window.location = "../Teacher/index.php";
				</script>
				<?php
			} else {
				// Wrong password
				?>
				<script type="text/javascript">
					window.location = "../login.php?passId=Wrong Password";
				</script>
				<?php
			}
		} else {
			// Faculty ID is wrong
			?>
			<script type="text/javascript">
				window.location = "../login.php?passId=Invalid Mail ID";
			</script>
			<?php
		}

	} else {
		?>
		<script type="text/javascript">
			window.location = "../login.php?passId=Invalid Mail ID";
		</script>
		<?php
	}
}
?>