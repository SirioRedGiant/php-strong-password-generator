<?php

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

?>