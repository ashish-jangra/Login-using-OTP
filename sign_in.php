<?php
	echo "<h1>Sign In Page</h1><br>";
	$host='localhost';
	$user='root';
	$pass='';
	$db='test';
	$conn=mysqli_connect($host,$user,$pass,$db);
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql='select * from login where email="'.$email.'" and password="'.$password.'"';
	$table=mysqli_query($conn,$sql);
	if(mysqli_num_rows($table)==0)
	{
		echo"<h2>You entered wrong email or password</h2><br>";
		mysqli_close($conn);
		exit();
	}
	echo "<h2>Successfully Logged in</h2><br>";
?>