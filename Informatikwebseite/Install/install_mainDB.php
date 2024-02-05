<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>W+F Münster | Installationsseite</title>
</head>
<body>
    <?php
    $id = mysqli_connect("localhost", "root", "") or die("Kein MySQL gefunden/gestartet!");

    // Datenbank "schwimmwebseite" erstellen und verwenden
    mysqli_query($id, "CREATE DATABASE IF NOT EXISTS schwimmwebseite");
    mysqli_query($id, "USE schwimmwebseite");

    // Tabelle "teilnehmerliste" erstellen und verwenden
    $erfolg1 = mysqli_query($id, "CREATE TABLE IF NOT EXISTS teilnehmerliste (
        TeilnehmerID INT PRIMARY KEY AUTO_INCREMENT,
        Vorname VARCHAR(50),
        Nachname VARCHAR(50),
        Schwimmkurs VARCHAR(50),
        Email VARCHAR(50),
        Nachricht TEXT
    )");
    // Tabelle "trainerliste" erstellen und verwenden
    $erfolg2 = mysqli_query($id, "CREATE TABLE IF NOT EXISTS trainerliste (
        TrainerID INT PRIMARY KEY AUTO_INCREMENT,
        Vorname VARCHAR(50),
        Nachname VARCHAR(50),
        Email VARCHAR(50),
        Passwort VARCHAR(30)
    )");

    $erfolg3 = mysqli_query($id, "CREATE TABLE IF NOT EXISTS mitglieder_db (
        MitgliedID INT PRIMARY KEY AUTO_INCREMENT,
        Vorname VARCHAR(50),
        Nachname VARCHAR(50),
        Email VARCHAR(50),
        Schwimmkurs VARCHAR(50),
        Passwort VARCHAR(30),
        Historie TEXT
    )");

// Wenn die DB erfolgreich installiert werden konnte, dann soll man auf die Seite install_success.html  weitergeleitet werden
    if ($erfolg1 === TRUE && $erfolg2 === TRUE && $erfolg3 === TRUE) {
      header("Location: install_success.html");
      exit();
    } else {
      header("Location: install_failure.html");
      exit();
// Wenn die DB nicht erfolgreich installiert werden konnte, dann soll man auf die Seite install_failure.html  weitergeleitet werden
    }
    ?>
</body>
</html>
