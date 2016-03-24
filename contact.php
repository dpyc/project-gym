<?php

$adres = 'thegymproject@gmail.com';

$poczatek_znacznika = "<p class='alert alert-error'>";
$koniec_znacznika = "</p>";
$walidacja = TRUE;


$pola_formularza = array('name','phone','email','message', 'subject');
$pola_wymagane = array('name','phone','email', 'subject');

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
    
    if($form['phone'] == '')
    {
        $error['phone'] = $poczatek_znacznika . "<div class='alert alert-danger' role='alert' style='margin-bottom: 5px; margin-top: -40px;'>Wypełnij wymagane pole</div>" . $koniec_znacznika;
        $walidacja = FALSE;
    }
    
    if($form['email'] == '')
    {
        $error['email'] = $poczatek_znacznika . "<div class='alert alert-danger' role='alert' style='margin-bottom: 5px; margin-top: -40px;'>Wypełnij wymagane pole</div>" . $koniec_znacznika;
        $walidacja = FALSE;
    }

    if($form['subject'] == '')
    {
        $error['subject'] = $poczatek_znacznika . "<div class='alert alert-danger' role='alert' style='margin-bottom: 5px; margin-top: -40px;'>Wypełnij wymagane pole</div>" . $koniec_znacznika;
        $walidacja = FALSE;
    }
    
    if($error['email'] == '' && !preg_match('/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/', $form['email']))
    {
         $error['email'] = $poczatek_znacznika . "<div class='alert alert-danger' role='alert' style='margin-bottom: 5px; margin-top: -40px;'>Wprowadź prawidłowy email</div>" . $koniec_znacznika;
         $walidacja = FALSE;
    }

    if($error['phone'] == '' && !preg_match('^\+48[0-9]{9}$^', $form['phone']))
    {
         $error['phone'] = $poczatek_znacznika . "<div class='alert alert-danger' role='alert' style='margin-bottom: 5px; margin-top: -40px;'>Wprowadź prawidłowy numer telefonu </div>" . $koniec_znacznika;
         $walidacja = FALSE;
    }
    
    if($walidacja)
    {
        
        $subject = $_POST['subject'];

        $message = "Imię: " . $form['name'] . "\n";
        $message .= "Telefon: " . $form['phone'] . "\n";
        $message .= "Email: " . $form['email'] . "\n";
        $message .= "Wiadomość: " . $form['message'];
        
        $headers = "From: www.thegymproject.pl <thegymproject@gmail.com>\r\n";
        $headers .= "X-Sender: <thegymproject@gmail.com>";
        
        mail($adres, $subject, $message, $headers);
        
        header("Location: success.php");
    } 
    else 
    {
        include('contactview.php');
    }
    
} 
else 
{
    
    foreach($pola_formularza as $pole){
        $form[$pole] = '';
}
    
    include('contactview.php');
    
}