<?php

	require_once('config.php');

?>

<!DOCTYPE html>


<html lang = "ro">

<head>
	<title>FamFilm - Autentificare</title>
	
	<meta charset=utf-8 />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<link href="../css/register.css" type="text/css" rel="stylesheet" />
<head>

<body>

	<font style="font-size: 10px; color:silver">
		<a href="../en/login.php" style="color: silver">EN</a> / <b>RO</b>
	</font>
	<div id="search">
		<table width="100%">
		
			<tr>
				<td align="center"><a target="_self" href="index.html"><b>Acasă</b></a></td>
				<td align="center"><b>Autentificare</b></td>
				<td align="center"><a target="_self" href="inregistrare.php"><b>Înregistrare</b></a></td>
				<td align="center"><a target="_self" href="contactatine.html"><b>Contactați-ne</b></a></td>
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
	
		<center><h2>Autentificare</h2></center>
		
		<form action="autentificare.php" method="post">
		
		<font style="color: #afceff">
		
		<br>
		<br>
		
		Nume de utilizator
		<br>
		<input type="text" name="username" required>
		<br>
		<br>
		Parolă
		<br>
		<input type="password" name="password" required>
		<br>
		<br>
		
		<center>
			<input type="submit" name="login" value="Autentifică-te">
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
				
				if($row['username'] == $username && $row['password'] == $password)
					header("Location: contul_meu.html");
				else
					echo "Numele de utilizator sau parola sunt incorecte.";
			}
		?>
		</font>
		
	</div>
	
</body>

</html>