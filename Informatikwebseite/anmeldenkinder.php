<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verbindung zur Datenbank herstellen (Sie müssen die Verbindungsinformationen anpassen)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "schwimmwebseite";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Überprüfen der Verbindung
    if ($conn->connect_error) {
        die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
    }

    // Daten aus dem Formular abrufen und bereinigen
    $vorname = mysqli_real_escape_string($conn, $_POST['vorname']);
    $nachname = mysqli_real_escape_string($conn, $_POST['nachname']);
    $schwimmkurs = mysqli_real_escape_string($conn, $_POST['schwimmkurs']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $nachricht = mysqli_real_escape_string($conn, $_POST['nachricht']);

    // SQL-Befehl zum Einfügen der Daten in die Tabelle (Sie müssen die Tabelle anpassen)
    $sql = "INSERT INTO teilnehmerliste (vorname, nachname, schwimmkurs, email, nachricht)
            VALUES ('$vorname', '$nachname', '$schwimmkurs', '$email', '$nachricht')";

    if ($conn->query($sql) === TRUE) {
        header("Location: erfolgreich_angemeldet.html");;
    } else {
        echo "Fehler beim Eintragen der Daten: " . $conn->error;
    }

    // Verbindung zur Datenbank schließen
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W+F Münster | Kind anmelden</title>
    <link rel="stylesheet" href="styles/style2.css">
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
                <li><a href="kursübersicht.html">Schwimmkurse</a></li>
                <li><a href="unseretrainer.php">Unsere Trainer</a></li>
                <li><a href="weiterleitungsseite.php">Anmeldung</a></li>
                <li><a href="karte.html">Unser Schwimmbad</a></li>
            </ul>
        </nav>
    </header>
    <main>
    <div class="container">
        <h1>Melden sie jetzt ihr Kind an!</h1>
        <form action="anmeldenkinder.php" method="POST">
            <div class="form-group">
                <label for="vorname">Vorname:</label>
                <input type="text" id="vorname" name="vorname" required>
            </div>
            <div class="form-group">
                <label for="nachname">Nachname:</label>
                <input type="text" id="nachname" name="nachname" required>
            </div>
            <div class="form-group">
                <label for="schwimmkurs">Schwimmkurs auswählen:</label>
                <select id="schwimmkurs" name="schwimmkurs" required>
                    <option class="kurs-option" value="Wassergewöhnung A">Wassergewöhnung Kurs A </option> <br>
                    <option class="kurs-option" value="Wassergewöhnung B">Wassergewöhnung Kurs B </option>
                    <option class="kurs-option" value="Seepferdchen A">Seepferdchen Kurs A </option>
                    <option class="kurs-option" value="Seepferdchen B">Seepferdchen Kurs B </option>
                    <option class="kurs-option" value="Bronzekurs A">Bronzekurs Kurs A </option>
                    <option class="kurs-option" value="Bronzekurs B">Bronzekurs Kurs B </option>
                    <option class="kurs-option" value="Silberkurs A">Silberkurs Kurs A </option>
                    <option class="kurs-option" value="Silberkurs B">Silberkurs Kurs B </option>
                    <option class="kurs-option" value="Goldkurs A">Goldkurs Kurs A </option>
                    <option class="kurs-option" value="Goldkurs B">Goldkurs Kurs B </option>
                    <option class="kurs-option" value="Technikkurs A">Technikkurs Kurs A </option>
                    <option class="kurs-option" value="Technikkurs A">Technikkurs Kurs B </option>
                    <option class="kurs-option" value="Leistungsschwimmkurs">Leistungsschwimmkurs Kurs A </option>
                    <option class="kurs-option" value="Leistungsschwimmkurs">Leistungsschwimmkurs Kurs B </option>
                    <option class="kurs-option" value="Erwachsenenkurs A">Erwachsenenkurs Kurs A </option>
                    <option class="kurs-option" value="Erwachsenenkurs B">Erwachsenenkurs Kurs B </option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">E-Mail Adresse:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="nachricht">Nachricht:</label>
                <textarea id="nachricht" name="nachricht" rows="4"></textarea>
            </div>

        <div class="form-group">
                <input class="button" type="submit" value="Absenden"></button> 
                <input class="button" type="button" value="Zur Schwimmkursübersicht" onclick="window.location.href='kursübersicht.html'">

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
