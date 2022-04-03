<?php
header("refresh:5;url=index.html");
// Vind de sessie 
session_start();
// Eind sessie melden
echo "Tot ziens " . $_SESSION['USER'];
//verwijder de sessie 
session_destroy();

?>