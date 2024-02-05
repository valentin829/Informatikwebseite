<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="Img/logo.jpg">
    <title>W+F Münster | Unsere Trainer</title>
    <link rel="stylesheet" href="Styles/unseretrainer.css">
</head>
<body>
    <?php include('header.php'); ?>
    <main>
        <!-- Sektion für die Teilnehmerliste -->
        <section class="participants">
            
            <!-- Überschrift für die Teilnehmerliste -->
            <h2>Unsere Trainer</h2>
            <!-- Tabelle zur Anzeige der Teilnehmer -->
            <table id="teilnehmer-tabelle">
                <!-- Tabellenkopf mit Spaltenüberschriften -->
                <tr>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>E-Mail Adresse</th>
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
                $sql = "SELECT vorname, nachname, email FROM trainerliste ORDER BY TrainerID ASC";
                $result = $conn->query($sql);

                // Überprüfung, ob Teilnehmer gefunden wurden
                if ($result->num_rows > 0) {
                    // Durchlaufen der Ergebnisdatensätze und Anzeigen in der Tabelle
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['vorname']}</td>";
                        echo "<td>{$row['nachname']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "</tr>";
                    }
                } else {
                    // Meldung, falls keine Teilnehmer gefunden wurden
                    echo "Keine Trainer gefunden.";
                }

                // Verbindung zur Datenbank schließen
                $conn->close();
                ?>
            </table>

        </section>
    </main>

    <?php include('footer.php'); ?>

</body>
</html>
