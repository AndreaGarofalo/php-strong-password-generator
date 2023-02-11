<?php

function generate_password($lenght) 
{
    $password = "";

    $min_lenght = 5;

    $letters = 'abcdefghijklmnopqrstuvwxyz';
    $numbers = '0123456789';
    $symbols = '!?&%$<>^+-*/()[]{}@#_=£';

    $characters = $letters . strtoupper($letters) . $numbers . $symbols;

    $total_characters = mb_strlen($characters);

    if(empty($lenght)) return 'Non è stata fornita la lunghezza';
    if($lenght < $min_lenght) return 'La lunghezza minima non è stata rispettata';

    while(mb_strlen($password) < $lenght) {
        $random_index = rand(0, $total_characters - 1);

        $random_character = $characters[$random_index];

        $password .= $random_character;
    }

    session_start();
    $_SESSION['password'] = $password;

    return true;
}