<?php
   
    require 'dbcon.php';
    
    if(!isset($_SESSION)) 
    { 
        session_start();
        $uname = $_GET['uname'];
    }

	$sql = "SELECT * FROM skills WHERE uname='$uname' ORDER BY skill_id DESC LIMIT 5";

	$res = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Skills</title> 
</head>
<body>

<div class="wrapper1">

    <p id="backhome"><a href="homepage.php">BACK TO HOME</a></p>

    <h2 class='greet'>My Skills and Levels</h2>

    <?php

    foreach($res as $row) {
        
        $skill_id = $row['skill_id'];
        $skill_name = $row['skill_name'];
        $uname = $row['uname'];

		echo "	
            
            <ul id='div-row'>
                <div id='rowdata'>
                    <li><p>"; echo $row['skill_name']; echo "</p></li>
                    <li><p>"; echo $row['skill_status']; echo "</p></li>
                    <li><a href='update_skill.php?skill_id=$skill_id'><input type='button' name='update' value='Update' class='btn3' id='upbtn'></a></li>
                    <li><a href='deleteSkill.php?skill_id=$skill_id'><input type='button' name='delete' value='Delete' class='btn3' id='delbtn'></a></li>
                </div>
            </ul>
            
            ";
            }
        echo "<a href='add_skill.php?uname=$uname'><input type='button' value='ADD SKILL' id='prof2' class='btn'></a>";
		echo "</div>";
    ?>    
    
</div>

</body>
</html>
