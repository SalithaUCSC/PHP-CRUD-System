<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="wrapper">
	<h1 class="greet">Welcome <?php echo $_SESSION["uname"];?></h1>
	<img class="home-img" src="images/user1.png" alt="user">
	<p id="crud">This is a simple example for a CRUD application</p>
	<a href="profile.php"><input type="button" value="PROFILE" class="btn" id="prof"></a><br>
	<form action="homepage.php" method="POST"><input type="submit" name="out" value="LOG OUT" class="btn" id="out" ></form>	
</div>

	<?php
		if (isset($_POST['out'])) 
		{
			session_destroy();
			header("location: index.php");
		}
	?>


</body>
</html>
