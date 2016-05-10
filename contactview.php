<!DOCTYPE html>

<?php
session_start();
?>

<html lang="pl">
<head>
    <title>Formularz Kontaktowy</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

    
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
                    <li class="active"><a href="contact.php">Kontakt</a></li>
                    <?php if(isset($_SESSION['zalogowano'])){ echo "<li><a href='pu.php'>Panel Użytkownika</a></li>"; } ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="rejestracja.php">Załóż konto</a></li>                
                </ul>
            </div>
        </div>
    </nav>
</div>

	<div class="container" style="margin-top: 20px; width: 550px;">
    <div class="panel panel-default" style="border-color: #d6d6d6;">
        <div class="panel-heading">
            <p style="font-size: 30px; margin-top: 10px;">Kontakt</p>
        </div> 
    	<form action="" method="post" id="form" style=" width: 500px; margin: 10px auto">
            <div class="form-group">
            	<fieldset>
                
                	<label for="name">Imię: <i>*</i></label>
                    <input type="text" name="name" id="name" class="req form-control" value="<?php echo $form['name']; ?>" />
                    <?php echo $error['name']; ?>
                    
                    <label for="phone">Telefon: <i>*</i></label>
                    <input type="text" name="phone" id="phone" class="req form-control" value="<?php echo $form['phone']; ?>" />
                    <?php echo $error['phone']; ?>
                    
                    <label for="email">Email: <i>*</i></label>
                    <input type="text" name="email" id="email" class="req form-control" value="<?php echo $form['email']; ?>" />
                    <?php echo $error['email']; ?>

                    <label for="subject">Temat: <i>*</i></label>
                    <input type="text" name="subject" id="subject" class="req form-control" value="<?php echo $form['subject']; ?>" />
                    <?php echo $error['subject']; ?>
                    
                    <label for="message">Wiadomość: </label>
                    <textarea class="form-control" name="message" id="message" style="height: 200px;"><?php echo $form['message']; ?></textarea>
                    
                    <p>* - pola wymagane</p>
                    
                    <input type="submit" name="submit" id="submit" value="Wyślij" class="btn btn-primary"/>
                
                </fieldset>
            </div>
        </form>
    </div>    
    </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
</body>
</html>