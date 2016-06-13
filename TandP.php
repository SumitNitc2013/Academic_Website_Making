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
	</head>

	<body style="background-color: #00bcd4";>
		<h1>Welcome to our Training and Placement Department</h1>
		<form action="" method="post">
			<input type="submit" name="Plinfo" value="ClickHereToViewPlacementInfo">
			<a href="index.html" style="color:black">Go To Home Page</a>
		</form>


		<?php
			if(isset($_POST['Plinfo']))
			{
				echo "<table border=\"1\" style=\"width:100%\">
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>CGPA</th>
					<th>Year</th>
					<th>Company</th>
					<th>CTC</th>
				</tr>";
				$res=mysqli_query($con,"SELECT * FROM TrainingAndPlacement");
				if(mysqli_num_rows($res)>0)
				{
						//output the subject for each row
					while($row=mysqli_fetch_assoc($res))
					{
							echo "<tr> <td> $row[Name] </td> 
								  <td> $row[Email] </td> 
								  <td> $row[CGPA] </td> 
								   <td> $row[Year] </td> 
								   <td> $row[Company] </td> 
								   <td> $row[CTC] </td> </tr>
								";
					}
				}
			}
		?>
</body>
</html>
