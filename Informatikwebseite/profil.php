<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W+F Münster | Trainerprofil</title>
    <link rel="stylesheet" href="Styles/style19.css">
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
        <h1 class="headline">Trainerprofil</h1>
        <div class="profile-container">
            <?php
            session_start();
            if(isset($_SESSION['role']) && $_SESSION['role'] == 'Trainer') {
                // Verbindung zur Datenbank herstellen (Verbindungsinformationen anpassen)
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "schwimmwebseite";
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Überprüfen der Verbindung
                if ($conn->connect_error) {
                    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
                }

                // Trainerdaten aus der Datenbank abrufen
                $trainer_id = $_SESSION['trainer_id'];
                $sql = "SELECT * FROM trainerliste WHERE `Trainer-ID` = '$trainer_id'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Trainerdaten anzeigen
                    $row = $result->fetch_assoc();
                    echo "<div class='profile-item'>Trainer-ID: <span class='value'>" . $row["Trainer-ID"] . "</span></div>";
                    echo "<div class='profile-item'>Vorname: <span class='value'>" . $row["Vorname"] . "</span></div>";
                    echo "<div class='profile-item'>Nachname: <span class='value'>" . $row["Nachname"] . "</span></div>";
                    echo "<div class='profile-item'>Email: <span class='value'>" . $row["Email"] . "</span></div>";
                    echo "<div class='profile-item'>Passwort: <span class='value-password'>" . str_repeat("•", strlen($row["Passwort"])) . "</span></div>";
                } else {
                    echo "Keine Trainerdaten gefunden.";
                }

                // Verbindung zur Datenbank schließen
                $conn->close();
            } else {
                echo "<h1> Zugriff verweigert <br>";
                echo "Melden sie sich vorher an, um ihr Profil einzusehen ! </h1>";
                echo '<h2> Melden sie sich hier <a href="login.php"> an </a> </h2>';
            }
            ?>
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