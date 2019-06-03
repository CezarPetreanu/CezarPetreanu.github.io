<?php

	require_once('config.php');

?>

<!DOCTYPE html>


<html lang = "ro">

<head>
	<title>FamFilm - Înregistrare</title>
	
	<meta charset=utf-8 />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<link href="../css/register.css" type="text/css" rel="stylesheet" />
<head>

<body>

	<font style="font-size: 10px; color:silver">
		<a href="../en/register.php" style="color: silver">EN</a> / <b>RO</b>
	</font>
	<div id="search">
		<table width="100%">
		
			<tr>
				<td align="center"><a target="_self" href="acasa.html"><b>Acasă</b></a></td>
				<td align="center"><a target="_self" href="autentificare.php"><b>Autentificare</b></a></td>
				<td align="center"><b>Înregistrare</b></td>
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
	
		<center><h2>Înregistrare</h2></center>
		
		<form action="inregistrare.php" method="post">
		
		<font style="color: #afceff">
		
		<font style="font-size:10px">(Toate zonele sunt obligatorii)</font>
		
		<br>
		<br>
		
		<label for="name">Nume</label>
		<br>
		<input type="text" id="name" name="name" required>
		<br>
		<br>
		<label for="email">Email</label>
		<br>
		<input type="text" id="email" name="email" required>
		<br>
		<br>
		
		<label for="gender">Sex</label>
		<br>
		<input type="radio" id="gender" name="gender" value="male" required><font style="color:silver">Masculin</font>
		<input type="radio" id="gender" name="gender" value="female" required><font style="color:silver">Feminin</font>
		<input type="radio" id="gender" name="gender" value="other" required><font style="color:silver">Altul</font>
		<br>
		<br>
		
		<br>
		<br>
		
		<label for="username">Nume de utilizator</label>
		<br>
		<input type="text" name="username" required>
		<br>
		<br>
		<label for="password">Parolă</label> <font style="font-size:10px">(Must have at least 4 characters)</font>
		<br>
		<input type="password" name="password" required>
		<br>
		<br>
		<label for="password">Confirmare Parolă</label>
		<br>
		<input type="password" name="confirm_password" required>
		<br>
		<br>
		
		<center>
			<input type="submit" name="create" value="Creează-mi contul!">
		</center>
		
		</form>
		
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
					echo 'Parola ta este prea scurtă. Trebuie să aibă cel puțin 4 caractere.';
				else if($user_duplicates > 0)
					echo 'Numele de utilizator a fost deja luat.';
				else if($email_duplicates > 0)
					echo 'Acest email este deja folosit.';
				else
				{
					
					if($password == $confirm_password)
					{
						
						$sql = "INSERT INTO users (name, email, gender, username, password) VALUES(?,?,?,?,?)";
						$insert = $database->prepare($sql);
						$result = $insert->execute([$name, $email, $gender, $username, $password]);
						if($result)
							echo 'Contul a fost creat!';
						else
							echo 'Informațiile nu au fost salvate. Eroare de conexiune.';
					}
					else
						echo 'Parolele nu se potrivesc. Încercați din nou.';
				}
			}
		?>
		
	</div>
	
</body>

</html>