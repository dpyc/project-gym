<?php

session_start();
$poczatek_znacznika = "<p class='alert alert-error'>";
$koniec_znacznika = "</p>";
$walidacja = TRUE;


$pola_formularza = array('name','email','haslo1', 'haslo2');
$pola_wymagane = array('name','email', 'haslo1', 'haslo2');

foreach($pola_wymagane as $wymagane)
{
    $error[$wymagane] = '';
}

if(isset($_POST['submit']))
{
    
    foreach($pola_formularza as $pole)
    {
        $form[$pole] = htmlspecialchars($_POST[$pole]);
    }
    
    if($form['name'] == '')
    {
        $error['name'] = $poczatek_znacznika . "<div class='alert alert-danger' role='alert' style='margin-bottom: 5px; margin-top: -40px;'>Wypełnij wymagane pole</div>" . $koniec_znacznika;
        $walidacja = FALSE;
    }

    if($error['name'] == '' && strlen($form['name'])<3 || strlen($form['name'])>15)
    {
        $error['name'] = $poczatek_znacznika . "<div class='alert alert-danger' role='alert' style='margin-bottom: 5px; margin-top: -40px;'>Wprowadź prawidłowy login</div>" . $koniec_znacznika;
        $walidacja = FALSE;
    }

    if($form['email'] == '')
    {
        $error['email'] = $poczatek_znacznika . "<div class='alert alert-danger' role='alert' style='margin-bottom: 5px; margin-top: -40px;'>Wypełnij wymagane pole</div>" . $koniec_znacznika;
        $walidacja = FALSE;
    }
    
    if($error['email'] == '' && !preg_match('/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/', $form['email']))
    {
         $error['email'] = $poczatek_znacznika . "<div class='alert alert-danger' role='alert' style='margin-bottom: 5px; margin-top: -40px;'>Wprowadź prawidłowy email</div>" . $koniec_znacznika;
         $walidacja = FALSE;
    }

    if($form['haslo1'] == '')
    {
        $error['haslo1'] = $poczatek_znacznika . "<div class='alert alert-danger' role='alert' style='margin-bottom: 5px; margin-top: -40px;'>Wypełnij wymagane pole</div>" . $koniec_znacznika;
        $walidacja = FALSE;
    }

      if($form['haslo2'] == '')
    {
        $error['haslo2'] = $poczatek_znacznika . "<div class='alert alert-danger' role='alert' style='margin-bottom: 5px; margin-top: -40px;'>Wypełnij wymagane pole</div>" . $koniec_znacznika;
        $walidacja = FALSE;
    }

    if(($error['haslo1'] == '' && strlen($form['haslo1'])<8) || (strlen($form['haslo1'])>20))
    {
        $error['haslo1'] = $poczatek_znacznika . "<div class='alert alert-danger' role='alert' style='margin-bottom: 5px; margin-top: -40px;'>Wprowadź poprawne hasło</div>" . $koniec_znacznika;
        $walidacja = FALSE;
    }

    if($form['haslo1']!=$form['haslo2'])
    {
        $error['haslo1'] = '';
        $error['haslo2'] = $poczatek_znacznika . "<div class='alert alert-danger' role='alert' style='margin-bottom: 5px; margin-top: -40px;'>Wprowadzone hasła nie są identyczne</div>" . $koniec_znacznika;
        $walidacja = FALSE;
    }

    $haslo = $_POST['haslo1'];
    $haslo_hash = md5($haslo);
    $login = $_POST['name'];
    $email = $_POST['email'];
   
    require_once "connect.php";

    $result = $mysqli->query("SELECT userID FROM user WHERE login = '$login'");
    $user_count = $result->num_rows;
    if($user_count>0)
    {
        $error['name'] = $poczatek_znacznika . "<div class='alert alert-danger' role='alert' style='margin-bottom: 5px; margin-top: -40px;'>Użytkownik o takiej nazwie już istnieje</div>" . $koniec_znacznika;
        $walidacja = FALSE;
    }

    $result = $mysqli->query("SELECT userID FROM user WHERE email = '$email'");
    $email_count = $result->num_rows;
    if($email_count>0)
    {
        $error['email'] = $poczatek_znacznika . "<div class='alert alert-danger' role='alert' style='margin-bottom: 5px; margin-top: -40px;'>Użytkownik o takim mailu już istnieje</div>" . $koniec_znacznika;
        $walidacja = FALSE;
    }
    
    $actCode=str_shuffle("qwertyuiopasdfghjklzxcvbnm1234567890");
    
    if($walidacja)
    {
        
        if($mysqli->query("INSERT INTO user VALUES(NULL, '$login', '$haslo_hash', NULL, NULL, '$email', NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL, NULL,'$actCode', 0)"))
        
        $headers.="MIME-Version: 1.0\r\n";
        $headers.= 'Content-type: text/html; charset=iso-8859-2'."\r\n";
        $headers="From: TheGymProject";
        $content="Witaj $login!</br> Oto Twój kod aktywacyjny: $actCode </br> Przejdz teraz na strone <a href=http://mailtester.cba.pl >gymproject</a>.</br>Pozdrawia, ekipa Gym Project!";
        mail($email, "Link Aktywacyjny", $content, $headers);    
            
        $_SESSION['zarejestrowano'] = true;
        header('Location: index.php');
    } 
    else 
    {
        include('rejestracjawidok.php');
    }
    $mysqli->close();
    
} 
else 
{
    foreach($pola_formularza as $pole){
        $form[$pole] = '';
}
    
    include('rejestracjawidok.php');
}