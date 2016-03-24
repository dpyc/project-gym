<?php

session_start();

?>

<!DOCTYPE html>
<html lang="pl">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
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
                <a class="navbar-brand" href="#">GymProject</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="exercise.html">Zobacz Ćwiczenia</a></li>
                    <li><a href="register.php">Załóż konto</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<?php if(isset($_SESSION['zarejestrowano']) && ($_SESSION['zarejestrowano']) == true) echo "Rejestracja zakoñczona powodzeniem"; ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="jumbotron" style="background-color: #f8f8f8; border-style: solid; border-width: 1px; border-color: #d6d6d6;">
                <p>
                    Aplikacja która pozwoli ustalić Twoją dietę oraz plan treningowy! <br>
                    Oczywiście jak wszyscy wywiążą sią ze swoich zadań. <br>
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default" style="border-color: #d6d6d6;">
                <div class="panel-heading">
                    <p style="font-size: 30px; margin-top: 10px;">Logowanie</p>
                </div>
                <form action="login.php" method="post">
                    <div class="input-group" style="width: 95%; margin-left: 5px; margin-right: 5px;">
                        <p style="font-size: 20px; margin-left: 5px; margin-right: 5px;">Login:</p>
                        <input type="text" name="login" class="form-control" placeholder="Login" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group" style="margin-top: 10px; width: 95%; margin-left: 5px; margin-right: 5px;">
                        <p style="font-size: 20px; margin-left: 5px; margin-right: 5px;">Hasło:</p>
                        <input type="password" name="haslo" class="form-control" placeholder="Hasło" aria-describedby="basic-addon1">
                    </div>
                        <input type="submit" value="Zaloguj siê" type="button" class="btn btn-primary" style="margin-top: 20px; margin-left: 5px; margin-bottom: 10px;">
                </form>
                        <?php if(isset($_SESSION['blad']))echo $_SESSION['blad']; ?>
                        <?php unset($_SESSION['blad']); ?>
            </div>
        </div>
    </div>
</div>
    
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
</body>
</html>