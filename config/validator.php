<?php

function champ_obligatoire(string $key, string $data, array &$errors, string $message = "Ce champ est obligatoire")
{
    if (empty($data)) {
        $errors[$key] = $message;
    }
}
function valid_email(string $key, string $data, array &$errors, string $message = "email obligatoire")
{

    if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
        $errors[$key] = $message;
    }

    function valid_password(string $key, string $data, array &$errors, string $message = "password invalid")
    {
    /*     $regexbeta = "^(?=\P{Ll}*\p{Ll})(?=\P{Lu}*\p{Lu})(?=\P{N}*\p{N})(?=[\p{L}\p{N}]*[^\p{L}\p{N}])[\s\S]{8,}$";

        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password); */
/* 
        if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
            // tell the user something went wrong
        }

 */
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[_a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2.3})$/';
        if (!(preg_match($regex, $data))) {
            $errors[$key] = $message;
        }
    }
   /*  function logout(): void
    {
        $_SESSION['user_connect'] = array();
        session_destroy();
        header("location:" . WEB_ROOT);
        exit();
    } */
}
