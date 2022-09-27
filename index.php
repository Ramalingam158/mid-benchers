<?php  
session_start();

if (!isset($_SESSION['whoisit']) || $_SESSION['whoisit'] !== "student") {
    ?>
<script type="text/javascript">
    window.location = "login.php?passId=Login First";
</script>
    <?php
}

$q = "";
if(isset($_GET['q'])){
    $q = $_GET['q'];
}
include_once "includes/db.php";
?>


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

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
    <link rel="stylesheet" href="Styles/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
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
                        <a href="myDoubts.php"> <i class="menu-icon ti-notepad"></i>My Doubts</a>
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
        
        <h2><center><strong>Recently Answered Questions</strong></center></h2><br>

        <?php

        if($q === "s"){
            ?>
            <div class="alert alert-success alert-dismissible fade show">
                <strong>Success!</strong> Your message has been sent successfully.
                <button type="button" class="close" data-dismiss="alert">x</button>
            </div>
            <?php
        }

        $query = "SELECT * FROM answered ORDER BY `answered`.`s_no` DESC";
        $res = mysqli_query($_GLOBALS['conn'], $query);
        if(mysqli_num_rows($res) > 0) {
            //echo($res);
            while($row = mysqli_fetch_array($res)){
                ?>
                <div class="card" style="padding-top: 10px;">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h3><strong><?php echo $row['title']; ?></strong></h3>
                            <h5><?php echo $row['subject']; ?> | <?php echo $row['tname']; ?></h5><hr>
                            <h5><?php echo $row['question']; ?></h5><br>
                            <p><?php echo $row['answer']; ?></p>
                        </div>
                    </div>
                </div>
                <!-- <hr> -->
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
            
    </div>

    <!-- Right Panel Ends -->

    <script src="Styles/vendors/jquery/dist/jquery.min.js"></script>
    <script src="Styles/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="Styles/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="Styles/assets/js/main.js"></script>


    <script src="Styles/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="Styles/assets/js/dashboard.js"></script>
    <script src="Styles/assets/js/widgets.js"></script>
    <script src="Styles/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="Styles/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="Styles/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        
    </script>

</body>

</html>
