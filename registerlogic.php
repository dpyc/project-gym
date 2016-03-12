<?php 

session_start();

		if((isset($_POST['login'])) && (isset($_POST['email'])) && (isset($_POST['haslo1'])) && (isset($_POST['haslo2'])) && (isset($_POST['gender'])))
		{
			$walidacja = true;
			//Sprawdzanie poprawnosci loginu
			$login = $_POST['login'];
			if(strlen($login)<3 || strlen($login)>15)
			{
				$walidacja = false;
				$_SESSION['e_login'] = "Niepoprawna długość loginu";
			}
			/*if(ctype_alnum($login) == false)
			{
				$walidacja = false;
				$_SESSION['e_login'] = "Login musi składać się ze znaków alfanumerycznych";
			}*/
			if(!preg_match("/^[a-zA-Z ]*$/",$login)) 
			{
				$walidacja = false;
			  	$_SESSION['e_login'] = "Login musi składać się ze znaków alfanumerycznych"; 
			}
			//Sprawdzanie poprawnosci maila
			$email = $_POST['email'];
			$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
			
			if((!filter_var($emailB, FILTER_VALIDATE_EMAIL)) || ($emailB!=$email))
			{
				$walidacja = false;
				$_SESSION['e_email'] = "Podaj poprawny adres E-Mail!";
			}
			//Sprawdzanie poprawnosci hasla
			$haslo1 = $_POST['haslo1'];
			$haslo2 = $_POST['haslo2'];
			if((strlen($haslo1)<8) || (strlen($haslo1)>20))
			{
				$walidacja=false;
				$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
			}
			if($haslo1!=$haslo2)
			{
				$walidacja=false;
				$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
			}
			$haslo_hash = md5($haslo1);
			//Sprawdzanie radio-group'a
			$gender = $_POST['gender'];
			/*$gender = (empty($_POST['gender'])) ? FALSE : $_POST['gender'];
			if(!isset($gender)) 
			{
				$walidacja = false;
			    $_SESSION['e_gender'] = "Wybierz Płeć";
			}
			*/
			require_once "connect.php";
			try
			{
				if($mysqli->connect_errno!=0)
				{
					throw new Exeption(mysqli_connect_errno());
				}	
				else
				{
					$result = $mysqli->query("SELECT userID FROM user WHERE login = '$login'");
					if(!$result) throw new Exeption($mysqli->error);

					$user_count = $result->num_rows;
					if($user_count>0)
					{
						$walidacja = false;
			   		 	$_SESSION['e_login'] = "Login jest już zajęty";
					}

					$result = $mysqli->query("SELECT userID FROM user WHERE email = '$email'");
					if(!$result) throw new Exeption($mysqli->error);

					$email_count = $result->num_rows;
					if($email_count>0)
					{
						$walidacja = false;
			   		 	$_SESSION['e_email'] = "E-Mail jest już zajęty";
					}

					if($walidacja == true)
					{
						
						if($mysqli->query("INSERT INTO user VALUES(NULL, '$login', '$haslo_hash', NULL, NULL, '$email', NULL, NULL, NULL, NULL, '$gender', NULL, NULL, NULL, NULL)"))
						{
							echo "udało się";
							$_SESSION['zarejestrowano'] = true;
							header('Location: index.php');
							exit();
						}
						else
						{
							throw new Exeption($mysqli->error);
						}
					}

					$mysqli->close();
				}
			}catch(Exeption $e)
			{
				echo "<br>".$e;		
			}
		}	
		header('Location: register.php')
			
?>

