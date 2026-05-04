<?php
session_start();

// se si arriva qui senza una password salvata in session --> lo rimanda alla index.php
if (!isset($_SESSION["generated_password"])) {
    header("Location: ./index.php");
}
$password = $_SESSION["generated_password"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Tua Password</title>
</head>
<body>
    <h1>La tua Password Sicura è:</h1>
    <div>
        <strong><?php echo $password  ?></strong>
    </div>
    <br>
    <h2>Se non ti convince puoi generarne un altra</h2>
    <p>utilizza il link per tornare al generatore</p>
    <a href="./index.php">Torna indietro</a>
</body>
</html>