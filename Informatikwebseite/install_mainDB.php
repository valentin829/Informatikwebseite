<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>W+F Münster | Installationsseite</title>
</head>
<body>
    <?php
    $id = mysqli_connect("localhost", "root", "") or die("Kein MySQL gefunden/gestartet!");

    mysqli_query($id, "CREATE DATABASE IF NOT EXISTS schwimmwebseite");
    mysqli_query($id, "USE schwimmwebseite");

    $erfolg1 = mysqli_query($id, "CREATE TABLE IF NOT EXISTS teilnehmerliste (
        TeilnehmerID INT PRIMARY KEY AUTO_INCREMENT,
        Vorname VARCHAR(50),
        Nachname VARCHAR(50),
        Schwimmkurs VARCHAR(50),
        Email VARCHAR(50),
        Nachricht TEXT
    )");

    $erfolg2 = mysqli_query($id, "CREATE TABLE IF NOT EXISTS trainerliste (
        TrainerID INT PRIMARY KEY AUTO_INCREMENT,
        Vorname VARCHAR(50),
        Nachname VARCHAR(50),
        Email VARCHAR(50),
        Passwort VARCHAR(30)
    )");

    if ($erfolg1 === TRUE && $erfolg2 === TRUE) {
      header("Location: install_success.html");
      exit();
    } else {
      header("Location: install_failure.html");
      exit();
    }
    ?>
</body>
</html>
