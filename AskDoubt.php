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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Middle Benchers</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!--FONT-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body class="bg-light" style="font-family: 'PT Serif', serif;">
<div class="container mt-3">
    <h1 class="text-center">Ask your Doubt</h1>
    <!--form-->
    <form action="includes/askDoubt.inc.php"  method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter the title" autocomplete="off" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter the subject" autocomplete="off" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="question" class="form-label">Question</label>
            <textarea type="text" name="question" id="question" class="form-control" placeholder="Enter your question" autocomplete="off" required="required"></textarea>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="submit" class="btn btn-info px-3" value="submit">
        </div>
</form>
</body>
</html>