<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "schwimmwebseite";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
    }

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $passwort = mysqli_real_escape_string($conn, $_POST['passwort']);

    $sql = "SELECT * FROM trainerliste WHERE Email = '$email' AND Passwort = '$passwort'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['Email'];
        $_SESSION['trainer_id'] = $row['Trainer-ID'];
        $_SESSION['role'] = 'Trainer';
        header("Location: startseite.php");
        exit();
    } else {
        echo "Anmeldung fehlgeschlagen. <a href='index.html'>Zurück zur Anmeldeseite</a>";
    }

    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W+F Münster | Trainer-Login</title>
    <link rel="icon" type="image/jpg" href="Img/logo.jpg">
    <link rel="stylesheet" href="styles/style12.css">
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
                <li><a href="kalender.html">Termine</a></li>
                <li><a href="weiterleitungsseite.php">Anmelden</a></li>
                <li><a href="unseretrainer.php">Unsere Trainer</a></li>
                <li><a href="karte.html">Unser Schwimmbad</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Login</h1>
        <form method="post" action="login.php">
            <label for="email">Email-Adresse:</label>
            <input type="email" name="email" required><br><br>
            
            <label for="passwort">Passwort:</label>
            <input type="password" name="passwort" required><br><br>
            
            <input type="submit" value="Anmelden">
        </form>
        <br><br>
        <h4>Bist du noch nicht registriert ? <a href="registrierentrainer.php">Registrier dich hier </a></h4>
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
