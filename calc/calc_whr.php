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
                    <?php if(isset($_SESSION['zalogowano'])){ echo "<li><a href='pu.php'>Panel Użytkownika</a></li>"; } ?>
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
          <form name="whrForm">
          <div class="form-group">
            <input type="radio" name="gender" id="gender_Male" value="Male" style="float:left;"/><p style="float:left; margin-top: -4px;">Mężczyzna</p><br />
            <div style="clear: left;"></div>
            <input type="radio" name="gender" id="gender_Female" value="Female" style="float:left;"/><p style="float:left; margin-top: -4px;">Kobieta</p><br /><br />
            <div style="clear: left;"></div>
          </div>
          <div class="form-group">
            <label style="float:left; font-size: 20px">Obwód pasa (cm):</label>
            <input type="text" name="obwPasa" size="10" class="req form-control" style="float:left; width: 200px; margin-left: 26px; margin-top: -3px;"><br />
            <div style="clear: left;"></div>
          </div>
          <div class="form-group">
            <label style="float:left; font-size: 20px">Obwód bioder (cm):</label>
            <input type="text" name="obwBioder" size="10" class="req form-control" style="float:left; width: 200px; margin-left: 10px; margin-top: -3px;"><br /><br />
            <div style="clear: left;"></div>
          </div>
            <input type="button" value="Oblicz whr" onClick="calculateWhr()" class="btn btn-primary"><br /><br />
          <div class="form-group">
            <label style="float:left; font-size: 20px">Wskaźnik whr</label>
            <input type="text" name="whr" size="10"  class="req form-control" style="float:left; width: 150px;margin-top: -3px;">
            <p style="float:left; font-weight: bold; margin-top: -2px;">-</p>
            <input type="text" name="meaning" size="50"  class="req form-control" style="float:left; width: 250px;margin-top: -3px;"><br /><br />
            <div style="clear: left;"></div>
          </div>

            <input type="reset" value="Wyczyść" class="btn btn-primary"/>
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
    function calculateWhr() {
      var obwPasa = document.whrForm.obwPasa.value;
      var obwBioder = document.whrForm.obwBioder.value;

      if(obwPasa > 0 && obwBioder > 0){
        var finalwhr = obwPasa/obwBioder;
        document.whrForm.whr.value = finalwhr.toFixed(2);

        if(document.getElementById('gender_Male').checked && finalwhr >= 1) {
          document.whrForm.meaning.value = "Otyłość androidalna brzuszną (typu jabłko)";
        }
        if(document.getElementById('gender_Male').checked && finalwhr < 1) {
          document.whrForm.meaning.value = "Otyłość gynoidalna pośladkowo-udowa (typu gruszka)";
        }

        if(document.getElementById('gender_Female').checked && finalwhr >= 0.8) {
          document.whrForm.meaning.value = "Otyłość androidalna brzuszną (typu jabłko)";
        }
        if(document.getElementById('gender_Female').checked && finalwhr < 0.8) {
          document.whrForm.meaning.value = "Otyłość gynoidalna pośladkowo-udowa (typu gruszka)";
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