<?php
include_once"includes/db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="../Styles/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<body>
<div class="col-lg-6 offset-3">
	<div class="card">
		<form action="" method="POST">
		<div class="card-header">
			<strong>Add a Teacher</strong>
		</div>
			<div class="card-body card-block">
			<div class="form-group">
				<label for="company" class=" form-control-label">Name</label>
				<input type="text" id="Name" name="name" placeholder="Enter the teacher name" class="form-control">
			</div>
			<div class="form-group">
				<label for="vat" class=" form-control-label">Department</label>
				<input type="text" id="vat" placeholder="Enter the department" name="dept" class="form-control">
			</div>
			<div class="form-group">
				<label for="street" class=" form-control-label">Number</label>
				<input type="text" id="street" placeholder="Enter the teacher number" name="num" class="form-control">
			</div>
			<div class="form-group">
				<label for="street" class=" form-control-label">Designation</label>
				<input type="text" id="street" placeholder="Enter the designation" name="desig" class="form-control">
			</div>
			<div class="form-group">
				<label for="street" class=" form-control-label">E-mail</label>
				<input type="text" id="street" placeholder="Enter the E-mail" name="mail" class="form-control">
				
			</div>
			<div class="form-group">
				<label for="street" class=" form-control-label">Password</label>
				<input type="text" id="street" placeholder="Enter the Password" name="pass" class="form-control">
				
			</div>
			<button id="payment-button" type="submit" name = "submit" class="btn btn-lg btn-info btn-block">
        	    <span id="payment-button-amount">Add</span>
        	</button>

		</div>
		</form>
	</div>
</div>
</body>
</html>

<?php

if(isset($_POST['submit'])){
	
	if(isset($_POST['submit'])) {
		$name = $_POST['name'];
		$dept = $_POST['dept'];
		$num = $_POST['num'];
		$desig = $_POST['desig'];
		$mail = $_POST['mail'];
		$pass = $_POST['pass'];


		$sql1 = "INSERT INTO `teachers` (`id`, `t_name`, `dept`, `t_number`, `desig`, `pass`, `t_roll`, `t_mail`, `t_photo`, `q_posted`) VALUES (NULL, '$name', '$dept', '$num', '$desig', '$pass', 'teacher', '$mail', '', '0');";

		$res = mysqli_query($conn, $sql1);



		if ($res){
			?>
		<script type="text/javascript">
			window.location = "teacher_list.php"
		</script>

			<?php
		}
	}
}

?>