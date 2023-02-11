<?php

function generate_password($lenght) 
{
    $password = "";

    $letters = 'abcdefghijklmnopqrstuvwxyz';
    $numbers = '0123456789';
    $symbols = '!?&%$<>^+-*/()[]{}@#_=£';

    $characters = $letters . strtoupper($letters) . $numbers . $symbols;

    $total_characters = mb_strlen($characters);

    while(mb_strlen($password) < $lenght) {
        $random_index = rand(0, $total_characters - 1);

        $random_character = $characters[$random_index];

        $password .= $random_character;
    }

    return $password;
}