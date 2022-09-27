<?php  
session_start();

if (!isset($_SESSION['whoisit']) || $_SESSION['whoisit'] !== "student") {
    ?>
<script type="text/javascript">
    window.location = "login.php?passId=Login First";
</script>
    <?php
}
include_once "includes/db.php";
?>


<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student Panel</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="Styles/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Styles/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="Styles/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="Styles/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="Styles/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="Styles/vendors/jqvmap/dist/jqvmap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="Styles/assets/css/style.css">

    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'> -->
</head>

<body style="font-family: 'PT Serif', serif;">
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title"></h3><!-- /.menu-title -->
                    <li>
                        <a href="AskDoubt.php"> <i class="menu-icon ti-stamp"></i>Ask Doubt</a>

                    </li>
                    <li>
                        <a href="#"> <i class="menu-icon ti-notepad"></i>My Doubts</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">


        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Welcome, <strong><?php echo $_SESSION['name']; ?></strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="includes/logout.php"><button class="btn btn-primary">Logout</button></a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <h2><strong><center>My Questions</center></strong></h2><br>
        <h3 style="padding-left: 20px;"><strong>Answered So far</strong></h3><br>
        <?php
        $mail = $_SESSION['mail'];
        $query = "SELECT * FROM answered where smail = '$mail'";
        $res = mysqli_query($_GLOBALS['conn'], $query);
        if(mysqli_num_rows($res) > 0) {
            //echo($res);
            while($row = mysqli_fetch_array($res)){
                ?>
                <div class="card">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h3><strong><?php echo $row['title']; ?></strong></h3>
                            <h5><?php echo $row['subject']; ?> | <?php echo $row['tname']; ?></h5><br>
                            <h5><?php echo $row['question']; ?></h5><br>
                            <p><?php echo $row['answer']; ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h3>No questions to display</h3>
                        </div>
                    </div>
                </div>
            <?php
        }
        ?>
        
        <!-- Unanswered Questions -->

        <?php
        $mail = $_SESSION['mail'];
        $query = "SELECT * FROM unanswered where smail = '$mail'";
        $res = mysqli_query($_GLOBALS['conn'], $query);
        if(mysqli_num_rows($res) > 0) {
        ?> 
        <hr> 
        <h3 style="padding-left: 20px;"><strong>Yet to be Answered...</strong></h3><br>
        <?php
            //echo($res);
            while($row = mysqli_fetch_array($res)){
                ?>
                <div class="breadcrumbs">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h3><strong><?php echo $row['title']; ?></strong></h3>
                            <h5><?php echo $row['subject']; ?> </h5><br>
                            <h5><?php echo $row['question']; ?></h5><br>
                        </div>
                    </div>
                </div>
                <hr>
                <?php
            }
        }
        ?>
            
    </div>

    </div>

    <!-- Right Panel Ends -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>

</body>

</html>
