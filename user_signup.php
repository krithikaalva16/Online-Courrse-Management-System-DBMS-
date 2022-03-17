<?php
$alert=false;
include ('connection.php');

if(isset($_POST['submit']))
{
$sid=$_POST['sid'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$dob=$_POST['dob'];
$password=$_POST['password'];
$contact=$_POST['contact'];
$user="SELECT * FROM student WHERE sid='$sid'";
$query = mysqli_query($conn, $user);
if(mysqli_num_rows($query) > 0 ) { 

	header('location:main.php?exists');
}




		$sql="INSERT INTO student(`sid`, `fname`, `lname`, `password`, `contact`, `dob`) VALUES ('$sid', '$fname', '$lname','$password', '$contact', '$dob')";

		if(mysqli_query($conn, $sql)) {
			
			$subject = "Account Registration";
			$body = "Hi,".$fname." You are Registered Successfully";
			
			header('location:main.php?register');
		}
		else{
            echo  'enter again';
			//echo "Error";
			header('location:main.php?No_register');
		}
	}
?>