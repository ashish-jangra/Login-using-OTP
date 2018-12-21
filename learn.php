<?php
	$email="ashishjangra3760@gmail.com";
	$password="Ashish";
	echo '
				<form method="post" action="confirm.php">
					<label>Email: </label><input type="email" value="'.$email.'"><br>
					<label>Password: </label><input type="password" value="'.$password.'"><br>
					<input type="text" name="otp" placeholder="Enter your otp"><br>
					<input type="submit" value="Confirm">
				</form>
			';
?>