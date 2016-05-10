<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link href="../css/bootstrap.min.css" rel="stylesheet">
          <link href="../css/style.css" rel="stylesheet">
    <title>The Gym Project</title>
  </head>
  <body>
  <div class="container">
    <nav class="navbar navbar-default" style="margin-top: 20px; border-color: #d6d6d6;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="glyphicon glyphicon-th-list"/>
                </button>
                <a class="navbar-brand" href="../index.php">GymProject</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="../exercise.php">Zobacz Ćwiczenia</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kalkulatory
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="calc_bmi.php">BMI</a></li>
                            <li><a href="calc_bmr.php">BRM</a></li>
                            <li><a href="calc_ptk.php">PTK</a></li>
                            <li><a href="calc_spalanie_kal.php">Spalanie</a></li>
                            <li><a href="calc_whr.php">WHR</a></li>
                            <li><a href="calc_tdee.php">TDEE</a></li>
                        </ul>
                    </li>
                    <li><a href="../contact.php">Kontakt</a></li>
                    <?php if(isset($_SESSION['zalogowano'])){ echo '<li><a href="../pu.php">Panel Użytkownika</a></li>'; } ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../rejestracja.php">Załóż konto</a></li>                
                </ul>
            </div>
        </div>
    </nav>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="jumbotron" style="background-color: #f8f8f8; border-style: solid; border-width: 1px; border-color: #d6d6d6;">
          <form name="bmiForm">
          <div class="form-group">
            <label style="font-size: 20px; float: left;">Waga (kg):</label>
            <input type="text" name="weight" size="10" class="req form-control" style=" float: left; width: 200px; margin-left: 30px; margin-top: -3px;"><br />
          </div>
          <div class="form-group">
            <label style="font-size: 20px; float: left;">Wzrost (cm):</label>
            <input type="text" name="height" size="10" class="req form-control" style=" float: left; width: 200px; margin-left: 10px; margin-top: -3px;"><br />
            <div style="clear: left;"></div>
          </div>
          <div class="form-group">
            <input type="button" value="Oblicz BMI" onClick="calculateBmi()" class="btn btn-primary"><br /><br />
            <label style="font-size: 20px; float: left;">Twoje BMI:</label>
            <input type="text" name="bmi" size="10" class="req form-control" style=" float: left; width: 150px; margin-top: -3px;"> <p style=" float: left;">-</p><input type="text" name="meaning" size="25" class="req form-control" style=" float: left; width: 150px; margin-top: -3px;"><br />
            <div style="clear: left;"></div>
          </div>
            <input type="reset" value="Wyczyść" class="btn btn-primary"/>
          </div>
          </form>
        </div>
      </div>
      <div class="col-md-4">

      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script language="JavaScript">
  <!--
    function calculateBmi() {
      var height = document.bmiForm.height.value;
      var weight = document.bmiForm.weight.value;

      if(weight > 0 && height > 0){ 
        var finalBmi = weight/(height/100*height/100);
        document.bmiForm.bmi.value = finalBmi.toFixed(2);
        if(finalBmi < 16){
          document.bmiForm.meaning.value = "Wygłodzenie."
        }
        if(finalBmi >= 16 && finalBmi < 17){
          document.bmiForm.meaning.value = "Wychudzenie."
        }
        if(finalBmi >= 17 && finalBmi < 18.5){
          document.bmiForm.meaning.value = "Niedowaga."
        }
        if(finalBmi >= 18.5 && finalBmi < 25){
          document.bmiForm.meaning.value = "Waga prawidłowa :)"
        }
        if(finalBmi >= 25 && finalBmi < 30){
          document.bmiForm.meaning.value = "Nadwaga."
        }
        if(finalBmi >= 30 && finalBmi < 35){
          document.bmiForm.meaning.value = "Otyłość I stopnia."
        }
        if(finalBmi >= 35 && finalBmi < 40){
          document.bmiForm.meaning.value = "Otyłość II stopnia."
        }
        if(finalBmi >= 40){
          document.bmiForm.meaning.value = "Otyłość III stopnia."
        }
      }
      else{
      alert("Wprować poprawne wartości!")
      }
    }
  //-->
  </script>
  </body>
</html>