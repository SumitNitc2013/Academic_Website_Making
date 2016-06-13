<?php

session_start();
include ("connect.php");
if(isset($_POST['AdminLogin']))
{
	$email     =  $_POST['email'];
	$passwd     =  $_POST['password'];
	if($email=="sumitjha1089@gmail.com" || $passwd=="sumitnitc")
	{
		header('Location:Administrator.php');
	}
	else
	{
		echo "<script> alert('Wrong Administrator Crecidential!!!');
						window.location.href='index.html';
			 </script>";
	}
}
if(isset($_POST['Login']))
{

	$email     =  $_POST['email'];
	$passwd     =  $_POST['password'];
	$log      =  mysqli_query($con,"SELECT * FROM SignUpLogin WHERE Email='$email' AND Password='$passwd'");
	$num_rows =  mysqli_num_rows($log);
	//echo $user;
	if($num_rows == 0) {

		echo "<script> alert('Username or Password invalid');
						window.location.href='index.html';
			 </script>";

	}

	else {
		
		$_SESSION['login_mail'] = $email;
		$_SESSION['password']=$passwd;
		header('Location:profile.php');
    }

}

if(isset($_POST['SignUp'])){

	$message =  '';
	$fname   =  $_POST['fstname'];
	$lname   =  $_POST['lstname'];
	$email  =  $_POST['email'];
	$passwd= $_POST['password'];
	$gender =  $_POST['gender'];

	if(empty($fname) or empty($lname) or empty($passwd) or empty($gender) or empty ($email)){

		echo "<script>alert('You missed out some required field, try again!');
			window.location.href='index.html';</script>";

	}

	if(strlen($passwd) < 8){

		echo "<script>alert('Password should be minimum 8 characters!');
		window.location.href='index.html';</script>";
	}

	else{

		$insert = mysqli_query($con,"INSERT INTO SignUpLogin(First_Name,Last_Name,Email,Password,Gender) VALUES   ('$fname','$lname','$email','$passwd','$gender') ");
	}

	if($insert){

		echo "<script>alert('Sign Up completed. Please Login');
		window.location.href='index.html';</script>";

	}

	else{

		echo "<script>alert('Username Not Available!!SignUp Error!!, Try Again!');
		window.location.href='index.html';</script>";
	}

}

mysqli_close($con);

?>
