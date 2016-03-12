<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<lang html="pl">
	<meta charset="utf-8" />
	<title>Załóż darmowe konto!</title>
</head>
<body>

<form action="registerlogic.php" method="post">
	Login:<br>
	<input type="text" name="login"><br>
	<?php
		if(isset($_SESSION['e_login']))
		{
			echo $_SESSION['e_login']."<br>";
			unset($_SESSION['e_login']);
		}
	 ?>
	E-mail:<br>
	<input type="text" name="email"><br>
	<?php
		if(isset($_SESSION['e_email']))
		{
			echo $_SESSION['e_email']."<br>";
			unset($_SESSION['e_email']);
		}
	 ?>
	Hasło:<br>
	<input type="password" name="haslo1"><br>
	Powtórz Hasło:<br>
	<input type="password" name="haslo2"><br>
	<?php
		if(isset($_SESSION['e_haslo']))
		{
			echo $_SESSION['e_haslo']."<br>";
			unset($_SESSION['e_haslo']);
		}
	 ?>
	Płeć:
	<label><input type="radio" name="gender" value="female">Kobieta</label>
	<label><input type="radio" name="gender" value="male">Mężczyzna</label><br>
	<?php
		if(isset($_SESSION['e_gender']))
		{
			echo $_SESSION['e_gender']."<br>";
			unset($_SESSION['e_gender']);
		}
	 ?>
	<input type="submit" value="Załóż konto">
</form>

</body>
</html>