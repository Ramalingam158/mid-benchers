<?php  
session_start();

if (!isset($_SESSION['whoisit']) || $_SESSION['whoisit'] != "teacher") {
    ?>
<script type="text/javascript">
    window.location = "../login.php?passId=Login First";
</script>
    <?php
}
include_once "../includes/db.php";
$q = "";
if(isset($_GET['q'])){
    $q = $_GET['q'];
}
?>


<!doctype html>
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <?php
        require_once "static files/header.php";
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>

<body style="font-family: 'PT Serif', serif;">

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">


        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Welcome <strong><?php echo $_SESSION['name']; ?></strong></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="../includes/logout.php"><button class="btn btn-primary">Logout</button></a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <h2><center><strong>Unanswered Questions</strong></center></h2><br>
        <?php

        if($q === "s"){
            ?>
            <div class="alert alert-success alert-dismissible fade show">
                <strong>Success!</strong> Your message has been sent successfully.
                <button type="button" class="close" data-dismiss="alert">x</button>
            </div>
            <?php
        }

        $query = "SELECT * FROM unanswered";
        $res = mysqli_query($_GLOBALS['conn'], $query);
        if(mysqli_num_rows($res) > 0) {
            //echo($res);
            while($row = mysqli_fetch_array($res)){
                ?>
                <div class="card">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h3><?php echo $row['title']; ?></h3>
                            <h4><?php echo $row['subject']; ?> | <?php echo $row['sname']; ?></h4><br>
                            <h5><?php echo $row['question']; ?></h5><br>
                            <a href = "TeacherAnswer.php?q=<?php echo $row['id']; ?>"> Answer </button>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="card">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h3 style="padding-left: 20px;">No questions to display</h3>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
            
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
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>
