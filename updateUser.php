<?php
	
    session_start();
	require("dbcon.php");

	$uname = $_POST['uname'];
	$email = $_POST['email'];

	$sql = "UPDATE users SET email = '$email' WHERE uname = '$uname'";

	$res = mysqli_query($conn,$sql);

	if (!$res){
		echo "Not Updated";
	}else{
		echo "<script>
                alert(\"Profile Updated\");
                window.location = \"profile.php\";
            </script>";
	}
?>