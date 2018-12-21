<?php
	echo "<h1>Sign Up Page</h1><br>";
	$host='localhost';
	$user='root';
	$pass='';
	$db='test';
	$conn=mysqli_connect($host,$user,$pass,$db);
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql='select * from login where email="'.$email.'"';
	$table=mysqli_query($conn,$sql);
	if(mysqli_num_rows($table)>0)
	{
		echo "<h2>User already exists</h2><br>";
		mysqli_close($conn);
		exit();
	}
	else
	{
		$otp=mt_rand(1000,9999);
		$sql='insert into OTP values("'.$email.'",'.$otp.')';
		//echo $sql."<br>";
		$q=mysqli_query($conn,$sql);
		/*if(!$q)
		{
			echo "<h2>Could not Connect</h2><br>";
			exit();
		}*/
		mysqli_close($conn);
		$msg="Hello your confirmation otp for php sign up is ".$otp;
		$mail=mail($email,"Confirmation otp for php sign up",$msg);
		if(!$mail)
		{
			echo "<h2>Could not send mail</h2><br>";
			exit();
		}
		else
		{
			echo "<h2>OTP has been sent to ur email<h2><br>";
			echo '
				<form method="post" action="confirm.php">
					<label>Email: </label><input type="email" name="email" value="'.$email.'"><br>
					<label>Password: </label><input type="password" name="password" value="'.$password.'"><br>
					<input type="text" name="otp" placeholder="Enter your otp here"><br>
					<input type="submit" value="Confirm">
				</form>
			';
		}	
	}
?>