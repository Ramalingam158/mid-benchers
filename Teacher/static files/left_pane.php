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

    <?php
        require_once "header.php";
    ?>

</head>

<style type="text/css">
    .logo {
        height: 70px;
        width: 70px;
        border-radius: 70px;
    }
</style>

<body>
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
                        <a href="teacher_list.php"> <i class="menu-icon ti-stamp"></i>Teachers</a>

                    </li>
                    <li>
                        <a href="#"> <i class="menu-icon ti-notepad"></i>Tests</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->
</body>
</html>