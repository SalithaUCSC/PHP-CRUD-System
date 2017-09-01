<?php
    session_start();
	require 'dbcon.php';


?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Skills</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="wrapper">

    <p id="backhome"><a href="homepage.php">BACK TO HOME</a></p>
    
    <form action="add_skill.php" method="POST" style='margin-top: 100px;'>
        <label for="Skill Name" class="label">Username</label><br>
        <input type="text" class="form-input" name="uname" value='<?php echo $_SESSION["uname"];?>'>
        <br>
        <label for="Skill Name" class="label">Skill Name</label><br>
        <input type="text" name="skname" class="form-input" required="required">
        <br>
        <label for="Skill Status" class="label">Skill Status</label><br>
        <select name="skstat" class="form-input" required="required">           
            <option value="good">Good</option>
            <option value="medium">Medium</option>
            <option value="bad">Bad</option>
        </select>
        <a href="#"><input type="submit" value="ADD" class="btn" id="prof" name='addsk'></a><br>
    </form>
    

</div>

<?php
		if (isset($_POST['addsk'])) {

			$uname = $_POST['uname'];
			$skname = $_POST['skname'];
			$skstat = $_POST['skstat'];

			$query = "INSERT INTO skills (uname, skill_name, skill_status) VALUES ('$uname','$skname','$skstat')";
			$query_run = mysqli_query($conn,$query);

            if ($query_run) {
                echo "<div class='skmsg' id='sucmsg'>Skill is added!</div><br>";
            } else {
                echo "<div class='skmsg' id='errmsg'>Error in adding!</div><br>";
            }

		}
	?>

</body>
</html>
