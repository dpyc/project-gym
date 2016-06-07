<?php

session_start();
$poczatek_znacznika = "<p class='alert alert-error'>";
$koniec_znacznika = "</p>";
$walidacja = TRUE;


$pola_formularza = array('login','activecode');
$pola_wymagane = array('login','activecode');



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
    
    if($form['login'] == '')
    {
        $error['login'] = $poczatek_znacznika . "<div class='alert alert-danger' role='alert' style='margin-bottom: 5px; margin-top: -40px;'>Wypełnij wymagane pole</div>" . $koniec_znacznika;
        $walidacja = FALSE;
    }

    if($error['login'] == '' && strlen($form['login'])<3 || strlen($form['login'])>15)
    {
        $error['login'] = $poczatek_znacznika . "<div class='alert alert-danger' role='alert' style='margin-bottom: 5px; margin-top: -40px;'>Wprowadź prawidłowy login</div>" . $koniec_znacznika;
        $walidacja = FALSE;
    }
    
    if($form['activecode'] == '')
    {
        $error['activecode'] = $poczatek_znacznika . "<div class='alert alert-danger' role='alert' style='margin-bottom: 5px; margin-top: -40px;'>Wypełnij wymagane pole</div>" . $koniec_znacznika;
        $walidacja = FALSE;
    }
    
    $login=$_POST['login'];
    $activecode=$_POST['activecode'];
    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    
    require_once "connect.php";
    
    if($walidacja)
    {
        
        $result = $mysqli->query(sprintf("SELECT * FROM user WHERE login='%s'", mysqli_real_escape_string($mysqli, $login)));
        $rows= $result->fetch_assoc();
        //$activecode2= $rows['activekey'];
        if($activecode==$rows['activekey']){
            $mysqli->query("UPDATE user SET ifactive=1 WHERE login='$login'");
        }
        
        header('Location: index.php');
    } 
    else 
    {
        include('activecodewidok.php');
    }
$mysqli->close();
    
} 
else 
{
    foreach($pola_formularza as $pole){
        $form[$pole] = '';
}

include('activecodewidok.php');


}
