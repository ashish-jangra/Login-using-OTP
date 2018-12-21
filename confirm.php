<?php
	echo "Confirm otp here<br>";
	$host='localhost';
	$user='root';
	$pass="";
	$db='test';
	$email=$_POST['email'];
	$password=$_POST['password'];
	$conn=mysqli_connect($host,$user,$pass,$db);
	$sql='select * from OTP where email="'.$_POST['email'].'"';
	$table=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($table);
	if($row['otp']==$_POST['otp'])
	{
		$sql='insert into login(email,password) values("'.$email.'","'.$password.'")';
		//echo $sql."<bR>";
		if(mysqli_query($conn,$sql))
		{
			echo "<h3>You have successfully registered your account<h3>";
			$sql='delete from otp where otp.email=="'.$email.'"';
			mysqli_query($conn,$sql);
			exit();
		}
		else
			echo "<h3>Can't Reigster</h3>";
	}
	else
	{
		echo 'Wrong OTP entered<br>';
	}
	$sql='delete from otp where otp.email=="'.$email.'"';
	mysqli_query($conn,$sql);
?>
<a href="sign_up.php">Send OTP again</a>