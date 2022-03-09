<?php
require_once(PATH_SRC . "models" . DIRECTORY_SEPARATOR . "user.models.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action'] == "connexion") {

            //require_once(PATH_VIEWS . "user" . DIRECTORY_SEPARATOR . "accueil.html.php");
            
            $login = $_POST['login'];
            $password = $_POST['password'];

         
            connexion($login, $password);
        }   
        if ($_REQUEST['action'] == "inscription") {
            
            extract($_POST);
            inscription( $prenom , $nom , $login, $password  );
            
           /*  var_dump($_POST);  die("thiabaakh nako ci"); */
        } 
        
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action'] == "connexion") {
            require_once(PATH_VIEWS . "securite" . DIRECTORY_SEPARATOR . "connexion.html.php");
        } elseif ($_REQUEST['action'] == "deconnexion") {
            logout();
        } elseif ($_REQUEST['action'] == "inscription") {
            require_once(PATH_VIEWS . "user" . DIRECTORY_SEPARATOR . "inscription.html.php");
        }
        elseif ($_REQUEST['action'] == "liste.joueur") {
            require_once(PATH_VIEWS . "user" . DIRECTORY_SEPARATOR . "liste.joueur.html.php"); //new edit
        }
        
    } else {
        require_once(PATH_VIEWS . "securite" . DIRECTORY_SEPARATOR . "connexion.html.php");
    }
}


//US1
function connexion(string $login, string $password): void
{

    $errors = [];

    champ_obligatoire('login', $login, $errors, "login obligatoire");

    if (count($errors) == 0) {
        
        valid_email('login', $login, $errors);
        
    }

    champ_obligatoire('password', $password, $errors,  "mot de passe obligatoire");
    
    if (count($errors) == 0) {
      
        //appel d'une fonction du models 
        $user = find_user_login_password($login, $password);
     
        if (count($user) != 0) {
            //l'utilisateur existe
            $_SESSION[KEY_USER_CONNECT] = $user; 
            header("location:" . WEB_ROOT ."?controller=user&action=accueil"); 
            exit();
        } else {
            //l'utilisateur n'existe pas 
            $errors['connexion'] = "Login ou Mot de passe Incorrect";
            $_SESSION[KEY_ERROR] = $errors;
            header("location:" . WEB_ROOT);
            exit();
        }
    } else {
        //erreur de validation

        $_SESSION[KEY_ERROR] = $errors;
        header("location:" . WEB_ROOT);
        exit();
    }
}

//fonction pour deconnexion 
function logout()
{
    session_destroy();
    header("location:" . WEB_ROOT);
    exit();
}

function  inscription ($prenom ,$nom, $login ,$password ): void {

    $errors = [];

/*     if (count($errors) == 0) {
        
        valid_email('login', $login, $errors);
        
    } */

    champ_obligatoire('prenom' , $prenom , $errors , "prenom ne peut être vide ");
    champ_obligatoire('nom' , $nom , $errors , " le nom nom ne peut être vide ");
    champ_obligatoire('login' , $login , $errors , "login ne peut être vide ");
        if (!isset($errors['login']) ) {
            valid_email('login', $login, $errors, "login ne peut être vide" );
        }
   champ_obligatoire('password' , $password , $errors , "password ne peut être vide ");
        if (!isset($errors['password'])) {
            valid_password('password' , $password , $errors , "password ne peut être vide ");
        }

if (!count($errors) == 0) {
    $_SESSION['error'] = $errors;
    header("location:". WEB_ROOT."?controller=securite&action=inscription " );

}else{
        if(add_users($prenom,$nom,$login,$password)){
                echo "succés";
                $_SESSION['ajout'] = "Ajout avec success ";
                header("location:". WEB_ROOT."?controller=securite&action=inscription " );
        }
}

}
