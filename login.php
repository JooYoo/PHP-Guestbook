<?php
session_start();
$error="";
if(isset($_SESSION["error"])){
	$error="Falscher Benutzername/Passwort";
}
?>
<html lang="de">
<head></head>
<body>
<p><?php echo $error; ?></p>
<form action="post.php" method="POST" >
<input type="text" name="username" placeholder="Benutzername" style="width:175px">
<br>
<br>
<input type="password" name="password" placeholder="Passwort" style="width:175px">
<br><br>
<a href="register.php">Noch nicht Registriert?</a>
<button type="submit" name="login">Einloggen</button>
</form>
</body>
</html>