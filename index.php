<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<lang html="pl">
	<meta charset="utf-8" />
	<title>The Gym Project</title>
</head>
<body>

<a href="exercise.html">Zobacz Ćwiczenia!</a>
<a href="register.php">Załóż konto!</a>

<?php if(isset($_SESSION['zarejestrowano']) && ($_SESSION['zarejestrowano']) == true) echo "Rejestracja zakończona powodzeniem"; ?>

<form action="login.php" method="post">
	Login:<br />
	<input type="text" name="login" /> <br />
	Hasło:<br />
	<input type="password" name="haslo" /> <br /><br />
	<input type="submit" value="Zaloguj się" />
</form>

<?php if(isset($_SESSION['blad'])) echo $_SESSION['blad']; ?>
<?php unset($_SESSION['blad']); ?>

</body>
</html>