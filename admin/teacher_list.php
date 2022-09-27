<?php
include_once"let_pane.php";
include_once"../includes/db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Teachers Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>Number</th>
                                            <th>Designation</th>
                                            <th>E-mail</th>
                                            <th>Tests posted</th>
                                        </tr>
                                    </thead>
                                   	<tbody>
                                        <?php
                                		$sql = "SELECT * FROM teachers";
                                		$res = mysqli_query($conn, $sql);
                                		while ($row = mysqli_fetch_array($res)) {
                                			$id = $row['id'];
                                			$name = $row['t_name'];
                                			$dept = $row['dept'];
                                			$num = $row['t_number'];
                                			$desig = $row['desig'];
                                			$mail = $row['t_mail'];
                                			$test_posted = $row['q_posted'];
                                		?>
                                    
                                        <tr>
                                            <td>Photo will be added soon</td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $dept; ?></td>
                                            <td><?php echo $num; ?></td>
                                            <td><?php echo $desig; ?></td>
                                            <td><?php echo $mail; ?></td>
                                            <td><?php echo $test_posted; ?></td>
                                            <td><a href="edit_teacher.php?id=<?php echo $id; ?>">Edit</a></td>
                                            <td><a href="delete.php?id=<?php echo $id; ?>">Delete</a></td>
                                        </tr>
                                    <?php
                                      }
		                            ?>  
                                    </tbody>
                                </table>
                            </div>
                            <button class="btn btn-primary col-2 offset-9"><a href="add_teacher.php">
                            	Add Teacher
                            </a>                            	
                            </button>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

</body>
</html>