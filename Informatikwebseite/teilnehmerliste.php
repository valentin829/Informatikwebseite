<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="Img/logo.jpg">
    <title>W+F Münster | Teilnehmerliste</title>
    <link rel="stylesheet" href="styles/teilnehmerliste.css">
</head>
<body>
    <!-- Header-Bereich -->
    <header>
        <!-- Navigationsleiste -->
        <nav class="navbar">
            <!-- Logo und Vereinsname -->
            <div class="logo">
                <img src="Img/logo.jpg" alt="Vereinslogo">
                <h1>Wasser + Freizeit Münster</h1>
            </div>
            <!-- Navigationslinks -->
            <ul class="nav-links">
                <li><a href="startseite.php">Startseite</a></li>
                <li><a href="kalender.php">Termine</a></li>
                <li><a href="logout.php">Abmelden</a></li>
                <li><a href="unseretrainer.php">Unsere Trainer</a></li>
                <li><a href="karte.html">Unser Schwimmbad</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hauptinhalt -->
    <main>
        <!-- Sektion für die Teilnehmerliste -->
        <section class="participants">
            <?php
            // Startet die PHP-Session
            session_start();

            // Begrüßungsnachricht je nach Benutzerstatus
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                echo "<h2>Willkommen, $username!</h2>";
            } else {
                echo "<h2>Willkommen, Trainer!</h2>";
            }
            ?>
            <!-- Überschrift für die Teilnehmerliste -->
            <h2>Teilnehmerliste</h2>
            <!-- Tabelle zur Anzeige der Teilnehmer -->
            <table id="teilnehmer-tabelle">
                <!-- Tabellenkopf mit Spaltenüberschriften -->
                <tr>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>Schwimmkurs</th>
                    <th>Email</th>
                </tr>
                <?php
                // Verbindung zur MySQL-Datenbank herstellen
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "schwimmwebseite";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Überprüfung auf Verbindungsfehler
                if ($conn->connect_error) {
                    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
                }

                // SQL-Abfrage, um die Teilnehmerliste aus der Datenbank abzurufen
                $sql = "SELECT vorname, nachname, schwimmkurs, email FROM teilnehmerliste ORDER BY schwimmkurs ASC";
                $result = $conn->query($sql);

                // Überprüfung, ob Teilnehmer gefunden wurden
                if ($result->num_rows > 0) {
                    // Durchlaufen der Ergebnisdatensätze und Anzeigen in der Tabelle
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['vorname']}</td>";
                        echo "<td>{$row['nachname']}</td>";
                        echo "<td>{$row['schwimmkurs']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "</tr>";
                    }
                } else {
                    // Meldung, falls keine Teilnehmer gefunden wurden
                    echo "Keine Teilnehmer gefunden.";
                }

                // Verbindung zur Datenbank schließen
                $conn->close();
                ?>
            </table>

            <!-- Buttons unter der Tabelle für Export und Druck -->
            <div class="participants-buttons">
                <button onclick="exportTableToCSV('teilnehmerliste.csv')">Exportieren</button>
                <button onclick="printTable()">Drucken</button>
            </div>
        </section>
    </main>

    <!-- Einbindung des JavaScript für Export, Druck und Sortierung -->
    <script src="Scripts/script3.js"></script>

    <!-- Einbindung des Fußzeilen-Elements -->
    <?php include('footer.php'); ?>
</body>
</html>
