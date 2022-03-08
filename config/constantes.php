<?php


//PROJET_MVC
define("ROOT",str_replace("public".DIRECTORY_SEPARATOR."index.php","",$_SERVER['SCRIPT_FILENAME']));

/**
* Chemin sur dossier src qui contient les controllers et les modeles
*/
define("PATH_SRC",ROOT."src".DIRECTORY_SEPARATOR);
/**
* Chemin sur dossier templates du projet
*/
define("PATH_VIEWS",ROOT."templates".DIRECTORY_SEPARATOR);
/**
* Chemin sur data qui contient le fichier Json db.json
*/
define("PATH_DB",ROOT."data".DIRECTORY_SEPARATOR."db.json");

//requête get et post 
define( "WEB_ROOT", "http://localhost:8002/");

//url chargement image
define("WEB_PUBLIC",str_replace("index.php","",$_SERVER['SCRIPT_NAME']));

//cle d'erreurs
define("KEY_ERROR", "errors");

//clé d'accès à l'utilisateur connecté
define("KEY_USER_CONNECT", "user-connect");

