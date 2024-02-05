<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weitere Informationen</title>
    <link rel="stylesheet" href="weitere_informationen.css">
</head>
<body>
    <div class="container">
        <h1>Weitere Informationen</h1>

        <?php
        // Hier sollten die Zugangsdaten für die Datenbank eingetragen werden
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "schwimmwebseite";

        // Verbindung zur Datenbank herstellen
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Überprüfen, ob die Verbindung erfolgreich war
        if ($conn->connect_error) {
            die("Verbindung fehlgeschlagen: " . $conn->connect_error);
        }

        // Hier sollten Sie die ID der ausgewählten Person erhalten
        // Nehmen Sie an, dass Sie die ID als GET-Parameter übergeben (weitere_informationen.php?id=123)
        $person_id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;

        // Hier sollte die Struktur Ihrer Datenbanktabelle angepasst werden
        $sql = "SELECT * FROM teilnehmerliste WHERE TeilnehmerID = $person_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Ergebnisse ausgeben
            $row = $result->fetch_assoc();
            echo "<p><span class='informationen'>Vorname:</span> " . $row["Vorname"] . "</p>";
            echo "<p><span class='informationen'>Nachname:</span> " . $row["Nachname"] . "</p>";
            echo "<p><span class='informationen'>E-Mail:</span> " . $row["Email"] . "</p>";
            echo "<p><span class='informationen'>Aktueller Schwimmkurs (wenn vorhanden):</span> " . $row["Schwimmkurs"] . "</p>";
            echo "<p><span class='informationen'>Besonderheiten:</span> <br> " . $row["Nachricht"] . "</p>";
            
            
        } else {
            echo "Keine Informationen gefunden.";
        }

        // Verbindung schließen
        $conn->close();
        ?>
    </div>
</body>
</html>
