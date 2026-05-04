<?php

$generated_password = "";

// Controllo se il form è stato inviato, quindi se esiste "length" nel $_GET
if (isset($_GET['length']) && !empty($_GET['length'])) {
    $password_length = (int)$_GET['length'];

    //funzione che data una lunghezza definita nel form restituisce una password
    function passwordGenerator($length) {
        $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!?~@#-_+<>[]{}";
        $characters_length = strlen($characters);
        $password = "";

        for ($i = 0; $i < $length; $i++) {
            $random_index_character = rand(0, $characters_length - 1);
            $password .= $characters[$random_index_character];
        }
        return $password;
    }
    $generated_password = passwordGenerator($password_length);
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
    <?php
    if ($generated_password) {
    ?>
    <div>
        La tua password è: <strong><?php echo($generated_password) ?></strong>
    </div>
    <?php
    }
    ?>
</body>
</html>