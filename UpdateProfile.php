<?php
session_start();
include ("connect.php");
if(isset($_POST["Upasswd"]))
{
		echo   "<form action=\"\" method=\"post\">
			Enter Old Password <input type=\"password\" name=\"oldpasswd\" required>
			Enter New Password <input type=\"password\" name=\"newpasswd\" required>
			Confirm New Password <input type=\"password\" name=\"Cnewpasswd\" required>
			<input type=\"submit\" name=\"update\" value=\"update\">
		   </form>";
}

if(isset($_POST["Dacc"]))
{
	$del=mysqli_query($con,"DELETE FROM  SignUpLogin WHERE Email=\"$_SESSION[login_mail]\"");
	if($del)
	{
		echo "<script>
		alert('Account Deleted Succefully!!');
		window.location.href='Logout.php';
		</script>";
	}
}

if(isset($_POST["Scour"]))
{
	//$AllCourses=mysqli_query($con,"SELECT DISTINCT Subject FROM  TeacherCourse");
	$takenCourses=mysqli_query($con,"SELECT Subject FROM  CoursesTaken WHERE Email=\"$_SESSION[login_mail]\"");
	if(mysqli_num_rows($takenCourses)==7)
	{
		echo "<script>
		alert('You can take a maximum of 7 subjects!!You have already taken 7 subjects');
		window.location.href='profile.php';
		</script>";
	}
	$selectCourses=mysqli_query($con,"SELECT DISTINCT Subject FROM TeacherCourse WHERE Subject NOT IN (SELECT Subject FROM  CoursesTaken WHERE Email=\"$_SESSION[login_mail]\")");
	echo "<h2>Choose One Course and Fill in the Form </h2>";
	echo "<table border=\"1\" style=\"width:100%\">
		<tr>
			<th>Subjects</th>
		</tr>";

	//echo "<h2>jai sia ram</h2>";
	if(mysqli_num_rows($selectCourses)>0)
		{
			//output the subject for each row
			while($row=mysqli_fetch_assoc($selectCourses))
			{
				echo "<tr> <td> $row[Subject] </td> </tr>";
			}
		}
	//now make a form to pick one subject
	echo   "<form action=\"\" method=\"post\">
			 Fill One Subject <input type=\"text\" name=\"subjct\" required>
			 <input type=\"submit\" name=\"takeSubject\" value=\"SubmitSubject\">
		   </form>";

}

if(isset($_POST["Uplace"]))
{
		echo   "<form action=\"\" method=\"post\">
			 Year <input type=\"number\" name=\"year\" required>
			 CGPA <input type=\"number\" name=\"cgpa\" min=\"0\" max=\"10\" step=\"0.01\" required>
			 Company Name <input type=\"text\" name=\"compName\" required>
			 CTC IN LPA<input type=\"number\" name=\"ctc\" min=\"0\" max=\"100\" step=\"0.01\" required>
			 <input type=\"submit\" name=\"updateInfo\" value=\"updateInfo\">
		   </form>";
}

if(isset($_POST["logout"]))
{
	header('Location:Logout.php');
}

if(isset($_POST["update"]))
{
	$oldpass=$_POST['oldpasswd'];
	$newpass=$_POST['newpasswd'];
	$Cnewpass=$_POST['Cnewpasswd'];
	$passwd=mysqli_query($con,"SELECT Password FROM  SignUpLogin WHERE Email=\"$_SESSION[login_mail]\"");
	$passwd=mysqli_fetch_assoc($passwd);
	if($oldpass!=$passwd[Password])
	{
		echo "<script>
		alert('Old password was not correct!!Try Again');
		window.location.href='profile.php';
		</script>";
	}
	else if($newpass!=$Cnewpass)
	{
		$_POST["Upasswd"]=true;
		echo "<script>
		alert('new password and Confirmation does not match!!Try Again');
		window.location.href='profile.php';
		</script>";
	}
	else if(strlen($newpass) < 8){

		echo "<script>alert('Password should be minimum 8 characters!');
		window.location.href='profile.php';</script>";
	}
	else
	{
		$up=mysqli_query($con,"UPDATE SignUpLogin SET Password='$newpass' WHERE Email=\"$_SESSION[login_mail]\"");
		if($up)
		{
			echo "<script>
			alert('Password Updated Succefully');
			window.location.href='profile.php';
			</script>";
		}
		else
		{
			$_POST["Upasswd"]=true;
			echo "<script>
			alert('Could not update the password!!Please Try again!!');
			window.location.href='profile.php';
			</script>";
		}
	}
}

if(isset($_POST["updateInfo"]))
{
	$res=mysqli_query($con,"SELECT * FROM  SignUpLogin WHERE Email=\"$_SESSION[login_mail]\"");
	$res=mysqli_fetch_assoc($res);
	$name=$res['First_Name'];
	$mail=$res['Email'];
	$year=$_POST['year'];
	$cgpa=$_POST['cgpa'];
	$comp=$_POST['compName'];
	$ctc=$_POST['ctc'];
	$info=mysqli_query($con,"INSERT INTO TrainingAndPlacement (Year,Name,Email,Company,CTC,CGPA) VALUES ('$year','$name','$mail','$comp','$ctc','$cgpa')");
	if($info)
	{
		echo "<script>
			alert('Info updated Succefully!!');
			window.location.href='profile.php';
			</script>";
	}
	else
	{
		echo "<script>
			alert('Info could not be updated !!Please try again');
			window.location.href='profile.php';
			</script>";
	}
}

if(isset($_POST["takeSubject"]))
{
	$sub=$_POST['subjct'];
	$res=mysqli_query($con,"SELECT * FROM TeacherCourse WHERE Subject='$sub' ");
	if($res)
	{
		$subj=mysqli_query($con,"INSERT INTO CoursesTaken (Email,Subject) VALUES (\"$_SESSION[login_mail]\",'$sub')");
		echo "<script>
			alert('The subject taken Succefully!!!');
			window.location.href='profile.php';
			</script>";
	}
	else
	{
		echo "<script>
			alert('The subject you entered does not exist');
			window.location.href='profile.php';
			</script>";
	}
}

mysqli_close($con);

?>