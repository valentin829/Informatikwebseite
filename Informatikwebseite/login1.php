<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    if ($username === '1234567891' && $password === '1234567891') {
        echo "Anmeldung erfolgreich!";
    } else {
        echo "Anmeldung fehlgeschlagen. Bitte überprüfen Sie Ihre Anmeldeinformationen.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Loginseite</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            background-color: #fff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px #888888;
            margin-top: 60px;
        }

        label {
            display: block;
            margin: 10px 0;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 380px;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Login</h2>
    <form action="login1.php" method="post">
        <label for="username">Benutzername:</label>
        <input type="text" id="username" name="username" minlength="10" required ><br><br>

        <label for="password">Passwort:</label>
        <input type="password" id="password" name="password" minlength="10"><br><br>

        <input type="submit" value="Anmelden">
    </form>
</body>
</html>
