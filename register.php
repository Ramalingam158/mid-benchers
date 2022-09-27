<!DOCTYPE html>
<html>
<head>
    <title>Middle Benchers</title>
    <link rel="stylesheet" type="text/css" href="Styles/css/loginstyle.css">
    <title>Middle Benchers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        select {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 110%;
            border-radius: 50px;
        }

        input {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            border-radius: 50px;
            width: 110%;
        }
    </style>
</head>
<body>
<div class="container" id="container">
    <br>
    <div class="form-container sign-up-container">
        <form action="includes/register.inc.php" method = "POST">
            <h1>Create Account</h1>
            <h3>Students</h3>
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="regno" placeholder="Register No." required>
            <input type="email" name="email" placeholder="Email" required>
            <select name="dept" id="select" class="form-select" required>
                <option value="">Department</option>
                <option value="CSE">CSE</option>
                <option value="IT">IT</option>
                <option value="ECE">ECE</option>
                <option value="MECH">MECH</option>
            </select>
            <select name="year" id="select" class="form-select" required>
                <option value="">Year</option>
                <option value="1">I</option>
                <option value="2">II</option>
                <option value="3">III</option>
                <option value="4">IV</option>
            </select>
            <input type="password" name="password" placeholder="Password" required>
            <button>SignUp</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="includes/faculty.register.inc.php" method = "POST">
            <h1>Create Account</h1>
            <h3>Teachers</h3>
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="id" placeholder="Faculty ID">
            <select name="dept" id="select" class="form-select" required>
                <option value="">Department</option>
                <option value="CSE">CSE</option>
                <option value="IT">IT</option>
                <option value="ECE">ECE</option>
                <option value="MECH">MECH</option>
            </select>
            <!-- <input type="text" name="designation" placeholder="Designation"> -->
            <select name="designation" id="select" class="form-select" required>
                <option value="">Designation</option>
                <option value="Asst. Prof.">Asst. Professor</option>
                <option value="Prof.">Professor</option>
                <option value="HoD">HoD</option>
            </select>
            <input type="email" name="mail" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <button>SignUp</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left right-panel-active">
                <h1>Welcome Teachers!</h1>
                <p>Enter your details and start your journey with us!</p>
                <button class="ghost" id="signIn">Sign Up</button>
                <a href="login.php">Sign in</a>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Welcome, Students!</h1>
                <p>Enter your details and start your journey with us!</p>
                <button class="ghost" id="signUp">Sign Up</button>
                <a href="login.php">Sign in</a>
            </div>
        </div>

    </div>

</div>
<?php
    if(isset($_GET['q']) && $_GET['q'] === 'aes') {
?>

<script type = "text/javascript">
    const cnt = document.getElementById('container');
    cnt.classList.add("right-panel-active");
</script>
<p style="color: red; background-color: #FFCCCC; padding: 20px; margin-top: 10px; border-radius: 10px;"><strong>Registration Failed!</strong> Email or register number alredy exists</p>

<?php
    }

    if(isset($_GET['q']) && $_GET['q'] === 'ae') {
    ?>
    <p style="color: red; background-color: #FFCCCC; padding: 20px; margin-top: 10px; border-radius: 10px;"><strong>Registration Failed!</strong> Email or register number alredy exists</p>
    <?php
    }
?>

<script type="text/javascript">
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });
    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
</script>
</body>
</html>