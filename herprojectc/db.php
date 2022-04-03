<?php
    // Plaats hier de host naam, database gebruikersnaam, wachtwoord en de naam van de database.
    // Als u geen wachtwoord heeft aangemaakt laat het dan leeg.
    $con = mysqli_connect("localhost","root","","projectc");
    // Controleer connectie
    if (mysqli_connect_errno()){
        echo "Niet gelukt om connectie te maken: " . mysqli_connect_error();
    }
?>