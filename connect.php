<?php
//make connection
$con=mysqli_connect("localhost","root","sumitnitc");
//check conncetion
if(!$con)
{
	echo "Error!!!Could not connect";
	echo "<br>";
	exit();
}
//echo "Connected successfully";
//echo "<br>";

$select=mysqli_select_db($con,"CollegeDB");
if(!$select)
{
	echo "Error!!!Could not select the database";
	echo "<br>";
	exit();
}
//echo "Selected database";
//echo "<br>";
?>
