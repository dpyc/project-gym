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
          <form name="tdeeForm">
          <div class="form-group">
            <input type="radio" name="gender" id="gender_Male" value="Male" checked style="float:left;"/><p style="float:left; margin-top: -4px;">Mężczyzna</p><br />
            <div style="clear: left;"></div>
            <input type="radio" name="gender" id="gender_Female" value="Female"style="float:left;"/><p style="float:left; margin-top: -4px;">Kobieta</p>
            <div style="clear: left;"></div>
          </div>
          <div class="form-group">
            <label style="float:left; font-size: 20px">Waga (kg):</label>
             <input type="text" name="weight" size="10" class="req form-control" style="float:left; width: 200px; margin-left: 30px; margin-top: -3px;">
             <div style="clear: left;"></div>
          </div>
          <div class="form-group">
            <label style="float:left; font-size: 20px">Wzrost (cm):</label>
            <input type="text" name="height" size="10" class="req form-control" style="float:left; width: 200px; margin-left: 10px; margin-top: -3px;">
            <div style="clear: left;"></div>
          </div>
          <div class="form-group">
            <label style="float:left; font-size: 20px">Wiek:</label>
            <input type="text" name="age" size="10" class="req form-control" style="float:left; width: 200px; margin-left: 78px; margin-top: -3px;"><br />
            <div style="clear: left;"></div>
          </div>
            <b>Endomorfik</b> – osoba charakteryzująca się ciężką budową ciała, rozłożystym i grubym szkieletem, wolnym metabolizmem, a więc dużą masą zarówno mięśniową, jak i tłuszczową, z tendencją do tycia.
            <br /><br />
            <b>Mezomorfik</b> – osoba o cechach sylwetki i metabolizmu pośrednich między ektomorfikiem, a endomorfikiem, o proporcjonalnej budowie, średnim tempie przemiany materii i tendencji do łatwego zwiększania masy mięśniowej.
            <br /><br />
            <b>Ektomorfik</b> – osoba charakteryzująca się bardzo szczupłą budową ciała (chudą szyją, wątłą klatką piersiową), mało rozłożystym i lekko zbudowanym szkieletem, brakiem otłuszczenia oraz szybkim metabolizmem.
            <br /><br /><br />

          <div class="form-group">
            <p>Pozostała aktywność fizyczna, tryb pracy:</p>
            <p style="font-weight: bold">Endomorfik </p>
            <input type="radio" name="tdeee" id="tdee_endomorfik_200" value="200" checked style="float:left;"/><p style="float:left; margin-top: -4px;">Niska 200kcal</p>
            <div style="clear: left;"></div>
            <input type="radio" name="tdeee" id="tdee_endomorfik_300" value="300" style="float:left;"/><p style="float:left; margin-top: -4px;">Średnia 300kcal</p>
            <div style="clear: left;"></div>
            <input type="radio" name="tdeee" id="tdee_endomorfik_400" value="400" style="float:left;"/><p style="float:left; margin-top: -4px;">Wysoka 400kcal</p>
            <div style="clear: left;"></div>
            <p style="font-weight: bold">Mezomorfik</p>
            <input type="radio" name="tdeee" id="tdee_mezomorfik_400" value="400" style="float:left;"/><p style="float:left; margin-top: -4px;">Niska 400kcal</p>
            <div style="clear: left;"></div>
            <input type="radio" name="tdeee" id="tdee_mezomorfik_450" value="450" style="float:left;"/><p style="float:left; margin-top: -4px;">Średnia 450kcal</p>
            <div style="clear: left;"></div>
            <input type="radio" name="tdeee" id="tdee_mezomorfik_500" value="500" style="float:left;"/><p style="float:left; margin-top: -4px;">Wysoka 500kcal</p>
            <div style="clear: left;"></div>
            <p style="font-weight: bold">Ektomorfik</p>
            <input type="radio" name="tdeee" id="tdee_ektomorfik_700" value="700" style="float:left;"/><p style="float:left; margin-top: -4px;">Niska 700kcal</p>
            <div style="clear: left;"></div>
            <input type="radio" name="tdeee" id="tdee_ektomorfik_800" value="800" style="float:left;"/><p style="float:left; margin-top: -4px;">Średnia 800kcal</p>
            <div style="clear: left;"></div>
            <input type="radio" name="tdeee" id="tdee_ektomorfik_900" value="900" style="float:left;"/><p style="float:left; margin-top: -4px;">Wysoka 900kcal</p>
            <div style="clear: left;"></div>
          </div>
          <br>

          <div class="form-group">
            <p style="font-weight: bold">TRENING SIŁOWY</p>
            <label style="float:left; font-size: 20px">Liczba treningów  w tygodniu</label>
            <input type="text" name="silowy_liczba_treningow" size="10"  class="req form-control" style="float:left; width: 200px; margin-top: -3px; margin-left: 5px;"><br />
            <div style="clear: left;"></div>
            <label style="float:left; font-size: 20px">Średni czas trwania</label>
            <input type="text" name="silowy_czas" size="10"  class="req form-control" style="float:left; width: 200px; margin-top: -3px;">
            <label style="float:left; font-size: 20px; margin-left: 5px;">min.</label><br />
            <div style="clear: left;"></div>
            <br>
            <p>Intensywność: </p>
            <input type="radio" name="tdeee_2" id="intensywnosc_silowy_4" value="4" checked style="float:left;"/>
            <p style="float:left; margin-top: -4px;">Niska</p>
            <div style="clear: left;"></div>
            <input type="radio" name="tdeee_2" id="intensywnosc_silowy_5_5" value="5.5" style="float:left;"/>
            <p style="float:left; margin-top: -4px;">Średnia</p>
            <div style="clear: left;"></div>
            <input type="radio" name="tdeee_2" id="intensywnosc_silowy_7" value="7" style="float:left;"/>
            <p style="float:left; margin-top: -4px;">Wysoka</p>
            <div style="clear: left;"></div>
          </div>
          <div class="form-group">
            <p style="font-weight: bold">TRENING AEROBOWY (CARDIO)</p>
            <label style="float:left; font-size: 20px;  margin-left: 5px;">Liczba treningów  w tygodniu</label>
            <input type="text" name="cardio_liczba_treningow" size="10" class="req form-control" style="float:left; width: 200px; margin-top: -3px; margin-left: 5px;">
            <div style="clear: left;"></div>
            <label style="float:left; font-size: 20px;">Średni czas trwania</label>
            <input type="text" name="cardio_czas" size="10" class="req form-control" style="float:left; width: 200px; margin-top: -3px;  margin-left: 5px;"><label style="float:left; font-size: 20px; margin-left: 5px;">min.</label>
            <div style="clear: left;"></div>
            <br>
            <p>Intensywność:</p>
            <input type="radio" name="tdeee_3" id="intensywnosc_cardio_5" value="5" checked style="float:left;"/>
            <p style="float:left; margin-top: -4px;">Niska</p>
            <div style="clear: left;"></div>
            <input type="radio" name="tdeee_3" id="intensywnosc_cardio_7_5" value="7.5" style="float:left;"/>
            <p style="float:left; margin-top: -4px;">Średnia</p>
            <div style="clear: left;"></div>
            <input type="radio" name="tdeee_4" id="intensywnosc_cardio_10" value="10" style="float:left;"/>
            <p style="float:left; margin-top: -4px;">Wysoka</p>
            <div style="clear: left;"></div>
          </div>

            <input type="button" value="Oblicz tdee" onClick="calculatetdee()" class="btn btn-primary"><br /><br />
          <div class="form-group">
            <label style="float:left; font-size: 20px">Wskaźnik tdee:</label>
            <input type="text" name="tdee" size="10" class="req form-control" style="float:left; width: 200px; margin-top: -3px; margin-left: 47px;">
            <label style="float:left; font-size: 20px; margin-left: 5px;">kcal</label>
            <div style="clear: left;"></div>            
          </div>
          <div class="form-group">
            <label style="float:left; font-size: 20px;">Wskaźnik bmr:</label>
            <input type="text" name="bmr" size="10" class="req form-control" style="float:left; width: 200px; margin-top: -3px; margin-left: 50px;">
            <label style="float:left; font-size: 20px; margin-left: 5px;">kcal</label>
            <div style="clear: left;"></div>            
          </div>
          <div class="form-group">
            <label style="float:left; font-size: 20px">Współczynnik bmi:</label>
            <input type="text" name="bmi" size="10" class="req form-control" style="float:left; width: 200px; margin-top: -3px; margin-left: 10px;">
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
    function calculatetdee() {
      var height = document.tdeeForm.height.value;
      var weight = document.tdeeForm.weight.value;
      var age = document.tdeeForm.age.value;

      var silowy_liczba_treningow = document.tdeeForm.silowy_liczba_treningow.value;
      var silowy_czas = document.tdeeForm.silowy_czas.value;

      var cardio_liczba_treningow = document.tdeeForm.cardio_liczba_treningow.value;
      var cardio_czas = document.tdeeForm.cardio_czas.value;

      var neat = 0;
      var tea_silowy = 0;
      var tea_silowy_pom = 0;

      var tea_cardio = 0;
      var tea_cardio_pom = 0;

      if(document.getElementById('tdee_endomorfik_200').checked) {
        neat = 200;
      }
      if(document.getElementById('tdee_endomorfik_300').checked) {
        neat = 300;
      }
      if(document.getElementById('tdee_endomorfik_400').checked) {
        neat = 400;
      }
      if(document.getElementById('tdee_mezomorfik_400').checked) {
        neat = 400;
      }
      if(document.getElementById('tdee_mezomorfik_450').checked) {
        neat = 450;
      }
      if(document.getElementById('tdee_mezomorfik_500').checked) {
        neat = 500;
      }
      if(document.getElementById('tdee_ektomorfik_700').checked) {
        neat = 700;
      }
      if(document.getElementById('tdee_ektomorfik_800').checked) {
        neat = 800;
      }
      if(document.getElementById('tdee_ektomorfik_900').checked) {
        neat = 900;
      }


      if(document.getElementById('intensywnosc_silowy_4').checked) {
        tea_silowy = 4;
        tea_silowy_pom = 7;
      }
      if(document.getElementById('intensywnosc_silowy_5_5').checked) {
        tea_silowy = 5.5;
        tea_silowy_pom = 8;
      }
      if(document.getElementById('intensywnosc_silowy_7').checked) {
        tea_silowy = 7;
        tea_silowy_pom = 9;
      }


      if(document.getElementById('intensywnosc_cardio_5').checked) {
        tea_cardio = 5;
        tea_cardio_pom = 5;
      }
      if(document.getElementById('intensywnosc_cardio_7_5').checked) {
        tea_cardio = 7.5;
        tea_cardio_pom = 35;
      }
      if(document.getElementById('intensywnosc_cardio_10').checked) {
        tea_cardio = 10;
        tea_cardio_pom = 180;
      }


      if(document.getElementById('gender_Male').checked) {
        gender = 5;
      }else if(document.getElementById('gender_Female').checked) {
        gender = -161;
      }

      if(weight > 0 && height > 0 && age > 0){ 
        var bmr = ((9.99*weight)+(6.25*height)-(4.92*age)+gender);
        var tea = ((silowy_czas*silowy_liczba_treningow*tea_silowy_pom+(silowy_liczba_treningow*(tea_silowy/100*bmr)))+(cardio_czas*cardio_liczba_treningow*tea_cardio+(tea_cardio_pom)))/7;
        var tef = 6/100*(bmr+tea+neat);
        var finaltdee = bmr + tea + tef + neat;
        var bmi = weight/(height/100*height/100);
        document.tdeeForm.tdee.value = finaltdee.toFixed(2);
        document.tdeeForm.bmr.value = bmr.toFixed(2);
        document.tdeeForm.bmi.value = bmi.toFixed(2);
      }
      else{
      alert("Wprować poprawne wartości!")
      }
    }
  //-->
  </script>
  </body>
</html>