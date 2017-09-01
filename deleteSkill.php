<?php
	require("dbcon.php");

	$skill_id = $_GET['skill_id'];
	
	$uname = $_GET['uname'];

	$sql = "DELETE FROM skills WHERE skill_id = '$skill_id'";

	$res = mysqli_query($conn,$sql);

	if(!$res){
		echo "Error in Deletion";
	}else{
		echo "<script>
				alert(\"Skill Deleted.\");
				
				window.location = 'homepage.php';
			</script>";
	}
?>