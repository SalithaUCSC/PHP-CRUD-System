<?php
    session_start();
	require 'dbcon.php';

	$uname = $_GET['uname'];

	$sql = "SELECT * FROM users WHERE uname='$uname'";

	$res = mysqli_query($conn,$sql);

	$user = mysqli_fetch_array($res);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Profile</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="wrapper">

    <p id="backhome"><a href="homepage.php">BACK TO HOME</a></p>
    <img class="prof-img" src="images/user1.png" alt="user">

    <?php
				$sql = "SELECT * FROM users WHERE uname='$_SESSION[uname]'";

				$res = mysqli_query($conn,$sql);

				if($res){
					while($row = mysqli_fetch_row($res)){
					
				echo "<div class='bio'>
                    <form action='updateUser.php' method='POST'>
                        <table border=0>
                            <tr>
                                <td>Username : </td>
                                <td><input type='text' value='$row[0]' class='field' readonly name='uname'></td>
                            </tr>
                            <tr>
                                <td>Email : </td>
                                <td><input type='text' value='$row[1]' class='field' name='email'></td>
                            </tr>    
                        </table>
                        <input type='submit' value='UPDATE' id='prof1' class='btn'>
				    </form>
	                </div> ";
	    }
	}
    ?>    
</div>

</body>
</html>
