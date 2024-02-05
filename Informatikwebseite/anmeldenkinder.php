<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verbindung zur Datenbank herstellen (Sie müssen die Verbindungsinformationen anpassen)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "schwimmkurse_wartelisten";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Überprüfen der Verbindung
    if ($conn->connect_error) {
        die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
    }

    // Daten aus dem Formular abrufen und bereinigen
    $vorname = mysqli_real_escape_string($conn, $_POST['vorname']);
    $nachname = mysqli_real_escape_string($conn, $_POST['nachname']);
    $kind_vorname = mysqli_real_escape_string($conn, $_POST['kind_vorname']);
    $kind_nachname = mysqli_real_escape_string($conn, $_POST['kind_nachname']);
    $schwimmkurs = mysqli_real_escape_string($conn, $_POST['schwimmkurs']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telefonnummer = mysqli_real_escape_string($conn, $_POST['telefonnummer']);
    $besonderheit = mysqli_real_escape_string($conn, $_POST['besonderheit']);
    $variante = mysqli_real_escape_string($conn, $_POST['variante']);

    // SQL-Befehl zum Einfügen der Daten in die spezifische Kurs-Tabelle
    $sql_kurs = "INSERT INTO `" . $schwimmkurs . "` (variante, vorname, nachname, kind_vorname, kind_nachname, email, telefonnummer, besonderheit)
    VALUES ('$variante', '$vorname', '$nachname', '$kind_vorname', '$kind_nachname', '$email', '$telefonnummer', '$besonderheit')";


    if ($conn->query($sql_kurs) === TRUE) {
        header("Location: erfolgreich_angemeldet.html");
        exit();
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
    <link rel="stylesheet" href="Styles/anmeldenkinder.css">
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
        <h1>Bitte im folgende Text, alle Lücken füllen:</h1>
        <form method="post" action="anmeldenkinder.php">
            <div class="lückentext">
                <p>
                    Ich <input type="text" name="vorname" placeholder="Ihren Vornamen hier eingeben..." required> <input type="text" name="nachname" placeholder="Ihren Nachnamen hier eingeben..." required>, möchte 
                    mein Kind <input type="text" name="kind_vorname" placeholder="Vornamen ihres Kindes hier eingeben..." required> <input type="text" name="kind_nachname" placeholder="Nachnamen ihres Kindes hier eingeben..." required> zum Kurs
                    <select id="schwimmkurs" name="schwimmkurs" required>
                        <option class="kurs-option" value="wassergewöhnung_warteliste">Wassergewöhnung</option>
                        <option class="kurs-option" value="seepferdchenkurs_warteliste">Seepferdchen</option>
                        <option class="kurs-option" value="bronzekurs_warteliste">Bronzekurs</option>
                        <option class="kurs-option" value="silberkurs_warteliste">Silberkurs</option>
                        <option class="kurs-option" value="goldkurs_warteliste">Goldkurs</option>
                        <option class="kurs-option" value="technikkurs_warteliste">Technikkurs</option>
                        <option class="kurs-option" value="leistungsschwimmkurs_warteliste">Leistungsschwimmkurs</option>
                        <option class="kurs-option" value="erwachsenenkurs_warteliste">Erwachsenenkurs</option>
                    </select>

                    <select id="variante" name="variante" required>
                        <option class="kurs-option" value="A">Kurs A </option> <br>
                        <option class="kurs-option" value="B">Kurs B </option>
                    </select> 
                    
                    anmelden. <br>
                    Meine E-Mail-Adresse lautet: <input type="email" name="email" placeholder="E-Mail Adresse hier eingeben..." required> und meine Telefonnummer lautet: <input type="tel" name="telefonnummer" placeholder="Telefon Nummer hier eingeben..." required>.
                    <br>
                </p>
                
                <p class="besonderheiten">
                        Falls ihr Kind Besonderheiten (Allergien, Verletzungen, Behinderungen, etc.) hat, dann füllen sie folgendes Feld aus, wenn nicht, einfach frei lassen. <br> <br>
                        Mein Kind, hat folgende Besonderheiten: <br>
                        <input type="text" name="besonderheit" placeholder="z.B.     -  Asthma">
                </p>

                <div class="buttond">
                        <input type="submit" value="Absenden">
                </div>
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
