<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="Img/logo.jpg">
    <title>W+F Münster | Teilnehmerliste</title>
    <link rel="stylesheet" href="styles/style15.css">
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
                <li><a href="logout.php">Abmelden</a></li>
                <li><a href="unseretrainer.php">Unsere Trainer</a></li>
                <li><a href="karte.html">Unser Schwimmbad</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="participants">
            
        <?php
            session_start();

            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                echo "<h2>Willkommen, $username!</h2>";
            } else {
                echo "<h2>Willkommen, Trainer!</h2>";
            }
            ?>
            <h2>Teilnehmerliste</h2>
            <table id="teilnehmer-tabelle">
                <tr>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>Schwimmkurs</th>
                    <th>Email</th>
                </tr>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "schwimmwebseite";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
                }

                $sql = "SELECT vorname, nachname, schwimmkurs, email FROM teilnehmerliste ORDER BY schwimmkurs ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['vorname']}</td>";
                        echo "<td>{$row['nachname']}</td>";
                        echo "<td>{$row['schwimmkurs']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "Keine Teilnehmer gefunden.";
                }

                $conn->close();
                ?>
            </table>

            <div class="participants-buttons">
                <button onclick="exportTableToCSV('teilnehmerliste.csv')">Exportieren</button>
                <button onclick="printTable()">Drucken</button>
            </div>
        </section>
    </main>

    <script src="Scripts/script3.js"></script>

    <?php include('footer.php'); ?>
</body>
</html>
