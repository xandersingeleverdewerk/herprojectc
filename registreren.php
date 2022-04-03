<html>
    <head>
        <meta http-equiv="Content-type" content="text/html" charset="UTF-8" />
        <title>registreren</title>
        <link rel="stylesheet" href="css/registreren.css">
    </head>
    <body>
        <header>
            <h1>Registreren</h1>
        </header>
        <?php
        require('db.php');
        if(isset($_POST["submit"])) {
            // voeg de verstuurde naam in een variabele en bereid de con op een insert.
            $naam = htmlspecialchars($_POST['naam']);
            $naam = mysqli_real_escape_string($con, $naam);

            // voeg de verstuurde email in een variabele en bereid de con op een insert.
            $email = htmlspecialchars($_POST['e-mail']);
            $email = mysqli_real_escape_string($con, $email);
            
            // voeg de verstuurde wachtwoord in een variabele en bereid de con op een insert.
            $wachtwoord = htmlspecialchars($_POST['password']);
            $wachtwoord = mysqli_real_escape_string($con, $wachtwoord);
            
            // een select om te kijken of de verstuurde email al bestaat.
            $select = mysqli_query($con, "SELECT * FROM users WHERE email = '".$email."'");

            // controle op of de verstuurde email al bestaat.
            if(mysqli_num_rows($select)) {
                echo "<form>
                    <p>U bent al geregistreerd</p> 
                    <p>Klik/tik hier om in te loggen<a style='font-size: 30px;' href='index.html'> Inloggen</a></p>
                    </form>";
            }
            else {

                // gebruikers opslaan in database.
                $query = "INSERT into `users` (naam, email, wachtwoord)
                VALUES('$naam', '$email',  '" . md5($wachtwoord) . "')";

                // wordt gebruikt om de geregistreerde gebruiker in de database op te slaan.
                $resultaat = mysqli_query($con, $query);

                // check of de registratie met succes is verlopen.
                if($resultaat) {
                    echo "<form>
                            <h3>Je bent met succes geregistreerd.</h3><br/>
                            <p>Klik/tik hier om in te loggen<a style='font-size: 30px;' href='index.php'> Inloggen</a></p>
                        </form>";
                }

                else {
                    echo "<form>
                        <h3>Er is iets mis gegaan.</h3><br/>
                        <p>Klik/tik hier om opnieuw te <a href='registreren.html'>registratreren</a></p>
                        </form>";
                }
            }
        }
        ?>
        <footer>
            <p>Deze website is gemaakt door Xander Robbemond voor de vak project.</p>
        </footer>
    </body>
</html>