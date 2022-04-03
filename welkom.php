<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta http-equiv="Content-type" content="text/html" charset="UTF-8" />
        <title>home</title>
        <link rel="stylesheet" href="css/welkom.css">
    </head>
    <body>
        <header>
            <h1>Foto uploaden</h1>
        </header>
        <?php
        //vind de sessie
        session_start();
        $mijnSession = session_id();
        //controleer of de gebruiker is ingelogd
        if(isset($_SESSION['ID']) && $_SESSION['ID'] === $mijnSession) {
            echo"<h3>Welkom</h3>
                <br>
                <form action='fotoverzenden.php' method='post' enctype='multipart/form-data'>
                    <p>Upload een foto van de locatie:</p>
                    <input type='file' name='foto' id='foto' required><br><br>
                    <input type='submit' name='submit' value = 'foto verzenden' />
                    <br>
                    <br>
                    <a href='uitloggen.php'>
                        <input type='button' name='terug' value=' Uitloggen' />
                    </a>
                </form>";
        } else {
            echo "<br>
                <p>Je moet eerst inloggen!</p>
                <br>
                <form style = 'text-align: center;'>
                    <a href='index.html'>
                        <input type='button' name='terug' value=' inloggen '/>
                    </a>
                </form>";
        }
        ?>
        <br>
    <footer>
        <p>Deze website is gemaakt door Xander Robbemond voor de vak project.</p>
    </footer>
    </body>
</html>