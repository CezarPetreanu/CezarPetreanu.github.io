<!DOCTYPE html>

<?php

	require_once('config.php');

?>

<html lang = "en">

<head>
	<title>FamFilm - Register</title>
	
	<meta charset=utf-8>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href="../css/register.css" type="text/css" rel="stylesheet">
<head>

<body>

	<font style="font-size: 10px; color:silver">
		<b>EN</b> / <a href="../ro/autentificare.php" style="color: silver">RO</a>
	</font>
	<div id="search">
		<table width="100%">
		
			<tr>
				<td align="center"><a target="_self" href="index.html"><b>Home</b></a></td>
				<td align="center"><b>Login</b></td>
				<td align="center"><a target="_self" href="register.php"><b>Register</b></a></td>
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
	
		<center><h2>Login</h2></center>
		
		<form action="login.php" method="post">
		
		<font style="color: #afceff">
		
		<br>
		<br>
		
		<label for="username">Username</label>
		<br>
		<input type="text" name="username" required>
		<br>
		<br>
		<label for="password">Password</label>
		<br>
		<input type="password" name="password" required>
		<br>
		<br>
		
		<center>
			<input type="submit" name="login" value="Login">
		</center>
		
		</form>
		
		<font style="color: yellow">
		<?php

			if(isset($_POST['login']))
			{
				$username = $_POST['username'];
				$password = $_POST['password'];
					
				$db = mysqli_connect("localhost", "root", "", "famfilm_users");
				
				$get_user = mysqli_query($db, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
				
				$row = mysqli_fetch_array($get_user);
				
				$hash = $row['password'];
				
				if($row['username'] == $username && password_verify($password, $hash))
					header("Location: my_account.html");
				else
					echo "Username or password are incorrect.";
			}
		?>
		</font>
		
	</div>
	
</body>

</html>