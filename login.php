<?php

session_start();

if((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
{
	header('Location: index.php');
	exit();
}

require_once "connect.php";

try
{
	if($mysqli->connect_errno!=0)
	{
		throw new Exception("Error Processing Request", 1);
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		$haslo_hash = md5($haslo);
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");

		if($result = $mysqli->query(sprintf("SELECT * FROM user WHERE login='%s'", mysqli_real_escape_string($mysqli, $login))))
		{
			$count_user = $result->num_rows;
			if($count_user>0)
			{
				$row = $result->fetch_assoc();
				if($haslo_hash == $row['passwd'])
				{
					$_SESSION['zalogowano'] = true;
					$_SESSION['id'] = $row['userID'];
					$_SESSION['login'] = $row['login'];
					$_SESSION['passwd'] = $row['passwd'];
					$_SESSION['firstname'] = $row['firstname'];
					$_SESSION['lastname'] = $row['lastname'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['height'] = $row['height'];
					$_SESSION['weight'] = $row['weight'];
					$_SESSION['age'] = $row['age'];
					$_SESSION['activity'] = $row['activity'];
					$_SESSION['sex'] = $row['sex'];
					$_SESSION['kcal'] = $row['kcal'];
					$_SESSION['proteins'] = $row['proteins'];
					$_SESSION['carbs'] = $row['carbs'];
					$_SESSION['fats'] = $row['fats'];

					unset($_SESSION['blad']);
					$result->close();
					header('Location: pu.php');
				}
				else
				{
					throw new Exception("Nieprawidłowy login lub hasło");
				}
			} 	
			else
			{
				throw new Exception("Nieprawidłowy login lub hasło");
			}		
		}
		$mysqli->close();
	}
} catch(Exception $e){
	$_SESSION['blad'] = '<span style="color:red">'.$e->getMessage().'</span>';
	header('Location: index.php');
}