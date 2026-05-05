<?php
session_start();
require_once "./functions.php";

$generated_password = "";

// Controllo se il form è stato inviato, quindi se esiste "length" nel $_GET
if (isset($_GET['length']) && !empty($_GET['length'])) {

    $password_length = (int)$_GET['length'];

    $filters = isset($_GET["filters"]) ? $_GET["filters"] : [];

    $enable_repeat = (bool)$_GET["repeat"];

    $generated_password = passwordGenerator($password_length, $filters, $enable_repeat);

    $_SESSION["generated_password"] = $generated_password;
    $_SESSION["password_length"] = $password_length;

    header("Location: ./result.php");
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-dark text-white p-5">
    <div class="container text-center">
        <h1>Strong Password Generator</h1>
        <p>Qui potrai generare la tua password sicura</p>
        <div>
            <form action="index.php" method="GET">
                <label for="length">Lunghezza password:</label>
                <input type="number" id="length" name="length" min="4" max="70" required>

                <br><br>

                <span>Consenti ripetizioni:</span>
                <input type="radio" name="repeat" value="1" checked> Sì
                <input type="radio" name="repeat" value="0"> No

                <br><br>

                <input type="checkbox" name="filters[]" value="letters"> Lettere
                <input type="checkbox" name="filters[]" value="numbers"> Numeri
                <input type="checkbox" name="filters[]" value="symbols"> Simboli

                <br><br>
                <button type="submit">Genera</button>
            </form>
        </div>
    </div>
</body>

</html>