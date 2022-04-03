<?php
require('db.php');
session_start();

// Wanneer er bij inloggen op inloggen is gedrukt wordt deze code uitgevoerd
if (isset($_POST['inloggen'])) {
    
    // ontvang waardes van inlogformulier
    $email = htmlspecialchars($_POST['e-mail']);
    $email = mysqli_real_escape_string($con, $email);

    $wachtwoord = htmlspecialchars($_POST['wachtwoord']);
    $wachtwoord = mysqli_real_escape_string($con, $wachtwoord);

    // check of de gebruiker bestaat in de database
    $query    = "SELECT * FROM `users` WHERE email='$email'
                    AND wachtwoord='" . md5($wachtwoord) . "'";

    $resultaat = mysqli_query($con, $query) or die(mysql_error());
    $rows = mysqli_num_rows($resultaat);
    
    // als de gebruiker is gevonden komt er een pop-up waarin staat dat de gebruiker met succes is ingelogd. 
    if ($rows == 1) {
        $_SESSION['USER'] = $email;
        $_SESSION["STATUS"] = 1;
        $_SESSION["ID"] = $_COOKIE["PHPSESSID"];
        echo "
        <script>
            alert('U bent ingelogd als $email.');
            location.href = 'welkom.php';
        </script>";
    }
    
    //als de gebruiker niet is gevonden komt er een pop-up waarin staat dat de wachtwoord of gebruikernaam ongeldig is.
    else {
        echo "
            <script>
                alert('wachtwoord of e-mailadres ongeldig.');
                location.href='index.html';
            </script>";
    }
}
?>