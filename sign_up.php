<?php
	echo "<h2>Sign Up Page</h2><br>";
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
		echo "<h3>User already exists</h3><br>";
		mysqli_close($conn);
		exit();
	}
	else
	{
		$otp=mt_rand(1000,9999);
		$sql='insert into OTP values("'.$email.'",'.$otp.')';
		//echo $sql."<br>";
		$q=mysqli_query($conn,$sql);
		mysqli_close($conn);
		$msg="Hello your confirmation otp for php sign up is ".$otp;
		$mail=mail($email,"Confirmation otp for php sign up",$msg);
		if(!$mail)
		{
			echo "<h3>Could not send mail</h3><br>";
			exit();
		}
		else
		{
			echo "<h3>OTP has been sent to ur email<h3><br>";
			echo '
				<form method="post" action="confirm.php">
					<label>Email: </label><input type="email" readonly name="email" value="'.$email.'"><br>
					<label>Password: </label><input type="password" readonly name="password" value="'.$password.'"><br>
					<input type="text" name="otp" placeholder="Enter your otp here"><br>
					<input type="submit" value="Confirm">
				</form>
			';
		}	
	}
?>