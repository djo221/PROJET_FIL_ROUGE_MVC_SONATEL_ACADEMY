<?php
//convertisseur ==> ORM



//fonction pour convertir le fichier json en tableau
function json_to_array(string $key): array{

    $dataJson = file_get_contents(PATH_DB);
    $data = json_decode($dataJson, true);
    return $data[$key];
}
//Enregistrement et Mis a jour des donnees du fichier
function array_to_json(string $key, array $data): array{
    return [];
}


///Recuperationdes donnees du fichier
function find_data(string $key):array{
$dataJson=file_get_contents(PATH_DB);
$data=json_decode($dataJson,true);
return $data[$key];
}
//Enregistrement et Mis a jour des donnees du fichier
function save_data(string $key,array $data):array{
return [];
}