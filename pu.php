<?php

session_start();

if(!isset($_SESSION['zalogowano']))
{
	header('Location: index.php');
	exit();
}
require_once "connect.php";
$login = $_SESSION['login'];
$result = $mysqli->query("SELECT * FROM user WHERE login = '$login'");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<lang html="pl">
	<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
	<title>Panel Użytkownika</title>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-default" style="margin-top: 20px; border-color: #d6d6d6;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="glyphicon glyphicon-th-list"/>
                </button>
                <a class="navbar-brand" href="index.php">GymProject</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">

                    <li><a href="exercise.php">Zobacz Ćwiczenia</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kalkulatory
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="calc/calc_bmi.php">BMI</a></li>
                            <li><a href="calc/calc_bmr.php">BRM</a></li>
                            <li><a href="calc/calc_ptk.php">PTK</a></li>
                            <li><a href="calc/calc_spalanie_kal.php">Spalanie</a></li>
                            <li><a href="calc/calc_whr.php">WHR</a></li>
                            <li><a href="calc_tdee.php">TDEE</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.php">Kontakt</a></li>
                    <li class="active"><a href="#">Panel Użytkownika</a></li>
                    <li><a href="trening.php">Plan Treningowy</a></li>
                    <li><a href="logout.php">Wyloguj się</a></li>
                </ul>    
                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="rejestracja.php">Załóż konto</a></li>                
                    </ul>
                
            </div>
        </div>
    </nav>
</div>

<br><br>
<div class="container">
        <div class="jumbotron" style="background-color: #f8f8f8; border-style: solid; border-width: 1px; border-color: #d6d6d6;">
        <h2 style="font-size: 60px;">Panel użytkownika <?php echo $row['login']; ?></h2>
            <ul class="list-group">
                <li class="list-group-item">
                <p style="font-size: 20px;">Login</p>
                <?php echo $row['login']; ?>
                </li>
                <li class="list-group-item">
                <p style="font-size: 20px;">Imię i nazwisko</p>
                <?php echo $row['firstname']," ",$row['lastname']; ?>
                </li>
                <li class="list-group-item">
                <p style="font-size: 20px;">Email</p>
                <?php echo $row['email']; ?>
                </li>
                <li class="list-group-item">
                <p style="font-size: 20px;">Wzrosi i waga</p>
                <?php echo $row['height'], " ", $row['weight']; ?>
                </li>
                <li class="list-group-item">
                <p style="font-size: 20px;">Wiek i płeć</p>
                <?php echo $row['age']," ", $row['sex']; ?>
                </li>
                <li class="list-group-item">
                <p style="font-size: 20px;">Aktywność</p>
                <?php echo $row['activity']; ?>
                </li>
                <li class="list-group-item">
                <p style="font-size: 20px;">Kcal, węglowodany, tłuszcze, proteiny</p>
                <?php echo $row['kcal']," ", $row['carbs']," ", $row['fats']," ", $row['proteins'] ; ?>
                </li>
            </ul>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Edytuj profil</button>
        </div>
        <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edycja profilu</h4>
                  </div>
            <form action="pulogic.php" method="post">

                    <div class="form-group" style=" width: 500px; margin: 10px auto">
                        <label for="exampleInputEmail1">Imię:</label>
                        <input type="text" name="firstname" class="form-control" placeholder="Imię"><br>
                        <?php
                        if(isset($_SESSION['e_firstname']))
                        {
                            echo $_SESSION['e_firstname']."<br>";
                            unset($_SESSION['e_firstname']);
                        }
                        ?>
                        <label for="exampleInputEmail1">Nazwisko:</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Nazwisko"><br>
                        <?php
                        if(isset($_SESSION['e_lastname']))
                        {
                            echo $_SESSION['e_lastname']."<br>";
                            unset($_SESSION['e_lastname']);
                        }
                        ?>

                        <label for="exampleInputEmail1">Email:</label>
                        <input type="text" name="email" class="form-control" placeholder="Email"><br>
                        <?php
                        if(isset($_SESSION['e_email']))
                        {
                            echo $_SESSION['e_email']."<br>";
                            unset($_SESSION['e_email']);
                        }
                        ?>

                        <label for="exampleInputEmail1">Wzrost:</label>
                        <input type="text" name="height" class="form-control" placeholder="Wzrost"><br>
                        <?php
                        if(isset($_SESSION['e_height']))
                        {
                            echo $_SESSION['e_height']."<br>";
                            unset($_SESSION['e_height']);
                        }
                        ?>

                        <label for="exampleInputEmail1">Waga:</label>
                        <input type="text" name="weight" class="form-control" placeholder="Waga"><br>
                        <?php
                        if(isset($_SESSION['e_weight']))
                        {
                            echo $_SESSION['e_weight']."<br>";
                            unset($_SESSION['e_weight']);
                        }
                        ?>
                        Aktywność:<br>
                        <label class="radio-inline"><input id="inlineRadioSmall" class="radio-inline" type="radio" name="activity" value="small">Nisko aktywny</label>
                        <label class="radio-inline"><input id="inlineRadioMedium" class="radio-inline" type="radio" name="activity" value="medium">Średnio aktywny</label>
                        <label class="radio-inline"><input id="inlineRadioBig" class="radio-inline" type="radio" name="activity" value="big">Aktywny</label>
                        <label class="radio-inline"><input id="inlineRadioBig" class="radio-inline" type="radio" name="activity" value="verybig">Bardzo aktywny</label>
                        <br>
                        <?php
                        if(isset($_SESSION['e_activity']))
                        {
                            echo $_SESSION['e_activity']."<br>";
                            unset($_SESSION['e_activity']);
                        }
                        ?>

                        Typ budowy ciała:<br>
                        <label class="radio-inline"><input id="inlineRadioSmall" class="radio-inline" type="radio" name="bodytype" value="ectomorph">Ektomorfik</label>
                        <label class="radio-inline"><input id="inlineRadioMedium" class="radio-inline" type="radio" name="bodytype" value="mesomorph">Mezomorfik</label>
                        <label class="radio-inline"><input id="inlineRadioBig" class="radio-inline" type="radio" name="bodytype" value="endomorph">Endomorfik</label>
                        <br>
                        <?php
                        if(isset($_SESSION['e_bodytype']))
                        {
                            echo $_SESSION['e_bodytype']."<br>";
                            unset($_SESSION['e_bodytype']);
                        }
                        ?>


                        <label for="exampleInputEmail1">Wiek:</label>
                        <input type="text" name="age" class="form-control" placeholder="Wiek"><br>
                        <?php
                        if(isset($_SESSION['e_age']))
                        {
                            echo $_SESSION['e_age']."<br>";
                            unset($_SESSION['e_age']);
                        }
                        ?>
                    </div>
            <div class="modal-footer">
                <input type="submit" name="submit" class="btn btn-primary" value="Edycja profilu">
            </div>
            </form>
            </div>
        </div>
        </div>
</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
</body>
</html>