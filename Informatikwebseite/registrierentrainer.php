        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "schwimmwebseite";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
        }

        $trainer_vorname = mysqli_real_escape_string($conn, $_POST['trainer_vorname']);
        $trainer_nachname = mysqli_real_escape_string($conn, $_POST['trainer_nachname']);
        $trainer_email = mysqli_real_escape_string($conn, $_POST['trainer_email']);
        $trainer_passwort = mysqli_real_escape_string($conn, $_POST['trainer_passwort']);

        $trainer_sql = "INSERT INTO trainerliste (vorname, nachname, email, passwort)
                VALUES ('$trainer_vorname', '$trainer_nachname', '$trainer_email', '$trainer_passwort')";

        if ($conn->query($trainer_sql) === TRUE) {
        header("Location: registration_success.html");
        exit();
        } else {
            echo "Fehler beim Eintragen der Trainerdaten: " . $conn->error;
        }   

        $conn->close();
    }
    ?>
    
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W+F Münster | Trainer-Registrierung</title>
    <link rel="stylesheet" href="styles/style14.css">
    <link rel="icon" type="image/jpg" href="Img/logo.jpg">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="Img/logo.jpg" alt="Vereinslogo">
                <h1>Wasser + Freizeit Münster</h1>
            </div>
            <ul class="nav-links">
                <li><a href="startseite.php">Startseite</a></li>
                <li><a href="kalender.php">Termine</a></li>
                <li><a href="weiterleitungsseite.php">Anmelden</a></li>
                <li><a href="unseretrainer.php">Unsere Trainer</a></li>
                <li><a href="karte.html">Unser Schwimmbad</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1 style="color: black;">Registrieren</h1>
        


        <div class="container">
            <form action="registrierentrainer.php" method="POST">
                <div class="form-group">
                    <label for="trainer_vorname">Vorname:</label>
                    <input type="text" id="trainer_vorname" name="trainer_vorname" placeholder="Gib hier deinen Vornamen ein ..." required>
                </div>
                <div class="form-group">
                    <label for="trainer_nachname">Nachname:</label>
                    <input type="text" id="trainer_nachname" name="trainer_nachname" placeholder="Gib hier deinen Nachnamen ein ..." required>
                </div>
                <div class="form-group">
                    <label for="trainer_email">E-Mail Adresse:</label>
                    <input type="email" id="trainer_email" name="trainer_email" placeholder="Gib hier deine E-Mail Adresse ein ..." required>
                </div>
                <div class="form-group">
                    <label for="trainer_passwort">Passwort:</label>
                    <input type="password" id="trainer_passwort" name="trainer_passwort" placeholder="Lege hier ein sicheres Passwort fest ..." required>
                </div>

                <div class="form-group">
                    <input class="button" type="submit" value="Registrieren">
                </div>
            </form>
        </div>
    </main>

    <footer>
        <div class="footer-content">
            <p>&copy; Valentin Horstmann</p>
            <ul class="social-links">
                <li><a href="https://www.facebook.com/"><img src="Img/facebook.png" alt="Facebook"></a></li>
                <li><a href="https://www.twitter.com/"><img src="Img/twitter.png" alt="Twitter"></a></li>
                <li><a href="https://www.instagram.com/"><img src="Img/instagram.png" alt="Instagram"></a></li>
            </ul>
        </div>
    </footer>

</body>
</html>
