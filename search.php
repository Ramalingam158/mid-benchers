<?php
include_once"includes/db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Middle Benchers</title>
    <link href="Styles/css/bootstrap.min.css" rel="stylesheet">
    <link href="Styles/css/blog-home.css" rel="stylesheet">

</head>

<body>

<?php
    include_once"Static files/nav.php";
?>
<div class="img-fluid">
    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                   <b>Recently asked questions...(RAQ)</b>
                </h1>
                <?php

                if (isset($_POST['submit'])) {
                    $search = $_POST['search'];

                    $query = "SELECT * FROM answered WHERE subject LIKE '%$search%' OR tname LIKE '%$search%' OR question LIKE '%$search%' OR title LIKE '%$search%'";
                    $sqlsearch = mysqli_query($conn, $query);

                    if (!$sqlsearch) {
                        die("Query failed" . mysqli_error($conn));
                }

                    $searchcount = mysqli_num_rows($sqlsearch);
                    if ($searchcount == 0) {
                        echo "<h1>No Results found</h1>";
                    } else {
                        echo "<h1>" . $searchcount ." Results found...</h1>";
                        
                while($row = mysqli_fetch_array($sqlsearch)){
                $title = $row['title'];
                $subject = $row['subject'];
                $tname = $row['tname'];
                $question = $row['question'];
                $answer = $row['answer'];
                ?>


                <!-- First Blog Post -->
                <h2>
                    <b style="color: #000"><?php echo $title ?></b>
                    <small style="color: #000">Subject : <?php echo $subject ?></small>
                </h2>
                <p class="lead">
                    Answered by <b style="color: #000"><?php echo $tname ?></b>
                </p>
                <h3><small style="color: #000">
                <?php echo $question?><br><br>
                <p><b>Answer :</b></p>
                <p><?php echo $answer?></p>
                <hr></small>
                </h3>
                <?php } 
 
                    }
                }?> -->


                
                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>


            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Search here...</h4>
                    <form action="search." method="post">
                        <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form><!--search form-->
                    <!-- /.input-group -->
                </div>

                 <div class="well">
                   <center><h4>Teacher login</h4></center>
            <form action="teacher_login.php" method="POST">
                <div class="form-group"><p>Name</p>
                   <input type="text" class="form-control" name="tname" placeholder="Enter your name" required="Please enter your name...">
                </div>
                <div class="input-group"><p>Password</p>
                   <input type="Password" class="form-control" name="pass" placeholder="Enter the password" required="Please enter the password..."><br><br>
                   <button class="btn btn-danger" type="submit" name="submit">login</button><br>
                   <a style="color: #e74c3c;" href="regist.php">Sign up...</a>  
            </form>
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Want to ask a question???</h4>
                    <p>If you have a doubt don't hesitate to ask it.Your idetity will not be shown to your fellow mates.</p>
                </div>
                <!--Asking doubts-->
                <div class="well">
                    <h4>Add doubts</h4>
                    <form action="askquest.php" method="POST">
                    <div class="input-group"><p>Subject</p>
                        <input type="text" class="form-control" name="subject" placeholder="Enter the title" required="Please enter the subject">
                    </div>
                    <div class="input-group"><p>Title</p>
                        <input type="text" class="form-control" name="title" placeholder="Enter the title" required="Please enter the title">
                    </div>
                    <div class="input-group"><p>Name</p>
                        <input type="text" class="form-control" name="sname" placeholder="Enter your name" required="Please enter your name">
                    </div>
                    <div class="input-group"><p>Doubts</p>
                         <textarea type="text" class="form-control" name="question" placeholder="Enter your doubts" required="Please enter your doubts"></textarea>
                    </div>
                    <button class="btn btn-danger" type="submit" name="submit">Add doubt</button>
                    </form>

            </div>

        </div>
        <!-- /.row -->
        <hr>
    </div>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Middle Benchers 2019</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>