<?php
session_start();

// se si arriva qui senza una password salvata in session --> lo rimanda alla index.php
if (!isset($_SESSION["generated_password"])) {
    header("Location: ./index.php");
}
$password = $_SESSION["generated_password"];
$password_length = $_SESSION["password_length"];

$symbols = "!?~@#-_+<>[]{}";
$numbers = "0123456789";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Tua Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-dark text-white p-5">
    <div class="container text-center">
        <h1>La tua Password Sicura è:</h1>
        <div>
            <?php
            if ((strlen($password) < $password_length) && str_contains($symbols, $password[0])) { ?>
                <div class="alert alert-warning">
                    <strong>Attenzione:</strong> Hai richiesto una password di <?php echo $password_length ?> caratteri senza ripetizioni.
                    Tuttavia, il set di caratteri di soli simboli che hai scelto ne contiene solo <?php echo strlen($password) ?>.
                    Per motivi di sicurezza, è stata generata la password più lunga possibile di soli simboli senza duplicati.
                </div>
            <?php
            }
            ?>
            <?php
            if ((strlen($password) < $password_length) && str_contains($numbers, $password[0])) { ?>
                <div class="alert alert-warning">
                    <strong>Attenzione:</strong> Hai richiesto una password di <?php echo $password_length ?> caratteri senza ripetizioni.
                    Tuttavia, il set di caratteri di soli numeri che hai scelto ne contiene solo <?php echo strlen($password) ?>.
                    Per motivi di sicurezza, è stata generata la password più lunga possibile di soli numeri senza duplicati.
                </div>
            <?php
            }
            ?>
            <div class="alert alert-info">
                <span class="fs-4"><?php echo $password ?></span>
            </div>
            <a href="./index.php">Torna indietro</a>
        </div>
    </div>
</body>

</html>