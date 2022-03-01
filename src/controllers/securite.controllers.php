<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action'] == "connexion") {
            $login = $_POST['login'];
            $password = $_POST['password'];
        }
    }
}
print $login;
print $password;
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action'] == "connexion") {
            echo "charger ma page de connexion <==+++++++++++>";
        } else {
            echo "charger ma page de connexion";
        }
    }
}

//US1
function connexion(string $login, string $password):void
{
    $error =
  champ_obligatoire('login', $login, $errors);
}