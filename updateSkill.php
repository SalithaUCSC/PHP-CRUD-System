<?php
    require('dbcon.php');

	$skill_id = $_GET['skill_id'];
	$skname = $_POST['skname'];
    $skstat = $_POST['skstat'];

	$skill = "UPDATE skills SET skill_name = '$skname', skill_status = '$skstat' WHERE skill_id='$skill_id'";
	
	$res = mysqli_query($conn,$skill);


	if (!$res){
		echo "Not Updated";
	}else{
		echo "<script>
                alert(\"Skill Updated\");
                window.location = 'homepage.php';
            </script>";
    }

?>