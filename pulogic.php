<?php 

session_start();

		if(isset($_POST['submit']))
		{
            $idUser = $_SESSION['id'];
			$walidacja = true;
            //sprawdzenie poprawnosci imienia i nazwiska
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            if(!preg_match("/^[a-zA-Z ]*$/",$firstname))
            {
                $walidacja = false;
                $_SESSION['e_firstname'] = "Imie nie może zawierać cyfr ani znaków specjalnych!";
            }

            if(!preg_match("/^[a-zA-Z ]*$/",$lastname))
            {
                $walidacja = false;
                $_SESSION['e_login'] = "Nazwisko nie może zawierać cyfr ani znaków specjalnych!";
            }

            //Sprawdzanie maila
            $email = $_POST['email'];
            $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

            if((!filter_var($emailB, FILTER_VALIDATE_EMAIL)) || ($emailB!=$email)) {
                $walidacja = false;
                $_SESSION['e_email'] = "Podaj poprawny adres E-Mail!";
            }
			//Sprawdzanie wzrostu
			$height = $_POST['height'];
            if(!preg_match("|[0-9]+|",$height)) {
                $walidacja = false;
                $_SESSION['e_height'] = "Wzrost może składać się tylko z cyfr!";
            }
            //Sprawdzanie wagi
            $weight = $_POST['weight'];
            if(!preg_match("|[0-9]+|",$weight)) {
                $walidacja = false;
                $_SESSION['e_weight'] = "Waga może składać się tylko z cyfr!";
            }

            $activity = $_POST['activity'];

            $age = $_POST['age'];
            if(!preg_match("|[0-9]+|",$age)) {
                $walidacja = false;
                $_SESSION['e_age'] = "Wiek może składać się tylko z cyfr!";
            }

            $bodytype = $_POST['bodytype'];

			require_once "connect.php";
			try
                {
                    if($mysqli->connect_errno!=0)
                    {
                        throw new Exeption(mysqli_connect_errno());
                    }
                    else
                    {

					if($walidacja == true)
					{
						
						if($mysqli->query("UPDATE user SET firstname = '$firstname', lastname = '$lastname', email = '$email', height = '$height', weight = '$weight', activity = '$activity', age = '$age', bodytype = '$bodytype' WHERE userID='$idUser'"))
						{
							header('Location: pu.php');
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
		header('Location: pu.php')
			
?>

