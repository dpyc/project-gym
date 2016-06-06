<?php

session_start();

if(!isset($_SESSION['zalogowano']))
{
	header('Location: index.php');
	exit();
}
require_once "connect.php";

?>

<!DOCTYPE html>
<html>
<head>
	<lang html="pl">
	<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
	<title>Plan Treningowy</title>
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
                    <li><a href="pu.php">Panel Użytkownika</a></li>
                    <li class="active"><a href="#">Plan Treningowy</a></li>
                    <li><a href="logout.php">Wyloguj się</a></li>
                </ul>    
                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="rejestracja.php">Załóż konto</a></li>                
                    </ul>
            </div>
        </div>
    </nav>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="jumbotron" style="background-color: #f8f8f8; border-style: solid; border-width: 1px; border-color: #d6d6d6;">
                         <form action="" method="post" style=" width: 500px; margin: 10px auto">
                            <h2>Stopień zaawansowania:</h2>
                            <select name="lvl[]">
                                 <option>Początkujący</option>
                                 <option>Średnioozaawansowany</option>
                                 <option>Zaawansowany</option>
                             </select>
                            <h2>Ilość dni treningowych:</h2>
                            <select name="dni[]">
                                 <option>2</option>
                                 <option>3</option>
                                 <option>4</option>
                             </select>
                            <br><br><input type="submit" name="submit" class="btn btn-primary" value="Plan">
                        </form>
                <?php

                if(isset($_POST['submit'])){
				$mysqli->query("SET NAMES 'utf8'");
                if($_POST['lvl'][0] == "Początkujący" && $_POST['dni'][0] == "2"){
                    $result = $mysqli->query("SELECT * FROM exercise WHERE numberOfAdvanced = 1 AND numberOfPlan = 1");
                    $komunikat = "Trening początkujący, 2 dni tygodniowo";
                } 
                if($_POST['lvl'][0] == "Początkujący" && $_POST['dni'][0] == "3"){
                    $result = $mysqli->query("SELECT * FROM exercise WHERE numberOfAdvanced = 1 AND numberOfPlan = 2");
                    $komunikat = "Trening początkujący, 3 dni tygodniowo";
                }   
                if($_POST['lvl'][0] == "Początkujący" && $_POST['dni'][0] == "4"){
                    $result = $mysqli->query("SELECT * FROM exercise WHERE numberOfAdvanced = 1 AND numberOfPlan = 3");
                    $komunikat = "Trening początkujący, 4 dni tygodniowo";
                } 
                if($_POST['lvl'][0] == "Średnioozaawansowany" && $_POST['dni'][0] == "2"){
                    $result = $mysqli->query("SELECT * FROM exercise WHERE numberOfAdvanced = 2 AND numberOfPlan = 1");
                    $komunikat = "Trening średniozaawansowany, 2 dni tygodniowo";
                }  
                if($_POST['lvl'][0] == "Średnioozaawansowany" && $_POST['dni'][0] == "3"){
                    $result = $mysqli->query("SELECT * FROM exercise WHERE numberOfAdvanced = 2 AND numberOfPlan = 2");
                    $komunikat = "Trening średniozaawansowany, 3 dni tygodniowo";
                }  
                if($_POST['lvl'][0] == "Średnioozaawansowany" && $_POST['dni'][0] == "4"){
                    $result = $mysqli->query("SELECT * FROM exercise WHERE numberOfAdvanced = 2 AND numberOfPlan = 3");
                    $komunikat = "Trening średniozaawansowany, 4 dni tygodniowo";
                } 
                if($_POST['lvl'][0] == "Zaawansowany" && $_POST['dni'][0] == "2"){
                    $result = $mysqli->query("SELECT * FROM exercise WHERE numberOfAdvanced = 2 AND numberOfPlan = 1");
                    $komunikat = "Trening zaawansowany, 2 dni tygodniowo";
                } 
                if($_POST['lvl'][0] == "Zaawansowany" && $_POST['dni'][0] == "3"){
                    $result = $mysqli->query("SELECT * FROM exercise WHERE numberOfAdvanced = 2 AND numberOfPlan = 2");
                    $komunikat = "Trening zaawansowany, 3 dni tygodniowo";
                } 
                if($_POST['lvl'][0] == "Zaawansowany" && $_POST['dni'][0] == "4"){
                    $result = $mysqli->query("SELECT * FROM exercise WHERE numberOfAdvanced = 2 AND numberOfPlan = 3");
                    $komunikat = "Trening zaawansowany, 4 dni tygodniowo";
                } 
                ?>
                    <h1><?php $komunikat?></h1><br>
                    <table class="table table-striped">
                        <tr class="success">
                            <th>Nazwa Ćwiczenia</th>
                            <th>Seria</th>
                            <th>Powtórzenia</th>
                        </tr>
                        <?php
                        while($row = $result->fetch_object())
                        {

                            echo"<tr>";
                            echo"<td>".$row->exerciseName."</td>";
                            echo"<td>".$row->numberOfSets."</td>";
                            echo"<td>".$row->numberOfReps."</td>"; 
                            echo"</tr>";

                        }
                        ?>
                    </table>
                <?php
                }  
                ?>
            </div>
        </div>
        <div class="col-md-4">

      </div>
    </div>
</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
</body>
</html>