<?php

function find_user_login_password(string $login, string $password): array
{

    $users = json_to_array("users");
    foreach ($users as $user) {
        if ($user['login'] == $login && $user['password'] == $password)
            return $user;
    }
    return [];
}

function find_users(string $role): array
{
    $users = find_data("users");
    $result = [];
    foreach ($users as $user) {
        if ($user['role'] == $role)
            $result[] = $user;
    }
    return
        $result;
}
 
function add_users($prenom , $nom, $login, $password ){

    if(is_connect()){
        $role = ROLE_ADMIN;
    }else{
        $role = ROLE_JOUEUR;
    }

    $user =  array(
        "nom" =>$nom,
        "prenom" =>$prenom,
        "login" =>$login,
        "password" =>$password,
        "role" =>$role,
        "score" =>0
    );

    $dataJson = file_get_contents(PATH_DB);
    $dataArray=json_decode($dataJson,true);
    $dataArray["users"][] = $user;
    $dataFinal = json_encode($dataArray,JSON_PRETTY_PRINT);

    return file_put_contents(PATH_DB,$dataFinal);


}