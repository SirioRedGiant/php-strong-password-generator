<?php
//funzione che data una lunghezza definita nel form restituisce una password
    function passwordGenerator($length, $filters = [], $enable_repeat = true) {
        $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!?~@#-_+<>[]{}";
        $numbers = "0123456789";
        $letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $symbols = "!?~@#-_+<>[]{}";        
        $available_characters = "";

        // se l'array è vuoto si potranno usare tutti i caratteri, altrimenti in base a quelli selezionati
        if (!$filters) {
            $available_characters = $numbers . $letters . $symbols;
        } else {
            if (in_array("numbers", $filters)) {
                $available_characters .= $numbers;
            }
            if (in_array("letters", $filters)) {
                $available_characters .= $letters;
            }
            if (in_array("symbols", $filters)) {
                $available_characters .= $symbols;
            }
        }
        
        $password = "";
        while (strlen($password) < $length) {
            $random_char = $available_characters[rand(0, strlen($available_characters) - 1)];
            // se allowrepeat è settato falso controllo che $random_char non sia già presente
            if ($enable_repeat || !str_contains($password, $random_char)) {
                $password .= $random_char;
            }
            // se l'utente non vuole ripetizioni ma il pool dei caratteri disponibili è inferiore alla quantità richiesta esce per evitare loop infinito
            if (!$enable_repeat && strlen($password) >= strlen($available_characters)) break;
        }
        return $password;        
    }

?>