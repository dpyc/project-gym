<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<lang html="pl">
	<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
	<title>Aktywacja</title>
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
                    <li><a href="rejestracja.php">Załóż konto</a></li>
                    <li><a href="contact.php">Kontakt</a></li>
                    <?php if(isset($_SESSION['zalogowano'])){ echo "<li><a href='pu.php'>Panel Użytkownika</a></li>"; } ?>
                </ul>
            </div>
        </div>
    </nav>
</div>

	<div class="container" style="margin-top: 20px; width: 550px;">
    <div class="panel panel-default" style="border-color: #d6d6d6;">
        <div class="panel-heading">
            <p style="font-size: 30px; margin-top: 10px;">Aktywacja konta</p>
        </div> 
        <form action="activecode.php" method="post" id="form" style=" width: 500px; margin: 10px auto">
            <div class="form-group">
            	<fieldset>
                        
                    <label for="login">Login: <i>*</i></label>
                    <input type="text" name="login" id="login" class="req form-control" value="<?php echo $form['login']; ?>" />
                
                	<label for="activecode">Kod Aktywacji: <i>*</i></label>
                    <input type="text" name="activecode" id="activecode" class="req form-control" value="<?php echo $form['activecode']; ?>" />
                    
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
