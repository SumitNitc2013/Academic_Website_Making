<?php
session_start();
include ("connect.php");
?>


<!DOCTYPE HTML>
<html>
	<head>
		<style>
				h1 {
    					text-align: center;
					}

		</style>
		<link rel="stylesheet" type="text/css" href="mystyle.css">

	</head>
	

<body style="background-color: #00bcd4";>
	<?php
		$name=mysqli_query($con,"SELECT First_Name FROM SignUpLogin WHERE Email='sumitjha1089@gmail.com'");
		$name=mysqli_fetch_assoc($name);
		echo "<h1>Welcome $name[First_Name]</h1>";
	?>

	<form action="" method="post">
			<input type="submit" name="rm" value="remove" class="button">
			<input type="submit" name="AddCourse" value="AddCourse" class="button">
			<input type="submit" name="logout" value="Logout" class="button">
	</form>

	<?php

		if(isset($_POST['rm']))
		{
			echo   "<form action=\"\" method=\"post\">
			 		Email <input type=\"email\" name=\"email\" required>
			 		<input type=\"submit\" name=\"remove\" value=\"Remove\">
		  			</form>";
		}

		if(isset($_POST['remove']))
		{
			$del=mysqli_query($con,"DELETE FROM  SignUpLogin WHERE Email=\"$_POST[email]\"");
			if($del)
			{
				echo "<script>
				alert('Account Deleted Succefully!!');
				window.location.href='Administrator.php';
				</script>";
			}
		}

		if(isset($_POST['AddCourse']))
		{
			echo   "<form action=\"\" method=\"post\">
			 		Course Name <input type=\"text\" name=\"crname\" required>
			 		Teacher Name <input type=\"text\" name=\"tname\" required>
			 		<input type=\"submit\" name=\"add\" value=\"add\">
		  			</form>";
		}

		if(isset($_POST['add']))
		{
			$crname=$_POST['crname'];
			$tname=$_POST['tname'];
			$res=mysqli_query($con,"INSERT INTO TeacherCourse (TeacherName,Subject) VALUES ('$tname','$crname')");
			if($res)
			{
				echo "<script>
				alert('Courses Added Succefully!!');
				window.location.href='Administrator.php';
				</script>";
			}
		}

		if(isset($_POST['logout']))
		{
			header('Location:Logout.php');
		}
	?>

</body>
</html>

