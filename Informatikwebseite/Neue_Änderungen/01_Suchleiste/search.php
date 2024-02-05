<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suchleiste</title>
    <link rel="stylesheet" href="search.css">
</head>
<body>
    <h1>Suchergebnisse:</h1>
</body>
</html>

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

// Suchanfrage verarbeiten
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_query = $_POST["search_query"];

    // Hier sollte die Struktur Ihrer Datenbanktabelle angepasst werden
    $sql = "SELECT * FROM teilnehmerliste WHERE Vorname LIKE '%$search_query%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Ergebnisse ausgeben
        while ($row = $result->fetch_assoc()) {
            echo "<div class='karteikarte'>";
            echo "<h2>" . $row["Vorname"] . " " . $row["Nachname"] . "</h2>";
            echo "<div class='details'>";
            echo "<p><span class='informationen'>Email:</span> " . $row["Email"] . "</p>";
            echo "<p><span class='informationen'>Schwimmkurs:</span> " . $row["Schwimmkurs"] . "</p>";
            echo "<div class='actions'>";
            
            // Überprüfen Sie, ob die ID vorhanden ist, bevor Sie den Link hinzufügen
            if (isset($row["TeilnehmerID"])) {
                echo "<a href='weitere_informationen.php?id=" . $row["TeilnehmerID"] . "'>Weitere Informationen</a>";
            } else {
                echo "Keine ID vorhanden.";
            }

            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<div class='no_results'>";
        echo "Keine Ergebnisse gefunden.";
        echo "</div>";
    }
}

// Verbindung schließen
$conn->close();
?>

