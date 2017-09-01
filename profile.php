<?php
    session_start();
    require 'dbcon.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
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
            foreach ($res as $row){
                $user = $row['uname'];
        echo "<div class='bio'>
                <table border=0>
                    <tr>
                        <td class='field1'>Username : </td>
                        <td class='field2'>"; echo $row['uname']; echo "</td>
                    </tr>
                    <tr>
                        <td class='field1'>Email : </td>
                        <td class='field2'>"; echo $row['email']; echo "</td>
                    </tr>
                </table>
                <a href='update_profile.php?uname=$user'><button class='btn' id='upprof'>Update Profile</button></a>        
            </div> ";
            }
        }
        echo "<a href='skills.php?uname=$user'><button class='btn' id='skillbtn'>Skills</button></a>";
    ?>  
     
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
