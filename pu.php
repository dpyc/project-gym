<?php

session_start();

if(!isset($_SESSION['zalogowano']))
{
	header('Location: index.php');
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<lang html="pl">
	<meta charset="utf-8" />
	<title>Panel Użytkownika</title>
</head>
<body>


<a href="logout.php">Wyloguj się</a>
<br><br>

<?php echo $_SESSION['id']; ?>
<?php echo $_SESSION['firstname']; ?>
<?php echo $_SESSION['lastname']; ?>
</body>
</html>
