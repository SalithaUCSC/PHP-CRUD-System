<?php

    session_start();

	require 'dbcon.php';

    $skill_id = $_GET['skill_id'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Update Skill</title> 
</head>
<body>

<div class="wrapper">

    <p id="backhome"><a href="homepage.php">BACK TO HOME</a></p>

    <?php
				$sql = "SELECT * FROM skills WHERE skill_id = '$skill_id'";

				$res = mysqli_query($conn,$sql);

                if($res){
                    foreach ($res as $row){
                        $uname = $row['uname'];
					
				echo "<div class='bio'>
                    <form action='updateSkill.php?skill_id=$skill_id' method='POST'>
                        <table border=0>
                            <tr>
                                <td>Username : </td>
                                <td><input type='text' value='$row[uname]' class='field' readonly name='uname'></td>
                            </tr>
                            <tr>
                                <td>Skill : </td>
                                <td><input type='text' value='$row[skill_name]' class='field' name='skname'></td>
                            </tr>
                            <tr>
                                <td>Status: </td>
                                <td>
                                    <select name='skstat' class='field'>
                                        
                                        <option value='good'>Good</option>
                                        <option value='medium'>Medium</option>
                                        <option value='bad'>Bad</option>
                                    </select>
                                </td>
                            </tr>    
                        </table>
                        <a href='update_skill.php?skill_id=$skill_id'><input type='submit' value='UPDATE' id='prof1' class='btn'></a>
				    </form>
	                </div> ";
	    }
	}
    ?>    
</div>

</body>
</html>