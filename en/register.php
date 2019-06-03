<?php

	require_once('config.php');

?>

<!DOCTYPE html>


<html lang = "en">

<head>
	<title>FamFilm - Register</title>
	
	<meta charset=utf-8 />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<link href="../css/register.css" type="text/css" rel="stylesheet" />
<head>

<body>
	<div>
	<font style="color: yellow">
	
	</font>
	</div>
	
	<font style="font-size: 10px; color:silver">
		<b>EN</b> / <a href="../ro/inregistrare.php" style="color: silver">RO</a>
	</font>
	
	<div id="search">
		<table width="100%">
		
			<tr>
				<td align="center"><a target="_self" href="index.html"><b>Home</b></a></td>
				<td align="center"><a target="_self" href="login.php"><b>Login</b></a></td>
				<td align="center"><b>Register</b></a></td>
				<td align="center"><a target="_self" href="contact_us.html"><b>Contact us</b></a></td>
			</tr>
			
		</table>
	
	</div>
	
	<div id="logo">
		<br>
		<br>
		<center>
		<img src="../logo.png" width="256px">
		</center>
	</div>
	
	<div id="content">
	
		<center><h2>Register</h2></center>
		
		<form action="register.php" method="post">
		
			<font style="color: #afceff">
			
			<font style="font-size:10px">(All fields are required)</font>
			
			<br>
			<br>
			
			<label for="name">Name</label>
			<br>
			<input type="text" name="name" required>
			<br>
			<br>
			<label for="email">Email</label>
			<br>
			<input type="email" name="email" style="width: 100%; height: 25px; border: 0; border-radius: 8px; padding-left: 10px; background-color: #505a6b; color: white;" required>
			<br>
			<br>
			
			<label for="gender">Gender</label>
			<br>
			<input type="radio" name="gender" value="male" required><font style="color:silver">Male</font>
			<input type="radio" name="gender" value="female" required><font style="color:silver">Female</font>
			<input type="radio" name="gender" value="other" required><font style="color:silver">Other</font>
			<br>
			<br>
			
			<br>
			<br>
			
			<label for="username">Username</label>
			<br>
			<input type="text" name="username" required>
			<br>
			<br>
			<label for="password">Password</label> <font style="font-size:10px">(Must have at least 4 characters)</font>
			<br>
			<input type="password" name="password" required>
			<br>
			<br>
			<label for="password">Confirm Password</label>
			<br>
			<input type="password" name="confirm_password" required>
			<br>
			<br>
			
			<center>
				<input type="submit" name="create" value="Create my account!">
			</center>
		
		</form>
		
		<br>

		
		<font style="color: yellow">
		
		<?php
			if(isset($_POST['create']))
			{
				
				$name = $_POST['name'];	
				$email = $_POST['email'];
				$gender = $_POST['gender'];
				$username = $_POST['username'];
				$password = $_POST['password'];
				$confirm_password = $_POST['confirm_password'];
				
				$db = mysqli_connect("localhost", "root", "", "famfilm_users");
				
				$check_if_user_exists = mysqli_query($db, "SELECT * FROM users WHERE username='$username'");
				$user_duplicates = mysqli_num_rows($check_if_user_exists);
				
				$check_if_email_exists = mysqli_query($db, "SELECT * FROM users WHERE email='$email'");
				$email_duplicates = mysqli_num_rows($check_if_email_exists);
				
				if(strlen($password) < 4)
					echo 'Your password is too short. The password must have at least 4 characters.';
				else if($user_duplicates > 0)
					echo 'Username is already taken.';
				else if($email_duplicates > 0)
					echo 'Email is already in use.';
				else
				{
					
					if($password == $confirm_password)
					{
						
						$sql = "INSERT INTO users (name, email, gender, username, password) VALUES(?,?,?,?,?)";
						$insert = $database->prepare($sql);
						$result = $insert->execute([$name, $email, $gender, $username, $password]);
						if($result)
							echo 'Successfuly saved.';
						else
							echo 'There were errors while saving the data.';
					}
					else
						echo 'Passwords do not match. Please try again.';
				}
			}
		?>
		
		</font>
		
	</div>
	
</body>

</html>