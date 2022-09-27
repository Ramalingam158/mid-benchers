<?php
include_once"includes/db.php";
include_once"let_pane.php";

	$id = $_GET['id'];
$sql = "SELECT * FROM teachers WHERE id = $id";
$res = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($res)){
	
	$name = $row['t_name'];
	$dept = $row['dept'];
	$num = $row['t_number'];
	$desig = $row['desig'];
	$mail = $row['t_mail'];

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

    <link rel="stylesheet" href="../Styles/endors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/endors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Styles/endors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../Styles/endors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../Styles/endors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../Styles/endors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="../Styles/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<body>
<div class="col-lg-6 offset-3">
	<div class="card">
		<form action="" method="POST">
		<div class="card-header">
			<strong>Edit Form</strong>
		</div>
			<div class="card-body card-block">
			<div class="form-group">
				<label for="company" class=" form-control-label">Name</label>
				<input type="text" id="company" name="name" placeholder="Enter your company name" class="form-control" value="<?php echo $name; ?>">
			</div>
			<div class="form-group">
				<label for="vat" class=" form-control-label">Department</label>
				<input type="text" id="vat" placeholder="DE1234567890" name="dept" class="form-control" value="<?php echo $dept; ?>">
			</div>
			<div class="form-group">
				<label for="street" class=" form-control-label">Number</label>
				<input type="text" id="street" placeholder="Enter street name" name="num" class="form-control" value="<?php echo $num; ?>">
			</div>
			<div class="form-group">
				<label for="street" class=" form-control-label">Designation</label>
				<input type="text" id="street" placeholder="Enter street name" name="desig" class="form-control" value="<?php echo $desig; ?>">
			</div>
			<div class="form-group">
				<label for="street" class=" form-control-label">E-mail</label>
				<input type="text" id="street" placeholder="Enter street name" name="mail" class="form-control" value="<?php echo $mail; ?>">
				<?php
			}
				?>
			</div>
			<button id="payment-button" type="submit" name = "submit" class="btn btn-lg btn-info btn-block">
        	    <span id="payment-button-amount">Edit</span>
        	</button>

		</div>
		</form>
	</div>
</div>
</body>
</html>

<?php

if(isset($_POST['submit']))
{

$name1 = $_POST['name'];
$dept1 = $_POST['dept'];
$num1 = $_POST['num'];
$desig1 = $_POST['desig'];
$mail1 = $_POST['mail'];


$sql1 = "UPDATE `teachers` SET `t_name` = '$name1', `dept` = '$dept1', `t_number` = '$num1', `desig` = '$desig1', `t_mail` = '$mail1' WHERE `teachers`.`id` = $id";

$res = mysqli_query($conn, $sql1);



if ($res) {
	?>
<script type="text/javascript">
	window.location = "teacher_list.php"
</script>

	<?php
}
}











