<?php
	session_start();
	include("connect.php");
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
		$name=mysqli_query($con,"SELECT First_Name FROM SignUpLogin WHERE Email=\"$_SESSION[login_mail]\"");
		$name=mysqli_fetch_assoc($name);
		echo "<h1>Welcome $name[First_Name]</h1>";
	?>

	<form action="UpdateProfile.php" method="post">
			<input type="submit" name="Upasswd" value="UpdatePassword" class="button">
			<input type="submit" name="Dacc" value="DeleteAccount" class="button">
			<input type="submit" name="Scour" value="SelectCourses" class="button">
			<input type="submit" name="Uplace" value="UpdatePlacementInfo" class="button">
			<input type="submit" name="logout" value="Logout" class="button">
	</form>

	<h2>Courses Taken</h2>
	<table border="1" style="width:100%">
	<tr>
		<th>Subjects</th>
	</tr>
	<?php
		$subject=mysqli_query($con,"SELECT Subject FROM  CoursesTaken  WHERE Email=\"$_SESSION[login_mail]\"");
		if(mysqli_num_rows($subject)>0)
		{
			//output the subject for each row
			while($row=mysqli_fetch_assoc($subject))
			{
				echo "<tr> <td> $row[Subject] </td> </tr>";
			}
		}
	mysqli_close($con);
	?>
</body>
</html>