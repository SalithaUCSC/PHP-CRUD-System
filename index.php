<?php
    session_start();
    require 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>CRUD Login</title>
</head>
<body>
    <div class="wrapper">
        <div class="form-div">
            <img src="images/user2.png" alt="user" class="form-img">
            <form action="index.php" method="POST">
                <label for="username" class="label">Username</label><br>
                <input type="text" name="uname" class="form-input">
                <br>
                <label for="password" class="label">Password</label><br> 
                <input type="password" name="password" class="form-input">
                <br><br><br>
                <input type="submit" name="log" value="LOGIN" class="btn" id="log">
                <br>
                <a href="register.php"><input type="button" value="REGISTER" class="btn" id="reg"></a>
            </form>
   
        </div>
    </div>

<?php

    if (isset($_POST['log'])) {
        
        $uname = $_POST['uname'];
        $password = $_POST['password'];

        $password = md5($password);

        $query = "SELECT * FROM users WHERE uname = '$uname' AND password = '$password'";
        
        $query_run = mysqli_query($conn , $query);

        if (mysqli_num_rows($query_run) > 0) {

            $_SESSION['uname'] = $uname;
            header("location:homepage.php");

        } else {

            echo "<div id='errmsg1'>Invalid credentials</div>";

        }
    }
?>
</body>
</html>




