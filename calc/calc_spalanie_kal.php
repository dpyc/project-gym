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
                            <li><a href="calc_thee.php">TDEE</a></li>
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
          <form name="CalForm">
          <div class="form-group">
            <label style="float:left; font-size: 20px">Waga (kg):</label>
            <input type="text" name="weight" size="10" class="req form-control" style="float:left; width: 200px; margin-left: 17px; margin-top: -3px;"><br />
            <div style="clear: left;"></div>
          </div>
          <div class="form-group">
            <label style="float:left; font-size: 20px">Czas (min):</label>
            <input type="text" name="time" size="10" class="req form-control" style="float:left; width: 200px; margin-left: 10px; margin-top: -3px;"><br /><br />
            <div style="clear: left;"></div>
          </div>
          <div class="form-group">
            <p>Rodzaj aktywności:</p>

            <input type="radio" name="activity" id="activity_1" value="1" style="float:left;"/><p style="float:left; margin-top: -4px;">Bieganie (wolno około 7,5km/h)</p><br />
            <div style="clear: left;"></div>
            <input type="radio" name="activity" id="activity_2" value="2" style="float:left;"/><p style="float:left; margin-top: -4px;">Bieganie (średnio ok. 12,5km/h)</p><br />
            <div style="clear: left;"></div>
            <input type="radio" name="activity" id="activity_3" value="3" style="float:left;"/><p style="float:left; margin-top: -4px;">Bieganie (szybko ok. 15km/h)</p><br />
            <div style="clear: left;"></div>
            <input type="radio" name="activity" id="activity_4" value="4" style="float:left;"/><p style="float:left; margin-top: -4px;">Spacer</p><br />
            <div style="clear: left;"></div>
            <input type="radio" name="activity" id="activity_5" value="5" style="float:left;"/><p style="float:left; margin-top: -4px;">Jazda na rowerze (rekreacyjnie)</p><br />
            <div style="clear: left;"></div>
            <input type="radio" name="activity" id="activity_6" value="6" style="float:left;"/><p style="float:left; margin-top: -4px;">Jazda na rowerze (szybko)</p><br />
            <div style="clear: left;"></div>
            <input type="radio" name="activity" id="activity_7" value="7" style="float:left;"/><p style="float:left; margin-top: -4px;">Wchodzenie po schodach</p><br />
            <div style="clear: left;"></div>
            <input type="radio" name="activity" id="activity_8" value="8" style="float:left;"/><p style="float:left; margin-top: -4px;">Wbieganie po schodach</p><br /><br />
            <div style="clear: left;"></div>
          </div>

            <input type="button" value="Oblicz spalanie kalorii" onClick="calculateCal()" class="btn btn-primary"><br /><br />
          <div class="form-group">
            <label style="float:left; font-size: 20px">spalone kilokalorie:</label>
            <input type="text" name="Cal" size="10" class="req form-control" style="float:left; width: 200px; margin-top: -3px;">
            <p style="float:left; font-weight: bold; margin-top: -2px;">kcal<p>
            <div style="clear: left;"></div>
          </p>
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
    function calculateCal() {
      var weight = document.CalForm.weight.value;
      var time = document.CalForm.time.value;
      var activity = 0;

      if(document.getElementById('activity_1').checked) {
        activity = 0.14;
      }
      if(document.getElementById('activity_2').checked) {
        activity = 0.2;
      }
      if(document.getElementById('activity_3').checked) {
        activity = 0.27;
      }
      if(document.getElementById('activity_4').checked) {
        activity = 0.06;
      }
      if(document.getElementById('activity_5').checked) {
        activity = 0.11;
      }
      if(document.getElementById('activity_6').checked) {
        activity = 0.17;
      }
      if(document.getElementById('activity_7').checked) {
        activity = 0.2;
      }
      if(document.getElementById('activity_8').checked) {
        activity = 0.3;
      }



      if(weight > 0 && time > 0){ 
        var finalCal = (weight*time*activity);
        document.CalForm.Cal.value = finalCal.toFixed(2);
      }
      else{
      alert("Wprować poprawne wartości!")
      }
    }
  //-->
  </script>
  </body>
</html>