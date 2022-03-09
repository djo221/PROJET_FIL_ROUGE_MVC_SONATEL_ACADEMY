<?php
require_once(PATH_SRC . "models" . DIRECTORY_SEPARATOR . "user.models.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action'] == "connexion") {
            $login = $_POST['login'];
            $password = $_POST['password'];
            connexion($login, $password);
        }
    }
}



if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_REQUEST['action'])) {
        /*  if ( !is_connect() ){
            header ("location:".WEB_ROOT);
            exit();
        }       */
        if ($_REQUEST['action'] == "accueil") {
            require_once(PATH_VIEWS . "user" . DIRECTORY_SEPARATOR . "accueil.html.php");
        } elseif ($_REQUEST['action'] == "liste.joueur") {
            lister_joueur();

        }
    }
}

function lister_joueur()
{
    ob_start();
    $data =  find_users(ROLE_JOUEUR);
    require_once(PATH_VIEWS . "user" . DIRECTORY_SEPARATOR . "liste.joueur.html.php");
    $content_for_views = ob_get_clean();
    require_once(PATH_VIEWS . "user" . DIRECTORY_SEPARATOR . "accueil.html.php");
}

function jeu()
{
    ob_start();

    require_once(PATH_VIEWS . "user" . DIRECTORY_SEPARATOR . "jeu.html.php");
    $content_for_views = ob_get_clean();
    require_once(PATH_VIEWS . "user" . DIRECTORY_SEPARATOR . "accueil.html.php");
}
