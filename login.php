<?php session_start(); 

include_once "includes/db.php";
$passId = '';
if (isset($_GET['passId'])) {
    $passId = $_GET['passId'];
} elseif(isset($_SESSION['whoisit']) && $_SESSION['whoisit'] == "student"){
    header("Location: index.php");
} elseif(isset($_SESSION['whoisit']) && $_SESSION['whoisit'] == "teacher"){
    header("Location: Teacher/index.php");
} 

?>

<!DOCTYPE html>
<html>
<head>
    <title>Middle Benchers</title>
    <link rel="stylesheet" type="text/css" href="Styles/css/loginkg.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
</head>
<body>    
    <div class="row">
        <div class="col-md-4 mb-2">
            <div class="C" style="height: 500px;">
                <form action="includes/login.inc.php" method = "POST" style="border-radius: 10px;">
                    <h1>Middle Benchers</h1><br>
                    <input type="email" name="mail" placeholder="Email" style="border-radius: 50px;">
                    <input type="password" name="pass" placeholder="Password"style="border-radius: 50px;">
                    
                    <select name="role" id="select" class="form-select" required>
                        <option value="">Login As</option>
                        <option value="student">Student</option>
                        <option value="faculty">Teacher</option>
                    </select>
                    <br>
                    <button>Submit</button>
                    <a href="register.php">New User!</a>
                <?php
                if(isset($_GET['passId'])){
                ?>
                    <span style="color: red ;"><h2>Login Failed!<br> <?php echo $passId; ?></h2></span>
                <?php
                }
                ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>