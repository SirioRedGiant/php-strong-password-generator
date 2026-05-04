<?php
session_start();
require_once "./functions.php";

$generated_password = "";

// Controllo se il form è stato inviato, quindi se esiste "length" nel $_GET
if (isset($_GET['length']) && !empty($_GET['length'])) {

    $password_length = (int)$_GET['length'];
    $generated_password = passwordGenerator($password_length);

    $_SESSION["generated_password"] = $generated_password;

    header("Location: ./result.php");
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
</head>
<body>
    <h1>Strong Password Generator</h1>
    <p>Qui potrai generare la tua password sicura</p>
    <form action="index.php" method="GET">
        <label for="length">Inserisci la lunghezza della password desiderata</label>
        <input type="number" id="length" name="length" min="4" max="70" required>
        <button type="submit">Genera</button>
        <button type="reset">Resetta</button>
    </form>
</body>
</html>