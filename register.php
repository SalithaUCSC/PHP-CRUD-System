<?php
	require 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>CRUD Registration</title>
</head>
<body>
    <div class="wrapper" id="wrap">
        <div class="form-div">
            <img src="images/user2.png" alt="user" class="form-img">
            <form action="" method="POST">
                <label for="username" class="label">Username</label><br>
                <input type="text" name="uname" class="form-input" required="required">
                <br>
                <label for="email" class="label">Email</label><br>
                <input type="email" name="email" class="form-input" required="required">
                <br>
                <label for="password" class="label">Password</label><br> 
                <input type="password" name="password" id="password" class="form-input" required="required">
                <br>
                <label for="password" class="label">Confirm Password</label><br> 
                <input type="password" name="cpassword" id="cpassword" class="form-input" required="required" onkeyup='check();'>
                <br>
                <br>
                <span id='message'></span><br><br>
                <input type="submit" name="reg" value="REGISTER" class="btn" id="reg">
                <br>
                <a href="register.php"><input type="button" value="RESET" class="btn" id="reset"></a>

                <a href="index.php"><input type="button" value="BACK TO LOGIN" class="btn" id="back"></a>
            </form>
</div>
	<?php
		if (isset($_POST['reg'])) {

			$uname = $_POST['uname'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];
		

			if ($password == $cpassword) {

				$password = md5($password);

				$query1 = "SELECT * FROM users WHERE uname='$uname'";
				$query_run1 = mysqli_query($conn , $query1);

				if (mysqli_num_rows($query_run1)>0) {

					echo "<div class='msg' id='errmsg'>User already exists..Try another one!</div><br>";
				} else {

					$query2 = "INSERT INTO users (uname, email, password) VALUES ('$uname','$email','$password')";
					$query_run2 = mysqli_query($conn,$query2);

					if ($query_run2) {
						echo "<div class='msg' id='sucmsg'>User registered!</div><br>";
					} else {
						echo "<div class='msg' id='errmsg'>Error in Registration!</div><br>";
					}
				}
			}
			else {
				echo "<div class='msg' id='errmsg'>Password and confirm password does not match!</div><br>";
			}
		}
	?>
	    <script type="text/javascript">
    	var check = function() {
		  if (document.getElementById('password').value ==
		    document.getElementById('cpassword').value) {
		    document.getElementById('message').style.color = 'green';
		    document.getElementById('message').innerHTML = 'Password matching';
		  } else {
		    document.getElementById('message').style.color = 'red';
		    document.getElementById('message').innerHTML = 'Password not matching';
		  }
		}
    </script>
</body>
</html>
